<?php
/*
	Template Name: Calendar Page
*/
?>

<?php get_header(); ?>

     <section class="calendar-container">
                <h1>Auction Calendar</h1>

                <div class="calendar">

                    <?php echo eo_get_event_fullcalendar(); ?>

                </div>
                
            </section> <!-- #calendar-container -->



<?php get_footer(); ?>