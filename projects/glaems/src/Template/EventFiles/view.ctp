<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event File'), ['action' => 'edit', $eventFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event File'), ['action' => 'delete', $eventFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Event Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventFiles view large-9 medium-8 columns content">
    <h3><?= h($eventFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $eventFile->has('event') ? $this->Html->link($eventFile->event->id, ['controller' => 'Events', 'action' => 'view', $eventFile->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Path') ?></th>
            <td><?= h($eventFile->path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventFile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($eventFile->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($eventFile->modified) ?></td>
        </tr>
    </table>
</div>
