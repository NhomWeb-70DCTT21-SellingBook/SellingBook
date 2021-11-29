// Declare variable
var account, users = [];

var clear;

var idNguoiNhan;

// Authentication
function getCurrentAccount() {
    var http = new XMLHttpRequest();

    http.open('GET', path + `api/get-currentaccount.php`, true);

    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            account = JSON.parse(this.responseText);
            loadHeader();
        }
    }
}

function loadHeader() {
    var headerDOM = document.querySelector('.app-header-navbar__right');
    headerDOM.innerHTML = `
    <a href="#" class="app-header-navbar__item">
        <span class="material-icons-outlined">card_giftcard</span>
        <p>Ưu đãi & tiện ích</p>
    </a>
    <a href="purchase.php" class="app-header-navbar__item">
        <span class="material-icons-outlined">inventory</span>
        <p>Kiểm tra đơn hàng</p>
    </a>
    `;

    if(account) {
        headerDOM.innerHTML += `
        <a href="#" class="app-header-navbar__item">
            <span class="material-icons-outlined">account_circle</span>
            <p>${account.username}</p>
        </a>
        <a href="logout.php" class="app-header-navbar__item">
            <span class="material-icons-outlined">logout</span>
            <p>Đăng xuất</p>
        </a>
        `;
    }
    else {
        headerDOM.innerHTML += `
        <a href="dangky.php" class="app-header-navbar__item">
            <span class="material-icons-outlined">login</span>
            <p>Đăng nhập</p>
        </a>
        <a href="dangky.php" class="app-header-navbar__item">
            <span class="material-icons-outlined">logout</span>
            <p>Đăng ký</p>
        </a>
        `;
    }
    
}

// Get list user
function getListUser() {
    var http = new XMLHttpRequest();

    http.open('GET', path + 'api/get-listusers.php');

    http.send();

    http.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            users = JSON.parse(this.responseText);
            loadListUsers(users);
        }
    }
}

function loadListUsers(users) {
    var chatDOM = document.querySelector('.app-content-body-list-chat__navbar');
    chatDOM.innerHTML = '';
    
    var user = users.find(function(value) {
        return value.username == 'admin';
    });

    var usersTmp;
    if(user) {
        usersTmp = users.filter(function(value) {
            return value.id != user.id;
        });
        usersTmp.unshift(user);
    }
    else {
        usersTmp = users;
        user = {};
        user.id = -1;
    }

    usersTmp.forEach(function(value) {
        if(value.id == user.id) {
            chatDOM.innerHTML += `
            <li class="app-content-body-list-chat-navbar__item" onclick="idNguoiNhan = ${value.id};openMessage(${value.id})">
                <img src="../assets/images/user.png" alt="user">
                <p>Chăm sóc khách hàng</p>
            </li>
            `;
        }
        else {
            chatDOM.innerHTML += `
            <li class="app-content-body-list-chat-navbar__item" onclick="idNguoiNhan = ${value.id};openMessage(${value.id})">
                <img src="../assets/images/user.png" alt="user">
                <p>${value.username}</p>
            </li>
            `;
        }
    });
}

function openMessage(id) {
    var user = users.find(function(value) {
        return value.id == id;
    });
    document.getElementById('name-user-chat').innerText = (user.username == 'admin@gmail.com') ? 'Chăm sóc khách hàng' : user.username;
    getDataMessage();
}

// Get data message
function getDataMessage() {
    var data = {
        idNguoiNhan: idNguoiNhan,
        idNguoiGui: account.id
    }

    var http = new XMLHttpRequest();

    http.open('POST', path + 'api/get-message.php');

    http.send(JSON.stringify(data));

    http.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            console.log(this.responseText)
            loadMessage(JSON.parse(this.responseText));
        }
    }
    clearInterval(clear);
    clear = setInterval(function(){
        getDataMessage();
    }, 1000);
}

// Load Message
function loadMessage(messages) {
    var messageDOM = document.querySelector('.app-content-body-message__read');
    messageDOM.innerHTML = '';

    messages.forEach(function(value) {
        var message = document.createElement('div');
        message.classList.add('app-content-body-message-read__item');
        message.innerHTML = `<span>${value.noi_dung}</span>`;
        
        if(value.id_nguoigui == account.id) {
            message.classList.add('message-reply');
        }

        messageDOM.append(message);
    });
}

// Send message
function sendMessage() {
    if(document.getElementById('txtmessage').value == '') {
        return;
    }

    var data = {
        idNguoiGui: account.id,
        idNguoiNhan: idNguoiNhan,
        noiDung: document.getElementById('txtmessage').value
    }

    var http = new XMLHttpRequest();

    http.open('POST', path + 'api/send-message.php');

    http.send(JSON.stringify(data));

    http.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if(this.responseText == 'success') {
                document.getElementById('txtmessage').value = '';
                getDataMessage();
            }
        }
    }
}

// Call function
getCurrentAccount();
getListUser();

document.getElementById('txtmessage').addEventListener('keyup', function(event) {
    if(event.keyCode == 13) {
        sendMessage();
    }
});