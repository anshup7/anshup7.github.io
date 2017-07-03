<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $eventCoordinator->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $eventCoordinator->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Event Coordinators'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Coordinators'), ['controller' => 'EventCoordinators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Coordinator'), ['controller' => 'EventCoordinators', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventCoordinators form large-9 medium-8 columns content">
    <?= $this->Form->create($eventCoordinator) ?>
    <fieldset>
        <legend><?= __('Edit Event Coordinator') ?></legend>
        <?php
            echo $this->Form->input('event_id', ['options' => $events]);
            echo $this->Form->input('event_coordinator_id');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
