// Declare variable
var carts = [], address = {};

// Get data
carts = JSON.parse(localStorage.getItem('carts'));
address = JSON.parse(localStorage.getItem('address'));

// render data
function renderDataCart() {
    var totalPrice = 0;
    var feeShip = 30000;
    var totalPayment = 0;

    var cartDOM = document.querySelector('.app-body-bill__list-cart');
    cartDOM.innerHTML = '';

    carts.forEach(function(value) {
        totalPrice += value.so_luong * value.gia_ban;

        var cart = document.createElement('div');
        cart.classList.add('app-body-bill__list-item');

        cart.innerHTML = `
        <div class="app-body-bill-list-item__name">${value.so_luong} x ${value.ten_sach}</div>
        <div class="app-body-bill-list-item__price">${new Intl.NumberFormat().format(value.gia_ban)}đ</div>
        `;

        cartDOM.appendChild(cart);
    });

    totalPayment = totalPrice + feeShip;
    document.getElementById('totalPrice').innerText = `${new Intl.NumberFormat().format(totalPrice)}đ`;
    document.getElementById('feeShip').innerText = `${new Intl.NumberFormat().format(feeShip)}đ`;
    document.getElementById('totalPayment').innerText = `${new Intl.NumberFormat().format(totalPayment)}đ`;
}

// Call function
renderDataCart();