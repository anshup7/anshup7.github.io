
<div class="users form large-4 medium-4 columns content login">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend style = "background-color : #eee;"><?= __('Enter Your Registered Email To Continue') ?></legend>
        <?php
            echo $this->Form->input('email',['color' => '#1798A5']);

        ?>
    </fieldset>
    <?= $this->Form->button(__('<i class="fa fa-plus" aria-hidden="true"></i> Submit'),['escape' => false]) ?>
    <?= $this->Form->end() ?>
</div>
