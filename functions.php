<?php

/**
* Freelance Theme
Functions.php
* 
* PHP versions 4 and 5
* 
* @category   Theme Functions 
* @package    WordPress
* @author     ArsTropica <info@arstropica.com> 
* @copyright  2014 ArsTropica 
* @license    http://opensource.org/licenses/gpl-license.php GNU Public License 
* @version    1.0 
* @link       http://pear.php.net/package/ArsTropica  Reponsive Framework
* @subpackage Freelance Theme
* @see        References to other sections (if any)...
*/
// Definitions

/* Define paths to theme directory */
if (!defined('child_template_directory'))
    define('child_template_directory', dirname(__FILE__));

if (!defined('child_template_url'))
    define('child_template_url', get_stylesheet_directory_uri());

// Actions

add_action('widgets_init', 'at_responsive_child_register_sidebars');

add_action('wp_print_styles', 'at_responsive_child_theme_styles');

/* Enqueue Theme Scripts */
add_action('wp_enqueue_scripts', 'at_responsive_child_theme_scripts');

/* Initialize Theme Building Functions */
add_action('init', 'at_responsive_child_theme_setup', 10);

/* Register Theme Sidebars */
add_action('widgets_init', 'at_responsive_child_register_sidebars');

/* Sidebar Widget Areas */
add_action('at_responsive_slim_deck', 'at_responsive_do_slim_deck_widget_area');
add_action('at_responsive_tall_deck', 'at_responsive_do_tall_deck_widget_area');

/* Related Posts on Single Posts */
add_action('at_responsive_loop_end', 'at_responsive_child_do_related_posts_single');

// Filters

/* Full width menu */
add_filter('nav_menu_css_class', 'at_responsive_child_fullwidth_dropdown_class', 10, 3);

/* Add fixed class to dropdown menu */
add_filter('at_responsive_dropdown_menu_classes', 'at_responsive_child_dropdown_menu_classes');

/* Add submenu-wrap span to submenu items */
add_filter('at_responsive_nav_menu_args', 'at_responsive_child_nav_menu_args', 10, 2);
// Functions

/**
* Enqueue Theme Stylesheets
* 
* @since 1.0
* @return void 
*/
function at_responsive_child_theme_styles() {
    // Load our main stylesheet.
    wp_enqueue_style('at-responsive-style', get_stylesheet_uri(), array('at-responsive-framework-style'));
    wp_enqueue_style('at-responsive-child-style', child_template_url . '/css/default.css', array('at-responsive-framework-style', 'at-common-style'));
    // Minified?
    wp_enqueue_style('at-responsive-child-style-min', child_template_url . '/css/default.css', array('at-reponsive-framework-minified-css-assets'));
}

/* Enqueue Theme Scripts */

/**
* Enqueue Theme Scripts
* 
* @since 1.0
* @return void 
*/
function at_responsive_child_theme_scripts() {
    // Silence
}

/**
* Setup Theme Building
* 
* @since 1.0
* @return void 
*/
function at_responsive_child_theme_setup() {
    global $at_theme_custom;
    // Add Image size(s) for Header and Thumbnail Images
    add_image_size('at-header', 1440, 460, true);
    add_image_size('entry-thumbnail', 674, 442, true);
    add_image_size('single-thumbnail', 276);


    // Init MastHead
    add_action('at_responsive_hero', 'at_responsive_masthead');

    // Setup Grid Variables
    at_responsive_set_content_grid_values(12, 12, 4, 6, 12, 12, 12, 12, 12, 12, 12, 12);

    // Setup Theme Settings Defaults
    $args = array(
    'stickynav' => false,
    'excerptlength' => 55,
    'homeexcerptlength' => 25,
    'postsperpage' => 9,
    'homepostsperpage' => 3,
    );
    at_responsive_set_theme_settings_default_values($args);
}

/* Register Theme Sidebars */

/**
* Register Theme Sidebars
* 
* @since 1.0
* @return void 
*/
function at_responsive_child_register_sidebars() {
    global $theme_namespace;
    /* register_sidebar( array(
    'name' => 'Footer Sidebar',
    'id' => 'footer_sidebar',
    'before_widget' => '<aside id="%1$s" class="at_widget %2$s" role="complementary">',
    'after_widget' => '</div></aside>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4><div class="widget-wrap">',
    ) ); */
    register_sidebar(array(
    'name' => 'Slim Deck',
    'id' => 'slim_deck',
    'description' => __('Full width sidebar that takes four small horizontal widgets.', $theme_namespace),
    'before_widget' => '<aside id="%1$s" class="col-md-3 widget at_widget %2$s" role="complementary"><div class="widget-frame eq-height">',
    'after_widget' => "</div></div></div></aside>",
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4><div class="widget-wrap"><div class="widget-content">',
    ));
    register_sidebar(array(
    'name' => 'Tall Deck',
    'id' => 'tall_deck',
    'description' => __('Full width sidebar that takes four large horizontal widgets.', $theme_namespace),
    'before_widget' => '<aside id="%1$s" class="col-md-3 widget at_widget %2$s" role="complementary"><div class="widget-frame eq-height">',
    'after_widget' => "</div></div></div></aside>",
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4><div class="widget-wrap"><div class="widget-content">',
    ));
}

/**
* Handle Slim Deck Widget Area
* 
* @since 1.0
* @return void 
*/
function at_responsive_do_slim_deck_widget_area() {
    at_responsive_do_sidebar('Slim Deck', 'col-md-12');
}

/**
* Handle Tall Deck Widget Area
* 
* @since 1.0
* @return void 
*/
function at_responsive_do_tall_deck_widget_area() {
    at_responsive_do_sidebar('Tall Deck', 'col-md-12');
}

/**
* Full width Nav dropdown class
* 
* @param array   $classes Parameter 
* @param object $item    Parameter 
* @param object  $args    Parameter 
* @since 1.0
* @return array   Return 
*/
function at_responsive_child_fullwidth_dropdown_class($classes, $item, $args) {
    if (@$args->has_children)
        $classes[] = 'yamm-fw';

    return $classes;
}

/**
* Related Posts on Single Pages
* 
* @since 1.0
* @return unknown Return 
*/
function at_responsive_child_do_related_posts_single() {
    global $at_theme_custom, $at_related_posts;
    if (is_single()) {
        $enable_plugin = $at_theme_custom->get_option('settings/enableyarpp', false);
        if ($enable_plugin) {
            if (!$at_related_posts && class_exists('at_related_posts')) {
                $at_related_posts = new at_related_posts();
            } elseif (!class_exists('at_related_posts')) {
                return;
            }
            if (!$at_related_posts->has_related_posts()) {
                return;
            }
            $at_related_posts->do_related_posts_widget(true, 12);
        }
    }
}

/**
* Add extra classes to dropdown menu
* 
* @param array $c Parameter 
* @since 1.0
* @return array Return 
*/
function at_responsive_child_dropdown_menu_classes($c) {
    $c[] = 'fixed';
    return $c;
}

/**
* Add centering <span> tag to menu items
* 
* @param object $args Parameter 
* @param object $item Parameter 
* @since 1.0
* @return object Return 
*/
function at_responsive_child_nav_menu_args($args, $item) {
    if ($item->menu_item_parent && is_object($args)) {
        if (isset($args->link_before) && !stristr($args->link_before, '<span class="submenu-wrap">'))
            $args->link_before .= ' <span class="submenu-wrap">';
        else
            $args->link_before = '<span class="submenu-wrap">';

        if (isset($args->link_after) && !stristr($args->link_after, '</span>'))
            $args->link_after .= ' </span>';
        else
            $args->link_after = '</span>';
    }
    return $args;
}
