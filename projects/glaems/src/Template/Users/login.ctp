
<div class="users form large-4 medium-4 columns content login" style = "background-color : #fff; border-style : outset; border-color : rgb(202, 208, 215)">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend style = "background-color : #fff;"><?= __('Login') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('<i class="fa fa-unlock" aria-hidden="true"></i> Login'), ['escape' => false]) ?>
    <?= $this->Form->end() ?>
    <i class="fa fa-exclamation-triangle" aria-hidden="true" style = 'color : red;'></i>
    <?= $this->Html->link(__('Forgot Password'), ['controller' => 'Users', 'action' => 'sendEmail']) ?>
</div>
