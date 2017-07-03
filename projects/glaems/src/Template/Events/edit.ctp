<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <!--<li><?php/* $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $event->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)] I have Disabled the delete link as it is not serving any purpose
            )
        */?></li> -->
        <?= $this->element('admin_side_nav') ?>
    </ul>
</nav>
<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($event,  ['type' => 'file']) ?>
    <fieldset>
        <legend style = "background-color : black;"><?= __('Edit Event Details') ?></legend>
        <?php
            echo $this->Form->input('event_name', ['id' => 'event_value']);
            echo $this->Form->input('date_of_registration');
            echo $this->Form->input('date_of_commencement', ['empty' => false]);
            echo $this->Form->input('no_of_seats', ['empty' => true]);
            echo $this->Form->input('status', ['id' => 'status_value']);
            echo $this->Form->input('poster', ['type' => 'file'], ['style' => ' color : #1798A5;']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('<i class="fa fa-plus"></i> Submit'), ['escape' => false, 'id' => 'sub_prohibit']) ?>
    <?= $this->Form->end() ?>
</div>
