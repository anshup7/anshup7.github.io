<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersStatusCodes Controller
 *
 * @property \App\Model\Table\UsersStatusCodesTable $UsersStatusCodes
 */
class UsersStatusCodesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $usersStatusCodes = $this->paginate($this->UsersStatusCodes);

        $this->set(compact('usersStatusCodes'));
        $this->set('_serialize', ['usersStatusCodes']);
    }

    /**
     * View method
     *
     * @param string|null $id Users Status Code id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersStatusCode = $this->UsersStatusCodes->get($id, [
            'contain' => []
        ]);

        $this->set('usersStatusCode', $usersStatusCode);
        $this->set('_serialize', ['usersStatusCode']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersStatusCode = $this->UsersStatusCodes->newEntity();
        if ($this->request->is('post')) {
            $usersStatusCode = $this->UsersStatusCodes->patchEntity($usersStatusCode, $this->request->data);
            if ($this->UsersStatusCodes->save($usersStatusCode)) {
                $this->Flash->success(__('The users status code has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The users status code could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('usersStatusCode'));
        $this->set('_serialize', ['usersStatusCode']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Status Code id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersStatusCode = $this->UsersStatusCodes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersStatusCode = $this->UsersStatusCodes->patchEntity($usersStatusCode, $this->request->data);
            if ($this->UsersStatusCodes->save($usersStatusCode)) {
                $this->Flash->success(__('The users status code has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The users status code could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('usersStatusCode'));
        $this->set('_serialize', ['usersStatusCode']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Status Code id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersStatusCode = $this->UsersStatusCodes->get($id);
        if ($this->UsersStatusCodes->delete($usersStatusCode)) {
            $this->Flash->success(__('The users status code has been deleted.'));
        } else {
            $this->Flash->error(__('The users status code could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
