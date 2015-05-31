<?php
/**
 * Freelance Theme header.php
 * 
 * PHP version 5
 * 
 * @category   Theme Template File 
 * @package    WordPress
 * @author     ArsTropica <info@arstropica.com> 
 * @copyright  2014 ArsTropica 
 * @license    http://opensource.org/licenses/gpl-license.php GNU Public License 
 * @version    1.0 
 * @link       http://pear.php.net/package/ArsTropica  Reponsive Framework
 * @subpackage Freelance Theme
 * @see        References to other sections (if any)...
 */
?>
<?php
/**
 * Description for global
 * @global unknown 
 */
global $pagename, $at_theme_custom, $theme_namespace;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="HandheldFriendly" content="True">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
        <!--[if IE 9]>
        <meta http-equiv="X-UA-Compatible" content="IE=9">
        <![endif]-->

        <script type="text/javascript">var addthis_config = {"data_track_addressbar": false};</script>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="<?php echo template_url; ?>/lib/assets/js/html5shiv.min.js"></script>
        <script src="<?php echo template_url; ?>/lib/assets/js/respond.min.js"></script>
        <![endif]-->

        <?php wp_head(); ?>
    </head>
    <?php
    $sticky_nav = $at_theme_custom->get_option('settings/stickynav');
    $typeahead_data = at_responsive_get_typeahead();
    $at_phone_number = $at_theme_custom->get_phone();
    ?>
    <body <?php echo at_responsive_body_id(); ?> <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/Blog">
        <header role="banner">
            <!-- Beginning of desktop header content -->
            <div class="header-wrapper container-fluid hidden-xs">
                <div class="at_responsive_hero">
                    <?php do_action('at_responsive_hero'); ?>
                </div>
            </div>
            <!-- End of desktop header content -->
            <!-- Beginning of mobile header content -->
            <div class="header-wrapper container-full visible-xs-block">
                <ul class="mobile-header-content row">
                    <li class="md-col-12"><?php echo $at_theme_custom->mobile_header_logo(42); ?></li>
                    <?php if ($at_phone_number) : ?><li class="md-col-12"><a class="phone-mobile" href="#"><?php echo $at_phone_number; ?></a></li><?php endif; ?>
                    <?php do_action('at_responsive_mobile_contact'); ?>
                </ul>
            </div>
            <!-- End of mobile header content -->
            <nav class="navbar navbar-inverse <?php echo $sticky_nav ? 'navbar-fixed-top' : ''; ?>" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <div class="navbar-highlight visible-xs">
                            <button type="button" class="navbar-toggle btn-square" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-highlight navbar-right visible-xs">
                            <button type="button" class="btn-square search-button" data-toggle="collapse" data-target=".search-navbar-collapse">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                        <!--Hidden for Spacing Reasons-->
                        <!--<div class="navbar-highlight highlight-wide navbar-right visible-xs">
                        <button type="button" class="btn-square share-button" data-toggle="collapse" data-target=".share-navbar-collapse">
                        <i class="icon-facebook-open iconf"></i>
                        <i class="icon-twitter-open iconf"></i>
                        <i class="icon-gplus-open iconf"></i>
                        </button>
                        </div>-->
                        <a class="navbar-brand visible-xs" href="#"><?php echo strtoupper(at_responsive_get_page_title($pagename)); ?></a>
                    </div>    
                </div>
                <div class="container nav-container">
                    <div class="navbar-body row">
                        <div class="navbar-layout layout-top navbar-layout col-md-8 col-sm-12">
                            <div class="collapse navbar-collapse navbar-left">
                                <?php
                                if (has_nav_menu('header-menu')) :

                                    at_responsive_menu('header-menu', 'nav', 'nav navbar-nav yamm');

                                else :
                                    ?>

                                    <ul class="nav navbar-nav" id="nav">

                                        <?php wp_list_pages(array('title_li' => '', 'depth' => 1, 'walker' => new at_responsive_menu_walker())); ?>

                                    </ul>

                                <?php endif; ?>
                            </div><!--/.nav-collapse -->
                        </div>
                        <div class="navbar-icons navbar-layout col-md-4 navbar-right">
                            <ul class="nav navbar-nav navbar-right icon-button navbar-icon navbar-search yamm hidden-xs">
                                <!-- Forms -->
                                <li class="search-dropdown dropdown yamm-fw">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </a>
                                    <ul class="dropdown-menu fixed" role="menu">
                                        <li>
                                            <div class="submenu-wrap">
                                                <form class="navbar-form navbar-right navbar-search-form" role="search" method="get" id="nav-search-form" action="<?php echo home_url('/'); ?>">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input name="s" id="s" type="text" class="search-query form-control" autocomplete="off" placeholder="<?php _e('Search', $theme_namespace); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
                                                            <div class="input-group-btn">
                                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul><!--/.navbar-search -->
                            <ul class="nav navbar-nav navbar-right icon-button navbar-icon navbar-share yamm hidden-xs">
                                <!-- Forms -->
                                <li class="share-dropdown dropdown yamm-fw">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                        <i class="icon-facebook-open iconf"></i>
                                        <i class="icon-twitter-open iconf"></i>
                                        <i class="icon-gplus-open iconf"></i>
                                    </a>
                                    <ul class="dropdown-menu fixed" role="menu">
                                        <li>
                                            <div class="submenu-wrap">
                                                <?php if (!is_preview() && !at_responsive_is_customizer()) at_responsive_site_addthis(); ?>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul><!--/.navbar-share -->
                            <?php
                            if ($at_phone_number) :
                                ?>
                                <ul class="nav navbar-nav navbar-right icon-button navbar-icon navbar-phone hidden-xs">
                                    <li class="dropdown"><a title="Phone Number" href="#" onclick="javascript:void(0);
                    return false;"><?php echo $at_phone_number; ?></a></li>
                                </ul><!--/.navbar-phone -->
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="collapse search-navbar-collapse">
                        <form class="navbar-form navbar-right navbar-search-form" role="search" method="get" id="mobile-nav-search-form" action="<?php echo home_url('/'); ?>">
                            <div class="form-group">
                                <div class="input-group">
                                    <input name="s" id="s" type="text" class="search-query form-control" autocomplete="off" placeholder="<?php _e('Search', $theme_namespace); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!--/.search-nav-collapse -->
                </div>
            </nav>
        </header>
