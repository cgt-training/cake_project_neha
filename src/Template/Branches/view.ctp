<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Branch'), ['action' => 'edit', $branch->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Branch'), ['action' => 'delete', $branch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branch->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Branches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="branches view large-9 medium-8 columns content">
    <h3><?= h($branch->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $branch->has('company') ? $this->Html->link($branch->company->company_name, ['controller' => 'Companies', 'action' => 'view', $branch->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Branch Name') ?></th>
            <td><?= h($branch->branch_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($branch->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($branch->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($branch->created) ?></td>
        </tr>
    </table>
</div>
