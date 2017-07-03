
	<!-- +++++ Projects Section +++++ -->

	<div class="container pt">
		<div class="row mt">
			<div class="col-lg-6 col-lg-offset-3 centered">
				<h3>Events At Your Disposal!</h3>
				<hr>
				<?php if($check_to_render > 0){ echo "<p>Hurry!! Before seats are full!</p>"; } else { echo "<p>Uploading Soon!!</p>"; } ?><a href="https://goo.gl/sY0r6u"><abbr title = "Anshuman Upadhyay"><br/>Ping Admin</a>.</p>
				</div>
			</div>
					<div class="row mt centered">
				<?php foreach($online_data as $event) { ?>

							<div class="col-lg-4">
								<a class="zoom green" target = "_other" href="http://localhost/media/images/events/poster/<?= $event->poster_dir ?>/<?= $event->poster ?>"><img class="img-responsive" src="http://localhost/media/images/events/poster/<?= $event->poster_dir ?>/960x600_<?= $event->poster ?>" alt="" /></a>
								<p><?= $event->event_name."<br/>(Seats Left : ".$event->no_of_seats.")" ?></p>
							</div>
								<?php if($count_online % 3 == 0) { ?></div> <div class="row mt centered"> <?php } ?>
						<?php $count_online += 1;} ?>

	</div><!-- /container -->
