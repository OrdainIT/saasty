jQuery(document).ready(function ($) {
  // Function to remove a cart item
  window.remove_cart_item = function (cart_item_key) {
    $.ajax({
      type: "POST",
      url: cart_ajax_obj.ajaxurl, // The URL is provided by the localized object.
      data: {
        action: "woocommerce_remove_cart_item", // Action to call the PHP function
        cart_item_key: cart_item_key, // The key of the item to remove
      },
      success: function (response) {
        if (response.success) {
          // Refresh the cart contents
          load_cart_contents();
        } else {
          alert("Error removing item from the cart.");
        }
      },
      error: function () {
        alert("Error with AJAX request.");
      },
    });
  };

  // Function to load cart contents
  function load_cart_contents() {
    $.ajax({
      type: "POST",
      url: cart_ajax_obj.ajaxurl,
      data: { action: "load_cart_contents" },
      success: function (response) {
        try {
          // Inject the safe HTML into the dynamic cart
          $("#dynamic_cart").html(response.safe_html);
        } catch (e) {
          // Handle any errors gracefully
          console.error("Error parsing cart contents:", e);
          $("#dynamic_cart").text("Error loading cart contents.");
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("AJAX Error:", textStatus, errorThrown);
      },
    });
  }

  // Load cart contents on page load
  load_cart_contents();

  // Handle minus button click
  $(document).on("click", ".cart-minus", function () {
    var $input = $("#custom-quantity-input");
    var $hiddenInput = $("#hidden-quantity-input");
    var currentVal = parseInt($input.val(), 10);
    var minValue = parseInt($input.attr("min"), 10);

    if (!minValue) minValue = 1; // Set default min value to 1 if not specified
    if (currentVal > minValue) {
      $input.val(currentVal - 1);
      $hiddenInput.val(currentVal - 1);
    }
  });

  // Handle plus button click
  $(document).on("click", ".cart-plus", function () {
    var $input = $("#custom-quantity-input");
    var $hiddenInput = $("#hidden-quantity-input");
    var currentVal = parseInt($input.val(), 10);
    var maxValue = parseInt($input.attr("max"), 10);

    if (isNaN(maxValue) || maxValue === 0 || currentVal < maxValue) {
      $input.val(currentVal + 1);
      $hiddenInput.val(currentVal + 1);
    }
  });

  // Handle Add to Cart button click
  $(document).on("click", "#add-to-cart-btn", function (e) {
    e.preventDefault();

    var productId = $(this).data("product-id");
    var quantity = $("#custom-quantity-input").val();

    if (!quantity || quantity < 1) {
      quantity = 1; // Default to 1 if no valid quantity is set
    }

    // Add product to cart via AJAX
    $.ajax({
      type: "POST",
      url: wc_add_to_cart_params.ajax_url,
      data: {
        action: "woocommerce_add_to_cart",
        product_id: productId,
        quantity: quantity,
      },
      success: function (response) {
        if (response.error) {
          alert(response.error_message);
        } else {
          // Optionally redirect to cart or update UI
          window.location.href = wc_add_to_cart_params.cart_url;
        }
      },
      error: function () {
        alert("Error adding product to cart.");
      },
    });
  });

  // Add to cart on button click
  $(".it-shop-add-cart-btn").click(function () {
    var productId = $(this).data("product-id");
    var $button = $(this); // Cache the button element for reuse
    var $span = $button.find(".it-tooltip-add-cart"); // Find the span inside the button

    $.ajax({
      type: "POST",
      url: woocommerce_params.ajax_url, // WooCommerce AJAX URL
      data: {
        action: "woocommerce_add_to_cart",
        product_id: productId,
      },
      beforeSend: function () {
        // Optional: Disable the button or show a loading spinner
        $button.prop("disabled", true); // Disable button during the AJAX call
      },
      success: function (response) {
        if (response.error && response.product_url) {
          // If there is an error, redirect to the product page
          window.location.href = response.product_url;
        } else {
          // Update the WooCommerce cart fragments (update the cart icon in header)
          $(document.body).trigger("added_to_cart", [
            response.fragments,
            response.cart_hash,
            $button,
          ]);

          // Add a class to the button
          $button.addClass("product-added"); // Add class to the button

          // Change the text inside the span
          $span.text("Added to Cart!");
        }

        // Re-enable the button after successful addition
        $button.prop("disabled", false); // Re-enable the button
      },
    });
  });

  //  Add To wishlist Code
  // Start

  // Function to send wishlist to the server
  // Initialize wishlistProducts from localStorage
  var wishlistProducts =
    JSON.parse(localStorage.getItem("wishlistProducts")) || [];

  // Function to send wishlist to the server
  function sendWishlistToServer() {
    $.ajax({
      url: cart_ajax_obj.ajaxurl, // Ensure ajaxurl is properly defined in your theme
      type: "POST",
      data: {
        action: "update_wishlist",
        wishlist: wishlistProducts,
      },
      success: function (response) {
        if (response.success) {
          console.log("Wishlist updated successfully.");
        } else {
          console.error("Error updating wishlist: " + response.data);
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX error: " + status + " - " + error);
      },
    });
  }

  // Handle Add to Wishlist button click
  $(document).on("click", ".it-shop-add-to-wishlist-btn", function () {
    var productId = $(this).data("product-id");

    // If the product is in the wishlist, remove it
    if (wishlistProducts.includes(productId)) {
      wishlistProducts = wishlistProducts.filter(function (id) {
        return id !== productId;
      });
      $(this).removeClass("added-to-wishlist");
      $(this).find(".it-tooltip-wishlist").text("Add to Wishlist");
    } else {
      // If the product is not in the wishlist, add it
      wishlistProducts.push(productId);
      $(this).addClass("added-to-wishlist");
      $(this).find(".it-tooltip-wishlist").text("Added to Wishlist");
    }

    // Save updated wishlist to localStorage
    localStorage.setItem("wishlistProducts", JSON.stringify(wishlistProducts));

    // Send updated wishlist to the server
    sendWishlistToServer();
    console.log(sendWishlistToServer);
  });

  // Call this function to initialize the button states when the page loads
  function updateWishlistButtons() {
    $(".it-shop-add-to-wishlist-btn").each(function () {
      var productId = $(this).data("product-id");
      var $spanAdd = $(this).find(".it-tooltip-wishlist").first();

      // If the product is in the wishlist
      if (wishlistProducts.includes(productId)) {
        $(this).addClass("added-to-wishlist");
        $spanAdd.text("Added to Wishlist");
      } else {
        $(this).removeClass("added-to-wishlist");
        $spanAdd.text("Add to Wishlist");
      }
    });
  }

  updateWishlistButtons(); // Initialize button states

  // End

  //  Start

  // Handle Compare Click

  // Function to send Compare to the server
  // Initialize wishlistProducts from localStorage
  var compareProducts =
    JSON.parse(localStorage.getItem("compareProducts")) || [];

  // Function to send wishlist to the server
  function sendCompareToServer() {
    $.ajax({
      url: cart_ajax_obj.ajaxurl, // Ensure ajaxurl is properly defined in your theme
      type: "POST",
      data: {
        action: "update_comparelist",
        compare: compareProducts,
      },
      success: function (response) {
        if (response.success) {
          console.log("Comparelist updated successfully.");
        } else {
          console.error("Error updating Comparelist: " + response.data);
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX error: " + status + " - " + error);
      },
    });
  }

  // Handle Add to Wishlist button click
  $(document).on("click", ".it-shop-add-to-compare-btn", function () {
    var productId = $(this).data("product-id");

    // If the product is in the wishlist, remove it
    if (compareProducts.includes(productId)) {
      compareProducts = compareProducts.filter(function (id) {
        return id !== productId;
      });
      $(this).removeClass("added-to-comparelist");
      $(this).find(".it-tooltip-compare").text("Add To Compare");
    } else {
      // If the product is not in the wishlist, add it
      compareProducts.push(productId);
      $(this).addClass("added-to-comparelist");
      $(this).find(".it-tooltip-compare").text("Added To Compare");
    }

    // Save updated wishlist to localStorage
    localStorage.setItem("compareProducts", JSON.stringify(compareProducts));

    // Send updated wishlist to the server
    sendCompareToServer();
  });

  // Call this function to initialize the button states when the page loads
  function updateCompareButtons() {
    $(".it-shop-add-to-compare-btn").each(function () {
      var productId = $(this).data("product-id");
      var $spanAdd = $(this).find(".it-tooltip-compare").first();

      // If the product is in the wishlist
      if (compareProducts.includes(productId)) {
        $(this).addClass("added-to-comparelist");
        $spanAdd.text("Added To Compare");
      } else {
        $(this).removeClass("added-to-comparelist");
        $spanAdd.text("Add To Compare");
      }
    });
  }

  updateCompareButtons(); // Initialize button states

  //  End

  // Start

  // Remove From wishlist Page

  // Handle the form submission to remove a product from the wishlist
  $(document).on("submit", ".remove-wishlist-form", function (event) {
    event.preventDefault(); // Prevent the form from submitting normally

    var $form = $(this);
    var productId = $form.data("product-id");

    $.ajax({
      url: cart_ajax_obj.ajaxurl,
      type: "POST",
      data: {
        action: "remove_from_wishlist",
        product_id: productId,
      },
      success: function (response) {
        if (response.success) {
          console.log("Product removed from wishlist.");
          // Optionally, you can refresh the wishlist display
          location.reload(); // Reload the page to update the wishlist display
        } else {
          console.error(
            "Error removing product from wishlist: " + response.data
          );
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX error: " + status + " - " + error);
      },
    });
  });

  // End

  // Start

  // Remove From CompareList Page

  // Handle the form submission to remove a product from the wishlist
  $(document).on("submit", ".remove-compare-form", function (event) {
    event.preventDefault(); // Prevent the form from submitting normally

    var $form = $(this);
    var productId = $form.data("product-id");

    if (!productId) {
      console.error("Product ID is missing.");
      return;
    }

    $.ajax({
      url: cart_ajax_obj.ajaxurl, // Ensure `ajaxurl` is properly localized
      type: "POST",
      data: {
        action: "remove_from_comparelist",
        product_id: productId,
      },
      success: function (response) {
        if (response.success) {
          console.log("Product removed from Compare List.");
          // Optionally, you can refresh the wishlist display
          location.reload(); // Reload the page to update the compare list display
        } else {
          console.error(
            "Error removing product from Compare List: " + response.data
          );
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX error: " + status + " - " + error);
      },
    });
  });

  // End
  // Start

  // Single Product wishlist Js
  // Prevent default action for the "Add to Wishlist" link
  $(document).on("click", ".it-shop-add-to-wishlist-btn a", function (event) {
    event.preventDefault(); // Prevent the default link action
  });
  // Prevent default action for the "Add to Compare" link
  $(document).on("click", ".it-shop-add-to-compare-btn a", function (event) {
    event.preventDefault(); // Prevent the default link action
  });

  // End
  // Start
  function od_filterproducts() {
    var onSale = $("#on_sale").is(":checked") ? 1 : 0;
    var inStock = $("#in_stock").is(":checked") ? 1 : 0;

    $.ajax({
      url: cart_ajax_obj.ajaxurl,
      type: "POST",
      data: {
        action: "od_filter_products",
        on_sale: onSale,
        in_stock: inStock,
      },
      success: function (response) {
        if (response.success) {
          $(".products").html(response.html); // Update the product list
        } else {
          $(".products").html("<p>" + response.html + "</p>"); // Show the no products message
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("AJAX Error:", textStatus, errorThrown);
        $(".products").html("<p>Error loading products.</p>");
      },
    });
  }

  // Trigger od_filterproducts function when checkboxes are changed
  $("#on_sale, #in_stock").change(function () {
    od_filterproducts();
  });

  // End

  // Start

  //find the hidden post type input, and grab the value

  // End
  // Start

  // End
});
