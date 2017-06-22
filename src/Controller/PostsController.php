<?php
namespace App\Controller;
use Cake\Core\Configure;

class PostsController extends AppController
{

    public function initialize()
    {

        parent::initialize();
        $this->loadModel('Comments');
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
    	$posts = $this->paginate($this->Posts);
    	//$posts = $this->Posts->find('all');
        $this->set(compact('posts'));
    }

    public function view($id = null)
    {
        $posts = $this->Posts->get($id, [
            'contain' => []
        ]);

        $this->set('post', $posts);
        $this->set('_serialize', ['post']);
    }

    /*--------------add Post--------------*/
    public function add()
    {

        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
        	//print_r($this->request->data);exit();
            $post = $this->Posts->patchEntity($post, $this->request->data);
            $post->created = date("Y-m-d H:i:s");
            $post->modified = date("Y-m-d H:i:s");
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your post.'));
        }
        $this->set('post', $post);
    }
    /*-----------Edit Posts----------------*/
    public function edit($id = null)
	{
        $post = $this->Posts->get($id);
        $session_user = $this->request->session()->read('Auth.User.id');
        if($session_user != $post->user_id)
        {
            $this->Flash->error(__('You are not authorized to edit this post.'));
                return $this->redirect(['action' => 'index']);
        }
	    if ($this->request->is(['post','put'])) {
	        $post = $this->Posts->patchEntity($post, $this->request->data);
	        $post->modified = date("Y-m-d H:i:s");
	        if ($this->Posts->save($post)) {
	            $this->Flash->success(__('Your post has been updated.'));
	            return $this->redirect(['action' => 'index']);
	        }
	        $this->Flash->error(__('Unable to update your post.'));
	    }
	    $this->set('post', $post);
	}
    /*-------------Delete Post-------------*/
	public function delete($id)
	{
        
        $post = $this->Posts->get($id);
        $session_user = $this->request->session()->read('Auth.User.id');
        if($session_user != $post->user_id)
        {
            $this->Flash->error(__('You are not authorized to delete this post.'));
                return $this->redirect(['action' => 'index']);
        }
        $this->request->allowMethod(['post', 'delete']);
	    if ($this->Posts->delete($post)) {
	        $this->Flash->success(__('The post with id: {0} has been deleted.', h($id)));
	        return $this->redirect(['action' => 'index']);
	    }
	}
    /*-----------List Comment related to post-----------*/
    public function comment($id)
    {
        $posts = $this->Posts->get($id, [
            'contain' => []
        ]);

        $this->set('post', $posts);
        $this->set('_serialize', ['post']);
        
        $comment_list = $this->Comments->find('all')
                             ->select('users.username')
                             ->autoFields(true)
                             ->join(['table' => 'users',
                                        'type' => 'INNER',
                                        'conditions' => "Comments.user_id = users.id",
                                    ])
                            ->where(['post_id'=>$id]);
        
        /*-----------add comment code---------*/  
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            
            $comment = $this->Comments->patchEntity($comment, $this->request->data);
            
            $comment->post_id = $id;
            $comment->user_id = $this->request->session()->read('Auth.User.id');
            $comment->created_date = date("Y-m-d H:i:s");    
            $comment->modified_date = date("Y-m-d H:i:s");
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('Your comment has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your comment.'));
        }      
        $this->set(compact('user_id','comment','comment_list'));
    }
}
?>