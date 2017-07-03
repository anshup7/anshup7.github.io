<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Status Code'), ['action' => 'edit', $usersStatusCode->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Status Code'), ['action' => 'delete', $usersStatusCode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersStatusCode->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Status Codes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Status Code'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersStatusCodes view large-9 medium-8 columns content">
    <h3><?= h($usersStatusCode->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($usersStatusCode->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersStatusCode->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($usersStatusCode->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($usersStatusCode->modified) ?></td>
        </tr>
    </table>
</div>
