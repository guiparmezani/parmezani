<?php
/**
 * Footer template.
 *
 * @package Parmezani
 */

$defaults = parmezani_home_defaults();
$footer   = parmezani_group_field( 'home_footer', $defaults['footer'] );
?>
</main>
<footer class="site-footer">
	<p><?php echo esc_html( parmezani_text_value( $footer['left_text'] ?? '', $defaults['footer']['left_text'] ) ); ?></p>
	<p><?php echo esc_html( parmezani_text_value( $footer['right_text'] ?? '', $defaults['footer']['right_text'] ) ); ?></p>
</footer>
<?php wp_footer(); ?>
</body>
</html>
