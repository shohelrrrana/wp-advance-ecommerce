<?php
/**
 * Template for entry Cpntent
 *
 * @package advance-ecommerce
 */
?>
<div class="card-body entry-content mb-3">
	<?php
	if ( is_home() ) {
		if ( has_excerpt( get_the_ID() ) ) {
			the_excerpt();
		} else {
			echo substr( get_the_content(), 0, 255 );
		}
	} else {
		the_content();
	}
	?>
</div>