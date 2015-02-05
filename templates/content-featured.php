<?php
/**
 * Caption Theme content-featured.php
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
 * @subpackage Caption Theme
 * @see        References to other sections (if any)...
 */
/**
 * Description for global
 * @global unknown 
 */
global $post, $theme_namespace;
$grid_values = at_responsive_get_content_grid_values();
$grid_classes = at_responsive_get_content_grid_classes();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("col-md-{$grid_values['featured']} col-xs-{$grid_values['full']} {$grid_classes['featured']}"); ?> role="main">
    <div class="layout-wrapper">
        <div class="content-wrapper">
            <div class="row inner-content-row">
                <div class="col-md-3 col-sm-3 col-xs-5">
                    <div class="entry-header">
                        <div class="post-thumbnail">
                            <?php at_responsive_post_thumbnail(); ?>
                        </div>
                        <div class="entry-meta hidden-xs">
                            <?php echo at_responsive_post_entry(); ?>
                        </div>
                    </div>            
                </div>
                <div class="col-md-9 col-sm-9 col-xs-7">
                    <?php at_responsive_post_title('<span class="overflow-ellipsis-xs">' . get_the_title() . '</span>'); ?>
                    <div class="entry-content">
                        <?php at_responsive_post_excerpt(); ?>
                        <div style="width:100%; height: 0px; clear: both;"></div>
                    </div>
                </div>
                <div class="entry-meta col-xs-12 hidden-xs">
                    <?php at_responsive_post_meta(); ?>
                </div>
            </div>
            <?php #at_responsive_post_social_sharing(); ?>
            <?php if (!is_preview() && !at_responsive_is_customizer()) at_responsive_post_addthis(); ?>
        </div>
    </div>
</article>
