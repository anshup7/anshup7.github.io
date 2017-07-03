<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Visitors Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Events
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Visitor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Visitor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Visitor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Visitor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Visitor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Visitor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Visitor findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VisitorsTable extends Table
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

        $this->table('visitors');
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

    public function calculateUserRegistrationsCount($user_id = null)
    {
      $count = $this->find()->where(['user_id' => $user_id])->count(); // status is zero to show that event is online..If it is offline and the user has not shown up in the event the status will be be marked to 1 .
      return $count;
    }

    public function calculateCoordinatorRegistrationsCount($user_id = null)
    {
      $this->EventCoordinators = TableRegistry::get('EventCoordinators');
      $find_event = $this->EventCoordinators->find()->where(['user_id' => $user_id])->andWhere(['working_status' => 0])->first();
      if($find_event){
          $count = $this->find()->where(['event_id' => $find_event->event_id])->count();
          return $count;
      }
      return "N/A";
    }

    public function calculateVisitorsCount($event_id = null)
    {
      if($event_id){
        $count = $this->find()->where(['event_id' => $event_id])->count();
        return $count;
      }
      return 0;
    }

    public function loadRegisterations($event_id = null)
    {
        $this->Users = TableRegistry::get('Users');
        if($event_id){
            $registerations = $this->find()->where(['event_id' => $event_id])->contain(['Users']); //Even of the student is debarred to attend. He can do anything on the website. Only his attendance will not be counted. The student will get a mail of he being debarred.
            if(iterator_count($registerations) > 0){
                return [$registerations, true];
            } else {
                return null;
            }
        }


    }

    // calculate t-number of Visitors in the faculty coordinator event

    public function calculateRegistrationsCount($user_id = null)
    {
      $this->FacultyCoordinators = TableRegistry::get('FacultyCoordinators');
      $find_event = $this->FacultyCoordinators->find()->where(['user_id' => $user_id])->andWhere(['status' => 0])->first();
      if($find_event){
          $count = $this->find()->where(['event_id' => $find_event->event_id])->count();
          return $count;
      }
      return "N/A";
    }

}
