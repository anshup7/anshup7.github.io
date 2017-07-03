<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Revenue'), ['action' => 'edit', $revenue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Revenue'), ['action' => 'delete', $revenue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $revenue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Revenues'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Revenue'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="revenues view large-9 medium-8 columns content">
    <h3><?= h($revenue->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $revenue->has('event') ? $this->Html->link($revenue->event->id, ['controller' => 'Events', 'action' => 'view', $revenue->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($revenue->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($revenue->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($revenue->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($revenue->modified) ?></td>
        </tr>
    </table>
</div>
