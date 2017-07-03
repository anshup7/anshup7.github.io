<div class="users form large-4 medium-4 columns content login">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Recover Account') ?></legend>
        <?php
            echo $this->Form->input('mobile_number');
            echo $this->Form->button(__('Forward'));
            echo $this->Form->end();

        ?>
    </fieldset>
