<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?= $this->Element('admin_side_nav') // as the faculty add page is used by the admin ?>
    </ul>
</nav>
<div class="eventCoordinators form large-9 medium-8 columns content">
    <?php if($empty == false): ?>
    <?= $this->Form->create($facultyCoordinator) ?>
    <fieldset>
        <legend style="background-color:#eee;"><?= __('Add Faculty Coordinator') ?></legend>
        <?php



            echo $this->Form->input('event_id', ['options' => $events]); // Even if the event_name is specified in the model,request->data will contain the id of that respective event by default.
            echo $this->Form->input('user_id', ['options' => $users]);?>
            <?= $this->Form->button(__('<i class="fa fa-plus" aria-hidden="true"></i> Submit'),['escape' => false]) ?>
            <?= $this->Form->end() ?>
        <?php else: ?>
            <h3><?= __('<i class="fa fa-info" aria-hidden="true"></i> <u>No Users Currently Eligible</u>') ?> </h3>

    </fieldset>

<?php endif; ?>
</div>
