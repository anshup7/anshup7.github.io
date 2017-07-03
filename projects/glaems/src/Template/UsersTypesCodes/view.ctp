<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Types Code'), ['action' => 'edit', $usersTypesCode->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Types Code'), ['action' => 'delete', $usersTypesCode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersTypesCode->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Types Codes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Types Code'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersTypesCodes view large-9 medium-8 columns content">
    <h3><?= h($usersTypesCode->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($usersTypesCode->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersTypesCode->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($usersTypesCode->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($usersTypesCode->modified) ?></td>
        </tr>
    </table>
</div>
