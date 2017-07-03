<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $qrcode->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $qrcode->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Qrcodes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="qrcodes form large-9 medium-8 columns content">
    <?= $this->Form->create($qrcode) ?>
    <fieldset>
        <legend><?= __('Edit Qrcode') ?></legend>
        <?php
            echo $this->Form->input('event_id', ['options' => $events]);
            echo $this->Form->input('event_visitor_id', ['options' => $users]);
            echo $this->Form->input('code_value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
