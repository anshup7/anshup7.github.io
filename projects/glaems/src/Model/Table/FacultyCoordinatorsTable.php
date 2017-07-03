<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * FacultyCoordinators Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Events
 * @property \Cake\ORM\Association\BelongsTo $FacultyCoordinators
 * @property \Cake\ORM\Association\HasMany $FacultyCoordinators
 *
 * @method \App\Model\Entity\FacultyCoordinator get($primaryKey, $options = [])
 * @method \App\Model\Entity\FacultyCoordinator newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FacultyCoordinator[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FacultyCoordinator|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FacultyCoordinator patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FacultyCoordinator[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FacultyCoordinator findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FacultyCoordinatorsTable extends Table
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

        $this->table('faculty_coordinators');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Events', [
            'foreignKey' => 'event_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->integer('status')
            ->allowEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['event_id'], 'Events'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function isCoordinator($faculty_id = null)
    {
      if($faculty_id != null){
        $check = $this->find()->where(['user_id' => $faculty_id ])->andWhere(['status' => 0])->first();
        if($check){
          return true;
        } else{
          return false;
        }
      } else{
        return null;
      }
    }

    public function facultyName($faculty_id = null)
    {
        $this->Users = TableRegistry::get('Users');
        $name_data = $this->find()->where(['user_id' => $faculty_id])->andWhere(['status' => 0])->contain(['Users'])->first();
        //debug($name_data);
        if($name_data){
            return $name_data->user->first_name." ".$name_data->user->last_name;
        } else {
            return "N/A";
        }
    }

    public function findFacultyEvent($user_id = null)
    {
      $faculty_data = $this->find()->where(['user_id' => $user_id])->andWhere(['status' => 0])->first(); // There should be only One faculty Coordinator in  an event
      if($faculty_data){
          return $faculty_data->event_id;
      }

      return "N/A";

    }

    public function setEvc($user_id = null, $radio_value = null)
    {
        $this->EventCoordinators = TableRegistry::get('EventCoordinators');
        $faculty_event = $this->find()->select('event_id')->where(['user_id' => $user_id])->andWhere(['status' => 0]);
        $coordinator_id = $this->EventCoordinators->find()->where(['event_id' => $faculty_event])->andWhere(['working_status' => 0])->first();
        if($radio_value == 1){
            $coordinator_id->status = 1;
        } else{
            $coordinator_id->status = 0;
        }
        if($this->EventCoordinators->save($coordinator_id)){
            return true;
        }
    }

    public function fcExists($user_id = null)
    {
      if($user_id){
          $check = $this->find()->where(['user_id' => $user_id])->andWhere(['status' => 1])->first();
          if($check){
            return true;
        } else {
            return false;
        }
        }


      }

      public function findFaculty($event_id = null)
      {
          $this->Users = TableRegistry::get('Users');
          $data = $this->find()->where(['event_id' => $event_id])->andWhere(['status' => 0])->contain(['Users'])->first();
          if($data){
              return $data->user->first_name." ".$data->user->last_name." (".$data->user->mobile_number." )";

          } else {
              return "(No Faculty Coordinator Added)";
          }
      }

      public function workinFcExists($event_id = null)
      {
        $check = $this->find()->where(['event_id' => $event_id])->andWhere(['status' => 0])->first();
        if($check){
          return true;
        }

        return false;
      }

    }
