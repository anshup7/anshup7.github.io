
<?= $this->Element('side_nav_faculty', ['is_coordinator' => $display_coordinator_page_link, 'display_report_link' => $display_report_link, 'display_addevc_link' => $display_addevc_link, 'display_regs_link' => $display_regs_link ]) ?>
<div class="events index large-9 medium-8 columns content">
    <h3><?= __('Registration Details In Your Event : '.$faculty_event->event->event_name) ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('person_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('identity_number') ?></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($registrations as $visitor): ?>
            <tr>
                <td class="visitor-image-over" data-image="<?=$visitor->user->photo ?>" data-path="<?= $visitor->user->photo_dir ?>" ><?= h($visitor->user->first_name." ".$visitor->user->last_name) ?></td>
                <td><?= h($visitor->user->mobile_number) ?></td>
                <td><?= h($visitor->user->identity_number) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div id = "display_image" align = "center">

    </div>
