<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sent Messages Log'), ['action' => 'edit', $sentMessagesLog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sent Messages Log'), ['action' => 'delete', $sentMessagesLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sentMessagesLog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sent Messages Logs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sent Messages Log'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sentMessagesLogs view large-9 medium-8 columns content">
    <h3><?= h($sentMessagesLog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Message Text') ?></th>
            <td><?= h($sentMessagesLog->message_text) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sentMessagesLog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sent To') ?></th>
            <td><?= $this->Number->format($sentMessagesLog->sent_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sentMessagesLog->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sentMessagesLog->modified) ?></td>
        </tr>
    </table>
</div>
