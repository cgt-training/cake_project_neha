<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!-------New Edit Form-------->
<section class="content-header">
      <h1>Edit Post</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->Link(__('<i class="fa fa-files-o"></i> Posts'),['controller'=>'Posts','action'=>'index'],['escape'=>false])?>
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
                  <?php
                    $user_session = $this->request->session()->read('Auth.User');
                    if($user_session['role']=='admin')
                    {
                      ?>
                      <li class="list-group-item">
                        <b><?= $this->Form->postLink(__('Delete'),['action' => 'delete', $post->id],['confirm' =>__('Are you sure you want to delete # {0}?', $post->id)]);?>
                        </b>
                      </li>
                      <?php
                    }
                    ?>
                    <li class="list-group-item">
                        <b><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></b>
                    </li>
                    
                  </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="box box-primary">
        <?= $this->Form->create($post,['role'=>'form'])?>
        <div class="box-body">
            <div class="form-group">
                <?= $this->Form->control('title',['type'=>'text','label'=>'Title','class'=>'form-control','placeholder'=>'Title']);?>
          
            </div>
            <div class="form-group">
                <label for='body'>Description</label>
                <?= $this->Form->textarea('description',['class'=>'form-control']);?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('status',['type'=>'text','label'=>'Status','class'=>'form-control']);?>
            </div>
                
              <!-- /.box-body -->

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