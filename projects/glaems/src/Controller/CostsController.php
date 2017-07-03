<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Costs Controller
 *
 * @property \App\Model\Table\CostsTable $Costs
 */
class CostsController extends AppController
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
        $costs = $this->paginate($this->Costs);

        $this->set(compact('costs'));
        $this->set('_serialize', ['costs']);
    }

    /**
     * View method
     *
     * @param string|null $id Cost id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cost = $this->Costs->get($id, [
            'contain' => ['Events']
        ]);

        $this->set('cost', $cost);
        $this->set('_serialize', ['cost']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cost = $this->Costs->newEntity();
        if ($this->request->is('post')) {
            $cost = $this->Costs->patchEntity($cost, $this->request->data);
            if ($this->Costs->save($cost)) {
                $this->Flash->success(__('The cost has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cost could not be saved. Please, try again.'));
            }
        }
        $events = $this->Costs->Events->find('list', ['limit' => 200]);
        $this->set(compact('cost', 'events'));
        $this->set('_serialize', ['cost']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cost id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cost = $this->Costs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cost = $this->Costs->patchEntity($cost, $this->request->data);
            if ($this->Costs->save($cost)) {
                $this->Flash->success(__('The cost has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cost could not be saved. Please, try again.'));
            }
        }
        $events = $this->Costs->Events->find('list', ['limit' => 200]);
        $this->set(compact('cost', 'events'));
        $this->set('_serialize', ['cost']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cost id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cost = $this->Costs->get($id);
        if ($this->Costs->delete($cost)) {
            $this->Flash->success(__('The cost has been deleted.'));
        } else {
            $this->Flash->error(__('The cost could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
