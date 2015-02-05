<?php
/**
 * Caption Theme searchform.php
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
/**
 * Description for global
 * @global unknown 
 */
global $theme_namespace;
?>
<form action="<?php echo home_url('/'); ?>" method="get" class="form-inline">
    <fieldset>
        <div class="input-group">
            <input type="text" name="s" id="search" placeholder="<?php _e("Search", $theme_namespace); ?>" value="<?php the_search_query(); ?>" class="form-control" />
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default"><?php _e("Search", $theme_namespace); ?></button>
            </span>
        </div>
    </fieldset>
</form>