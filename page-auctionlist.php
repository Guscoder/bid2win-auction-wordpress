<?php
/*
    Template Name: Auctions Page


*/
?>

<?php get_header(); ?>


 <section class="auction-container">
                <h1>Upcoming Auction Listings</h1>

                <div class="auctions">

                    <table class="auction-listing">
                        <tr class="auction-headings">
                            <th class="auction-headings-company">Company</th>
                            <th class="auction-headings-location">Location</th>
                            <th class="auction-headings-city">City-State</th>
                            <th class="auction-headings-date">Date</th>
                            <th class="auction-headings-time">Time</th>
                            <th class="auction-headings-units">Units</th>
                            <th class="auction-headings-details"></th>
                        </tr>
                    </table>

<!--                         <tr class="spacer">
                            <td colspan="7"></td>
                        </tr> -->

                    <?php 

                    $args = array( 'post_type' => 'auctionlisting', 'posts_per_page' => 10 );

                    $loop = new WP_Query( $args );

                    while ( $loop->have_posts() ) : $loop->the_post();
                    endwhile;
                    ?>

                    <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>   

                    <table class="auction-listing">

                        <tr class="auction-item">
                            <td class="storage-image"><img src="" alt="logo"></td>
                            <td class="company-name"><h2><?php the_field('auction_title') ?></h2></td>
                            <td class="address"><?php the_field('auction_address') ?></td>
                            <td class="city-state"><?php the_field('citystate') ?></td>
                            <td class="date"><?php the_field('auction_date') ?></td>
                            <td class="time"><?php the_field('auction_time') ?></td>
                            <td class="units"><?php the_field('#_of_units') ?></td>
                            <td class="details">Details</td>
                        </tr>

                    </table>

                    <?php endwhile; endif; wp_reset_postdata(); ?>




<!--                         <tr class="spacer">
                            <td colspan="7"></td>
                        </tr> -->
                   <!--  <table class="auction-listing">

                        <tr class="auction-item">
                            <td rowspan="2" class="storage-image"><img src="img/uhaul.gif" alt="storage company logo"></td>
                            <td class="company-name"><h2>Uhaul Storage</h2></td>
                        </tr>
                        <tr class="auction-item">
                            <td class="address">52 Monty Python Ave</td>
                            <td class="city-state">Antioch, FR</td>
                            <td class="date">November 12, 2015</td>
                            <td class="time">1:00pm</td>
                            <td class="units">30</td>
                            <td class="details">Details</td>
                        </tr>

                    </table>
 -->
                </div>
                
            </section> <!-- #auction-container -->

          


<?php get_footer(); ?>