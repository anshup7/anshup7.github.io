<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?= $this->element('admin_side_nav') ?>
    </ul>
</nav>
<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($event, ['type' => 'file']) ?>
    <fieldset>
        <legend style = 'background-color : #eee;'><?= __('Add Event') ?></legend>
        <?php
            echo $this->Form->input('event_name');
            echo $this->Form->input('date_of_registration');
            echo $this->Form->input('date_of_commencement', ['empty' => false]);
            echo $this->Form->input('no_of_seats', ['empty' => true]);
            echo $this->Form->input('status', ['data-toggle' => 'tooltip', 'title' => '0 : Online, 4 : Upcoming, but not online']);
            echo $this->Form->input('poster', ['type' => 'file'], ['style' => ' color : #1798A5;']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('<i class="fa fa-plus" aria-hidden="true"></i> Submit'),['escape' => false]) ?>
    <?= $this->Form->end() ?>
</div>
