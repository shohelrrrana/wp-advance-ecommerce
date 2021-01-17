<?php
    /**
     * Template for entry Footer
     *
     * @package advance-ecommerce
     */
    if(is_single() || ! is_home()){
        return;
    }
?>
<div class="card-footer entry-footer">
    <a href="<?php echo get_the_permalink(); ?>" class="readmore btn btn-sm btn-light my-3">
        <?php _e('Read More', 'advance-ecommerce'); ?>
    </a>
</div>