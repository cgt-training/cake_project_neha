<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!-------New Edit Form-------->
<section class="content-header">
      <h1>Edit User</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->Link(__('<i class="fa fa-files-o"></i> Users'),['controller'=>'Users','action'=>'index'],['escape'=>false])?>
        </li>
        <li class="active">Edit</li>
      </ol>
    </section>
<section class='content'>
    <div class='row'>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="box box-primary">
                <div class="box-body box-profile">
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b><?= $this->Form->postLink(__('Delete'),['action' => 'delete', $user->id],['confirm' =>__('Are you sure you want to delete # {0}?', $user->id)]);?>
                      </b>
                    </li>
                    <li class="list-group-item">
                        <b><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></b>
                    </li>
                    
                  </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="box box-primary">
        <?= $this->Form->create($user,['role'=>'form'])?>
        <div class="box-body">
            <div class="form-group">
                <?= $this->Form->control('username',['type'=>'text','label'=>'Username','class'=>'form-control','placeholder'=>'Username']);?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('email',['type'=>'email','label'=>'Email ID','class'=>'form-control','placeholder'=>'Email ID']);?>
            </div>       
            <div class="form-group">
                <?= $this->Form->control('role',
                  ['options'=>
                      ['admin'=>'Admin','subadmin'=>'Sub-admin','guest'=>'Guest','author'=>'Author'],
                      'label'=>'Role','class'=>'form-control']);?>
            </div>      
            <div class="box-footer">
                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
                
            </div>
            <?= $this->Form->end();?>
          </div>
          <!-- /.box -->
          </div>
          <!-- Form Element sizes -->
         
        </div>
    </div>
</section>