<?php
/**
 * Freelance Theme footer.php
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
/**
 * Description for global
 * @global object 
 */
global $at_theme_custom;
?>
<!-- Beginning of footer content -->
<footer id="footer" role="contentinfo">
    <div class="container">
        <?php
        $at_address = $at_theme_custom->get_address();
        $at_phone = $at_theme_custom->get_phone();
        if ($at_address || $at_phone) :
            ?>
            <ul class="address row">
                <?php if ($at_phone) echo "<li class=\"\">$at_phone</li>"; ?>
                <?php if ($at_address) echo "<li class=\"location\">$at_address</li>"; ?>
                <?php
                $gmap_link = $at_theme_custom->get_gmap_link();
                if ($gmap_link) :
                    ?>
                    <li class="no-border-g-map"><a class="google-map" href="<?php echo $gmap_link; ?>" target="_blank">Get Google Map</a></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
        <?php
        if (has_nav_menu('footer-menu')) :
            at_responsive_menu('footer-menu', 'footer-menu', 'copyright-text', false, 1, '');
        endif;
        ?>
    </div>
    <!-- Bottom Gap for Scroll to Top -->
    <div id="bottom-push" class="hidden"></div>
</footer>
<!-- End of footer content -->
<!-- Back to Top -->
<!-- child of the body tag -->
<div id="top-link-block" class="hidden container">
    <div class="row">
        <div class="col-md-2 col-md-offset-5 col-xs-12 top-link-col">
            <a href="#top" class="well well-md" id="scroll-to-top">
                <i class="glyphicon glyphicon-chevron-up"></i> Top
            </a>
        </div>
    </div>
</div><!-- /top-link-block -->
<script type="text/javascript">
    (function($) {
        // Only enable if the document has a long scroll bar
        // Note the window height + offset
        if (($(window).height() + 100) < $(document).height()) {
            $('#bottom-push').removeClass('hidden');
            $('#top-link-block').removeClass('hidden').affix({
                // how far to scroll down before link "slides" into view
                offset: {top: 100}
            });
        }
        $('#scroll-to-top').click(function(e) {
            e.preventDefault();
            $('html,body').animate({scrollTop: 0}, 'slow');
            return false;
        })
    })(jQuery);
</script>
<!-- /Back to Top -->
<?php wp_footer(); ?>
</body>
</html>
