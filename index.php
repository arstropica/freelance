<?php
/**
 * Caption Theme index.php
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
 * @subpackage Caption Theme
 * @see        References to other sections (if any)...
 */
?>
<?php
get_header();
?>

<!-- Beginning of main content -->
<?php
/**
 * Description for global
 * @global object 
 */
global $wp_query, $post;
?>
<?php
$post_count = 0;
$grid_column_count = at_responsive_grid_column_count();
$grid_values = at_responsive_get_content_grid_values();
$grid_classes = at_responsive_get_content_grid_classes();
?>
<div class="container main">
    <div class="layout-row row">
        <div class="layout-column main col-md-<?php echo $grid_values['row']; ?> <?php echo $grid_classes['row']; ?>">
            <div class="row widgets-row widget-area loop-start">
                <?php
                do_action('at_responsive_loop_start');
                ?>
            </div><!--!widgets-row-->
            <?php if (have_posts()) : ?>
                <div class="row content-row post-wrapper">
                    <?php
                    // Start the Loop.
                    while (have_posts()) : the_post();
                        if ($post_count % $grid_column_count === 0) {
                            // Silence
                        }
                        /*
                         * Include the post template for the content. 
                         */
                        at_responsive_get_template_part('templates/content', $post->post_name);

                        if (($post_count % $grid_column_count === ($grid_column_count - 1)) || ($wp_query->post_count == ($post_count + 1))) {
                            // Silence
                        }
                        $post_count ++;
                    endwhile;
                    ?>
                </div><!--!.content-row-->
                <div class="row content-row">
                    <?php
                    do_action('at_responsive_after_entry');
                    ?>
                </div><!--!.content-row-->
                <?php
                at_responsive_pagination();
            else :
                // If no content, include the "No posts found" template.
                ?>
                <div class="row content-row post-wrapper">
                    <?php
                    get_template_part('templates/content', 'none');
                    ?>
                </div><!--!.content-row-->
            <?php endif; ?>
            <div class="row widgets-row widget-area loop-end">
                <?php do_action('at_responsive_loop_end'); ?>
            </div><!--!.widgets-row-->
            <!-- End of main content -->
        </div><!--!.layout-column-->

        <!-- Beginning of sidebar content -->
        <?php get_sidebar(); ?>
        <!-- End of sidebar content -->
    </div><!--!.layout-row-->
</div><!--!#container - main-->

<?php get_footer(); ?>