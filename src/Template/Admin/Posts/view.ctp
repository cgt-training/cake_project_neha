<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!---------New Design View------>
<section class="content-header">
      <h1>
        View Post
        <!-- <small>Advanced form element</small> -->
      </h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->Link(__('<i class="fa fa-files-o"></i> Posts'),['controller'=>'Posts','action'=>'index'],['escape'=>false])?>
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
                <li class="list-group-item">
                  <b><?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?> 
                  </b>
                </li>
                <li class="list-group-item">
                <b><?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id]) ?> </b>
                </li>
                <li class="list-group-item">
                    <b><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></b>
                </li>
                <li class="list-group-item">
                    <b><?= $this->Html->link(__('Add Post'), ['action' => 'add']) ?> </b>
                </li>
              </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <div class="box box-primary">
        <div class="box-body">
              <strong>Title</strong>

              <p class="text-muted">
                <?= h($post->title) ?>
              </p>
              <hr>
              <strong>Description</strong>
              <p class="text-muted"><?= h($post->description);?></p>
              <hr>
              <strong>Created Date</strong>
              <p class="text-muted">
                <?= h($post->created)?>
              </p>
              <hr>
                <strong>Modified Date</strong>
              <p class="text-muted">
                <?= h($post->modified)?>
              </p>
            </div>
      </div>
    </div>
</div>
</section>
