<?php
namespace App\Controller;
use App\Controller\AppController;

/**
 * EventCoordinators Controller
 *
 * @property \App\Model\Table\EventCoordinatorsTable $EventCoordinators
 */
class EventCoordinatorsController extends AppController
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
        $eventCoordinators = $this->paginate($this->EventCoordinators);

        $this->set(compact('eventCoordinators'));
        $this->set('_serialize', ['eventCoordinators']);
    }

    /**
     * View method
     *
     * @param string|null $id Event Coordinator id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventCoordinator = $this->EventCoordinators->get($id, [
            'contain' => ['Events', 'EventCoordinators']
        ]);

        $this->set('eventCoordinator', $eventCoordinator);
        $this->set('_serialize', ['eventCoordinator']);
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
        $eventCoordinator = $this->EventCoordinators->newEntity();

        //Controlling Links
        if($this->Users->checkCoordinatorStatus($this->Auth->user('id'))){
              $this->set('display_coordinator_page_link', true);
              $this->set('display_report_link', true);
              $this->set('display_addevc_link', true);
              $this->set('display_regs_link', true);
            } else {
              $this->set('display_coordinator_page_link', false);
              $this->set('display_report_link', false);
              $this->set('display_addevc_link', false);
              $this->set('display_regs_link', false);
            }

        if ($this->request->is('post')) { //use here the request is type variable to det the request is to update the student event coordinator or faculty event cooedinator

              $check_evc = $this->EventCoordinators->workinEvcExists($this->request->data['event_id']);
                if($check_evc){
                  $this->Flash->error("Event Coordinator Exists for this event");
                  return $this->redirect($this->referer());
                }
            if($this->EventCoordinators->evcExits($this->request->data['user_id'])){
                $eventCoordinator = $this->EventCoordinators->find()->where(['user_id' => $this->request->data['user_id']])->first();
                $eventCoordinator->working_status = 0; // Event Coordinator in Working
                $eventCoordinator->event_id = $this->request->data['event_id'];
            } else {
                $eventCoordinator = $this->EventCoordinators->patchEntity($eventCoordinator, $this->request->data);
            }
            $update_user_query = $this->Users->get($this->request->data['user_id']);
            //debug($update_user_query);
            $update_user_query->user_status_code_id = 2;
            if (($this->EventCoordinators->save($eventCoordinator)) && ($this->Users->save($update_user_query))) {
                $this->Flash->success(__('The event coordinator has been saved.'));

             return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('The event coordinator could not be saved. Please, try again.'));
            }
        }
        $events = $this->Events->find('list', ['limit' => 200])->where(['status' => 0]);//You got to make changes here.
        $users = $this->Users->find('list', ['limit' => 200])->where(['user_status_code_id' => 5])->andWhere(['user_type_id' => 1]);
        $users_check = $this->Users->find()->where(['user_status_code_id' => 5])->andWhere(['user_type_id' => 1])->count();
        if($users_check > 0){
           $this->set('empty', false);
        } else {
           $this->set('empty', true);
        }
        $this->set(compact('users', 'eventCoordinator',  'events'));
        $this->set('_serialize', ['eventCoordinator']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Event Coordinator id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventCoordinator = $this->EventCoordinators->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventCoordinator = $this->EventCoordinators->patchEntity($eventCoordinator, $this->request->data);
            if ($this->EventCoordinators->save($eventCoordinator)) {
                $this->Flash->success(__('The event coordinator has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event coordinator could not be saved. Please, try again.'));
            }
        }
        $events = $this->EventCoordinators->Events->find('list', ['limit' => 200]);
        $this->set(compact('eventCoordinator', 'events'));
        $this->set('_serialize', ['eventCoordinator']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Event Coordinator id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventCoordinator = $this->EventCoordinators->get($id);
        if ($this->EventCoordinators->delete($eventCoordinator)) {
            $this->Flash->success(__('The event coordinator has been deleted.'));
        } else {
            $this->Flash->error(__('The event coordinator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function listUsers()
    {   // This function perhaps has become deprecated, check before deleting.
        $this->loadModel('Users');
        $find_users = $this->Users->find()->where(['user_status_code_id' => 5])
                                          ->andWhere(['user_type_id' => 1]);
        $display_users = $this->paginate($find_users);

        $this->set(compact('display_users'));
        $this->set('_serialize', ['display_users']);
    }

    public function eventCoordinatorPageAction()
    {
      $this->loadModel('Events');
      $this->loadModel('Visitors');

      //calulate no of events with status = 0(launched)
      $online_count = $this->Events->calculateOnlineCount(); //The Admin has to change the status so that the event is not online
      $this->set('online_count', $online_count);
      //calulate no of events with status = 4(upcoming)
      $upcoming_count = $this->Events->calculateUpcomingCount();
      $this->set('upcoming_count', $upcoming_count);
      //calulate no of registrations in the coordinator's event.
      $coordinator_id = $this->Auth->user('id');
      $registered_count = $this->Visitors->calculateCoordinatorRegistrationsCount($coordinator_id);
      $this->set('registered_count', $registered_count);
      //See if there is any event today
      $d = new \DateTime('now');
      //d->diff(e) = e-d
      $current_count = $this->Events->currentOnlineEvents($d);
      $this->set('current_count', $current_count);
      $permission_status = $this->EventCoordinators->checkPermission($this->Auth->user('id'));
      $this->set('is_permitted', $permission_status);


    }

    public function takeAttendance()
    {
        $get_permission = $this->EventCoordinators->checkPermission($this->Auth->user('id'));
        if($get_permission){
            $this->set('is_permitted', true);
        } else {
            $this->set('is_permitted', false);
        }
    }

    public function submitAttendance()
    {
        $this->loadModel('Qrcodes');
        $this->loadModel('Users');
        $this->loadModel('Events');
        $this->autoRender = false;

        $code_value = $this->request->data['code_value'];



        $found_data = $this->Qrcodes->find()->where(['code_value' => $code_value])->contain(['Users', 'Events'])->first();
        $event_coordinator_check_event = $found_data->event_id;
        $check = $this->EventCoordinators->workinEvcExists($event_coordinator_check_event);
        if($check){
            if($found_data->status == 1) {
                echo false;
            } else {

                //Update the qrcode to be used by setting the status to be 1, by default it is 0.
                //Note that for the Qrcodes u do not need to fetch data as u do for the contain tables.

                $found_data->status = 1;

                $post_data  = '<table cellpadding="0" cellspacing="0" style = "background-color : black;">';
                $post_data .= '<tr>';
                $post_data .= '<th scope="col">Name</th>';
                $post_data .= '<th scope="col">Type</th>';
                $post_data .= '<th scope="col">Event Name</th>';
                $post_data .= '<th scope="col">Status</th> </tr>';
                $post_data .= '<tr>';
                $post_data .= '<td>'.$found_data->user->first_name.' '.$found_data->user->last_name.'</td>';
                if($found_data->user->user_type_id == 1) {
                    $post_data .= '<td>Student</td>';
                }

                if($found_data->user->user_type_id == 2) {
                    $post_data .= '<td>Faculty</td>';
                }
                $post_data .= '<td>'.$found_data->event->event_name.'</td>';

                if($this->Qrcodes->save($found_data)) {
                    $post_data .= '<th style = "background-color:green; color:white; font-face:verdana;">Permitted</th></tr></table>';
                } else {
                    $post_data .= '<th style = "background-color:red; color:white; font-face:verdana;">Error!</th></tr></table>';
                }
                echo $post_data;

            }

        } else {
            echo false;
        }
  }
}
