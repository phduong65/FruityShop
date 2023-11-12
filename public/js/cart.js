
    $(document).ready(function() {
        var cartWrapper = $('.cart-wrapper');
        var cartOverlay = $('.cart-overlay');
        var cartContent = $('.cart-content');

        $('.cart_ic a').click(function(e) {
            e.preventDefault();
            cartOverlay.css({
                width: '100%',
                opacity: 1
            });
            cartContent.css('right', 0);
        });

        cartOverlay.click(function() {
            cartOverlay.css({
                width: 0,
                opacity: 0
            });
            cartContent.css('right', '-33.33%');
        });
        
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Chọn các phần tử cần thiết
        var cartOverlay = document.querySelector('.cart-overlay');
        var cartContent = document.querySelector('.cart-content');
        var closeCartBtn = document.getElementById('closeCartBtn');
        var cartWrapper = document.querySelector('.cart-wrapper');

        // Hàm để đóng cart
        function closeCart() {
            cartOverlay.style.display = 'none';
            cartContent.style.transform = 'translateX(100%)';
        }

        // Thêm sự kiện click cho nút đóng cart
        closeCartBtn.addEventListener('click', closeCart);

        // Thêm sự kiện click cho overlay để đóng cart khi click ngoài cart
        cartOverlay.addEventListener('click', function(event) {
            if (event.target === cartOverlay) {
                closeCart();
            }
        });

        // Hiển thị cart khi click vào biểu tượng cart
        document.querySelector('.cart_ic a').addEventListener('click', function(event) {
            event.preventDefault();
            cartOverlay.style.display = 'block';
            cartContent.style.transform = 'translateX(0)';
        });
    });
    

// Trong cart.js
// Trong cart.js

document.addEventListener('DOMContentLoaded', function () {
    var addToCartButtons = document.querySelectorAll('.btn_addquick');
    var cartContainer = document.getElementById('cartContainer');
    var totalElement = document.getElementById('total');

    addToCartButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var productId = button.getAttribute('data-product-id');

            fetch('/add-to-cart/' + productId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                var cartItem = data.cartItem;

                // Hiển thị sản phẩm trong giỏ hàng
                var productHtml = `
                    <div class="cart-item">
                        <div class="item-image">
                            <img src="${cartItem.product_image}" alt="${cartItem.product_name}">
                        </div>
                        <div class="item-details">
                            <h3>${cartItem.product_name}</h3>
                            <p>${__('Price:')} ${cartItem.product_price} đ</p>
                            <p>${__('Quantity:')} ${cartItem.quantity}</p>
                        </div>
                    </div>
                `;
                cartContainer.innerHTML = productHtml;

                alert(data.message);
            })
            // .catch(error => {
            //     console.error('Error:', error);
            //     alert('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.');
            // });
        });
    });
});
