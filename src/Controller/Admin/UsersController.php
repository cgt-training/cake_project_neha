<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{
	 public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('dashboard_layout');
        $this->loadModel('Users');
    }

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);

    }

    public function login()
    {
        $this->viewBuilder()->layout('login_layout');

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) 
    	{
    	 	$user1 = $this->Auth->identify();
            if ($user1 && ($user1['role']=='admin' || $user1['role']=='subadmin')) {
                $this->Auth->setUser($user1);
                $this->request->session()->write('Auth.User.role','role');
                    return $this->redirect($this->Auth->redirectUrl());
            }
           
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        $this->set(compact('user'));
    }

    public function logout()
    {
        $session = $this->request->session();
        $session->destroy();
        return $this->redirect($this->Auth->logout());
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }
    public function edit($id = null)
    {
        $user = $this->Users->get($id, ['contain'=>[]]);
        if($this->request->is(['patch', 'post', 'put']))
        {
            $user = $this->Users->patchEntity($user, $this->request->getData());    
            $user->modified = date('Y-m-d H:m:s');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The users has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
    }
}
?>