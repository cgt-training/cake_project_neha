<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section class="content-header">
      <h1>
        Add Company
      </h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->Link(__('<i class="fa fa-files-o"></i> Companies'),['controller'=>'Companies','action'=>'index'],['escape'=>false])?>
        </li>
        <li class="active">Add</li>
      </ol>
    </section>
<section class='content'>
    <div class='row'>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="box box-primary">
                <div class="box-body box-profile">
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b><?= $this->Html->link(__('List Companies'), ['action' => 'index']) ?></b>
                    </li>
                    <li class="list-group-item">
                        <b><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></b></li>
                    <li class="list-group-item">
                        <b><?= $this->Html->link(__('Add Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></b></li>
                  </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <?= $this->Form->create($company,['role'=>'form'])?>
                    <div class="form-group">
                        <?= $this->Form->control('company_name',['type'=>'text','label'=>'Company Name','class'=>'form-control','placeholder'=>'Name']);?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('company_email',['type'=>'email','label'=>'Company Email','class'=>'form-control','placeholder'=>'Email']);?>
                    </div>
                    <div class="form-group">
                        <label for='address'>Company Address</label>
                        <?= $this->Form->textarea('company_address',['class'=>'form-control']);?>
                    </div>
                    <div class="form-group">
                        <label for='profile'>Company Profile</label>
                        <?= $this->Form->textarea('company_profile',['class'=>'form-control']);?>
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