<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Visitors Controller
 *
 * @property \App\Model\Table\VisitorsTable $Visitors
 */
class VisitorsController extends AppController
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
        $visitors = $this->paginate($this->Visitors);

        $this->set(compact('visitors'));
        $this->set('_serialize', ['visitors']);
    }

    /**
     * View method
     *
     * @param string|null $id Visitor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitor = $this->Visitors->get($id, [
            'contain' => ['Events', 'Users']
        ]);

        $this->set('visitor', $visitor);
        $this->set('_serialize', ['visitor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitor = $this->Visitors->newEntity();
        if ($this->request->is('post')) {
            $visitor = $this->Visitors->patchEntity($visitor, $this->request->data);
            if ($this->Visitors->save($visitor)) {
                $this->Flash->success(__('The visitor has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visitor could not be saved. Please, try again.'));
            }
        }
        $events = $this->Visitors->Events->find('list', ['limit' => 200]);
        $users = $this->Visitors->Users->find('list', ['limit' => 200]);
        $this->set(compact('visitor', 'events', 'users'));
        $this->set('_serialize', ['visitor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visitor id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitor = $this->Visitors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitor = $this->Visitors->patchEntity($visitor, $this->request->data);
            if ($this->Visitors->save($visitor)) {
                $this->Flash->success(__('The visitor has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visitor could not be saved. Please, try again.'));
            }
        }
        $events = $this->Visitors->Events->find('list', ['limit' => 200]);
        $users = $this->Visitors->Users->find('list', ['limit' => 200]);
        $this->set(compact('visitor', 'events', 'users'));
        $this->set('_serialize', ['visitor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visitor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitor = $this->Visitors->get($id);
        if ($this->Visitors->delete($visitor)) {
            $this->Flash->success(__('The visitor has been deleted.'));
        } else {
            $this->Flash->error(__('The visitor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
