<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <link rel="icon" href="<?php echo get_template_directory_uri() . '/images/favicon.ico'; ?>">
        <title><?php wp_title( '-', true, 'right' ); bloginfo( 'name' ); ?></title>

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
        <h1>Hello.</h1>
        <p>Anyone?</p>
    </header>


    