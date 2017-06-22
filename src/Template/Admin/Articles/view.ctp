<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!---------New Design View------>
<section class="content-header">
      <h1>
        View Article
        <!-- <small>Advanced form element</small> -->
      </h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->Link(__('<i class="fa fa-files-o"></i> Articles'),['controller'=>'Articles','action'=>'index'],['escape'=>false])?>
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
                  <b><?= $this->Form->postLink(__('Delete'),['action' => 'delete', $article->id],['confirm' =>__('Are you sure you want to delete # {0}?', $article->id)]);?>
                  </b>
                </li>
                <?php
              }
              ?>
                <li class="list-group-item">
                <b><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </b>
                </li>
                <li class="list-group-item">
                    <b><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?></b>
                </li>
                <li class="list-group-item">
                    <b><?= $this->Html->link(__('Add Article'), ['action' => 'add']) ?> </b>
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
                <?= h($article->title) ?>
              </p>
              <hr>
              <strong>Body</strong>
              <p class="text-muted"><?= h($article->body);?></p>
              <hr>
              <strong>Created Date</strong>
              <p class="text-muted">
                <?= h($article->created)?>
              </p>
            </div>
      </div>
    </div>
</div>
</section>