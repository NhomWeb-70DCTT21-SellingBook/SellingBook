// Declare variable
var carts = [], address = {};
var totalPayment = 0;

// Get data
carts = JSON.parse(localStorage.getItem('carts'));
address = JSON.parse(localStorage.getItem('address'));

// render data
function renderDataCart() {
    var totalPrice = 0;
    var feeShip = 30000;

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

function renderDataReceiver() {
    document.getElementById('receiver-name').innerText = 'Tên: ' + address.name;
    document.getElementById('receiver-address').innerText = 'Địa chỉ: ' + address.number + ', ' + address.ward 
            + ', ' + address.district + ', ' + address.province;
    document.getElementById('receiver-info-extra').innerText = 'Thông tin thêm: ' + address.infoExtra;
    document.getElementById('receiver-phone-email').innerText = 'Số điện thoại: ' + address.phone;
}

// Show Dialog
function showDialog({ title = '', content = '', btn1 = '', btn2 = ''}) {
    var modalDOM = document.querySelector('.modal');
    modalDOM.innerHTML = '';

    var dialog = document.createElement('div');
    dialog.classList.add('modal__dialog');

    dialog.innerHTML = `
    <div class="modal-dialog__title">${title}</div>
    <div class="modal-dialog__content">${content}</div>
    <div class="modal-dialog__btn">
        <span class="modal-dialog__btn-yes" onclick="closeDialog(), order()">${btn1}</span>
        <span class="modal-dialog__btn-no" onclick="closeDialog()">${btn2}</span>
    </div>
    `;

    modalDOM.appendChild(dialog);
    modalDOM.style.display = 'block';
}

function closeDialog() {
    var modalDOM = document.querySelector('.modal');
    modalDOM.innerHTML = '';
    modalDOM.style.display = 'none';

}

// order
function showDialogQuestion() {
    showDialog({
        title: 'Đặt hàng',
        content: `Bạn có muốn xác nhận đặt hàng không? Tổng số tiền bạn phải trả là ${new Intl.NumberFormat().format(totalPayment)}đ.`,
        btn1: 'Có',
        btn2: 'Không'
    });
}

function order() {
    var data = {
        carts: carts,
        address: address,
        totalPayment: totalPayment
    };

    var http = new XMLHttpRequest();

    http.open('POST', path + 'api/order.php');

    http.send(JSON.stringify(data));

    http.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if(this.responseText == 'success') {
                localStorage.removeItem('carts');
                localStorage.removeItem('address');

                showToast({
                    message: 'Bạn đã đặt hàng thành công! Chúng tôi sẽ liên hệ cho bạn sớm.',
                    type: 'success',
                    duration: 3000
                });

                setTimeout(function() {
                    window.location = 'home.html';
                }, 5000);
            }
        }
    }
}

// Call function
renderDataCart();
renderDataReceiver()