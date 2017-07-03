<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;
use Cake\Utility\Text;
use Cake\Mailer\Email;
/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 */
class EventsController extends AppController
{


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $events = $this->paginate($this->Events);

        $this->set(compact('events'));
        $this->set('_serialize', ['events']);
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Costs', 'EventCoordinators', 'EventFiles', 'FacultyCoordinators', 'Qrcodes', 'Revenues']
        ]);

        $this->set('event', $event);
        $this->set('_serialize', ['event']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('event'));
        $this->set('_serialize', ['event']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Event id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('event'));
        $this->set('_serialize', ['event']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('The event has been deleted.'));
        } else {
            $this->Flash->error(__('The event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function registerEvent()
    {
      $this->loadModel('Visitors');
      $this->loadModel('Users');
      $q_p = $this->Visitors->find()->select(["event_id"])->where(['user_id' => $this->Auth->user('id')]); //you can also show that the user has registered and event has passed, or make another link and show the events in which the user registered and attended, and user registered and not attended.
      if($this->Users->checkCoordinatorStatus($this->Auth->user('id'))){
        $this->set('display_coordinator_link', true);
      } else {
         $this->set('display_coordinator_link', false);
         // [see how to use it]$this->Auth->deny(['controller' => 'event-coordinators', 'action' => 'eventCoordinatorPageAction']);
      }
      $query_participation = array();
      foreach($q_p as $q) {
          $query_participation[] = $q->event_id;
      }

       $query_events = $this->Events->find()->where(['status' => 0])->andWhere(['no_of_seats > ' => 0]); // this query should fetch only those events in which the user is not registered.
      if(empty($query_events)){
          $this->Flash->error("No Events To show");
          return $this->redirect($this->referer());
        } else{
          $load_to_register = $this->paginate($query_events);
          $this->set(compact('load_to_register'));
          $this->set('_serialize', ['load_to_register']);

          $this->set('query_participation', $query_participation); //To simply check whether the user has participated or not in the view.
          $this->set('events', $query_events);
      }

    }

    public function register($registering_user_id = null, $registering_user_event_id = null){
        $this->autoRender = false;
        $this->loadModel('Visitors');
        if($registering_user_id){
            $check_in_event = $this->Events->find()->where(['id' => $registering_user_event_id])->first();
            $date_reg = $check_in_event->date_of_registration;
            $date_comm = $check_in_event->date_of_commencement;
            $seats = $check_in_event->no_of_seats;
            $date1 = new \DateTime($date_comm);
            $date2 = new \DateTime('now');
            $days = $date2->diff($date1);
            if($days->invert != 1){  //Alternatively the event may be made offline by hte admin if the authorities want to inhibit registrations on the day of event itself.
                if($seats > 0){
                    $add_visitor = $this->Visitors->newEntity();
                    $add_visitor->user_id = $registering_user_id;
                    $add_visitor->event_id = $registering_user_event_id;
                    $add_visitor->status = 0;
                    $check_in_event->no_of_seats -= 1; //Update the number of seats available
                    if(($this->Visitors->save($add_visitor)) && ($this->Events->save($check_in_event))){
                        $this->Flash->success("You are Registered in ".strtoupper($check_in_event->event_name));
                         return $this->redirect($this->referer());
                    }

                } else{
                    $this->Flash->error("Seats are full for ".strtoupper($check_in_event->event_name));
                     return $this->redirect($this->referer());
                }
            } else {
                $this->Flash->error("Sorry Registrations are closed");
                return $this->redirect($this->referer());
            }
        }
     }

     public function cancelRegistration($canceling_user_id = null, $canceling_event_id = null)
     {
       $this->autoRender = false;
       $this->loadModel('Visitors');
       $this->loadModel('Qrcodes');
       $event_in_db = $this->Events->find()->where(['id' => $canceling_event_id])->first();
       $event_in_db->no_of_seats += 1;
       $delete_visitor = $this->Visitors->find()->where(['user_id' => $canceling_user_id])
                                                  ->andWhere(['event_id' => $canceling_event_id])
                                                  ->first();
       $delete_qr =  $this->Qrcodes->find()->where(['event_id' => $canceling_event_id])
                                                  ->andWhere(['user_id' => $canceling_user_id])
                                                  ->first();
      if($delete_qr){
       if(($this->Visitors->delete($delete_visitor)) && ($this->Events->save($event_in_db)) && ($this->Qrcodes->delete($delete_qr))){
         $this->Flash->success('Your Registration has been cancelled');
         return $this->redirect($this->referer());
       }
   } else{
       if(($this->Visitors->delete($delete_visitor)) && ($this->Events->save($event_in_db))){
         $this->Flash->success('Your Registration has been cancelled');
         return $this->redirect($this->referer());
       }
   }

     }

     public function generateQrCode($for_event = null){
         //file_get_contents('https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='.$this->Auth->user('id').''.$for_event);
       $qr_Data = Text::truncate(Text::uuid(), 5, ['ellipsis' => '']);
       $this->loadModel('Qrcodes');
       $this->loadModel('Users');
       $check_if_already_generated = $this->Qrcodes->find()->where(['event_id' => $for_event])
                                                           ->andWhere(['user_id' => $this->Auth->user('id')])->first();
       if($check_if_already_generated){
           $this->Flash->error("You have generated the OTP with us for this event");
           return $this->redirect($this->referer());
       }
       //$file = new File(WWW_ROOT.'img/qrcodes/example.png', true);
       //$file->write($qr_Data);
       $add_qr = $this->Qrcodes->newEntity();
       $add_qr->event_id = $for_event;
       $add_qr->user_id = $this->Auth->user('id');
       $add_qr->code_value = $qr_Data;
       if($this->Qrcodes->save($add_qr)){
           $event = $this->Events->find()->where(['id' => $for_event])->andWhere(['status' => 0])->first();
           $e_name = $event->event_name;
           $email_addr_find = $this->Users->find()->where(['id' => $this->Auth->user('id')])->first();
           $email_addr = $email_addr_find->email;
           $email = new Email('default');
           $email->from(['glaeventmanagementsystem@gmail.com' => 'GLAeMSAdmin'])
           ->to($email_addr)
           ->subject('Your OTP for event : '.$e_name.' |'.$qr_Data)
           ->send('This OTP is your hall ticket. Please save it and produce it on the day of event. ');

           $this->Flash->error("Your OTP for the Event has been sent to you.");
           $this->redirect($this->referer());
       }
     }

     public function eventAttendee()
     {
       $this->loadModel('Users');
       $this->loadModel('Qrcodes');
       $this->loadModel('FacultyCoordinators');
       $which_faculty = $this->Auth->user('id');
       $faculty_event = $this->FacultyCoordinators->find()->where(['user_id' => $which_faculty])->contain(['Events'])->first(); //There can be only one coordinator associated with an event
       //controlling links
       if($this->Users->checkCoordinatorStatus($which_faculty)){
             $this->set('display_coordinator_page_link', true);
             $this->set('display_report_link', true);
             $this->set('display_addevc_link', true);
             $this->set('display_regs_link', true);
           } else {
             $this->set('display_coordinator_page_link', false);
             $this->set('display_report_link', false);
             $this->set('display_addevc_link', false);
             $this->set('display_regs_link', true);

           }

       if($faculty_event){
         $visitors = $this->Qrcodes->find()->where(['event_id' => $faculty_event->event->id])->andWhere(['status' => 1])->contain(['Users']);
         $this->set('visitors', $visitors);
         $this->set('faculty_event', $faculty_event);
       }

       else{
         $this->Flash->error("You are not associated with any event");
         $this->redirect($this->referer());
       }

     }

     public function eventVisitors()
     {
       $this->loadModel('Users');
       $this->loadModel('Visitors');
       $this->loadModel('FacultyCoordinators');
       $this->loadModel('Qrcodes');
       $which_faculty = $this->Auth->user('id');
       $faculty_event = $this->FacultyCoordinators->find()->where(['user_id' => $which_faculty])->andWhere(['FacultyCoordinators.status' => 0])->contain(['Events'])->first();
       //controlling links
       if($this->Users->checkCoordinatorStatus($which_faculty)){
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
           //Note that after writing the above code, below code may become redundant, try to remove it later.
       if($faculty_event){
           $registrations = $this->Visitors->find()->where(['event_id' => $faculty_event->event->id])->contain(['Users']);
           $this->set('registrations', $registrations);
           $this->set('faculty_event', $faculty_event);
       }

       else{
         $this->Flash->error("You Are not Associated with any event");
         $this->redirect($this->referer());
       }
     }

      public function close($event_id = null)
      {
          $this->autoRender = false;
          $this->loadModel('EventFiles');
          $this->loadModel('FacultyCoordinators');
          $check_in_event = $this->Events->find()->where(['id' => $event_id])->first();
          $date_comm = $check_in_event->date_of_commencement;
          $date1 = new \DateTime($date_comm);
          $date2 = new \DateTime('now');
          $days = $date2->diff($date1);
          debug($days);
         if($days->invert == 1)
          {
             if($this->EventFiles->exitsFileCopy($event_id)){
              $check_in_event->status = 3; //Completed
              if($this->Events->save($check_in_event)){
                  $this->Flash->success("Event Successfully Closed");
                  return $this->redirect($this->Referer());
              }
          } else{
              $faculty = $this->FacultyCoordinators->findFaculty($event_id);
              $this->Flash->error("Event File Not Generated, Contact : ".$faculty.".");
              $this->redirect($this->Referer());
          }
          } else {
              $this->Flash->error("This Event has not commenced Yet");
              $this->redirect($this->Referer());

          }

      }
}
