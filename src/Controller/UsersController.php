<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function index()
    {
        $users = $this->paginate($this->Users);
        if($this->Cookie->check('User.name') && $this->Cookie->check('User.password'))
        {
            $cookie_data['username'] = $this->Cookie->read('User.name');
            $cookie_data['password'] = $this->Cookie->read('User.password');
        }
        $this->set(compact('users','cookie_data'));
        $this->set('_serialize', ['users']);
        //print_r($this->request->session()->read());
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        //$this->Auth->allow(['add', 'logout']);
    }

    
    // Login User
    public function login()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) 
            {
                $username = $this->request->data['username'];
                $password = $this->request->data['password'];
                $this->Auth->setUser($user);
                $this->request->session()->write('Auth.User.role','role');
                $this->Cookie->write('User',['name'=>$username,'password'=>$password]);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        $this->set(compact('user'));
    }
    // Logout User
    public function logout()
    {
        $session = $this->request->session();
        $session->destroy();
        return $this->redirect($this->Auth->logout());
    }

/**
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    // view user
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /*
        @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // Add User
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // Edit User
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // Delete User
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
