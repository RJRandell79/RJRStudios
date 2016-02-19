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

/* -- Theme Support and Removals -- */

add_theme_support( 'post-thumbnails' );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/* -- Sidebar/Widgets -- */

if ( function_exists( 'register_sidebar' ) ) {
    register_sidebar(
        array(
            'id' => 'twitter',
            'name'=> 'Twitter Sidebar',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
        )
    );
    register_sidebar(
        array(
            'id' => 'blog-sidebar',
            'name' => 'Blog Sidebar',
            'before_title' => '<p><strong>',
            'after_title' => '</strong></p>',
            'before_widget' => '<div class="post-widget border-bottom">',
            'after_widget' => '</div>',
        )
    );
}

/* -- Custom Post Types -- */

function register_cpt_projects() {
  
    $labels = array( 
        'name' => _x( 'Projects', 'projects' ),
        'singular_name' => _x( 'Project', 'projects' ),
        'add_new' => _x( 'Add New Project', 'projects' ),
        'add_new_item' => _x( 'Add New Project', 'projects' ),
        'edit_item' => _x( 'Edit Project', 'projects' ),
        'new_item' => _x( 'New Project', 'projects' ),
        'view_item' => _x( 'View Project', 'projects' ),
        'search_items' => _x( 'Search Projects', 'projects' ),
        'not_found' => _x( 'No projects found', 'projects' ),
        'not_found_in_trash' => _x( 'No project found in Trash', 'projects' ),
        'parent_item_colon' => _x( 'Parent Project:', 'projects' ),
        'menu_name' => _x( 'Projects', 'projects' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array( 'post_tag', 'page-category', 'Projects' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'projects', $args );
}
add_action( 'init', 'register_cpt_projects' );

function register_cpt_services() {
  
    $labels = array( 
        'name' => _x( 'Services', 'services' ),
        'singular_name' => _x( 'Service', 'services' ),
        'add_new' => _x( 'Add New Service', 'services' ),
        'add_new_item' => _x( 'Add New Service', 'services' ),
        'edit_item' => _x( 'Edit Service', 'services' ),
        'new_item' => _x( 'New Service', 'services' ),
        'view_item' => _x( 'View Service', 'services' ),
        'search_items' => _x( 'Search Services', 'services' ),
        'not_found' => _x( 'No services found', 'services' ),
        'not_found_in_trash' => _x( 'No service found in Trash', 'services' ),
        'parent_item_colon' => _x( 'Parent Service:', 'services' ),
        'menu_name' => _x( 'Services', 'services' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array( 'post_tag', 'page-category', 'Services' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-media-code',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'services', $args );
}
add_action( 'init', 'register_cpt_services' );

/* -- Custom Post Categories -- */

function taxonomies_projects() {
    $labels = array(
        'name' => _x( 'Project Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Project Category', 'taxonomy singular name' ),
        'search_items' => __( 'Search Project Categories' ),
        'all_items' => __( 'All Project Categories' ),
        'parent_item' => __( 'Parent Project Category' ),
        'parent_item_colon' => __( 'Parent Project Category:' ),
        'edit_item' => __( 'Edit Project Category' ), 
        'update_item' => __( 'Update Project Category' ),
        'add_new_item' => __( 'Add New Project Category' ),
        'new_item_name' => __( 'New Prject Category' ),
        'menu_name' => __( 'Project Categories' )
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true
    );
    register_taxonomy( 'taxonomies_projects', 'projects', $args );
}
add_action( 'init', 'taxonomies_projects', 0 );

/* -- To display custom post types that have been tagged on the tag.php page -- */

function display_cpt_tags( $query ) {

    if( is_tag() && $query->is_main_query() ) {
        
        $post_types = get_post_types();
        $query->set( 'post_type', $post_types );
    }
}
add_filter( 'pre_get_posts', 'display_cpt_tags' );

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

/* -- SEO Yoast Locale -- */

function override_og_locale( $locale ) {
    return "en_GB";
}
add_filter( 'wpseo_locale', 'override_og_locale' );

/* -- Add Global Site Options Page -- */

function theme_settings_page() { ?>

    <div class="wrap">
        <?php settings_errors(); ?>
        <h1>RJR Studios Theme Panel &amp; Settings</h1>
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
                    <td><label for="pinterest_url">Pinterest </label></td>
                    <td><input type="text" id="pinterest_url" name="pinterest_url" size="45" value="<?php echo esc_attr( get_option( 'pinterest_url' ) ); ?>" /></td>
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
    register_setting( 'options-section', 'pinterest_url' );
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
// add_filter( 'script_loader_tag', 'js_async_attr', 10 );

?>