<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Faculty Coordinator'), ['action' => 'edit', $facultyCoordinator->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Faculty Coordinator'), ['action' => 'delete', $facultyCoordinator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facultyCoordinator->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Faculty Coordinators'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Faculty Coordinator'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Faculty Coordinators'), ['controller' => 'FacultyCoordinators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Faculty Coordinator'), ['controller' => 'FacultyCoordinators', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="facultyCoordinators view large-9 medium-8 columns content">
    <h3><?= h($facultyCoordinator->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $facultyCoordinator->has('event') ? $this->Html->link($facultyCoordinator->event->id, ['controller' => 'Events', 'action' => 'view', $facultyCoordinator->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($facultyCoordinator->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Faculty Coordinator Id') ?></th>
            <td><?= $this->Number->format($facultyCoordinator->faculty_coordinator_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($facultyCoordinator->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($facultyCoordinator->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($facultyCoordinator->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Faculty Coordinators') ?></h4>
        <?php if (!empty($facultyCoordinator->faculty_coordinators)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Event Id') ?></th>
                <th scope="col"><?= __('Faculty Coordinator Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($facultyCoordinator->faculty_coordinators as $facultyCoordinators): ?>
            <tr>
                <td><?= h($facultyCoordinators->id) ?></td>
                <td><?= h($facultyCoordinators->event_id) ?></td>
                <td><?= h($facultyCoordinators->faculty_coordinator_id) ?></td>
                <td><?= h($facultyCoordinators->status) ?></td>
                <td><?= h($facultyCoordinators->created) ?></td>
                <td><?= h($facultyCoordinators->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FacultyCoordinators', 'action' => 'view', $facultyCoordinators->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FacultyCoordinators', 'action' => 'edit', $facultyCoordinators->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FacultyCoordinators', 'action' => 'delete', $facultyCoordinators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facultyCoordinators->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
