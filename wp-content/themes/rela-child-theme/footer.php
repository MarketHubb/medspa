<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rela
 */

do_action('rela_main_footer');

wp_footer(); ?>
<div id="site-data" data-url="<?php echo get_home_url(); ?>"></div>

</body>
</html>