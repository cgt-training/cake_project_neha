<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Company'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="companies index large-9 medium-8 columns content">
    <h3><?= __('Companies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width='5%'><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" width='20%'><?= $this->Paginator->sort('company_name') ?></th>
                <th scope="col" width='25%'><?= $this->Paginator->sort('company_email') ?></th>
                <th scope="col" width='25%'><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" width='10%'><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" width='15%' class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($companies as $company): ?>
            <tr>
                <td><?= $this->Number->format($company->id) ?></td>
                <td><?= h($company->company_name) ?></td>
                <td><?= h($company->company_email) ?></td>
                <td><?= h($company->created) ?></td>
                <td><?= h($company->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__("<i class='glyphicon glyphicon-list'></i>"), ['action' => 'view', $company->id],['escape'=>false]) ?>
                    &nbsp;&nbsp;
                    <?= $this->Html->link(__("<i class='glyphicon glyphicon-edit'></i>"), ['action' => 'edit', $company->id],['escape'=>false]) ?>
                    &nbsp;&nbsp;
                    <?= $this->Form->postLink(__("<i class='glyphicon glyphicon-trash'></i>"), ['action' => 'delete', $company->id],['escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
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
