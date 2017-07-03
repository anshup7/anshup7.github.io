<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Costs'), ['controller' => 'Costs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost'), ['controller' => 'Costs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Event Coordinators'), ['controller' => 'EventCoordinators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Coordinator'), ['controller' => 'EventCoordinators', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Event Files'), ['controller' => 'EventFiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event File'), ['controller' => 'EventFiles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Faculty Coordinators'), ['controller' => 'FacultyCoordinators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Faculty Coordinator'), ['controller' => 'FacultyCoordinators', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Qrcodes'), ['controller' => 'Qrcodes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Qrcode'), ['controller' => 'Qrcodes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Revenues'), ['controller' => 'Revenues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Revenue'), ['controller' => 'Revenues', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="events view large-9 medium-8 columns content">
    <h3><?= h($event->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event Name') ?></th>
            <td><?= h($event->event_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($event->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($event->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Registration') ?></th>
            <td><?= h($event->date_of_registration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Commencement') ?></th>
            <td><?= h($event->date_of_commencement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($event->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($event->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Costs') ?></h4>
        <?php if (!empty($event->costs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Event Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->costs as $costs): ?>
            <tr>
                <td><?= h($costs->id) ?></td>
                <td><?= h($costs->event_id) ?></td>
                <td><?= h($costs->amount) ?></td>
                <td><?= h($costs->created) ?></td>
                <td><?= h($costs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Costs', 'action' => 'view', $costs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Costs', 'action' => 'edit', $costs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Costs', 'action' => 'delete', $costs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $costs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Event Coordinators') ?></h4>
        <?php if (!empty($event->event_coordinators)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Event Id') ?></th>
                <th scope="col"><?= __('Event Coordinator Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->event_coordinators as $eventCoordinators): ?>
            <tr>
                <td><?= h($eventCoordinators->id) ?></td>
                <td><?= h($eventCoordinators->event_id) ?></td>
                <td><?= h($eventCoordinators->event_coordinator_id) ?></td>
                <td><?= h($eventCoordinators->status) ?></td>
                <td><?= h($eventCoordinators->created) ?></td>
                <td><?= h($eventCoordinators->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EventCoordinators', 'action' => 'view', $eventCoordinators->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EventCoordinators', 'action' => 'edit', $eventCoordinators->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EventCoordinators', 'action' => 'delete', $eventCoordinators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventCoordinators->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Event Files') ?></h4>
        <?php if (!empty($event->event_files)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Event Id') ?></th>
                <th scope="col"><?= __('Path') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->event_files as $eventFiles): ?>
            <tr>
                <td><?= h($eventFiles->id) ?></td>
                <td><?= h($eventFiles->event_id) ?></td>
                <td><?= h($eventFiles->path) ?></td>
                <td><?= h($eventFiles->created) ?></td>
                <td><?= h($eventFiles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EventFiles', 'action' => 'view', $eventFiles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EventFiles', 'action' => 'edit', $eventFiles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EventFiles', 'action' => 'delete', $eventFiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventFiles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Faculty Coordinators') ?></h4>
        <?php if (!empty($event->faculty_coordinators)): ?>
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
            <?php foreach ($event->faculty_coordinators as $facultyCoordinators): ?>
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
    <div class="related">
        <h4><?= __('Related Qrcodes') ?></h4>
        <?php if (!empty($event->qrcodes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Event Id') ?></th>
                <th scope="col"><?= __('Event Visitor Id') ?></th>
                <th scope="col"><?= __('Code Value') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->qrcodes as $qrcodes): ?>
            <tr>
                <td><?= h($qrcodes->id) ?></td>
                <td><?= h($qrcodes->event_id) ?></td>
                <td><?= h($qrcodes->event_visitor_id) ?></td>
                <td><?= h($qrcodes->code_value) ?></td>
                <td><?= h($qrcodes->created) ?></td>
                <td><?= h($qrcodes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Qrcodes', 'action' => 'view', $qrcodes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Qrcodes', 'action' => 'edit', $qrcodes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Qrcodes', 'action' => 'delete', $qrcodes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qrcodes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Revenues') ?></h4>
        <?php if (!empty($event->revenues)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Event Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->revenues as $revenues): ?>
            <tr>
                <td><?= h($revenues->id) ?></td>
                <td><?= h($revenues->event_id) ?></td>
                <td><?= h($revenues->amount) ?></td>
                <td><?= h($revenues->created) ?></td>
                <td><?= h($revenues->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Revenues', 'action' => 'view', $revenues->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Revenues', 'action' => 'edit', $revenues->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Revenues', 'action' => 'delete', $revenues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $revenues->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
