(function ($) {
	"use strict";

	var $document = $(document);

	wooQuantityButtons();
	addToCartAjaxButton();
	addToWishlist();

	function wooQuantityButtons() {
		var forms = jQuery(".woocommerce-cart-form, form.cart");
		forms.find(".quantity.hidden").prev(".quantity__button").hide();
		forms.find(".quantity.hidden").next(".quantity__button").hide();

		$document.on(
			"click",
			"form.cart .quantity__button, .woocommerce-cart-form .quantity__button",
			function () {
				var $this = $(this);

				// Get current quantity values
				var qty = $this.closest(".quantity").find(".qty");
				var val = qty.val() == "" ? 0 : parseFloat(qty.val());
				var max = parseFloat(qty.attr("max"));
				var min = parseFloat(qty.attr("min"));
				var step = parseFloat(qty.attr("step"));

				// Change the value if plus or minus
				if ($this.is(".quantity__plus")) {
					if (max && max <= val) {
						qty.val(max).change();
					} else {
						qty.val(val + step).change();
					}
				} else {
					if (min && min >= val) {
						qty.val(min).change();
					} else if (val >= 1) {
						qty.val(val - step).change();
					}
				}
			}
		);
	}

	function addToCartAjaxButton() {
		$document.on("click", ".add_to_cart_button", function (e) {
			var _this = $(this);
			_this.closest(".product.type-product").addClass("cart-clicked");

			// Return if add to cart redirect is enabled
			if (
				typeof wc_add_to_cart_params == "undefined" ||
				wc_add_to_cart_params.cart_redirect_after_add == "yes"
			)
				return;
			$("body").on("added_to_cart", function () {
				setTimeout(function () {
					_this.next(".added_to_cart").addClass("button");
					_this
						.next(".added_to_cart")
						.html(
							'<span class="amela-product__action-icons-label">'.concat(
								wc_add_to_cart_params.i18n_view_cart,
								'</span><i class="amela-icon-check" aria-hidden="true"></i>'
							)
						);
				}, 100);
			});
		});
	}

	function addToWishlist() {
		$document.on("added_to_wishlist removed_from_wishlist", function () {
			$.get(
				yith_wcwl_l10n.ajax_url,
				{
					action: "yith_wcwl_update_wishlist_count",
				},
				function (data) {
					if (0 === data.count) {
						$(".amela-menu-wishlist__count").addClass("d-none");
					} else {
						$(".amela-menu-wishlist__count").removeClass("d-none");
					}
					$(".yith-wcwl-items-count").html(data.count);
				}
			);
		});
	}
})(jQuery);
