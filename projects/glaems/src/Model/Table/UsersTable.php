<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UsersStatusCodes
 * @property \Cake\ORM\Association\BelongsTo $UsersTypesCodes
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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
        $this->table('users');
        $this->displayField('first_name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Proffer.Proffer', [
          'photo' => [
            'root' => MEDIA_UPLOAD_PATH . DS . 'images',
            'dir' => 'photo_dir',
            'thumbnailSizes' => [
              '100x100' => [
                'w' => 100,
                'h' => 100,
                'jpeg_quality' => 100
              ],
            ],
            'thumbnailMethod' => 'gd'
          ]
        ]);


        $this->belongsTo('UsersStatusCodes', [
            'foreignKey' => 'user_status_code_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('UsersTypesCodes', [
            'foreignKey' => 'user_type_id',
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
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->requirePresence('identity_number', 'create')
            ->notEmpty('identity_number');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('mobile_number', 'create')
            ->notEmpty('mobile_number');

        $validator
            ->notEmpty('password');

        $validator->provider('proffer', 'Proffer\Model\Validation\ProfferRules');
        $validator
            ->add('photo', 'proffer', [
                'rule' => ['dimensions', [
                    'min' => ['w' => 100, 'h' => 100],
                    'max' => ['w' => 2000, 'h' => 2000]
                ]],
                'message' => 'Image resolution must be between 100x100 to 2000x2000',
                'provider' => 'proffer'
            ]);

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_status_code_id'], 'UsersStatusCodes'));
        $rules->add($rules->existsIn(['user_type_id'], 'UsersTypesCodes'));

        return $rules;
    }

    public function checkCoordinatorStatus($id)
    {
      if($id){
          $var = $this->find()->where(['id' => $id])->andWhere(['user_status_code_id' => 2])->first();
      }


      if($var){
        return true;
      }

      return false;
    }

    public function findPeers($user_id = null) //left to be made
    {
      $this->Visitors = TableRegistry::get('Visitors');
      $this->Events = TableRegistry::get('Events');
      $find_participants = $this->Visitors->find()->where(['user_id' => $user_id]);// In a function all variables are declared globally for that function
      $index = 0;
      if((iterator_count($find_participants)) > 0){
          foreach($find_participants as $event){
              $peers[$index] = $this->Visitors->find()->where(['event_id' => $event->event_id])->contain(['Events']);
              $index += 1;

          }
          return [$index, $peers];
      }else{
          return false;
      }
    }

    public function hasRequestedPassword($user_id = null)  //Called when the user is using otp to log in
    {
      if($user_id != null){
        $check = $this->find()->where(['id' => $user_id])->andWhere(['pc_request' => 1])->first();
        if($check){
          return true;
        } else{
          return false;
        }
      }
    }

    public function updatePassword($password = null, $user_id = null)
    {
        $user = $this->find()->where(['id' => $user_id])->first();
        if($user){
            $user->password = $password;
            $user->pc_request = 0; //Reset to default. very important field to consider for updation, otherwise pc paradigm will not work.
            if($this->save($user)){
                return true;
            }
            return false;
        }
    }

    public function checkSimilarity($id_corpus)
    {
      $check = $this->find()->where(['identity_number LIKE' => '%'.$id_corpus.'%']);
      if((iterator_count($check)) > 0){
        return true; //Corpus Exists

      }

      return false;
    }

    public function getRegPercent()
    {
      $this->Visitors = TableRegistry::get('Visitors');
      $count_active_students = $this->find()->where(['user_type_id' => 1])->andWhere(['user_status_code_id <>' => 1])->count(); // It counts all actives, be it student coordinator or simple student.
      $count_participating_students= $this->Visitors->find('all')->count(); // It counts all the participating students, however the same user id may be counted twice if the same student has registered in more than one events.
      $percent = ($count_active_students)/($count_participating_students);
      $percent *= 100;
      return $percent;
    }
    public function getFacultyEngagedPercent()
    {
       $count_active_faculty = $this->find()->where(['user_type_id' => 2])->andWhere(['user_status_code_id' => 5])->count(); //faculty users having active account.
       $count_active_faculty_coordinators = $this->find()->where(['user_type_id' => 2])->andWhere(['user_status_code_id' => 2])->count();
       if($count_active_faculty + $count_active_faculty_coordinators){
         $percent = ($count_active_faculty_coordinators)/($count_active_faculty + $count_active_faculty_coordinators);
         $percent *= 100;
         return $percent;
       } else {
         return 0;
       }

    }

    //Number of people online remain pending
}
