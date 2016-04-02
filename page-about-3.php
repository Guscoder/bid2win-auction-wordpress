<?php
/*
	Template Name: About Page
*/
?>

<?php get_header(); ?>

     <section class="about-container">

                <div class="mission-statement">
                   <h1>Mission Statement</h1>
                   <p><?php the_field('mission_statement') ?></p>
                </div> 

                <div class="about">
                    <h1>About BID2WIN LLC</h1>
                    <p><?php the_field('about_statement') ?></p>

                    <p>Contact Us:</p>
                    <p>Email: <a href="mailto:<?php the_field('contact_email') ?>"><?php the_field('contact_email') ?></a> </p>
                    <p>616-633-9520</p>
                   
                </div>
                
            </section> <!-- #about-container -->


<?php get_footer(); ?>