<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <?= $this->element('admin_side_nav') ?>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['type' => 'file'])?>
    <fieldset>
        <legend style = "background-color : black;"><?= __('Edit User Details') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('identity_number');
            echo $this->Form->input('email');
            echo $this->Form->input('mobile_number');
            echo $this->Form->input('user_status_code_id', ['options' => $usersStatusCodes]);
            echo $this->Form->input('user_type_id', ['options' => $usersTypesCodes]);
            echo $this->Form->input('password');
            echo $this->Form->input('photo', ['type' => 'file'], ['style' => ' color : #1798A5;']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
