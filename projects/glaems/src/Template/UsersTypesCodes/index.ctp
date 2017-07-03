<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Users Types Code'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersTypesCodes index large-9 medium-8 columns content">
    <h3><?= __('Users Types Codes') ?></h3>
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
            <?php foreach ($usersTypesCodes as $usersTypesCode): ?>
            <tr>
                <td><?= $this->Number->format($usersTypesCode->id) ?></td>
                <td><?= h($usersTypesCode->title) ?></td>
                <td><?= h($usersTypesCode->created) ?></td>
                <td><?= h($usersTypesCode->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usersTypesCode->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersTypesCode->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersTypesCode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersTypesCode->id)]) ?>
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
