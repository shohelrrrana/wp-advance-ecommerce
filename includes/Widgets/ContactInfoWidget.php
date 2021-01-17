<?php

namespace Theme\Widgets;

// Adds widget: Contact Info
class ContactInfoWidget extends \WP_Widget {

	function __construct () {
		parent::__construct(
			'contactinfo_widget',
			esc_html__( 'Contact Info', 'advance-ecommerce' ),
			array( 'description' => esc_html__( 'Contact Information', 'advance-ecommerce' ), ) // Args
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Address',
			'id'    => 'address',
			'type'  => 'text',
		),
		array(
			'label' => 'Email',
			'id'    => 'email',
			'type'  => 'text',
		),
		array(
			'label' => 'Phone',
			'id'    => 'phone',
			'type'  => 'text',
		),
		array(
			'label' => 'Working Days',
			'id'    => 'working_days',
			'type'  => 'text',
		),
		array(
			'label' => 'Facebook Link',
			'id'    => 'facebook_ink',
			'type'  => 'text',
		),
		array(
			'label' => 'Twitter Link',
			'id'    => 'twitter_ink',
			'type'  => 'text',
		),
		array(
			'label' => 'Linkedin Link',
			'id'    => 'linkedin_ink',
			'type'  => 'text',
		),
	);

	public function widget ( $args, $instance ) {
		echo $args['before_widget'];
		// Output
		?>
        <div class="row row-sm">
            <div class="col-sm-6">
                <div class="contact-widget">
                    <h4 class="widget-title">
						<?php _e( 'ADDRESS', 'advance-ecommerce' ); ?>
                    </h4>
                    <a href="#">
						<?php echo esc_html( $instance['address'] ); ?>
                    </a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="contact-widget email">
                    <h4 class="widget-title">
						<?php _e( 'EMAIL', 'advance-ecommerce' ); ?>
                    </h4>
                    <a href="mailto:<?php echo esc_attr( $instance['email'] ); ?>">
						<?php echo esc_html( $instance['email'] ); ?>
                    </a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="contact-widget">
                    <h4 class="widget-title">
						<?php _e( 'PHONE', 'advance-ecommerce' ); ?>
                    </h4>
                    <a href="tel:<?php echo esc_attr( $instance['phone'] ); ?>">
						<?php echo esc_html( $instance['phone'] ); ?>
                    </a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="contact-widget">
                    <h4 class="widget-title">
						<?php _e( 'WORKING DAYS/HOURS', 'advance-ecommerce' ); ?>
                    </h4>
                    <a href="#">
						<?php echo esc_html( $instance['working_days'] ); ?>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="social-icons mb-3">
                    <a href="<?php echo esc_url( $instance['facebook_ink'] ); ?>" class="social-icon" target="_blank">
                        <i class="fa fa-facebook-f"></i>
                    </a>
                    <a href="<?php echo esc_url( $instance['twitter_ink'] ); ?>" class="social-icon" target="_blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="<?php echo esc_url( $instance['linkedin_ink'] ); ?>" class="social-icon" target="_blank">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div><!-- End .social-icons -->
            </div>
        </div>
		<?php

		echo $args['after_widget'];
	}

	public function field_generator ( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset( $widget_field['default'] ) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[ $widget_field['id'] ] ) ? $instance[ $widget_field['id'] ] : esc_html__( $default, 'advance-ecommerce' );
			switch ( $widget_field['type'] ) {
				default:
					$output .= '<p>';
					$output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '">' . esc_attr( $widget_field['label'], 'advance-ecommerce' ) . ':</label> ';
					$output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field['id'] ) ) . '" type="' . $widget_field['type'] . '" value="' . esc_attr( $widget_value ) . '">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form ( $instance ) {
		$this->field_generator( $instance );
	}

	public function update ( $new_instance, $old_instance ) {
		$instance = array();
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[ $widget_field['id'] ] = ( ! empty( $new_instance[ $widget_field['id'] ] ) ) ? strip_tags( $new_instance[ $widget_field['id'] ] ) : '';
			}
		}
		return $instance;
	}
}