<?php
/*
    Template Name: Rules Page
*/
?>

<?php get_header(); ?>

                

            <section class="rules-container">
                <h1>What to Expect at a Storage Auction</h1>
                <p><?php the_field('auction_expectations') ?></p>

                <h1>Auction Location Rules of Participation</h1>
                    
                <div class="accordion" id="rules">
                    <h2>U-Haul Storage Rules</h2>
                    <article>
                        <?php the_field('uhaul_rules') ?>

                    </article>

                    <h2>Parker Self Storage Rules</h2>
                    <article>
                        <?php the_field('parker_storage_rules') ?>
                    </article>

                    <h2>LifeStorage Rules</h2>
                    <article>
                        <?php the_field('life_storage_rules') ?>
                    </article>

                    <h2>Armour Self Storage Rules</h2>
                    <article>
                        <?php the_field('armour_storage_rules') ?>
                    </article>
                </div>
                
            </section> <!-- #rules-container -->



<?php get_footer(); ?>