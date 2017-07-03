<?= $this->Element('side_nav_faculty', ['is_coordinator' => $display_coordinator_page_link, 'display_report_link' => $display_report_link, 'display_addevc_link' => $display_addevc_link, '$display_regs_link' => $display_regs_link]) ?>
<div class="events index large-9 medium-8 columns content">
 <?php if ((iterator_count($visitors)) > 0) { ?>
    <h3><?= __('Attendees In Your Event : '.$faculty_event->event->event_name) ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('person_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('identity_number') ?></th>
            </tr>
        </thead>
<?php } else { ?>
        <h3><?= __('<i class="fa fa-info" aria-hidden="true"></i> <u>The Attendance has not been recorded yet, No Records to Show </u>') ?> </h3>
        <?php } ?>
        <tbody>
            <?php foreach ($visitors as $visitor): ?>
            <tr>
                <td class="visitor-image-over" data-image="<?=$visitor->user->photo ?>" data-path="<?= $visitor->user->photo_dir ?>"><?= h($visitor->user->first_name." ".$visitor->user->last_name) ?></td>
                <td><?= h($visitor->user->mobile_number) ?></td>
                <td><?= h($visitor->user->identity_number) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div id = "display_image" align = "center"></div>
