<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cost'), ['action' => 'edit', $cost->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cost'), ['action' => 'delete', $cost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cost->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Costs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="costs view large-9 medium-8 columns content">
    <h3><?= h($cost->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $cost->has('event') ? $this->Html->link($cost->event->id, ['controller' => 'Events', 'action' => 'view', $cost->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cost->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($cost->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cost->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cost->modified) ?></td>
        </tr>
    </table>
</div>
