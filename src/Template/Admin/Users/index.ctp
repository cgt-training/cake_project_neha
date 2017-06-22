
<section class="content-header">
      <h1>Users</h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->Link(__('<i class="fa fa-files-o"></i> Users'),['controller'=>'Users','action'=>'index'],['escape'=>false])?>
        </li>
        <li class="active">List</li>
      </ol>
</section>
<section class='content'>
    <div class='row'>
        <!-- <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="box box-primary">
                <div class="box-body box-profile">
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b><?= $this->Html->link(__('Add User'), ['action' => 'add']) ?></b>
                    </li>
                  </ul>
                </div>
            </div>
        </div> -->
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-body table-responsive">
                  <table class='table table-hover'>
                    <thead>
                      <tr>
                          <th>S.No.</th>  
                          <th>Username</th>
                          <th>Email ID</th>
                          <th>Role</th>
                          <th>Created</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sno = 1;
                        foreach ($users as $users)
                        {
                         ?>
                        <tr>
                            <td><?= $sno; ?>.</td>
                            <td><?= h($users->username) ?></td>
                            <td><?= h($users->email) ?></td>
                            <td><?= h($users->role) ?></td>
                            <td><?= h($users->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-eye'></i>"), ['action' => 'view', $users->id],['escape'=>false]) ?>&nbsp;&nbsp;
                                <?= $this->Html->link(__("<i class='glyphicon glyphicon-edit'></i>"), ['action' => 'edit', $users->id],['escape'=>false]) ?>&nbsp;&nbsp;
                                <?= $this->Form->postLink(__("<i class='glyphicon glyphicon-trash'></i>"), ['action' => 'delete', $users->id], ['escape'=>false,'confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
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