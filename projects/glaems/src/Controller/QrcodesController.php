<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Qrcodes Controller
 *
 * @property \App\Model\Table\QrcodesTable $Qrcodes
 */
class QrcodesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events', 'Users']
        ];
        $qrcodes = $this->paginate($this->Qrcodes);

        $this->set(compact('qrcodes'));
        $this->set('_serialize', ['qrcodes']);
    }

    /**
     * View method
     *
     * @param string|null $id Qrcode id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $qrcode = $this->Qrcodes->get($id, [
            'contain' => ['Events', 'Users']
        ]);

        $this->set('qrcode', $qrcode);
        $this->set('_serialize', ['qrcode']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $qrcode = $this->Qrcodes->newEntity();
        if ($this->request->is('post')) {
            $qrcode = $this->Qrcodes->patchEntity($qrcode, $this->request->data);
            if ($this->Qrcodes->save($qrcode)) {
                $this->Flash->success(__('The qrcode has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The qrcode could not be saved. Please, try again.'));
            }
        }
        $events = $this->Qrcodes->Events->find('list', ['limit' => 200]);
        $users = $this->Qrcodes->Users->find('list', ['limit' => 200]);
        $this->set(compact('qrcode', 'events', 'users'));
        $this->set('_serialize', ['qrcode']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Qrcode id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $qrcode = $this->Qrcodes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $qrcode = $this->Qrcodes->patchEntity($qrcode, $this->request->data);
            if ($this->Qrcodes->save($qrcode)) {
                $this->Flash->success(__('The qrcode has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The qrcode could not be saved. Please, try again.'));
            }
        }
        $events = $this->Qrcodes->Events->find('list', ['limit' => 200]);
        $users = $this->Qrcodes->Users->find('list', ['limit' => 200]);
        $this->set(compact('qrcode', 'events', 'users'));
        $this->set('_serialize', ['qrcode']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Qrcode id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $qrcode = $this->Qrcodes->get($id);
        if ($this->Qrcodes->delete($qrcode)) {
            $this->Flash->success(__('The qrcode has been deleted.'));
        } else {
            $this->Flash->error(__('The qrcode could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
