<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Revenues Controller
 *
 * @property \App\Model\Table\RevenuesTable $Revenues
 */
class RevenuesController extends AppController
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
        $revenues = $this->paginate($this->Revenues);

        $this->set(compact('revenues'));
        $this->set('_serialize', ['revenues']);
    }

    /**
     * View method
     *
     * @param string|null $id Revenue id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $revenue = $this->Revenues->get($id, [
            'contain' => ['Events']
        ]);

        $this->set('revenue', $revenue);
        $this->set('_serialize', ['revenue']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $revenue = $this->Revenues->newEntity();
        if ($this->request->is('post')) {
            $revenue = $this->Revenues->patchEntity($revenue, $this->request->data);
            if ($this->Revenues->save($revenue)) {
                $this->Flash->success(__('The revenue has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The revenue could not be saved. Please, try again.'));
            }
        }
        $events = $this->Revenues->Events->find('list', ['limit' => 200]);
        $this->set(compact('revenue', 'events'));
        $this->set('_serialize', ['revenue']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Revenue id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $revenue = $this->Revenues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $revenue = $this->Revenues->patchEntity($revenue, $this->request->data);
            if ($this->Revenues->save($revenue)) {
                $this->Flash->success(__('The revenue has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The revenue could not be saved. Please, try again.'));
            }
        }
        $events = $this->Revenues->Events->find('list', ['limit' => 200]);
        $this->set(compact('revenue', 'events'));
        $this->set('_serialize', ['revenue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Revenue id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $revenue = $this->Revenues->get($id);
        if ($this->Revenues->delete($revenue)) {
            $this->Flash->success(__('The revenue has been deleted.'));
        } else {
            $this->Flash->error(__('The revenue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
