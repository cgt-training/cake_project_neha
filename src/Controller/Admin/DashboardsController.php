<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class DashboardsController extends AppController
{
    public function initialize()
    {
        $this->viewBuilder()->layout('dashboard_layout');
    }

    public function index()
    {
 		$this->loadModel('Articles');
        $query = $this->Articles->find('all');
	    $articles_count = $query->count();

	    $this->loadModel('Posts');
        $post_count = $this->Posts->find('all')->count();

	    $this->loadModel('Companies');
        $company_count = $this->Companies->find('all')->count();

	    $this->loadModel('Users');
        $users_count = $this->Users->find('all')->count();

		$this->set(compact('articles_count','post_count','company_count','users_count'));
		//$this->set('_serialize', ['articles']);
    }
}