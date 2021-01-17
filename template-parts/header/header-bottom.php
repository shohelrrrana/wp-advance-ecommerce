<?php
$product_cats = get_terms( [ 'taxonomy' => 'product_cat', 'number' => 10 ] );
$header_menu  = get_nav_menu_items_by_location( 'HEADER_MENU' );
?>
<div class="header-bottom">
    <div class="container">
        <nav class="main-nav">
            <div class="menu-depart">
                <a href="">
                    <i class="icon-menu"></i>
					<?php _e( 'Shop by Category', 'advance-ecommerce' ); ?>
                </a>
                <div class="submenu <?php echo is_front_page() ? 'opened' : ''; ?>">
                    <a href="<?php echo site_url(); ?>">
                        <i class="icon-category-home"></i>
						<?php _e( 'Home', 'advance-ecommerce' ); ?>
                    </a>
					<?php
					if ( is_array( $product_cats ) && ! empty( $product_cats ) ):
						foreach ( $product_cats as $product_cat ) :
							$thumbnail_id = get_term_meta( $product_cat->term_id, 'thumbnail_id', true );
							$image_url = wp_get_attachment_url( $thumbnail_id );
							?>
                            <img src="<?php echo esc_url( $image_url ); ?>" alt="">
                            <a href="<?php echo esc_url( get_term_link( $product_cat ) ); ?>">
								<?php echo esc_html( $product_cat->name ); ?>
                            </a>
						<?php
						endforeach;
					endif;
					?>
                </div>
            </div>
            <ul class="menu">
				<?php
				foreach ( $header_menu as $menu_item ) :
					$child_menu_items = get_child_menu_items( $header_menu, $menu_item->ID );
					if ( empty( $child_menu_items ) && intval( $menu_item->menu_item_parent ) === 0 ):
						?>
                        <li>
                            <a href="<?php echo esc_url( $menu_item->url ) ?>">
								<?php echo esc_html( $menu_item->title ) ?>
                            </a>
                        </li>
					<?php
                    elseif ( ! empty( $child_menu_items ) ):
						?>
                        <li class="sf-with-ul">
                            <a href="<?php echo esc_url( $menu_item->url ) ?>">
								<?php echo esc_html( $menu_item->title ) ?>
                            </a>
                            <ul>
								<?php foreach ( $child_menu_items as $child_menu_item ) : ?>
                                    <li>
                                        <a href="<?php echo esc_url( $child_menu_item->url ) ?>">
											<?php echo esc_html( $child_menu_item->title ) ?>
                                        </a>
                                    </li>
								<?php endforeach; ?>
                            </ul>
                        </li>
					<?php endif; ?>
				<?php endforeach; ?>
            </ul>
        </nav>

    </div><!-- End .header-bottom -->
</div><!-- End .header-bottom -->