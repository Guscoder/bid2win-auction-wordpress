<?php
/**
 * The template for displaying lists of events
 *
 * Queries to do with events will default to this template if a more appropriate template cannot be found
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory. 
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

//Call the template header
get_header(); ?>

<!-- This template follows the TwentyTwelve theme-->


<section class="auction-container">
                <h1>Upcoming Auction Listings</h1>
                <p>Click the company name for more details and a map.</p>

		<!-- Page header-->
		<h1 class="page-title">
			<?php
				if( eo_is_event_archive('day') )
					//Viewing date archive
					echo __('Events: ','eventorganiser').' '.eo_get_event_archive_date('jS F Y');
				elseif( eo_is_event_archive('month') )
					//Viewing month archive
					echo __('Events: ','eventorganiser').' '.eo_get_event_archive_date('F Y');
				elseif( eo_is_event_archive('year') )
					//Viewing year archive
					echo __('Events: ','eventorganiser').' '.eo_get_event_archive_date('Y');
				else
					_e('','eventorganiser');
			?>
			</h1>

<div class="auctions">

                    <table class="auction-listing auction-list-headings">
                        <tr class="auction-headings">
                            <th class="auction-headings-company">Company</th>
                            <th class="auction-headings-units">Units</th>
                            <th class="auction-headings-location">Location</th>
                            <th class="auction-headings-city">City-State</th>
                            <th class="auction-headings-date">Date</th>
                            <th class="auction-headings-time"><p>Time/</p><p>Route</p><p>Order</p></th>
                            
                        </tr>
                    </table>


		<?php if ( have_posts() ) : ?>

			<!-- Navigate between pages-->
			<!-- In TwentyEleven theme this is done by twentyeleven_content_nav-->
			<?php 
			global $wp_query;
			if ( $wp_query->max_num_pages > 1 ) : ?>
				<nav id="nav-above">
					<div class="nav-next events-nav-newer"><?php next_posts_link( __( 'Later events <span class="meta-nav">&rarr;</span>' , 'eventorganiser' ) ); ?></div>
					<div class="nav-previous events-nav-newer"><?php previous_posts_link( __( ' <span class="meta-nav">&larr;</span> Newer events', 'eventorganiser' ) ); ?></div>
				</nav><!-- #nav-above -->
			<?php endif; ?>

			<?php /* Start the Loop */ ?>

			<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<table class="auction-listing">

                        <tr class="auction-item">
                            <td class="storage-image">
                            	<?php	//If it has one, display the thumbnail
															the_post_thumbnail('thumbnail');	?>
														</td>
                            <td class="company-name">
                            	<h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                            </td>
                            <td class="units">
                            	<?php the_field('#_of_units') ?>
                            </td>
                            <td class="address">
                            	<?php //Display the venue street address
															$address_details = eo_get_venue_address();
															echo $address_details['address']; ?>
                            </td>
                            <td class="city-state">
                            	<?php //Display the venue city, state, and zipcode
															$address_details = eo_get_venue_address();
															echo $address_details['city']. ', ' .$address_details['state']. '  '.$address_details['postcode']; ?>
                            </td>
                            <td class="date">
                            	<!-- Output the date of the occurrence-->
															<?php
																//Format date/time according to whether its an all day event.
																//Use microdata https://support.google.com/webmasters/bin/answer.py?hl=en&answer=176035
										 						if( eo_is_all_day() ){
																	$format = 'F d, Y';
																	$microformat = 'Y-m-d';
																}else{
																	$format = 'l, m-d-Y ';
																	$microformat = 'c';
																}?>
																<time itemprop="startDate" datetime="<?php eo_the_start($microformat); ?>"><?php eo_the_start($format); ?></time>
                            </td>
                            <td class="time">
                            	<p class="cancelMe">
                            		<?php 
                            			the_field('first_auction_start_time'); echo " ";
                            		?>
                            	</p>

                            	<p>
                            	<?php

                            			$format = get_option('time_format');
																	$microformat = 'c';

																	the_field('route_order');
																?>

																<time itemprop="startDate" datetime="<?php eo_the_start($microformat); ?>"><?php eo_the_start($format); ?></time>
															</p>

                            <!-- 	<?php
																//Format date/time according to whether its an all day event.
																//Use microdata https://support.google.com/webmasters/bin/answer.py?hl=en&answer=176035
										 						if( eo_is_all_day() ){
																	$format = the_field('route_order');
																	// $microformat = 'Y-m-d';
																}else{
																	$format = get_option('time_format');
																	$microformat = 'c';
																}?>
																<time itemprop="startDate" datetime="<?php eo_the_start($microformat); ?>"><?php eo_the_start($format); ?></time>

 -->
                            </td>
                          
                        </tr>

												<!-- Display event meta list -->
							<!-- 					<?php echo eo_get_event_meta_list(); ?>
							 -->
												<!-- Show Event text as 'the_excerpt' or 'the_content' -->
												<?php the_excerpt(); ?>
										
											</div><!-- .event-entry-meta -->			
									
											<div style="clear:both;"></div>
											</header><!-- .entry-header -->

										</article><!-- #post-<?php the_ID(); ?> -->


							    		<?php endwhile; ?><!--The Loop ends-->

                    </table>




		<!-- Navigate between pages-->
		<?php 
			if ( $wp_query->max_num_pages > 1 ) : ?>
				<nav id="nav-below">
					<div class="nav-next events-nav-newer"><?php next_posts_link( __( 'Later events <span class="meta-nav">&rarr;</span>' , 'eventorganiser' ) ); ?></div>
					<div class="nav-previous events-nav-newer"><?php previous_posts_link( __( ' <span class="meta-nav">&larr;</span> Newer events', 'eventorganiser' ) ); ?></div>
				</nav><!-- #nav-below -->
			<?php endif; ?>

		<?php else : ?>
			<!-- If there are no events -->
			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'eventorganiser' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found for the requested archive. ', 'eventorganiser' ); ?></p>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

			<?php endif; ?>

    </div>
    
</section> <!-- #auction-container -->

<!-- Call template sidebar and footer -->
<?php get_footer(); ?>
