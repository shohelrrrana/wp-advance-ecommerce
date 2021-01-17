;(function ($) {

    const ajaxUrl = paths.ajaxUrl;

    function productQuickView() {
        const productId = $(this).data('product_id');

        $.ajax({
            type: "GET",
            dataType: "html",
            url: ajaxUrl,
            data: {action: "product_quick_view_popup", product_id: productId},
            beforeSend: function () {
                $('.loading').addClass('show');
            },
            success: function (popup) {
                $(document.body).hide().prepend(popup).fadeIn();
                $('.loading').removeClass('show');

                $('.product-quick-view .owl-carousel').owlCarousel({
                    items: 1,
                    nav: !0,
                    navText: ['<i class="icon-angle-left">', '<i class="icon-angle-right">'],
                    dots: true,
                    dotsContainer: "#carousel-custom-dots",
                    autoplay: !1,
                    slideBy: 2,
                });

            }
        });
    }

    function closePopup(e) {
        e.preventDefault();
        $('.popup-wrapper').fadeOut();
    }

    function addToCart() {
        const productId = $(this).data('product_id');
        const url = ajaxUrl;
        const addToCartBtn = $(this);

        addToCartBtn.hide();
        addToCartBtn.parent().find('.added-cart').fadeIn();

        headerCart();
        headerCart();

        $.ajax({
            type: "GET",
            dataType: "html",
            url: url,
            data: {action: "add_to_cart_popup", product_id: productId},
            beforeSend: function () {
                $('.loading').addClass('show');
            },
            success: function (popup) {
                $(document.body).prepend(popup).hide().fadeIn();
                $('.loading').removeClass('show');
            }
        });
    }

    function headerCart() {
        $.ajax({
            type: "GET",
            url: ajaxUrl,
            data: {action: "header_cart"},
            success: function (headerCart) {
                $('.cart-dropdown').replaceWith(headerCart);
            }
        });
    }

    function increaseQuantity() {
        $(this).css('user-select', 'none');
        let quantity = $(this).parent().find('.quantity');
        let currentValue = parseInt(quantity.val());

        if (currentValue < 10) {
            quantity.val(currentValue + 1);
            $('.product-single-container .add_to_cart_button').attr('data-quantity', currentValue + 1);
        }
    }

    function decreaseQuantity() {
        $(this).css('user-select', 'none');
        let quantity = $(this).parent().find('.quantity');
        let currentValue = parseInt(quantity.val());

        if (currentValue > 1) {
            quantity.val(currentValue - 1);
            $('.product-single-container .add_to_cart_button').attr('data-quantity', currentValue - 1);
        }
    }

    function removeCartItem(e) {
        e.preventDefault();
        const cartItem = $(this).closest('.product');
        const product_id = $(this).data('product_id');
        const cart_item_key = $(this).data('cart_item_key');
        $.ajax({
            type: "POST",
            dataType: "json",
            url: ajaxUrl,
            data: {action: "remove_cart_item", cart_item_key: cart_item_key},
            success: function (cart) {
                if (cart.remove_cart_item) {
                    cartItem.fadeOut();
                    $('.cart-dropdown .cart-count').text(cart.cart_contents_count);
                    $('.cart-dropdown .dropdown-cart-header span').text(cart.cart_contents_count);
                    $('.cart-dropdown .cart-total-price').html(cart.cart_total);
                }
            }
        });
    }

    $(document.body).on('click', '.btn-quickview', productQuickView);

    $(document.body).on('click', '.close-popup', closePopup);

    $(document.body).on('click', '.ajax_add_to_cart', addToCart);

    $(document.body).on('click', '.product-single-qty .increase', increaseQuantity);

    $(document.body).on('click', '.product-single-qty .decrease', decreaseQuantity);

    $(document.body).on('click', '.cart-dropdown .btn-remove', removeCartItem);

    $(document.body).on('click', '.config-size-list li a', function (e) {
        e.preventDefault();
        const value = $(this).text();
        $(this).parent().parent().find('#attribute_size').val(value);
    });

    $(document.body).on('click', '.config-swatch-list li a', function (e) {
        e.preventDefault();
        $('.config-swatch-list li').removeClass('active');
        $(this).parent().addClass('active');
        const value = $(this).text();
        $(this).parent().parent().find('#attribute_color').val(value);
    });

    $(document.body).on('click', '.product-single-container .ajax_add_to_cart', function (e) {
        $(this).css('user-select', 'none');
        $(this).attr('disabled', true);
        $(this).hide();
        $(this).parent().find('.added-cart').fadeIn();
    })

    $(document.body).on('click', '.menu-depart .submenu a', function (e) {
        window.location.href = $(this).attr('href');
    })

    $('.woocommerce-checkout .col-1').removeClass('col-1');
    $('.woocommerce-checkout .col-2').removeClass('col-2');

})(jQuery)