<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!------------New Table Design------>
<section class="content-header">
      <h1>Articles</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->Link(__('<i class="fa fa-files-o"></i> Articles'),['controller'=>'Articles','action'=>'index'],['escape'=>false])?>
        </li>
        <li class="active">List</li>
      </ol>
    </section>
<section class='content'>
    <div class='row'>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="box box-primary">
                <div class="box-body box-profile">
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b><?= $this->Html->link(__('Add Article'), ['action' => 'add']) ?></b>
                    </li>
                  </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="box box-primary">
                <div class="box-body table-responsive">
                  <table class='table table-hover'>
                    <thead>
                      <tr>
                          <th>S.No.</th>  
                          <th>Title</th>
                          <th>Published</th>
                          <th>Created</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sno = 1;
                        foreach($articles as $article)
                        {
                          ?>
                          <tr>
                            <td><?= $sno; ?>.</td>
                            <td><?= h($article->title) ?></td>
                            <td><?= h($article->published) ?></td>
                            <td><?= h($article->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-eye'></i>"), ['action' => 'view', $article->id],['escape'=>false]) ?>&nbsp;&nbsp;
                                <?= $this->Html->link(__("<i class='glyphicon glyphicon-edit'></i>"), ['action' => 'edit', $article->id],['escape'=>false]) ?>&nbsp;&nbsp;
                                <?php
                                $user_session = $this->request->session()->read('Auth.User');
                                if($user_session['role']=='admin')
                                {
                                  echo $this->Form->postLink(__("<i class='glyphicon glyphicon-trash'></i>"), ['action' => 'delete', $article->id],['escape'=>false,'confirm' => __('Are you sure you want to delete # {0}?', $article->id)]);
                                }
                                ?>
                            </td>
                          </tr>
                          <?php
                          $sno++;
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                </div>
                </div>
              
            </div>
        </div>
    </div>
</section>
