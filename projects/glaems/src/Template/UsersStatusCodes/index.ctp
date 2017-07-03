<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Users Status Code'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersStatusCodes index large-9 medium-8 columns content">
    <h3><?= __('Users Status Codes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersStatusCodes as $usersStatusCode): ?>
            <tr>
                <td><?= $this->Number->format($usersStatusCode->id) ?></td>
                <td><?= h($usersStatusCode->title) ?></td>
                <td><?= h($usersStatusCode->created) ?></td>
                <td><?= h($usersStatusCode->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usersStatusCode->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersStatusCode->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersStatusCode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersStatusCode->id)]) ?>
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
