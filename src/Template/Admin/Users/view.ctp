<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!---------New Design View------>
<section class="content-header">
      <h1>
        View User
        <!-- <small>Advanced form element</small> -->
      </h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->Link(__('<i class="fa fa-files-o"></i> Users'),['controller'=>'Users','action'=>'index'],['escape'=>false])?>
        </li>
        <li class="active">View</li>
      </ol>
    </section>
<section class="content">
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="box box-primary">
            <div class="box-body box-profile">
              <ul class="list-group list-group-unbordered">
              <?php
                $user_session = $this->request->session()->read('Auth.User');
                if($user_session['role']=='admin')
                {
                 ?>
                  <li class="list-group-item">
                    <b><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> 
                    </b>
                  </li>
                  <?php
                }
                ?>
                <li class="list-group-item">
                <b><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </b>
                </li>
                <li class="list-group-item">
                    <b><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></b>
                </li>
                <li class="list-group-item">
                    <b><?= $this->Html->link(__('Add User'), ['action' => 'add']) ?> </b>
                </li>
              </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <div class="box box-primary">
        <div class="box-body">
              <strong>Username</strong>

              <p class="text-muted">
                <?= h($user->username) ?>
              </p>
              <hr>
              <strong>Email ID</strong>
              <p class="text-muted"><?= h($user->email);?></p>
              <hr>
              <strong>Role</strong>
              <p class="text-muted"><?= h($user->role);?></p>
              <hr>
              <strong>Created Date</strong>
              <p class="text-muted">
                <?= h($user->created)?>
              </p>
              
            </div>
      </div>
    </div>
</div>
</section>
