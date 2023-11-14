$(document).ready(function () {
    var cartWrapper = $(".cart-wrapper");
    var cartOverlay = $(".cart-overlay");
    var cartContent = $(".cart-content");

    $(".cart_ic a").click(function (e) {
        e.preventDefault();
        cartOverlay.css({
            width: "100%",
            opacity: 1,
        });
        cartContent.css("right", 0);
    });

    cartOverlay.click(function () {
        cartOverlay.css({
            width: 0,
            opacity: 0,
        });
        cartContent.css("right", "-33.33%");
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Chọn các phần tử cần thiết
    var cartOverlay = document.querySelector(".cart-overlay");
    var cartContent = document.querySelector(".cart-content");
    var closeCartBtn = document.getElementById("closeCartBtn");
    var cartWrapper = document.querySelector(".cart-wrapper");

    // Hàm để đóng cart
    function closeCart() {
        cartOverlay.style.display = "none";
        cartContent.style.transform = "translateX(100%)";
    }

    // Thêm sự kiện click cho nút đóng cart
    closeCartBtn.addEventListener("click", closeCart);

    // Thêm sự kiện click cho overlay để đóng cart khi click ngoài cart
    cartOverlay.addEventListener("click", function (event) {
        if (event.target === cartOverlay) {
            closeCart();
        }
    });

    // Hiển thị cart khi click vào biểu tượng cart
    document
        .querySelector(".cart_ic a")
        .addEventListener("click", function (event) {
            event.preventDefault();
            cartOverlay.style.display = "block";
            cartContent.style.transform = "translateX(0)";
        });
});

// addtocart

document.addEventListener("DOMContentLoaded", function () {
    var addToCartButtons = document.querySelectorAll(".btn_addquick");
    var cartContainer = document.getElementById("cartContainer");
    var totalElement = document.getElementById("total");

    addToCartButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var productId = button.getAttribute("data-product-id");
            console.log(productId);
            fetch("/add-to-cart/" + productId, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then((data) => {
                    var cartItem = data.cartItem;

                    // Hiển thị sản phẩm trong giỏ hàng
                    var productHtml = `
                        <div class="cart-item row" id="${cartItem.product_id}">
                            <div class="item-image col-md-3">
                                <img src="{{ URL::asset('upload/photobig/') }}/${cartItem.product_image}" alt="">
                            </div>
                            <div class="item-name col-md-3">
                                <h3>${cartItem.product_name}</h3>
                            </div>
                            <div class="item-details col-md-2">
                                <p>{{ __('Giá:') }} ${cartItem.product_price}  đ</p>
                            </div>
                            <div class="item-quantity col-md-2">
                                <p>{{ __('Số Lượng:') }} ${cartItem.quantity}</p>
                            </div>
                            <div class="item-total col-md-1">
                                <p class="item-total-price">{{ __('Thành Tiền:') }} ${cartItem.product_price * cartItem.quantity} đ</p>
                            </div>
                        </div>
                    `;
                    cartContainer.innerHTML = productHtml;
                    alert(data.message);
                    updateTotal();
                })
                // .catch((error) => {
                //     console.error("Error:", error);
                //     alert("Thêm Sản Phẩm Vào Giỏ Hàng Thành Công.");
                // });
        });
    });
    function updateTotal() {
        var itemTotalPrices = document.getElementsByClassName("item-total-price");
        var total = 0;
    
        for (var i = 0; i < itemTotalPrices.length; i++) {
            var itemTotal = parseFloat(itemTotalPrices[i].textContent.replace("{{ __('Thành Tiền:') }}", "").trim());
            total += itemTotal;
        }
    
        // Cập nhật giá trị tổng vào thẻ span
        var totalValueElement = document.getElementById("totalValue");
        totalValueElement.textContent = total;
    }
    // Đăng ký sự kiện nhấp chuột trên biểu tượng "x" ngoài vòng lặp
    var closeIcons = document.querySelectorAll('.close');
    closeIcons.forEach(function (closeIcon) {
        closeIcon.addEventListener('click', function (e ) {
            e.preventDefault();
            var productIdToRemove = this.getAttribute('data-product-id');
            // Gọi hàm để xóa sản phẩm từ giỏ hàng
            removeProductFromCart(productIdToRemove);
        });
    });

    // Hàm để xóa sản phẩm từ giỏ hàng
    function removeProductFromCart(productId) {
        fetch("/remove-from-cart/" + productId, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                // Xóa sản phẩm khỏi DOM
                var cartItemElement = document.getElementById(productId);
                cartItemElement.parentNode.removeChild(cartItemElement);
                alert(data.message);
            })
            .catch((error) => {
                console.error("Error:", error);
                alert("Có lỗi xảy ra khi xóa sản phẩm khỏi giỏ hàng.");
            });
    }
});

