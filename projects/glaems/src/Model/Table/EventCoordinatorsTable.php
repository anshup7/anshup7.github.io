<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * EventCoordinators Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Events
 * @property \Cake\ORM\Association\BelongsTo $EventCoordinators
 * @property \Cake\ORM\Association\HasMany $EventCoordinators
 *
 * @method \App\Model\Entity\EventCoordinator get($primaryKey, $options = [])
 * @method \App\Model\Entity\EventCoordinator newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EventCoordinator[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EventCoordinator|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventCoordinator patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EventCoordinator[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EventCoordinator findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EventCoordinatorsTable extends Table
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

        $this->table('event_coordinators');
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

    public function name($event_id = null)
    {
      $this->Users = TableRegistry::get('Users');
      if($event_id){
        $evc_data = $this->find()->where(['event_id' => $event_id])->andWhere(['working_status' => 0])->contain(['Users'])->first();
        if($evc_data){
            return $evc_data->user->first_name." ".$evc_data->user->last_name;
        }
      }

      return "N/A";
    }

    public function findEvcOfFaculty($event_id = null)
    {
      $this->Users = TableRegistry::get('Users');
      if($event_id){
        $evc_data = $this->find()->where(['event_id' => $event_id])->andWhere(['working_status' => 0])->contain(['Users'])->first();
        if($evc_data){
            $pass = $evc_data->user->first_name." ".$evc_data->user->last_name." (".$evc_data->user->mobile_number." )";
        return [$pass, true];

      }
      }

      return ["Not Available", false];
    }

    public function permitted($event_id = null)
    {
        if($event_id != "N/A"){
            $coordinator = $this->find()->where(['event_id' => $event_id])->andWhere(['working_status' => 0])->first();
            if($coordinator){
                if($coordinator->status == 1){
                    return true;
                }
            }
        }
        return false;
    }

    public function checkPermission($user_id = null)
    {
        if($user_id){
            $check = $this->find()->where(['user_id' => $user_id])->andWhere(['status' => 1])->first();
        }
        if($check){
            return true;
        }
        return false;
    }

    public function evcExits($user_id = null)
    {
      if($user_id){
        $check = $this->find()->where(['user_id' => $user_id])->andWhere(['working_status' => 1])->first();
        if($check){
          return true;
      } else {
          return false;
      }
      }

      return false;
    }

    public function workinEvcExists($event_id = null)
       {
         $check = $this->find()->where(['event_id' => $event_id])->andWhere(['working_status' => 0])->first();
         if($check){
           return true;
         }

         return false;
       }

}
