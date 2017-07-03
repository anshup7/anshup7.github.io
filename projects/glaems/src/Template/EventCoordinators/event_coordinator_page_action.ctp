<?= $this->Element('side_nav_event_coordinators', ['is_permitted' => $is_permitted]) ?>

<div class="users form large-9 medium-8 columns content">
<?= $this->element('event_coordinator_dashboard', ['online_count' => $online_count, 'registered_count' => $registered_count, 'upcoming_count' => $upcoming_count, 'count_of_current_event' => $current_count]) ?>

</div>
