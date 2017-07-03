<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Control Panel') ?></li>
        <?= $this->element('admin_side_nav') ?>

    </ul>
</nav>
<div class="events index large-9 medium-8 columns content">
    <h3><?= __('Events') ?></h3>
    <table cellpadding="0" cellspacing="0" style = "background-color : #fff; ">
        <thead>
            <tr>

                <th scope="col"><?= $this->Paginator->sort('event_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_registration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_commencement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions" style = "color :  #0078a0;"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>

            <tr>
                <td style = "color :  rgba(88, 94, 101, 1);"><?= h($event->event_name) ?></td>
                <td style = "color :  rgba(88, 94, 101, 1);"><?= h($event->date_of_registration) ?></td>
                <td style = "color :  rgba(88, 94, 101, 1);"><?= h($event->date_of_commencement) ?></td>
                <td style = "color :  rgba(88, 94, 101, 1);"><?= h($event->created) ?></td>
                <td style = "color :  rgba(88, 94, 101, 1);"><?= h($event->modified) ?></td>
                <td class="actions" >
                    <?php if($event->status == 0): ?>
                    <?= $this->Html->link(__('<i class="fa fa-key"></i> Edit'), ['action' => 'edit', $event->id], ['escape' => false]) ?>
                    <?= $this->Html->link(__('<i class="fa fa-key"></i> Close'), ['action' => 'close', $event->id], ['escape' => false]) ?>
                <?php elseif($event->status == 3): ?>
                       <p style="color : black; background-color:green"> Completed </p>
                   <?php endif; ?>

                    <?php // $this->Form->postLink(__('Delete'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?>
                </td>
            </tr>

            <?php endforeach; ?>

        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
</div>
