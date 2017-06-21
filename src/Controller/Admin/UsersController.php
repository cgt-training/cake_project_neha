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

    public function login()
    {
        $this->viewBuilder()->layout('login_layout');

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) 
    	{
    	 	$user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
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
}
?>