// Declare variable
var categories = [];

var url = window.location.href.split('/');
url.pop();
url.pop();
url.push('PHP')
var path = url.join('/') + '/';

// Get data
function getDataCate() {
    var http = new XMLHttpRequest();

    http.open('GET', path + `api/get-datacate.php`, true);

    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            categories = JSON.parse(this.responseText);
            loadCategory();
        }
    }
}

// Set action for category box
function loadCategory() {
    var cateDOM = document.querySelector('.app-header-main-search-filter__choose');
    cateDOM.innerHTML = '<li class="app-header-main-search-filter-choose__item active-color" onclick="categoryChange(-1, 0)">Tất cả</li>';

    categories.forEach(function (value, index) {
        cateDOM.innerHTML += `<li class="app-header-main-search-filter-choose__item" onclick="categoryChange(${index}, ${value.id})">${value.ten_danhmuc}</li>`;
    });
}

function categoryChange(index, id) {
    var cateList = document.querySelectorAll('.app-header-main-search-filter-choose__item').forEach(function (value) {
        if (value.classList.contains('active-color')) {
            value.classList.remove('active-color');
        }
    });
    var dom = document.querySelector(`.app-header-main-search-filter-choose__item:nth-child(${index + 2})`);
    dom.classList.add('active-color');

    var textDOM = document.querySelector('.app-header-main-search-filter__current > p');
    textDOM.innerHTML = dom.innerHTML;

    document.querySelector('#cate').value = id;
}

// Get param
function GetURLParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) {
            return sParameterName[1];
        }
    }
    return -1;
}

// Authorization
function authorization() {
    var http = new XMLHttpRequest();

    http.open('GET', path + `api/get-authorization.php`, true);

    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if(this.responseText == 'ADMIN') {
                var bodyDOM = document.querySelector('body');
            
                var btnGoToAdmin = document.createElement('a');
                btnGoToAdmin.classList.add('go-to-admin');
                btnGoToAdmin.href = 'admin.html';
                btnGoToAdmin.innerHTML = `
                <i class="fas fa-tools"></i>
                <p>Quay về trang quản trị</p>
                `;
                bodyDOM.appendChild(btnGoToAdmin);
            }
            else {

            }
        }
    }
}


// Call function
getDataCate();
authorization();