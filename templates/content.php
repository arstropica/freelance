<?php
/**
 * Freelance Theme content.php
 * 
 * PHP version 5
 * 
 * @category   Theme Template 
 * @package    WordPress
 * @author     ArsTropica <info@arstropica.com> 
 * @copyright  2014 ArsTropica 
 * @license    http://opensource.org/licenses/gpl-license.php GNU Public License 
 * @version    1.0 
 * @link       http://pear.php.net/package/ArsTropica  Reponsive Framework
 * @subpackage Freelance Theme
 * @see        References to other sections (if any)...
 */
/**
 * Description for global
 * @global unknown 
 */
global $post, $theme_namespace;
$content_type = at_responsive_wp_content_type();
$layout_type = at_responsive_wp_template_type();
$grid_values = at_responsive_get_content_grid_values();

switch ($layout_type) {
    // Non-Static Homepage Post Entry
    case 'front_page' :
    case 'home' :
    default : {
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class("col-md-{$grid_values['home']}"); ?> itemtype="http://schema.org/BlogPosting" itemprop="blogPost" role="main">
                <div class="layout-wrapper">
                    <div class="content-wrapper eq-height">
                        <div class="entry-header">
                            <div class="entry-meta">
                                <?php echo at_responsive_post_entry(); ?>
                            </div>
                            <div class="post-thumbnail">
                                <?php at_responsive_post_thumbnail(); ?>
                            </div>
                            <?php at_responsive_post_title(); ?>
                        </div>            
                        <div class="entry-content" itemprop="text">
                            <?php at_responsive_post_excerpt(); ?>
                            <div style="width:100%; height: 0px; clear: both;"></div>
                        </div>
                        <div class="entry-meta">
                            <?php at_responsive_post_meta(); ?>
                        </div>
                        <?php #at_responsive_post_social_sharing();  ?>
                        <?php if (!is_preview() && !at_responsive_is_customizer()) at_responsive_post_addthis(); ?>
                    </div>
                </div>
            </article>

            <?php
            break;
        }
    case 'search' :
    case 'date' :
    case 'archive' : {
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class("col-md-{$grid_values['archive']}"); ?> itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
                <div class="layout-wrapper">
                    <div class="content-wrapper eq-height">
                        <div class="row">
                            <div class="entry-header col-md-6">
                                <div class="entry-meta">
                                    <?php echo at_responsive_post_entry(); ?>
                                </div>
                                <div class="post-thumbnail">
                                    <?php at_responsive_post_thumbnail(); ?>
                                </div>
                            </div>
                            <div class="entry-content col-md-6">
                                <?php at_responsive_post_title(); ?>
                                <?php at_responsive_post_excerpt(); ?>
                                <div style="width:100%; height: 0px; clear: both;"></div>
                            </div>
                            <div class="entry-meta col-md-12">
                                <?php at_responsive_post_meta(); ?>
                            </div>
                            <?php if (!is_preview() && !at_responsive_is_customizer()) at_responsive_post_addthis(); ?>
                        </div>
                    </div>
                </div>
            </article>
            <?php
            break;
        }
    case 'singular' : {
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class("col-md-{$grid_values['single']}"); ?> itemtype="http://schema.org/BlogPosting" itemprop="blogPost" role="main">
                <div class="layout-wrapper">
                    <div class="content-wrapper">
                        <div class="entry-header row">
                            <div class="entry-heading col-sm-7">
                                <?php at_responsive_post_title(); ?>
                            </div>
                            <div class="entry-share col-sm-5">
                                <?php at_responsive_post_sharing(); ?>
                            </div>
                        </div>
                        <div class="entry-meta row">
                            <div class="col-md-12">
                                <?php echo at_responsive_post_entry(); ?>
                            </div>
                        </div>
                        <div class="entry-content" itemprop="text">
                            <?php
                            the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', $theme_namespace));
                            wp_link_pages(array(
                                'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', $theme_namespace) . '</span>',
                                'after' => '</div>',
                                'link_before' => '<span>',
                                'link_after' => '</span>',
                            ));
                            ?>
                            <div style="width:100%; height: 0px; clear: both;"></div>
                        </div><!-- .entry-content -->
                        <footer class="entry-meta">
                            <?php at_responsive_post_meta(); ?>
                        </footer>
                    </div>
                </div>
            </article>
            <?php
            break;
        }
    case '404' : {
            ?>
            <article id="post-404" class="<?php echo "col-md-{$grid_values['single']}"; ?> post-404" itemtype="http://schema.org/BlogPosting" itemprop="blogPost" role="main">
                <div class="layout-wrapper">
                    <div class="content-wrapper">
                        <div class="entry-header row">
                            <div class="entry-heading col-sm-12">
                                <h1 class="entry-title" itemprop="headline"><span><?php _e('Nothing Found for "' . get_search_query() . '"', $theme_namespace); ?></span></h1>
                            </div>
                        </div>
                        <div class="entry-content" itemprop="text">
                            <?php locate_template('/templates/404.php', true, false); ?>
                        </div><!-- .entry-content -->
                    </div>
                </div>
            </article>
            <?php
            break;
        }
}
?>