<?php

/* -- Load Styles, Fonts, JS and conditional IE -- */

function theme_styles() {
    global $wp_styles;
	wp_enqueue_style( 'theme_css', get_template_directory_uri() . '/dist/css/rjr_theme.min.css' );
 	wp_enqueue_style( 'css_ie', get_template_directory_uri() . '/dist/css/ie_theme.min.css', array( 'theme_css' ) );
  	$wp_styles->add_data( 'css_ie', 'conditional', 'gte IE 9' );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

function load_fonts() {
	wp_register_style( 'opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,800,700,300' );
	wp_enqueue_style( 'opensans' );
}
add_action( 'wp_print_styles', 'load_fonts' );

function theme_js() {
	global $wp_scripts;

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', '', '', true );
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/dist/js/modernizr-custom.min.js', '', '', true );
    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/dist/js/bootstrap.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'theme_rjr_js', get_template_directory_uri() . '/dist/js/rjr_theme.min.js', array( 'jquery', 'bootstrap_js' ), true );

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false );
	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );
	
}
add_action('wp_enqueue_scripts', 'theme_js');

/* -- Theme Menus -- */

function add_thememenu_support() {
	register_nav_menus(
    	array(
    		'main-menu' => __( 'Top Navigation' ),
    	)
  	);
}
add_action( 'init', 'add_thememenu_support' );

/* -- Theme Support -- */

add_theme_support( 'post-thumbnails' );

/* -- Pagination -- */

function html5wp_pagination() {

    global $wp_query;
    
    $big = 999999999;

    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var( 'paged' ) ),
        'total' => $wp_query->max_num_pages )
    );
}
add_action( 'init', 'html5wp_pagination' );

/* -- Add Global Site Options Page -- */

function theme_settings_page() { ?>

    <div class="wrap">
        <?php settings_errors(); ?>
        <h1>Curve Law Theme Panel &amp; Settings</h1>
        <form method="POST" action="options.php">

            <?php
                settings_fields( 'options-section' );
                do_settings_sections( 'options-section' );
            ?>

            <table>
                <tr>
                    <td><label for="twitter_url">Twitter </label></td>
                    <td><input type="text" id="twitter_url" name="twitter_url" size="45" value="<?php echo esc_attr( get_option( 'twitter_url' ) ); ?>" /></td>
                </tr>

                <tr>
                    <td><label for="facebook_url">Facebook </label></td>
                    <td><input type="text" id="facebook_url" name="facebook_url" size="45" value="<?php echo esc_attr( get_option( 'facebook_url' ) ); ?>" /></td>
                </tr>

                <tr>
                    <td><label for="linkedin_url">LinkedIn </label></td>
                    <td><input type="text" id="linkedin_url" name="linkedin_url" size="45" value="<?php echo esc_attr( get_option( 'linkedin_url' ) ); ?>" /></td>
                </tr>

                <tr>
                    <td><label for="phone_no">Phone Number </label></td>
                    <td><input type="text" id="phone_no" name="phone_no" size="45" value="<?php echo esc_attr( get_option( 'phone_no' ) ); ?>" /></td>
                </tr>

                <tr>
                    <td><label for="email_address">Email Address </label></td>
                    <td><input type="text" id="email_address" name="email_address" size="45" value="<?php echo esc_attr( get_option( 'email_address' ) ); ?>" /></td>
                </tr>

                <tr>
                    <td><label for="analytics">Analytics </label></td>
                    <td><textarea id="analytics" name="analytics" rows="5" cols="75"><?php echo esc_attr(get_option( 'analytics' ) ); ?></textarea></td>
                </tr>

                <tr>
                    <td><?php submit_button(); ?></td>
                </tr>

            </table>

        </form>
    </div>

<?php 
}

function register_sections_settings() {
    register_setting( 'options-section', 'twitter_url' );
    register_setting( 'options-section', 'facebook_url' );
    register_setting( 'options-section', 'linkedin_url' );
    register_setting( 'options-section', 'phone_no' );
    register_setting( 'options-section', 'email_address' );
    register_setting( 'options-section', 'analytics' );
}

function add_theme_menu_item() {
    add_menu_page( 'Theme Panel', 'Theme Settings', 'manage_options', 'theme-panel', 'theme_settings_page', null, 99 );

    add_action( 'admin_init', 'register_sections_settings' );
}
add_action( 'admin_menu', 'add_theme_menu_item' );

/* -- Async scripts -- */

function js_async_attr( $tag ) {
    $scripts_to_exclude = array( 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', 'modernizr-custom.min.js' );
 
    foreach( $scripts_to_exclude as $exclude_script ) {
        if( true == strpos( $tag, $exclude_script ) )
        
        return $tag;    
    }
    return str_replace( ' src', ' async="async" src', $tag );
}
add_filter( 'script_loader_tag', 'js_async_attr', 10 );

?>