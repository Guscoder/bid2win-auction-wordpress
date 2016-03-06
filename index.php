<?php get_header(); ?>

 <section class="main-container">
                <div class="main clearfix">
                    <p class="main-header1">Integrity</p>
                    <p class="main-header2">Live Auctions</p>
                    <p class="main-header3">Professionalism</p>
                </div> <!-- #main -->
                <p>BID2WIN Storage Auctions set the standard for Quality and Professionalism in the greater Milwaukee, Chicagoland, and Northern Indiana areas.</p>
            </section> <!-- #main-container -->

            <section class="doors-container">
                    <ul class="doors-list">
                        <li class="doors-auction-bloc">
                            <a href="auctions.html">
                                <h1>Next Auction:</h1>
                                <?php

    session_start();

    require_once("twitteroauth-master/autoload.php");

    use Abraham\TwitterOAuth\TwitterOAuth;

    $apikey="6gGhuHdh8bNk56Hn7FNXWeYOI";
    $apisecret="ufIJw87Sx6nrhJ31gFCzFoPNqF3jKkq4S97MygBcCAktRdsXmV";
    $accesstoken="3307187923-btDaVeWIYXaCLQNK4OPm676DYchNoAC2SrLn2Nj";
    $accesssecret="oAqXEc1dh5db0GRnMD7AHxYKTSxUtwbmjBPoUPxze9MAO";

    $connection = new TwitterOAuth($apikey, $apisecret, $accesstoken, $accesssecret);

    $tweets=    $connection->get("statuses/user_timeline", array("screen_name" => "jtwgus", "count" => "2")); 

    echo ("$tweets");

?>
                            </a>
                        </li>
                        <li class="doors-calendar-bloc">
                            <a href="">
                                <h1>Auction Listings</h1>

                            </a>
                        </li>
                        <li class="doors-about-bloc">
                            <a href="<?php echo get_page_link( get_page_by_title( calendar )->ID ); ?>">

">
                                <h1>Calendar</h1>
                            </a>
                        </li>
                        <li class="doors-uhaul-bloc">
                            <a href="<?php echo get_page_link( get_page_by_title( Rules )->ID ); ?>">
                                <h1>Auction Rules</h1>
                            </a>
                        </li>
                    </ul>
            </section><!-- #doors-container -->
            
<?php get_footer(); ?>