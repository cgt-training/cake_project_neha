<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section class="content-header">
      <h1>
        Edit Branch
      </h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->Link(__('<i class="fa fa-files-o"></i> Branches'),['controller'=>'Branches','action'=>'index'],['escape'=>false])?>
        </li>
        <li class="active">Edit</li>
      </ol>
    </section>
<section class='content'>
    <div class='row'>
        <div class="col-md-3 col-sm-3 col-xs-13">
            <div class="box box-primary">
                <div class="box-body box-profile">
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item"><b><?= $this->Form->postLink(__('Delete Branch'),['action' => 'delete', $branch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branch->id)])?></b></li>
                    <li class="list-group-item"><b><?= $this->Html->link(__('List Branches'), ['action' => 'index']) ?></b></li>
                    <li class="list-group-item"><b><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></b></li>
                    <li class="list-group-item"><b><?= $this->Html->link(__('Add Company'), ['controller' => 'Companies', 'action' => 'add']) ?></b></li>
                  </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <?= $this->Form->create($branch,['role'=>'form'])?>
                    <div class="form-group">
                        <?= $this->Form->control('company_id',['options' => $companies,'label'=>'Company Name','class'=>'form-control']);?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('branch_name',['type'=>'text','label'=>'Branch Name','class'=>'form-control','placeholder'=>'Name']);?>
                    </div>       
                    <div class="form-group">
                        <?= $this->Form->control('status',['type'=>'text','label'=>'Status','class'=>'form-control']);?>
                    </div>
                    <div class="box-footer">
                        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
                    </div>
                    <?= $this->Form->end();?>
                </div>
            </div>
        </div>
    </div>
</section>
