<div class="posts index large-12 medium-8 columns content">
    <h3><?= __('Posts') ?></h3>
    <h3><?= $this->Html->link('Add New Post', ['action' => 'add']) ?></h3>
    <table cellpadding="0" cellspacing="0" width='100%' class="table table-responsive">
        <thead>
            <tr>
                <th scope="col" width='5%'><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" width='25%'><?= $this->Paginator->sort('title') ?></th>
                <th scope="col" width='15%'><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" width='15%'><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" width='15%'><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" width='25%' class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $this->Number->format($post->id) ?></td>
                <td><?= h($post->title) ?></td>
                <td><?= h($post->created) ?></td>
                <td><?= h($post->modified) ?></td>
                <td><?= $post->has('user') ? $this->Html->link($post->user->id, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__("<i class='glyphicon glyphicon-list'></i>"), ['action' => 'view', $post->id],['escape'=>false]) ?>&nbsp;&nbsp;
                    <?= $this->Html->link(__("<i class='glyphicon glyphicon-edit'></i>"), ['action' => 'edit', $post->id],['escape'=>false]) ?>&nbsp;&nbsp;
                    <?= $this->Form->postLink(__("<i class='glyphicon glyphicon-trash'></i>"), ['action' => 'delete', $post->id],['escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?>&nbsp;&nbsp;
                    <?= $this->Html->link(__("<i class='glyphicon glyphicon-comment'></i>"), ['action' => 'comment', $post->id],['escape'=>false]) ?>
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