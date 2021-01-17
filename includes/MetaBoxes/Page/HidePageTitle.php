<?php

namespace Theme\MetaBoxes\Page;

use Theme\Traits\Singleton;

/**
 * Class HidePageTitle for hide page title
 * @package Theme\MetaBoxes\Page
 */
class HidePageTitle {
	use Singleton;

	public function __construct () {
		add_action( 'add_meta_boxes', [ $this, 'register_meta_box' ] );
		add_action( 'save_post', [ $this, 'save_hide_page_title_meta' ] );
	}

	/**
	 * Register a meta box on add_meta_box hook
	 *
	 * @return void
	 */
	public function register_meta_box () {
		add_meta_box( 'hide_page_title', 'Hide page title', [ $this, 'meta_input' ], 'page', 'side', 'high' );
	}

	/**
	 * Meta input
	 *
	 * @param $post
	 */
	public function meta_input ( $post ) {
		$hide_page_title = get_post_meta( $post->ID, 'hide_page_title', true );

		if ( ! isset( $hide_page_title ) ) {
			add_post_meta( $post->ID, 'hide_page_title', '', false );
		}

		$checked = ( $hide_page_title == 'yes' ) ? 'checked="checked"' : '';

		?>
        <label class="components-base-control__label" for="hide_page_title">
            <input type="checkbox" name="hide_page_title" value="yes" <?php echo $checked; ?> />
            &nbsp;
            Hide Page Title
        </label>

		<?php
	}


	/**
	 * Save the meta input
	 *
	 * @param $post_ID
	 */
	public function save_hide_page_title_meta ( $post_ID ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

		if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
			update_post_meta( $post_ID, 'hide_page_title', strip_tags( $_POST['hide_page_title'] ) );
		}
	}

}