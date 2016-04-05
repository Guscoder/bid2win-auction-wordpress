<?php
/**
 * The template is used for displaying a single event details.
 *
 * You can use this to edit how the details re displayed on your site. (see notice below).
 *
 * Or you can edit the entire single event template by creating a single-event.php template
 * in your theme.
 *
 * For a list of available functions (outputting dates, venue details etc) see http://codex.wp-event-organiser.com
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory. See http://docs.wp-event-organiser.com/theme-integration for more information
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.7
 */
?>

<div>
	<!-- Choose a different date format depending on whether we want to include time -->
	<?php if( eo_is_all_day() ){
		$date_format = 'F j, Y'; 
	}else{
		$date_format = 'F j, Y ';
		$time_format =  get_option('time_format');
	} ?>
	<hr>

	<!-- Event details -->
		<h4><?php _e('Event Details', 'eventorganiser') ;?></h4>


	<ul class="eo-event-meta" id="event-meta-auctions">

		<?php if( !eo_reoccurs() ){ ?>
				<!-- Single event -->
				<li><strong><?php _e('Date', 'eventorganiser') ;?>:</strong> <?php eo_the_start($date_format); ?> </li>
				<li><strong><?php _e('Time or Route Order', 'eventorganiser') ;?>:</strong> <span class="single-event-time"> <?php the_field('first_auction_start_time'); echo " "; the_field('route_order');?></span> </li>
				<li><strong><?php _e('Address', 'eventorganiser') ;?>:</strong> <?php $address_details = eo_get_venue_address(); echo $address_details['address']; ?> </li>
				<li><strong><?php _e('Location', 'eventorganiser') ;?>:</strong> <?php $address_details = eo_get_venue_address();	echo $address_details['city']. ', ' .$address_details['state']. '  '.$address_details['postcode']; ?> </li>
				<li><strong><a href="<?php echo get_page_link( get_page_by_title( Rules )->ID ); ?>">Auction Rules</a></strong></li>
				<?php
		 } ?>

	<?php if( eo_reoccurs() ){ ?>
				<!-- Single event -->
				<li><strong><?php _e('Date', 'eventorganiser') ;?>:</strong> <?php echo eo_get_schedule_start('F j, Y'); ?> </li>
				<li><strong><?php _e('Time or Route Order', 'eventorganiser') ;?>:</strong> <?php echo eo_get_schedule_start($time_format); ?> </li>
				<li><strong><?php _e('Address', 'eventorganiser') ;?>:</strong> <?php $address_details = eo_get_venue_address(); echo $address_details['address']; ?> </li>
				<li><strong><?php _e('Location', 'eventorganiser') ;?>:</strong> <?php $address_details = eo_get_venue_address();	echo $address_details['city']. ', ' .$address_details['state']. '  '.$address_details['postcode']; ?> </li>
				<li class="event-list-rules-link"><strong><a href="<?php echo get_page_link( get_page_by_title( Rules )->ID ); ?>">Auction Rules</a></strong></li>
				<?php
		 } ?>


		<?php if( get_the_terms(get_the_ID(),'event-category') ){ ?>
			<li><strong><?php _e('Categories','eventorganiser'); ?>:</strong> <?php echo get_the_term_list( get_the_ID(),'event-category', '', ', ', '' ); ?></li>
		<?php } ?>

	
		<?php if( get_the_terms(get_the_ID(),'event-tag') && !is_wp_error( get_the_terms(get_the_ID(),'event-tag') ) ){ ?>
			<li><strong><?php _e('Tags','eventorganiser'); ?>:</strong> <?php echo get_the_term_list( get_the_ID(),'event-tag', '', ', ', '' ); ?></li>
		<?php } ?>

		<?php if( eo_reoccurs() ){ 			
				//Event reoccurs - display dates. 
				$upcoming = new WP_Query(array(
					'post_type'=>'event',
					'event_start_after' => 'today',
					'posts_per_page' => -1,
					'event_series' => get_the_ID(),
					'group_events_by'=>'occurrence'//Don't group by series
				));
	
				if( $upcoming->have_posts() ): ?>

					<li><strong><?php _e('Upcoming Dates','eventorganiser'); ?>:</strong>
						<ul id="eo-upcoming-dates">
							<?php while( $upcoming->have_posts() ): $upcoming->the_post(); ?>
									<li> <?php eo_the_start($date_format) ?></li>
							<?php endwhile; ?>
						</ul>
					</li>
 
					<?php 
					wp_reset_postdata(); 
					//With the ID 'eo-upcoming-dates', JS will hide all but the next 5 dates, with options to show more.
					wp_enqueue_script('eo_front');
					?>
				<?php endif; ?>
		<?php } ?>

		<?php do_action( 'eventorganiser_additional_event_meta' ) ?>

	</ul>

	<!-- Does the event have a venue? -->
	<?php if( eo_get_venue() ): ?>
		<!-- Display map -->
		<div class="eo-event-venue-map">
			<?php echo eo_get_venue_map(eo_get_venue(),array('width'=>'100%')); ?>
		</div>
	<?php endif; ?>


	<div style="clear:both"></div>

	<hr>

</div><!-- .entry-meta -->
