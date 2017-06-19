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
       // $articles = $this->paginate($this->Articles);

//this->set(compact('articles'));
//$this->set('_serialize', ['articles']);
    }
}