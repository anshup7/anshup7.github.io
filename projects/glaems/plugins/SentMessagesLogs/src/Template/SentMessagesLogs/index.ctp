<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sent Messages Log'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sentMessagesLogs index large-9 medium-8 columns content">
    <h3><?= __('Sent Messages Logs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sent_to') ?></th>
                <th scope="col"><?= $this->Paginator->sort('message_text') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sentMessagesLogs as $sentMessagesLog): ?>
            <tr>
                <td><?= $this->Number->format($sentMessagesLog->id) ?></td>
                <td><?= $this->Number->format($sentMessagesLog->sent_to) ?></td>
                <td><?= h($sentMessagesLog->message_text) ?></td>
                <td><?= h($sentMessagesLog->created) ?></td>
                <td><?= h($sentMessagesLog->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sentMessagesLog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sentMessagesLog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sentMessagesLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sentMessagesLog->id)]) ?>
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
