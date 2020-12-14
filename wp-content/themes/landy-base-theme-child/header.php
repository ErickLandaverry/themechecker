<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */


?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
	    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    
    
    
</head>

<!-- ******************* The Navbar Area ******************* -->
<div class="wrapper-fluid  wrapper-navbar" id="wrapper-navbar">
  
    <nav class="navbar-expand-md">

        <div class="container-fluid px-0 header-border">
            <div class="row justify-content-center justify-content-lg-between align-items-center m-auto">
                <div class=" col-md-3 d-flex justify-content-lg-left justify-content-center align-items-center" id="logo-wrapper">
                <!-- Your site title as branding in the menu -->
                  <?php the_custom_logo();?>
                <!-- end custom logo -->
                </div><!-- end col -->

                <div class="col-md-6 d-flex justify-content-around align-items-center flex-md-row mx-0 px-0 mobile-layout" id="nav-content-wrapper">

                <div class="text-center">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <div class="hamburger-icon"></div>
                            <div class="hamburger-icon"></div>
                            <div class="hamburger-icon"></div>
                        </button>

                        <!-- The WordPress Menu goes here -->
                        <?php wp_nav_menu(
                            array(
                                'theme_location'  => 'menu-1',
                                'container_class' => 'collapse navbar-collapse justify-content-center',
                                'container_id'    => 'navbarNavDropdown',
                                'menu_class'      => 'navbar-nav',
                                'fallback_cb'     => '',
                                'menu_id'         => 'primary-menu',
                                
                            )
                        ); ?>
                  </div><!-- end col -->

                    <!-- end col -->

                </div><!-- nav-content-wrapper -->

                <div class="col-md-3 d-flex justify-content-between align-items-center mb-3 mb-lg-0 mx-50 mobile-size-767 mobile-social">

                        <h1>Icons</h1>

                </div>
      

            </div>


        </div><!-- .container -->

    </nav><!-- .site-navigation -->

</div><!-- .wrapper-navbar end -->

<?php wp_head(); ?>