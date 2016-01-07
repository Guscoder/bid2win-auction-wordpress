<?php get_header(); ?>

 <section class="main-container">
                <div class="main clearfix">
                    <p class="main-header1">Integrity</p>
                    <p class="main-header2">Professionalism</p>
                    <p class="main-header3">Live Auctions</p>
                </div> <!-- #main -->
                <p>BID2WIN Storage Auctions sets the standard for Quality and Professionalism in the greater Milwaukee, Chicagoland, and Northern Indiana areas.</p>
            </section> <!-- #main-container -->

            <section class="doors-container">
                    <ul class="doors-list">
                        <li class="doors-nextauction-bloc">
                            <a href="">
                                <h1>Next Auction:</h1>
                            </a>
                        </li>
                        <li class="doors-auctions-bloc">
                            <a href="http://www.bid2winstorageauctions.com/events/event/">
                                <h1>Auction Listings</h1>

                            </a>
                        </li>
                        <li class="doors-calendar-bloc">
                            <a href="<?php echo get_page_link( get_page_by_title( calendar )->ID ); ?>">
                                <h1>Calendar</h1>
                            </a>
                        </li>
                        <li class="doors-rules-bloc">
                            <a href="<?php echo get_page_link( get_page_by_title( Rules )->ID ); ?>">
                                <h1>Auction Rules</h1>
                            </a>
                        </li>
                    </ul>
            </section><!-- #doors-container -->

<?php get_footer(); ?>