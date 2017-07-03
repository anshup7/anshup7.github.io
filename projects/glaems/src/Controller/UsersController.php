<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Network\Http\Client;
use Cake\I18n\Time;
use Cake\Mailer\Email;

//require_once(ROOT.'/vendor/textlocal/textlocal.class.php');

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    //public $component = ['RequestHandler'];

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['add', 'sendEmail','checkIdPresence']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['UsersStatusCodes', 'UsersTypesCodes']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method/

     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['UsersStatusCodes', 'UsersTypesCodes']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Events');
        $today = new \DateTime('now');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('You are successfully registered, Please send your image at the above given Email.'));

                return $this->redirect(['action' => 'index']);
            } else {
                //debug($user);
                $this->Flash->error(__('Registration Unsuccessful. Please, try again.'));
            }
        }
        $usersStatusCodes = $this->Users->UsersStatusCodes->find('list', ['limit' => 200]);
        $usersTypesCodes = $this->Users->UsersTypesCodes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'usersStatusCodes', 'usersTypesCodes'));
        $this->set('_serialize', ['user']);
        $poster_details = $this->Events->fetchPoster(null, $this->Events->findTopGrossing($today)[1]);
        $poster_dir = $poster_details[1];
        $poster_name = $poster_details[0];
        $this->set('poster_dir', $poster_dir);
        $this->set('poster', $poster_name);

    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $usersStatusCodes = $this->Users->UsersStatusCodes->find('list', ['limit' => 200]);
        $usersTypesCodes = $this->Users->UsersTypesCodes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'usersStatusCodes', 'usersTypesCodes'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function login()    //You may call the logout function if you want to be sure that the user is logged out in case of no activity
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            //Checking if the User has logged in with the Temporary Password.
            if($this->Users->hasRequestedPassword($user['id'])){
              $this->redirect(['action' => 'changePassword', $user['id']]);
            }

            //
            if ($user) {
                if ($user['is_admin'] == true ) {
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'users', 'action' => 'admin']);
                } elseif($user['is_admin'] == false && $user['user_type_id'] == 1 && $user['user_status_code_id'] != 1 && $user['user_status_code_id'] != 4 ) {
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'users', 'action' => 'studentPageAction']); //decide what action should be performed here
                } elseif($user['is_admin'] == false && $user['user_type_id'] == 2 && $user['user_status_code_id'] != 1 && $user['user_status_code_id'] != 4){
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'faculty-coordinators', 'action' => 'facultyLandingPage']);
                } elseif((($user['is_admin'] == false && $user['user_type_id'] == 1) || ($user['is_admin'] == false && $user['user_type_id'] == 2)) && (($user['user_status_code_id'] == 1) || ($user['user_status_code_id'] == 4))){
                    $this->redirect($this->referer());
                    $this->Flash->error('Your Account is not activated by the Admin, We will Notify you once its activated!');

                } elseif($user['is_admin'] == false && $user['user_type_id'] == 1 && $user['user_status_code_id'] == 2){
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'event-coordinators', 'action' => 'eventCoordinatorPageAction']);
                }
            } else {
                $this->Flash->error('Either You are not registered or Wrong Credentials entered');
                $this->redirect($this->referer());
            }
        }
    }

    public function admin()
    {   $count = 0;
        $new_users_for_update = $this->Users->find()->where(['user_status_code_id' => 1]);
        foreach($new_users_for_update as $calulate){
            $count = $count + 1;
        }


        $this->set('new_users_for_update', $count);


    }

    public function usersRegistered()
    {
      $update_requiring_users = $this->Users->find()->where(['user_status_code_id' => 1])->andWhere(['first_name <>' => 'Root']); //means find all that are requiring updation.
      $update_users = $this->paginate($update_requiring_users);

      $this->set(compact('update_users'));
      $this->set('_serialize', ['update_users']);
    }

    public function addAdmin()
    {
      $non_admin_query = $this->Users->find()->where(['is_admin' => false])->andWhere(['user_status_code_id !=' => 1])->andWhere(['user_status_code_id !=' => 3])->andWhere(['user_status_code_id !=' => 4]);
      $this->set('add_admin', $non_admin_query);
    }

    public function removeAdmin()
    {
        $are_admin_query = $this->Users->find()->where(['is_admin' => true])->andWhere(['first_name <>' => 'Root']);
        $this->set('remove_admin', $are_admin_query);
    }

    public function updateAdmin($check_what_update = null, $person_id = null) //code needed to change the user _id..and also for the super admin
    {
        $admin = $this->Users->get($person_id);
        if ($admin) {
            if ($check_what_update == 1) {
                $admin->is_admin = 1;
            }
            if ($check_what_update == 0) {
                $admin->is_admin = 0;
            }
            if ($this->Users->save($admin)) {
                $this->Flash->success(__('Admin Successfully updated'));
            }
        }
        return $this->redirect(['action' => 'admin']);
    }

    //function to change user Status: To activate His account, or remove the user if has given wrong data.

    public function changeStatusOrRemove($change_status_request_id = null, $check_user_type = null, $remove_user_prompt = null)
    {
        $email = new Email('default');
        $email->from(['glaeventmanagementsystem@gmail.com' => 'GLAeMSAdmin'])
        ->subject('Action On Your Account By GLAeMS Admin');
        if(isset($change_status_request_id) && $remove_user_prompt == null){ //To activate the account by admin,has nothing to do with the coordinator privileges.
            $get_user = $this->Users->get($change_status_request_id);
            $email->to($get_user->email);
            if($check_user_type == 1){

                $get_user->user_status_code_id = 5;  //value 2 only defines whether the user is a coordiantor or not. Student or faculty will be determined by the user_type_id.
                if($this->Users->save($get_user)){
                  $this->Flash->success($get_user->first_name." ".$get_user->last_name." has been granted student account on GLAeMS");
                  $email->send('Your Registration has been Approved By Admin. If any query, You can drop a reply');
                }
            }

            if($check_user_type == 2){
                $get_user->user_status_code_id = 5;
                if($this->Users->save($get_user)){
                  $this->Flash->success($get_user->first_name." ".$get_user->last_name." has been granted faculty account on GLAeMS");
                  $email->send('Your Registration has been Approved By Admin. If any query, You can drop a reply');
                }
            }

        }

        if(isset($change_status_request_id) && $remove_user_prompt == true){
            $get_user = $this->Users->get($change_status_request_id);

            $email->to($get_user->email);

            if($check_user_type == 1){

                $get_user->user_status_code_id = 4; //For rejection of registration
                if($this->Users->save($get_user)){
                  $this->Flash->error($get_user->first_name." ".$get_user->last_name." has been rejected for registration");
                  $email->send('Your Registration has been Cancelled. If any query, You can drop a reply');
                }
            }

            if($check_user_type == 2){ // see who is the Auth user. This operation must be done by super-admin only.
                $get_user->user_status_code_id = 4; // For rejection of the registration
                if($this->Users->save($get_user)){
                  $this->Flash->error($get_user->first_name." ".$get_user->last_name." has been rejected for registration");
                   $email->send('Your Registration has been Cancelled. If any query, You can drop a reply');
                }
            }
        }
        return $this->redirect(['action' => 'admin']);

    }

    public function listAdmin()
    {
      $query = $this->Users->find()->where(['is_admin' => true]);
      $this->set('admin', $query);
    }

    public function displayDetail($id = null)
    {
        if ($id != $this->Auth->user('id')) {//This line gives the session variable's id.
            return $this->redirect(['action' => 'view', $id]);
        } else {
            $this->Flash->error("You have been landed on your edit page");
            return $this->redirect(['action' => 'edit', $id]);

        }
    }


    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function sendEmail()
    {

        $text = Text::truncate(Text::uuid(), 5, ['ellipsis' => '']);
        if($this->request->data()){
            $email_addr = $this->Users->find()->where(['email' => $this->request->data['email']])->first();
            $email_forgot = new Email('default');
            if($email_addr ){
                $email_addr->pc_request = 1;
                $email_addr->password = $text; //Updating password fields for the email
                if($this->Users->save($email_addr)){  //If updated then only send the Email
                    $email_forgot->from(['glaeventmanagementsystem@gmail.com' => 'GLAeMSAdmin'])
                    ->to($email_addr->email)
                    ->subject('Your New Passcode : '.$text)
                    ->send('Use this temporary passcode to login');
                    $this->redirect(['action' => 'logout']);
                } else{
                    $this->Flash->error("Some Error occurred, Please Try Again");
                    $this->redirect(['action' => 'login']);
                }
            } else{
                $this->Flash->error("This Email address is not available.");
                $this->redirect(['action' => 'login']);
            }
        }
    }

    public function changePassword($user_id = null)
    {   if($user_id != null){
        $user_identity = $user_id; //SO that in case of post request this is not updated again
        }
        if($this->request->data()){
            $done = $this->Users->updatePassword($this->request->data['password'], $user_identity);
            if($done){
            $this->Flash->success("Password Successfully Updated, Login to Proceed");
            $this->redirect(['action' => 'logout']);
            }
        }
    }



     public function studentPageAction($user_id = null)
     {
         if($this->Users->checkCoordinatorStatus($this->Auth->user('id'))){
           $this->set('display_coordinator_link', true);
         } else {
            $this->set('display_coordinator_link', false);
            // [see how to use it]$this->Auth->deny(['controller' => 'event-coordinators', 'action' => 'eventCoordinatorPageAction']);
         }

         if($user_id == null){ //So that when dash board is not being displayed, these queries are not calculated.
             $this->loadModel('Events');
             $this->loadModel('Visitors');

             //calulate no of events with status = 0(launched)
             $online_count = $this->Events->calculateOnlineCount(); //The Admin has to change the status so that the event is not online
             $this->set('online_count', $online_count);
             //calulate no of events with status = 4(upcoming)
             $upcoming_count = $this->Events->calculateUpcomingCount();
             $this->set('upcoming_count', $upcoming_count);
             //calulate no of events in which user has registered.
             $participant_id = $this->Auth->user('id');
             $registered_count = $this->Visitors->calculateUserRegistrationsCount($participant_id);
             $this->set('registered_count', $registered_count);
             //See if there is any event today
             $d = new \DateTime('now');
             //d->diff(e) = e-d
             $current_count = $this->Events->currentOnlineEvents($d);
             $this->set('current_count', $current_count);

             //Calculating the Participation Percentage
             if($online_count != 0){
                 $number_of_user_participations = $this->Visitors->calculateUserRegistrationsCount($participant_id);
                 $participation_percentage = $number_of_user_participations / $online_count;
                 $participation_percentage *= 100;
                 $this->set('participation_percentage', $participation_percentage."%");
             } else{
                 $this->set('participation_percentage', "0%");
             }
             //Determining Top grossing event name and seats filled percentage
             if($online_count != 0){
                 $event = $this->Events->findTopGrossing($d); //Date passed to check if event is today..It should not be counted in top grossing,returns[top gross percentage, name]
                 $this->set('event_name', $event[1]);
                 $this->set('seats_filled_percentage', $event[0]."%");
             } else{
                 $this->set('event_name', "No Events Online");
                 $this->set('seats_filled_percentage', "0%");
             }

         } else {   // This is redundant code. But as it came out of flow I have not removed it.
             $this->set('online_count', 0);
             $this->set('upcoming_count', 0);
             $this->set('registered_count', 0);
             $this->set('current_count', 0);
             $this->set('participation_percentage', '0%');
             $this->set('event_name', "None");
             $this->set('seats_filled_percentage', "0%");
         }

        if($user_id){
         $this->loadModel('Events');
         $this->loadmodel('Visitors');
         $query = $this->Visitors->find()
         ->where(['user_id' => $user_id])
         ->contain(['Events']);
         $set_query = $this->paginate($query);
         $this->set(compact('set_query'));
         $this->set('_serialize', ['set_query']);
        }
     }

     public function adminSideNavDetails()       //Cuurently working for hover on the add admin names
     {
       $this->autoRender = false;
       $user_id = $this->request->data['id'];
       $user_info = $this->Users->find()->where(['id' => $user_id])->first();
       if($user_info){
         $data = '';
         $data .= '<li> Name:  '.$user_info->first_name.' '.$user_info->last_name.'</li>';
         if(($user_info->user_type_id) == 1){
         $data .= '<li> Type: Student</li>';
         }
         if(($user_info->user_type_id) == 2){
         $data .= '<li> Type: Faculty</li>';
         }
         $data .= '<li> Mobile Number:  '.$user_info->mobile_number.'</li>';
         $data .= '<li> Email ID:  '.$user_info->email.'</li>';
         $data .= '<li> Identity Number:  '.$user_info->identity_number.'</li>';
         echo $data;
       }

     }

     public function showPeerUser() //left to be made
     {
         $find_peers = $this->Users->findPeers($this->Auth->user('id'));
         debug($find_peers);
     }

     public function checkIdPresence()
     {
       $this->autoRender = false;
       $id_corpus = $this->request->data['identity_number'];
       $check = $this->Users->find()->where(['identity_number LIKE' => $id_corpus.'%'])->first();

      if($check){
         $response['background-color'] = 'red';//ruk
         $response['color'] = 'black';

     }else{

       $response['background-color'] = 'green';
       $response['color'] = 'white';

   }
   echo json_encode($response);
 }

}
