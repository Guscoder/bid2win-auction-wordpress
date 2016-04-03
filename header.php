<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title(); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

				<?php wp_head(); ?>

    </head>

    <body id="background" <?php body_class(); ?>>

        <div class="site-container">

            <section class="header-container">

                <header class="clearfix">
                  
                    <a class="header-title" href="<?php bloginfo('url'); ?>"><h1 class="header-logo">Bid2Win</h1></a>
                  
<!--                    <a href="<?php bloginfo('url'); ?>"><h1 class="logo">Bid2Win</h1><img class="header-logo" src="<?php bloginfo('template_directory'); ?>/img/logo1.png" alt="logo" width="80" height="35" /></a>
 -->									<nav class="nav-collapse">

											
											<?php

											$defaults = array(
												'container' => false,
												'theme_location' => 'primary-menu',
												'menu-class' => 'nav-collapse',
												);

											wp_nav_menu( $defaults);

											?>
<!--                     <ul>
                          <li>Auctions</a></li>
                          <li>Calendar</a></li>
                          <li>Rules</a></li>
                          <li>About</a></li>
                        </ul> -->
                    </nav>
                </header>
            </section><!-- #header-container -->
