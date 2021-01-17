<?php
$product_cats = get_terms( [ 'taxonomy' => 'product_cat', 'number' => 999 ] );
$product_tags = get_terms( [ 'taxonomy' => 'product_tag', 'number' => 10 ] );
?>
<div class="header-middle">
    <div class="container">
        <div class="header-left">
            <button class="mobile-menu-toggler" type="button">
                <i class="icon-menu"></i>
            </button>
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			} else {
				?>
                <a class="navbar-brand logo" href="<?php echo site_url(); ?>">
					<?php echo get_bloginfo( 'blogname' ); ?>
                </a>
				<?php
			}
			?>
        </div>

        <div class="header-center">
            <div class="header-search">
                <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                <form action="<?php echo site_url(); ?>" method="get">
                    <div class="header-search-wrapper">
                        <input type="hidden" name="post_type" value="product">
                        <input type="search" class="form-control" name="s" id="q"
                               placeholder="I'm searching for..." required
                               value="<?php echo isset( $_GET['s'] ) ? $_GET['s'] : ''; ?>">
                        <div class="select-custom">
                            <select id="cat" name="cat">
                                <option value="">All Categories</option>
								<?php
								if ( is_array( $product_cats ) && ! empty( $product_cats ) ):
									foreach ( $product_cats as $product_cat ):
										?>
                                        <option value="<?php echo esc_attr( $product_cat->term_id ); ?>">
											<?php echo esc_html( $product_cat->name ); ?>
                                        </option>
									<?php
									endforeach;
								endif;
								?>
                            </select>
                        </div><!-- End .select-custom -->
                        <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                    </div><!-- End .header-search-wrapper -->
                </form>
            </div><!-- End .header-search -->

            <div class="links">
				<?php
				if ( is_array( $product_tags ) && ! empty( $product_tags ) ):
					foreach ( $product_tags as $product_tag ) :
						?>
                        <a href="<?php echo esc_url( get_term_link( $product_tag ) ); ?>">
							<?php echo esc_html( $product_tag->name ); ?>
                        </a>
					<?php
					endforeach;
				endif;
				?>
            </div>
        </div><!-- End .headeer-center -->

        <div class="header-right">
            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'My Account' ) ) ); ?>">
                <div class="header-user">
                    <i class="icon-user-2"></i>
					<?php if ( is_user_logged_in() ): ?>
                        <div class="header-userinfo">
                            <span>Hello!</span>
                            <h4>
								<?php echo esc_html( wp_get_current_user()->display_name ); ?>
                            </h4>
                        </div>
					<?php endif; ?>
                </div>
            </a>

            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Wishlist' ) ) ); ?>" class="advance-icon">
                <i class="icon icon-heart"></i>
            </a>

			<?php get_template_part( '/template-parts/header/cart' ); ?>

        </div><!-- End .header-right -->
    </div><!-- End .container -->
</div><!-- End .header-middle -->