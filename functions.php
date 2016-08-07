<?php
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');
//Add support of some features to the theme
if (function_exists('add_theme_support'))
{	// Add Menu Support
    add_theme_support('menus');
	//Add Widget support
	add_theme_support('widgets');
    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
}
/* Register menu locations */
add_action( 'init', 'gblank_menus' );
function gblank_menus(){
  register_nav_menus(array(
	  'socialmedia' => __( 'Social Media Menu' ),
	  'primary-menu'=>__('Primary Menu'),
));}
/* Register sidebars */
add_action('widgets_init','gblank_widgets');
function gblank_widgets(){
	register_sidebar(
		array(
			'name'=>'Left Sidebar',
			'id'=>'left',
			'before_widget'=>'',
			'after_widget'=>'',
			'before_title'=>'',
			'after_title'=>''
	));
	register_sidebar(array(
			'name'=>'Right Sidebar',
			'id'=>'right',
			'before_widget'=>'',
			'after_widget'=>'',
			'before_title'=>'',
			'after_title'=>''
	));
	register_sidebar(array(
			'name'=>'Footer',
			'id'=>'footer',
			'before_widget'=>'',
			'after_widget'=>'',
			'before_title'=>'',
			'after_title'=>''
	));
}


//Add or Enqueue stylesheets and scripts to the theme
add_action('wp_enqueue_scripts','gblank_scripts');
function gblank_scripts(){
	wp_deregister_script( 'jquery' );
	wp_enqueue_script('jquery',get_template_directory_uri().'/js/jquery-2.1.4.min.js',false,null,true);
	wp_enqueue_script('jquery.easing',get_template_directory_uri().'/js/jquery.easing.min.js',false,null,true);
	wp_enqueue_script('bootstrapjs',get_template_directory_uri().'/js/bootstrap.min.js',array( 'jquery' ),false,true);
wp_enqueue_script('font-awesome','https://use.fontawesome.com/fd1d26097b.js','',false,false);

    /*
	wp_enqueue_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',false,null,true);
	wp_enqueue_script('bootstrapjs','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',array( 'jquery' ),false,true);*/
}
add_action('wp_enqueue_scripts','gblank_styles');
function gblank_styles(){
	/*wp_enqueue_style( 'bootstrap','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');*/
	wp_enqueue_style( 'bootstrap',get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('base-style',get_template_directory_uri().'/css/interface.style.css','bootstrap');
    wp_enqueue_style('style-sheet',get_template_directory_uri().'/style.css','base-style');
    wp_enqueue_style('custom-style',get_template_directory_uri().'/interface.css.php','style-sheet');

}
/* Remove Admin bar */
function remove_admin_bar()
{
    return false;
}
/* Hooking up woocommerce support */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'gblank_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'gblank_wrapper_end', 10);

function gblank_wrapper_start() {
    echo '<div class="woocommerce-start">';
}

function gblank_wrapper_end() {
  echo '</div>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action('customize_register','gblank_settings'); // Hooking to the customizer
function gblank_settings($wp_customize){
	$wp_customize->add_panel(
		'gb_gblank_theme',array(
		'title' =>'Gblank theme options',
		'priority' => 15,
		'capability'=>'edit_theme_options',
		'description'=>'Make modifications to the theme')
		);
	$wp_customize->add_section(
		'gb_gblank_settings',array(
		'title' =>'Brand Identity',
		'priority' => 10,
		'capability'=>'edit_theme_options',
		'description'=>'Edit Brand Identity',
		'panel'=>'gb_gblank_theme'
		));
	$wp_customize->add_section(
		'gb_gblank_home',array(
		'title' =>'Home page',
		'priority' => 11,
		'capability'=>'edit_theme_options',
		'description'=>'Home page settings',
		'panel'=>'gb_gblank_theme'
		));
	$wp_customize->add_section(
		'gb_gblank_hmboxes',array(
		'title' =>'Home boxes',
		'priority' => 12,
		'capability'=>'edit_theme_options',
		'description'=>'Work on the boxes on home page',
		'panel'=>'gb_gblank_theme'
		));
	$wp_customize->add_setting('gb_gblank_logo');
    $wp_customize->add_setting('gb_gblank_facebook');
    $wp_customize->add_setting('gb_gblank_twitter');
    $wp_customize->add_setting('gb_gblank_phone');
	$wp_customize->add_setting('gb_gblank_donatelink');
	$wp_customize->add_setting('gb_gblank_donateicon');
	$wp_customize->add_setting('gb_gblank_background');
    $wp_customize->add_setting('gb_gblank_bgimage');
    $wp_customize->add_setting('gb_gblank_designerlink');
    $wp_customize->add_setting('gb_gblank_designer');
    $wp_customize->add_setting('gb_gblank_bx1_label');
    $wp_customize->add_setting('gb_gblank_bx1_icon');
    $wp_customize->add_setting('gb_gblank_bx1_link');
    $wp_customize->add_setting('gb_gblank_bx2_label');
    $wp_customize->add_setting('gb_gblank_bx2_icon');
    $wp_customize->add_setting('gb_gblank_bx2_link');
    $wp_customize->add_setting('gb_gblank_bx3_label');
    $wp_customize->add_setting('gb_gblank_bx3_icon');
    $wp_customize->add_setting('gb_gblank_bx3_link');
    $wp_customize->add_setting('gb_gblank_bx4_label');
    $wp_customize->add_setting('gb_gblank_bx4_link');
    $wp_customize->add_setting('gb_gblank_bx5_label');
    $wp_customize->add_setting('gb_gblank_bx5_link');
    $wp_customize->add_setting('gb_gblank_donateicon');
    $wp_customize->add_setting('gb_gblank_introheader');
    $wp_customize->add_setting('gb_gblank_introbg');
    $wp_customize->add_setting('gb_gblank_intro');
    $wp_customize->add_setting('gb_gblank_introlinklabel');
    $wp_customize->add_setting('gb_gblank_introlink');
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_donateicon', array(
		'label' => __( 'Donate icon', 'gblank' ),
		'section' => 'gb_gblank_settings',
		'settings' => 'gb_gblank_donateicon',
		'priority' => 8,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_donatelink', array(
		'label' => __( 'Donate link', 'gblank' ),
		'section' => 'gb_gblank_settings',
		'settings' => 'gb_gblank_donatelink',
		'priority' => 9,
	) ) );
	//upload control
	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'gb_gblank_logo', array(
		'label' => __( 'Logo', 'gblank' ),
		'section' => 'gb_gblank_settings',
		'settings' => 'gb_gblank_logo',
		'priority' => 10,
	) ) );
	//Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_phone', array(
		'label' => __( 'Phone', 'gblank' ),
		'section' => 'gb_gblank_settings',
		'settings' => 'gb_gblank_phone',
		'priority' => 11,
	) ) );
    //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_facebook', array(
		'label' => __( 'Facebook address', 'gblank' ),
		'section' => 'gb_gblank_settings',
		'settings' => 'gb_gblank_facebook',
		'priority' => 12,
	) ) );
    // Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_twitter', array(
		'label' => __( 'Twitter address', 'gblank' ),
		'section' => 'gb_gblank_settings',
		'settings' => 'gb_gblank_twitter',
		'priority' => 13,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_designer', array(
		'label' => __( 'Designer', 'gblank' ),
		'section' => 'gb_gblank_settings',
		'settings' => 'gb_gblank_designer',
		'priority' => 14,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_designerlink', array(
		'label' => __( 'Designer address', 'gblank' ),
		'section' => 'gb_gblank_settings',
		'settings' => 'gb_gblank_designerlink',
		'priority' => 15,
	) ) );
	//Upload control
	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'gb_gblank_introbg', array(
		'label' => __( 'Cover photo', 'gblank' ),
		'section' => 'gb_gblank_home',
		'settings' => 'gb_gblank_introbg',
		'priority' => 16,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_introheader', array(
		'type'=>'textarea',
		'label' => __( 'Header', 'gblank' ),
		'section' => 'gb_gblank_home',
		'settings' => 'gb_gblank_introheader',
		'priority' => 17,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_intro', array(
		'type'=>'textarea',
		'label' => __( 'Intro', 'gblank' ),
		'section' => 'gb_gblank_home',
		'settings' => 'gb_gblank_intro',
		'priority' => 18,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_introlabel', array(
		'label' => __( 'Read more label', 'gblank' ),
		'section' => 'gb_gblank_home',
		'settings' => 'gb_gblank_introlinklabel',
		'priority' => 19,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_introlink', array(
		'label' => __( 'Read more link', 'gblank' ),
		'section' => 'gb_gblank_home',
		'settings' => 'gb_gblank_introlink',
		'priority' => 20,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_bx1_icon', array(
		'label' => __( 'Box 1 Icon', 'gblank' ),
		'section' => 'gb_gblank_hmboxes',
		'settings' => 'gb_gblank_bx1_icon',
		'priority' => 17,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_bx1_label', array(
		'label' => __( 'Box 1 label ', 'gblank' ),
		'section' => 'gb_gblank_hmboxes',
		'settings' => 'gb_gblank_bx1_label',
		'priority' => 18,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_bx1_link', array(
		'label' => __( 'Box 1 link', 'gblank' ),
		'section' => 'gb_gblank_hmboxes',
		'settings' => 'gb_gblank_bx1_link',
		'priority' => 19,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_bx2_icon', array(
		'label' => __( 'Box 2 Icon', 'gblank' ),
		'section' => 'gb_gblank_hmboxes',
		'settings' => 'gb_gblank_bx2_icon',
		'priority' => 19,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_bx2_label', array(
		'label' => __( 'Box 2 label ', 'gblank' ),
		'section' => 'gb_gblank_hmboxes',
		'settings' => 'gb_gblank_bx2_label',
		'priority' => 20,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_bx2_link', array(
		'label' => __( 'Box 2 link', 'gblank' ),
		'section' => 'gb_gblank_hmboxes',
		'settings' => 'gb_gblank_bx2_link',
		'priority' => 21,
	) ) );
   //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_bx3_icon', array(
		'label' => __( 'Box 3 Icon', 'gblank' ),
		'section' => 'gb_gblank_hmboxes',
		'settings' => 'gb_gblank_bx3_icon',
		'priority' => 22,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_bx3_label', array(
		'label' => __( 'Box 3 label ', 'gblank' ),
		'section' => 'gb_gblank_hmboxes',
		'settings' => 'gb_gblank_bx3_label',
		'priority' => 23,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_bx3_link', array(
		'label' => __( 'Box 3 link', 'gblank' ),
		'section' => 'gb_gblank_hmboxes',
		'settings' => 'gb_gblank_bx3_link',
		'priority' => 24,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_bx4_label', array(
		'label' => __( 'Box 4 label ', 'gblank' ),
		'section' => 'gb_gblank_hmboxes',
		'settings' => 'gb_gblank_bx4_label',
		'priority' => 25,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_bx4_link', array(
		'label' => __( 'Box 4 link', 'gblank' ),
		'section' => 'gb_gblank_hmboxes',
		'settings' => 'gb_gblank_bx4_link',
		'priority' => 26,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_bx5_label', array(
		'label' => __( 'Box 5 label ', 'gblank' ),
		'section' => 'gb_gblank_hmboxes',
		'settings' => 'gb_gblank_bx5_label',
		'priority' => 27,
	) ) );
     //Text control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gb_gblank_bx5_link', array(
		'label' => __( 'Box 5 link', 'gblank' ),
		'section' => 'gb_gblank_hmboxes',
		'settings' => 'gb_gblank_bx5_link',
		'priority' => 28,
	) ) );
}