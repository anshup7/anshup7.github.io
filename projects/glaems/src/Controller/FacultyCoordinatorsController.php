<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

/**
 * FacultyCoordinators Controller
 *
 * @property \App\Model\Table\FacultyCoordinatorsTable $FacultyCoordinators
 */
class FacultyCoordinatorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events']
        ];
        $facultyCoordinators = $this->paginate($this->FacultyCoordinators);

        $this->set(compact('facultyCoordinators'));
        $this->set('_serialize', ['facultyCoordinators']);
    }

    /**
     * View method
     *
     * @param string|null $id Faculty Coordinator id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $facultyCoordinator = $this->FacultyCoordinators->get($id, [
            'contain' => ['Events', 'FacultyCoordinators']
        ]);

        $this->set('facultyCoordinator', $facultyCoordinator);
        $this->set('_serialize', ['facultyCoordinator']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
     public function add()
     {
       $this->loadModel('Events');
       $this->loadModel('Users');
       $email = new Email('default');
       $email->from(['glaeventmanagementsystem@gmail.com' => 'GLAeMSAdmin']);
       $facultyCoordinator = $this->FacultyCoordinators->newEntity();
       if ($this->request->is('post')) { //use here the request is type variable to det the request is to update the student event coordinator or faculty event cooedinator
         $check_fc = $this->FacultyCoordinators->workinFcExists($this->request->data['event_id']);
         if($check_fc){
           $this->Flash->error("Faculty Coordinator Exists for this event");
           return $this->redirect($this->referer());
         }
         if($this->FacultyCoordinators->fcExists($this->request->data['user_id'])){
           $facultyCoordinator = $this->FacultyCoordinators->find()->where(['user_id' => $this->request->data['user_id']])->andWhere(['FacultyCoordinators.status' => 1])->first();
           debug($this->request->data['user_id']);


           $facultyCoordinator->status = 0; // Faculty Coordinator in Working
           $facultyCoordinator->event_id = $this->request->data['event_id'];
         } else {
           $facultyCoordinator = $this->FacultyCoordinators->patchEntity($facultyCoordinator, $this->request->data);
         }

         $update_user_query = $this->Users->get($this->request->data['user_id']);
         $update_user_query->user_status_code_id = 2;
         $email_addr = $update_user_query->email; // For sending Email.
         $event_name_query = $this->Events->find()->where(['id' => $this->request->data['event_id']])->first();
         $event_name = $event_name_query->event_name;
         if (($this->FacultyCoordinators->save($facultyCoordinator)) && ($this->Users->save($update_user_query))) {
             $email->to($email_addr)
             ->subject('New Event Assignment of : '.$event_name)
             ->send('Kindly take charge, and allocate your Event Coordinator for the smooth processing.');
           $this->Flash->success(__('The Faculty coordinator has been saved.'));

           return $this->redirect($this->referer());
         } else {
           $this->Flash->error(__('The faculty coordinator could not be saved. Please, try again.'));
         }
     }
       $events = $this->Events->find('list', ['limit' => 200])->where(['status' => 0]);//You got to make changes here.
       $users = $this->Users->find('list', ['limit' => 200])->where(['user_status_code_id' => 5])->andWhere(['user_type_id' => 2]);
       $users_check = $this->Users->find()->where(['user_status_code_id' => 5])->andWhere(['user_type_id' => 2])->count();
       if($users_check > 0){
          $this->set('empty', false);
       } else {
          $this->set('empty', true);
       }
       $this->set(compact('users', 'facultyCoordinator',  'events'));
       $this->set('_serialize', ['facultyCoordinator']);
     }

    /**
     * Edit method
     *
     * @param string|null $id Faculty Coordinator id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $facultyCoordinator = $this->FacultyCoordinators->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $facultyCoordinator = $this->FacultyCoordinators->patchEntity($facultyCoordinator, $this->request->data);
            if ($this->FacultyCoordinators->save($facultyCoordinator)) {
                $this->Flash->success(__('The faculty coordinator has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The faculty coordinator could not be saved. Please, try again.'));
            }
        }
        $events = $this->FacultyCoordinators->Events->find('list', ['limit' => 200]);
        $this->set(compact('facultyCoordinator', 'events'));
        $this->set('_serialize', ['facultyCoordinator']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Faculty Coordinator id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $facultyCoordinator = $this->FacultyCoordinators->get($id);
        if ($this->FacultyCoordinators->delete($facultyCoordinator)) {
            $this->Flash->success(__('The faculty coordinator has been deleted.'));
        } else {
            $this->Flash->error(__('The faculty coordinator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function facultyLandingPage()
      {
        $this->loadModel('Users');
        $this->loadModel('Events');
        $this->loadModel('Visitors');
        $this->loadModel('EventCoordinators');
        $this->loadModel('FacultyCoordinators');

        if($this->Users->checkCoordinatorStatus($this->Auth->user('id'))){
          $this->set('display_coordinator_page_link', true);
          $this->set('display_report_link', true);
          $this->set('display_addevc_link', true);
          $this->set('attendance_privileges', true);
          $this->set('display_regs_link', true);
        } else {
          $this->set('display_coordinator_page_link', false);
          $this->set('display_report_link', false);
          $this->set('display_addevc_link', false);
          $this->set('attendance_privileges', false);
          $this->set('display_regs_link', true);


        }

        //calulate no of events with status = 0(launched)
        $online_count = $this->Events->calculateOnlineCount(); //The Admin has to change the status so that the event is not online
        $this->set('online_count', $online_count);
        //calulate no of events with status = 4(upcoming)
        $upcoming_count = $this->Events->calculateUpcomingCount();
        $this->set('upcoming_count', $upcoming_count);
        //calulate no of registrations in the Faculty's event.
        $coordinator_id = $this->Auth->user('id');
        $registered_count = $this->Visitors->calculateRegistrationsCount($coordinator_id);
        $this->set('registered_count', $registered_count);
        //See if there is any event today
        $d = new \DateTime('now');
        //d->diff(e) = e-d
        $current_count = $this->Events->currentOnlineEvents($d);
        $this->set('current_count', $current_count);

        $evc_data = $this->EventCoordinators->findEvcOfFaculty($this->FacultyCoordinators->findFacultyEvent($coordinator_id));
        $this->set('evc_name', $evc_data);

        if($this->EventCoordinators->permitted($this->FacultyCoordinators->findFacultyEvent($coordinator_id))){
            $this->set('end_attendance', true);
        }

      }

  /*  public function returnFacultyEvents()   // Obsolete Code, Never used
    {
        $this->autoRender = false;
        $this->loadModel('Events');
        $this->loadModel('EventCoordinators');
        $user_id = $this->request->data['id'];
        $events_of_faculty =  $this->EventCoordinators->find()->where(['user_id' => $user_id])->contain(['Events']);
        $post_data = '';
        if($events_of_faculty){
            $post_data  = '<table cellpadding="0" cellspacing="0">';
            $post_data .= '<tr>';
            $post_data .= '<th scope="col">Event Name</th>';
            $post_data .= '<th scope="col">Date Of Commencement</th>';
            $post_data .= '<th scope="col">Seats Left</th></tr>';
            foreach($events_of_faculty as $display_events){
                $post_data .= '<tr>';
                $post_data .= '<td>'.$display_events->event->event_name.'</td>';
                $post_data .= '<td>'.$display_events->event->date_of_commencement.'</td>';
                $post_data .= '<td>'.$display_events->event->no_of_seats.'</td></tr>';
            }
            echo $post_data;
        } else {
            echo $user_id;
        }
    }*/

    public function setEvcField()
    {
      $this->autoRender = false;
      $set = $this->FacultyCoordinators->setEvc($this->Auth->user('id'), $this->request->data['radio_value']);
      if($set){
          echo "done";
      }
    }

}
