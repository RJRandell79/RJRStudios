<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <link rel="icon" href="<?php echo get_template_directory_uri() . '/dist/img/favicon.ico'; ?>">
        <title><?php wp_title( '-', true, 'right' ); ?></title>

        <?php wp_head(); ?>

        <!--[if gte IE 9]>
            <style type="text/css">
                .gradient { filter: none !important; }
            </style>
        <![endif]-->

    </head>

    <body <?php body_class(); ?> >
    <!-- /End of header.php -->

    <header>

        <nav class="navbar navbar-default">
            <div class="container">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>">
                        <img src="<?php echo get_template_directory_uri() . '/dist/svg/rj_logo.svg'; ?>" alt="RJR Studios" />
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <?php 
                        wp_nav_menu( array(
                            'theme_location' => 'main-menu',
                            'container' => false,
                            'menu_class' => 'nav navbar-nav navbar-right'
                            )
                        ); 
                    ?>

                    <!--
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="<?php bloginfo( 'url' ); ?>" title="Home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li><a href="<?php bloginfo( 'url' ); ?>/portfolio/" title="Portfolio">Portfolio</a></li>
                        <li><a href="#" title="About Me">About me</a></li>
                        <li><a href="#" title="Services">Services</a></li>
                        <li><a href="<?php bloginfo( 'url' ); ?>/blog/" title="News">News</a></li>
                        <li><a href="#" title="Contact">Contact</a></li>

                    </ul> 
                    -->
                </div><!-- /.navbar-collapse -->

            </div><!-- /.container -->
        </nav>

        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <div class="header-title">
                            <div></div>
                            <p>Say hello to my digital world</p>
                            <div></div>
                        </div>

                        <?php
                            $twitter = get_option( 'twitter_url' ); 
                            $linkedin = get_option( 'linkedin_url' );
                            $facebook = get_option( 'facebook_url' );
                            $pinterest = get_option( 'pinterest_url' );
                        ?>

                        <ul class="social-links clearfix">
                            <?php if( $twitter ) : ?>
                                <li><a href="<?php echo $twitter; ?>" title="Twitter" target="_blank">Twitter</a></li>
                            <?php endif; ?>
                            <?php if( $linkedin ) : ?>
                                <li><a href="<?php echo $linkedin; ?>" title="LinkedIn" target="_blank">LinkedIn</a></li>
                            <?php endif; ?>
                            <?php if( $facebook ) : ?>
                                <li><a href="<?php echo $facebook; ?>" title="Facebook" target="_blank">Facebook</a></li>
                            <?php endif; ?>
                            <?php if ( $pinterest ) : ?>
                                <li><a href="<?php echo $pinterest; ?>" title="Pinterest" target="_blank">Pinterest</a></li>
                            <?php endif; ?>
                        </ul>

                    </div>
                </div>

            </div>
        </div>

    </header>


    