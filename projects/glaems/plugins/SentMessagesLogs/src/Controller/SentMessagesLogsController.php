<?php
namespace SentMessagesLogs\Controller;

use SentMessagesLogs\Controller\AppController;

/**
 * SentMessagesLogs Controller
 *
 * @property \SentMessagesLogs\Model\Table\SentMessagesLogsTable $SentMessagesLogs
 */
class SentMessagesLogsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $sentMessagesLogs = $this->paginate($this->SentMessagesLogs);

        $this->set(compact('sentMessagesLogs'));
        $this->set('_serialize', ['sentMessagesLogs']);
    }

    /**
     * View method
     *
     * @param string|null $id Sent Messages Log id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sentMessagesLog = $this->SentMessagesLogs->get($id, [
            'contain' => []
        ]);

        $this->set('sentMessagesLog', $sentMessagesLog);
        $this->set('_serialize', ['sentMessagesLog']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sentMessagesLog = $this->SentMessagesLogs->newEntity();
        if ($this->request->is('post')) {
            $sentMessagesLog = $this->SentMessagesLogs->patchEntity($sentMessagesLog, $this->request->data);
            if ($this->SentMessagesLogs->save($sentMessagesLog)) {
                $this->Flash->success(__('The sent messages log has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sent messages log could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('sentMessagesLog'));
        $this->set('_serialize', ['sentMessagesLog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sent Messages Log id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sentMessagesLog = $this->SentMessagesLogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sentMessagesLog = $this->SentMessagesLogs->patchEntity($sentMessagesLog, $this->request->data);
            if ($this->SentMessagesLogs->save($sentMessagesLog)) {
                $this->Flash->success(__('The sent messages log has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sent messages log could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('sentMessagesLog'));
        $this->set('_serialize', ['sentMessagesLog']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sent Messages Log id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sentMessagesLog = $this->SentMessagesLogs->get($id);
        if ($this->SentMessagesLogs->delete($sentMessagesLog)) {
            $this->Flash->success(__('The sent messages log has been deleted.'));
        } else {
            $this->Flash->error(__('The sent messages log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
