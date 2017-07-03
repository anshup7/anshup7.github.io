<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersTypesCodes Controller
 *
 * @property \App\Model\Table\UsersTypesCodesTable $UsersTypesCodes
 */
class UsersTypesCodesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $usersTypesCodes = $this->paginate($this->UsersTypesCodes);

        $this->set(compact('usersTypesCodes'));
        $this->set('_serialize', ['usersTypesCodes']);
    }

    /**
     * View method
     *
     * @param string|null $id Users Types Code id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersTypesCode = $this->UsersTypesCodes->get($id, [
            'contain' => []
        ]);

        $this->set('usersTypesCode', $usersTypesCode);
        $this->set('_serialize', ['usersTypesCode']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersTypesCode = $this->UsersTypesCodes->newEntity();
        if ($this->request->is('post')) {
            $usersTypesCode = $this->UsersTypesCodes->patchEntity($usersTypesCode, $this->request->data);
            if ($this->UsersTypesCodes->save($usersTypesCode)) {
                $this->Flash->success(__('The users types code has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The users types code could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('usersTypesCode'));
        $this->set('_serialize', ['usersTypesCode']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Types Code id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersTypesCode = $this->UsersTypesCodes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersTypesCode = $this->UsersTypesCodes->patchEntity($usersTypesCode, $this->request->data);
            if ($this->UsersTypesCodes->save($usersTypesCode)) {
                $this->Flash->success(__('The users types code has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The users types code could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('usersTypesCode'));
        $this->set('_serialize', ['usersTypesCode']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Types Code id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersTypesCode = $this->UsersTypesCodes->get($id);
        if ($this->UsersTypesCodes->delete($usersTypesCode)) {
            $this->Flash->success(__('The users types code has been deleted.'));
        } else {
            $this->Flash->error(__('The users types code could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
