<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visitor'), ['action' => 'edit', $visitor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visitor'), ['action' => 'delete', $visitor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visitors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visitor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitors view large-9 medium-8 columns content">
    <h3><?= h($visitor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $visitor->has('event') ? $this->Html->link($visitor->event->id, ['controller' => 'Events', 'action' => 'view', $visitor->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $visitor->has('user') ? $this->Html->link($visitor->user->id, ['controller' => 'Users', 'action' => 'view', $visitor->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($visitor->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($visitor->modified) ?></td>
        </tr>
    </table>
</div>
