<?php
namespace App\Controller;
require_once(ROOT . DS . 'vendor' . DS . 'pdf' . DS . 'fpdf' . DS . 'pdf.php');
require_once(ROOT . DS . 'vendor' . DS . 'pdf' . DS . 'fpdf' . DS . 'fpdf.php');

use App\Controller\AppController;
use Cake\I18n\Date;

/**
 * EventFiles Controller
 *
 * @property \App\Model\Table\EventFilesTable $EventFiles
 */
//Class that extends FPDF class for my requirement


class EventFilesController extends AppController
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
        $eventFiles = $this->paginate($this->EventFiles);

        $this->set(compact('eventFiles'));
        $this->set('_serialize', ['eventFiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Event File id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventFile = $this->EventFiles->get($id, [
            'contain' => ['Events']
        ]);

        $this->set('eventFile', $eventFile);
        $this->set('_serialize', ['eventFile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventFile = $this->EventFiles->newEntity();
        if ($this->request->is('post')) {
            $eventFile = $this->EventFiles->patchEntity($eventFile, $this->request->data);
            if ($this->EventFiles->save($eventFile)) {
                $this->Flash->success(__('The event file has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event file could not be saved. Please, try again.'));
            }
        }
        $events = $this->EventFiles->Events->find('list', ['limit' => 200]);
        $this->set(compact('eventFile', 'events'));
        $this->set('_serialize', ['eventFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Event File id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventFile = $this->EventFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventFile = $this->EventFiles->patchEntity($eventFile, $this->request->data);
            if ($this->EventFiles->save($eventFile)) {
                $this->Flash->success(__('The event file has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event file could not be saved. Please, try again.'));
            }
        }
        $events = $this->EventFiles->Events->find('list', ['limit' => 200]);
        $this->set(compact('eventFile', 'events'));
        $this->set('_serialize', ['eventFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Event File id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventFile = $this->EventFiles->get($id);
        if ($this->EventFiles->delete($eventFile)) {
            $this->Flash->success(__('The event file has been deleted.'));
        } else {
            $this->Flash->error(__('The event file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function report($faculty_id = null)
    {
        $this->loadModel('Events');
        $this->loadModel('FacultyCoordinators');
        $this->loadModel('EventCoordinators');
        $this->loadModel('Visitors');
        $this->loadModel('Qrcodes');
        $this->autoRender = false;

        $event_for_file_id = $this->FacultyCoordinators->findFacultyEvent($faculty_id);
        if($event_for_file_id != "N/A"){
            $check = $this->EventFiles->find()->where(['event_id' => $event_for_file_id])->first();
            if(empty($check)){
                $file_tuple = $this->EventFiles->newEntity();
                $file_tuple->event_id = $event_for_file_id;
                $proceed = $this->EventFiles->save($file_tuple);
            } else{
                $proceed = true;
            }
        }
        if($proceed){
            $this->response->type('pdf');
            $date = new Date('now');
            $pdf = new \FPDF();
            $myClass = new \Pdf();   // This is the class which extends the FPDF class for performing Overridding
            $pdf->SetDrawColor(197, 231, 23);
            if($this->FacultyCoordinators->isCoordinator($faculty_id)){
                $pdf->SetMargins(15,15,15);
                $pdf->AddPage();
                $pdf->AliasNbPages();
                $pdf->SetAutoPageBreak(true, 2);
                $event = $this->Events->getEventNameId($faculty_id);
                $event_name = $event[0];
                $event_id = $event[1];
                $poster_details = $this->Events->fetchPoster($event_id);
                $poster_name = $poster_details[0];
                $poster_dir = $poster_details[1];
                $myClass->Header($pdf, $event_name);
                $myClass->Footer($pdf, $date->format('d-m-y'));
                $event_date = new Date($this->Events->dateHeld($event_id));
                $myClass->printNames($pdf, $this->FacultyCoordinators->facultyName($faculty_id), $this->EventCoordinators->name($event_id), $event_date->format('d/m/y'), $this->Events->noOfSeats($event_id));
                $myClass->printRegistered($pdf, $this->Visitors->loadRegisterations($event_id)[0], $this->Visitors->loadRegisterations($event_id)[1]);
                $myClass->printAttendees($pdf, $this->Qrcodes->loadAttendees($event_id)[0], $this->Qrcodes->loadAttendees($event_id)[1]);
                $myClass->printPoster($pdf, $poster_name, $poster_dir, $date->format('d-m-y'));
                $pdf->Output();

            } else{   // If the faculty is not associated with any event.
                $pdf->AddPage();
                $pdf->AliasNbPages();
                $pdf->SetAutoPageBreak(true, 2);
                $myClass->Header($pdf, "N/A");
                $myClass->Footer($pdf, $date->format('d-m-y'));
                $pdf->Output();
            }
        } else {
            $this->Flash->error("Some Error Occurred");
            $this->redirect($this->referer());
        }

    }

}
