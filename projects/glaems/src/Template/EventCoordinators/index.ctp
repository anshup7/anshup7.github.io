<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Event Coordinator'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventCoordinators index large-9 medium-8 columns content">
    <h3><?= __('Event Coordinators') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_coordinator_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventCoordinators as $eventCoordinator): ?>
            <tr>
                <td><?= $this->Number->format($eventCoordinator->id) ?></td>
                <td><?= $eventCoordinator->has('event') ? $this->Html->link($eventCoordinator->event->id, ['controller' => 'Events', 'action' => 'view', $eventCoordinator->event->id]) : '' ?></td>
                <td><?= $this->Number->format($eventCoordinator->event_coordinator_id) ?></td>
                <td><?= $this->Number->format($eventCoordinator->status) ?></td>
                <td><?= h($eventCoordinator->created) ?></td>
                <td><?= h($eventCoordinator->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eventCoordinator->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventCoordinator->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventCoordinator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventCoordinator->id)]) ?>
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
