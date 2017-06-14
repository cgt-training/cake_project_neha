<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Company'), ['action' => 'edit', $company->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Company'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="companies view large-9 medium-8 columns content">
    <h3><?= h($company->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Company Name') ?></th>
            <td><?= h($company->company_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Email') ?></th>
            <td><?= h($company->company_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($company->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($company->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($company->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Company Address') ?></h4>
        <?= $this->Text->autoParagraph(h($company->company_address)); ?>
    </div>
    <div class="row">
        <h4><?= __('Company Profile') ?></h4>
        <?= $this->Text->autoParagraph(h($company->company_profile)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Branches') ?></h4>

        <?php if (!empty($company->branches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col" width='5%'><?= __('Id') ?></th>
                <th scope="col" width='20%'><?= __('Company') ?></th>
                <th scope="col" width='25%'><?= __('Branch Name') ?></th>
                <th scope="col" width='25%'><?= __('Created') ?></th>
                <th scope="col" width='10%'><?= __('Status') ?></th>
                <th scope="col" width='15%' class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($company->branches as $branches): ?>
            <tr>
                <td><?= h($branches->id) ?></td>
                <td><?= h($company->company_name) ?></td>
                <td><?= h($branches->branch_name) ?></td>
                <td><?= h($branches->created) ?></td>
                <td><?= h($branches->status) ?></td>
                <td class="actions">
                
                    <?= $this->Html->link(__("<i class='glyphicon glyphicon-list'></i>"), ['controller' => 'Branches', 'action' => 'view', $branches->id],['escape' => false]) ?>
                    &nbsp;&nbsp;
                    <?= $this->Html->link(__("<i class='glyphicon glyphicon-edit'></i>"), ['controller' => 'Branches', 'action' => 'edit', $branches->id],['escape' => false]) ?>
                    &nbsp;&nbsp;
                    <?= $this->Form->postLink(__("<i class='glyphicon glyphicon-trash'></i>"), ['controller' => 'Branches', 'action' => 'delete', $branches->id],['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $branches->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
