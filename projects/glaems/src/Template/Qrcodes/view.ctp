<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Qrcode'), ['action' => 'edit', $qrcode->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Qrcode'), ['action' => 'delete', $qrcode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qrcode->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Qrcodes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Qrcode'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="qrcodes view large-9 medium-8 columns content">
    <h3><?= h($qrcode->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $qrcode->has('event') ? $this->Html->link($qrcode->event->id, ['controller' => 'Events', 'action' => 'view', $qrcode->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $qrcode->has('user') ? $this->Html->link($qrcode->user->id, ['controller' => 'Users', 'action' => 'view', $qrcode->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code Value') ?></th>
            <td><?= h($qrcode->code_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($qrcode->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($qrcode->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($qrcode->modified) ?></td>
        </tr>
    </table>
</div>
