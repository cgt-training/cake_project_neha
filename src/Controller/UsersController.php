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
        if($this->request->session()->read('Auth.User'))
            return $this->redirect(['controller'=>'Articles','action' =>'index']);
        else
            return $this->redirect(['action' => 'login']);
        // $users = $this->paginate($this->Users);
        // if($this->Cookie->check('User.username') && $this->Cookie->check('User.password'))
        // {
        //     $cookie_data['username'] = $this->Cookie->read('User.username');
        //     $cookie_data['password'] = $this->Cookie->read('User.password');
        // }
        // $this->set(compact('users','cookie_data'));
        // $this->set('_serialize', ['users']);
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
                $this->Auth->setUser($user);
                $this->request->session()->write('Auth.User.role',$user['role']);
                if(isset($this->request->data['RememberMe']) && $this->request->data['RememberMe']=='1')
                {
                    $username = $this->request->data['username'];
                    $password = $this->request->data['password'];
                    $this->Cookie->configKey('User','path','/');
                    $this->Cookie->configKey('User',
                                        [
                                            'expires'=>'+10 days',
                                            'httpOnly'=>true
                                        ]);

                    $this->Cookie->write('User',['username'=>$username,'password'=>$password]);
                    $this->Auth->setUser($user);
                }
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
        $this->Cookie->delete('User');
        return $this->redirect($this->Auth->logout());
    }

    // Register User
    public function register()
    {
        $user = $this->Users->newEntity();
        if($this->request->is('post'))
        {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role = 'guest';
            if($this->Users->save($user))
            {
                $this->request->session()->write('Auth.User.role','role');
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['controller'=>'Articles','action'=>'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize',['user']);
    }
    // Add User
  /*  public function add()
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
    */
    
}
