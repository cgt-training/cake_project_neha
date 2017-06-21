<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!---------New Design View------>
<section class="content-header">
      <h1>
        View Company
        <!-- <small>Advanced form element</small> -->
      </h1>
      <ol class="breadcrumb">
        <li>
        <?= $this->Html->Link(__('<i class="fa fa-files-o"></i> Companies'),['controller'=>'Companies','action'=>'index'],['escape'=>false])?>
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
                    <b><?= $this->Html->link(__('Edit Company'), ['action' => 'edit', $company->id]) ?> </b></li>
                <li class="list-group-item">
                    <b><?= $this->Form->postLink(__('Delete Company'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?></b> </li>
                <li class="list-group-item">
                    <b><?= $this->Html->link(__('List Companies'), ['action' => 'index']) ?></b> </li>
                <li class="list-group-item">
                    <b><?= $this->Html->link(__('Add Company'), ['action' => 'add']) ?> </b></li>
                <li class="list-group-item">
                    <b><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?> </b></li>
                <li class="list-group-item">
                    <b><?= $this->Html->link(__('Add Branch'), ['controller' => 'Branches', 'action' => 'add']) ?> </b></li>
              </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <div class="box box-primary">
        <div class="box-body">
              <strong>Company Name</strong>
              <p class="text-muted">
                <?= h($company->company_name) ?>
              </p>
              <hr>
              <strong>Email</strong>
              <p class="text-muted"><?= h($company->company_email);?></p>
              <hr>
              <strong>Address</strong>
              <p class="text-muted"><?= h($company->company_address);?></p>
              <hr>
              <strong>Company Profile</strong>
              <p class="text-muted"><?= h($company->company_profile);?></p>
              <hr>
              <strong>Created Date</strong>
              <p class="text-muted">
                <?= h($company->created)?>
              </p>
              <hr>
                <strong>Status</strong>
              <p class="text-muted">
                <?= h($company->status)?>
              </p>
            </div>
      </div>
    </div>
    <div class="col-md-9" style='float: right;'>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Related Branches</h3>
            </div>
            <div class="box-body table-responsive">
            <?php if (!empty($company->branches))
            {
               ?>
                <table class="table table-hover" cellpadding="0" cellspacing="0">
                    <tr>
                        <th>S.No.</th>
                        <th>Company</th>
                        <th>Branch Name</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                    $branch_count = 1;
                    foreach ($company->branches as $branches)
                    { 
                        ?>
                        <tr>
                            <td><?= $branch_count; ?>.</td>
                            <td><?= h($company->company_name) ?></td>
                            <td><?= h($branches->branch_name) ?></td>
                            <td><?= h($branches->created) ?></td>
                            <td><?= h($branches->status) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__("<i class='fa fa-eye'></i>"), ['controller' => 'Branches', 'action' => 'view', $branches->id],['escape'=>false]) ?>
                                &nbsp;&nbsp;
                                <?= $this->Html->link(__("<i class='glyphicon glyphicon-edit'></i>"), ['controller' => 'Branches', 'action' => 'edit', $branches->id],['escape'=>false]) ?>
                                &nbsp;&nbsp;
                                <?= $this->Form->postLink(__("<i class='glyphicon glyphicon-trash'></i>"), ['controller' => 'Branches', 'action' => 'delete', $branches->id], ['escape'=>false,'confirm' => __('Are you sure you want to delete # {0}?', $branches->id)]) ?>
                            </td>
                        </tr>
                        <?php 
                        $branch_count++;
                    } ?>
                </table>
            <?php } ?>
            </div>
        </div>
    </div>
</div>
</section>

