<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section class="content-header">
      <h1>
        View Post
        <!-- <small>Advanced form element</small> -->
      </h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->Link(__('<i class="fa fa-files-o"></i> Branches'),['controller'=>'Branches','action'=>'index'],['escape'=>false])?>
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
                
                <li class="list-group-item"><b><?= $this->Html->link(__('Edit Branch'), ['action' => 'edit', $branch->id]) ?> </b></li>
                <li class="list-group-item"><b><?= $this->Form->postLink(__('Delete Branch'), ['action' => 'delete', $branch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branch->id)]) ?> </b></li>
                <li class="list-group-item"><b><?= $this->Html->link(__('List Branches'), ['action' => 'index']) ?> </b></li>
                <li class="list-group-item"><b><?= $this->Html->link(__('Add Branch'), ['action' => 'add']) ?> </b></li>
                <li class="list-group-item"><b><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></b> </li>
                <li class="list-group-item"><b><?= $this->Html->link(__('Add Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </b></li>
              </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <div class="box box-primary">
        <div class="box-body">
              <strong>Branch</strong>
              <p class="text-muted">
                <?= h($branch->branch_name) ?>
              </p>
              <hr>

              <strong>Company</strong>
              <p><?= $branch->has('company') ? $this->Html->link($branch->company->company_name, ['controller' => 'Companies', 'action' => 'view', $branch->company->id]) : '' ?>
              </p>
              <hr>

              <strong>Status</strong>
              <p class="text-muted"><?= h($branch->status);?></p>
              <hr>

              <strong>Created Date</strong>
              <p class="text-muted">
                <?= h($branch->created)?>
              </p>
              
            </div>
      </div>
    </div>
</div>
</section>
