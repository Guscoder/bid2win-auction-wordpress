<?php get_header(); ?>

    <section class="main-container">
                    
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
      <h1><?php the_title(); ?></h1>      
      <p><?php the_content(); ?></p>        
	
  	<?php endwhile; else : ?>
  	
  	  <p><?php _e( 'Sorry, page found.', 'treehouse-portfolio' ); ?></p>
  	
  	<?php endif; ?>

    </section> <!-- #main-container -->


<?php get_footer(); ?>