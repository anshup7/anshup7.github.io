<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users Status Codes'), ['controller' => 'UsersStatusCodes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Status Code'), ['controller' => 'UsersStatusCodes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users Types Codes'), ['controller' => 'UsersTypesCodes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Types Code'), ['controller' => 'UsersTypesCodes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->first_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Users Status Code') ?></th>
            <td><?= $user->has('users_status_code') ? $this->Html->link($user->users_status_code->title, ['controller' => 'UsersStatusCodes', 'action' => 'view', $user->users_status_code->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Users Types Code') ?></th>
            <td><?= $user->has('users_types_code') ? $this->Html->link($user->users_types_code->title, ['controller' => 'UsersTypesCodes', 'action' => 'view', $user->users_types_code->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Identity Number') ?></th>
            <td><?= $this->Number->format($user->identity_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile Number') ?></th>
            <td><?= $this->Number->format($user->mobile_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Admin') ?></th>
            <td><?= $user->is_admin ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
