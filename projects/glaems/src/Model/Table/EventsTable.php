<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Events Model
 *
 * @property \Cake\ORM\Association\HasMany $Costs
 * @property \Cake\ORM\Association\HasMany $EventCoordinators
 * @property \Cake\ORM\Association\HasMany $EventFiles
 * @property \Cake\ORM\Association\HasMany $FacultyCoordinators
 * @property \Cake\ORM\Association\HasMany $Qrcodes
 * @property \Cake\ORM\Association\HasMany $Revenues
 *
 * @method \App\Model\Entity\Event get($primaryKey, $options = [])
 * @method \App\Model\Entity\Event newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Event[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Event|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Event patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Event[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Event findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EventsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('events');
        $this->displayField('event_name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Proffer.Proffer', [
          'poster' => [
            'root' => MEDIA_UPLOAD_PATH . DS . 'images',
            'dir' => 'poster_dir',
            'thumbnailSizes' => [
              '960x600' => [
                'w' => 960,
                'h' => 600,
                'jpeg_quality' => 100
              ],
            ],
            'thumbnailMethod' => 'gd'
          ]
        ]);

        $this->hasMany('Costs', [
            'foreignKey' => 'event_id'
        ]);
        $this->hasMany('EventCoordinators', [
            'foreignKey' => 'event_id'
        ]);
        $this->hasMany('EventFiles', [
            'foreignKey' => 'event_id'
        ]);
        $this->hasMany('FacultyCoordinators', [
            'foreignKey' => 'event_id'
        ]);
        $this->hasMany('Qrcodes', [
            'foreignKey' => 'event_id'
        ]);
        $this->hasMany('Revenues', [
            'foreignKey' => 'event_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('event_name', 'create')
            ->notEmpty('event_name');

        $validator
            ->date('date_of_registration')
            ->requirePresence('date_of_registration', 'create')
            ->notEmpty('date_of_registration');

        $validator
            ->date('date_of_commencement')
            ->notEmpty('date_of_commencement');

        $validator
            ->requirePresence('no_of_seats')
            ->notEmpty('no_of_seats');

        $validator
            ->integer('status')
            ->requirePresence('status')
            ->notEmpty('status');

        $validator->provider('proffer', 'Proffer\Model\Validation\ProfferRules');

        $validator
        ->add('poster', 'proffer', [
            'rule' => ['dimensions', [
                'min' => ['w' => 270, 'h' => 270],
                'max' => ['w' => 3000, 'h' => 3000]
            ]],
            'message' => 'Image resolution must be between 270x270 to 3000x3000',
            'provider' => 'proffer'
        ]);

        return $validator;
    }

    public function calculateOnlineCount()
    {
        $count = $this->find()->where(['status' => 0])->count();
        return $count;
    }

    public function calculateUpcomingCount()
    {
        $count = $this->find()->where(['status' => 4])->count();
        return $count;
    }

    public function currentOnlineEvents($date_today = null)
    {
        $count = $this->find()->where(['date_of_commencement' => $date_today])->andWhere(['status' => 0])->count();
        return $count;
    }

    public function closeEvent($event_id = null)
    {
      $find_victim_event = $this->find()->where(['id' => $event_id])->first();
      $find_victim_event->status = 3;  //Event Completed
      if($this->save($find_victim_event)){
        return true;
      }

      return false;
    }

    public function findTopGrossing($date_today = null, $index = 0)
    {
        $this->Visitors = TableRegistry::get('Visitors');
        $data_events = $this->find()->where(['date_of_commencement !=' => $date_today])->andWhere(['status' => 0]); //Status is checked so that the back-date completed event is not shown
        if($data_events){
            foreach($data_events as $event){
                $count[$index] = $this->Visitors->find()->where(['event_id' => $event->id])->count();
                if($index == 0){
                    $max = $count[$index];
                    $event_name = $event->event_name;
                    $top_gross_id = $event->id;
                }
                $index += 1;
            }
            $index = 0;
            foreach($data_events as $event){
                if($count[$index] > $max){
                    $max = $count[$index];
                    $event_name = $event->event_name;
                    $top_gross_id = $event->id;
                }
                $index += 1;
            }
            $total_seats_query = $this->find()->where(['id' => $top_gross_id])->first();
            $total_seats = ($total_seats_query->no_of_seats) + $max;
            $percent = $max / $total_seats;
            $percent *= 100;

            return [$percent, $event_name];

        } else{
            return ["N/A", 0];
        }
    }

    public function getEventNameId($faculty_id = null)
    {
      $this->FacultyCoordinators = TableRegistry::get('FacultyCoordinators');
      if($faculty_id != null){
        $event_data = $this->FacultyCoordinators->find()->where(['user_id' => $faculty_id])->first();
        if($event_data){
          $event_name = $this->find()->where(['id' => $event_data->event_id])->first();
          if($event_name){
            return [$event_name->event_name , $event_data->event_id];
          }
        } else {
          return ["N/A", null];
        }
      }
    }

    public function dateHeld($event_id = null)
    {
        if($event_id){
            $date_held = $this->find()->where(['id' => $event_id])->first();
            return $date_held->date_of_commencement;
        }

        return "N/A";
    }

    public function noOfSeats($event_id = null)
    {
        $this->Visitors = TableRegistry::get('Visitors');
        if($event_id){
            $seats = $this->find()->where(['id' => $event_id])->first();
            $seats_count = $seats->no_of_seats;
            $seats_count = $seats_count + ($this->Visitors->calculateVisitorsCount($event_id));
            return $seats_count;
        }

        return "NAN";
    }

    public function findOnlineData()
    {
      $data = $this->find()->where(['status' => 0])->andWhere(['no_of_seats >' => 0 ]);
      return $data;
    }

    public function fetchPoster($event_id = null, $event_name = null)
    {
      if($event_id != null && $event_name == null){
        $event_details = $this->find()->where(['id' => $event_id])->first();
        $poster_name = $event_details->poster;
        $poster_dir = $event_details->poster_dir;
        return [$poster_name, $poster_dir];
      }

      if($event_id == null && $event_name != null){
        $event_details = $this->find()->where(['event_name' => $event_name])->first(); //Make $event_name to be unique....
        $poster_name = $event_details->poster;
        $poster_dir = $event_details->poster_dir;
        return [$poster_name, $poster_dir];
      }

    }


}
