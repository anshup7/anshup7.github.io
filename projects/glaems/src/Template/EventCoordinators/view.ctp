<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event Coordinator'), ['action' => 'edit', $eventCoordinator->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event Coordinator'), ['action' => 'delete', $eventCoordinator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventCoordinator->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Event Coordinators'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Coordinator'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Event Coordinators'), ['controller' => 'EventCoordinators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Coordinator'), ['controller' => 'EventCoordinators', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventCoordinators view large-9 medium-8 columns content">
    <h3><?= h($eventCoordinator->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $eventCoordinator->has('event') ? $this->Html->link($eventCoordinator->event->id, ['controller' => 'Events', 'action' => 'view', $eventCoordinator->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventCoordinator->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Coordinator Id') ?></th>
            <td><?= $this->Number->format($eventCoordinator->event_coordinator_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($eventCoordinator->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($eventCoordinator->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($eventCoordinator->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Event Coordinators') ?></h4>
        <?php if (!empty($eventCoordinator->event_coordinators)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Event Id') ?></th>
                <th scope="col"><?= __('Event Coordinator Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($eventCoordinator->event_coordinators as $eventCoordinators): ?>
            <tr>
                <td><?= h($eventCoordinators->id) ?></td>
                <td><?= h($eventCoordinators->event_id) ?></td>
                <td><?= h($eventCoordinators->event_coordinator_id) ?></td>
                <td><?= h($eventCoordinators->status) ?></td>
                <td><?= h($eventCoordinators->created) ?></td>
                <td><?= h($eventCoordinators->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EventCoordinators', 'action' => 'view', $eventCoordinators->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EventCoordinators', 'action' => 'edit', $eventCoordinators->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EventCoordinators', 'action' => 'delete', $eventCoordinators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventCoordinators->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
