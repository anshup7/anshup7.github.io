<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visitor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitors index large-9 medium-8 columns content">
    <h3><?= __('Visitors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visitor_event_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visitor_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitors as $visitor): ?>
            <tr>
                <td><?= $this->Number->format($visitor->id) ?></td>
                <td><?= $visitor->has('event') ? $this->Html->link($visitor->event->id, ['controller' => 'Events', 'action' => 'view', $visitor->event->id]) : '' ?></td>
                <td><?= $visitor->has('user') ? $this->Html->link($visitor->user->id, ['controller' => 'Users', 'action' => 'view', $visitor->user->id]) : '' ?></td>
                <td><?= h($visitor->created) ?></td>
                <td><?= h($visitor->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitor->id)]) ?>
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
