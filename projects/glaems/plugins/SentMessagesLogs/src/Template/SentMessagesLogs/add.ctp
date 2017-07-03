<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sent Messages Logs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sentMessagesLogs form large-9 medium-8 columns content">
    <?= $this->Form->create($sentMessagesLog) ?>
    <fieldset>
        <legend><?= __('Add Sent Messages Log') ?></legend>
        <?php
            echo $this->Form->input('sent_to');
            echo $this->Form->input('message_text');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
