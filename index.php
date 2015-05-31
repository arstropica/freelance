<?php
/**
 * Freelance Theme index.php
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
get_header();
?>

<!-- Beginning of main content -->
<?php
/**
 * Description for global
 * @global object 
 */
global $wp_query;
?>
<div class="container">
    <div class="row widgets-row widget-area loop-start">
        <?php
        do_action('at_responsive_loop_start');
        ?>
    </div>
</div><!--!#container - loop start-->

<?php
$post_count = 0;
$grid_column_count = at_responsive_grid_column_count();
if (have_posts()) :
    ?>
    <div class="container main">
        <?php
        // Start the Loop.
        while (have_posts()) : the_post();
            if ($post_count % $grid_column_count === 0) {
                echo '<div class="row content-row eq-parent post-wrapper">' . "\n";
            }
            /*
             * Include the post template for the content. 
             */
            at_responsive_get_template_part('templates/content', $post->post_name);

            if (($post_count % $grid_column_count === ($grid_column_count - 1)) || ($wp_query->post_count == ($post_count + 1))) {
                echo '</div>' . "\n";
            }
            $post_count ++;
        endwhile;
        ?>
        <!--Previous/next post navigation.-->
    </div><!--!#container - main-->
    <div class="container main">
        <div class="row content-row">
            <?php
            do_action('at_responsive_after_entry');
            ?>
        </div>
        <?php
        at_responsive_pagination();
        ?>
    </div><!--!#container - main-->
    <?php
else :
    // If no content, include the "No posts found" template.
    ?>
    <div class="container main">
        <div class="row content-row post-wrapper">
            <?php
            get_template_part('templates/content', 'none');
            ?>
        </div>
    </div><!--!#container - main-->
<?php
endif;
?>
<div class="container">
    <div class="row widgets-row widget-area loop-end">
        <?php
        do_action('at_responsive_loop_end');
        ?>
    </div>
</div><!--!#container-->
<!-- End of main content -->

<!-- Beginning of sidebar content -->
<?php get_sidebar(); ?>
<!-- End of sidebar content -->
<?php get_footer(); ?>
