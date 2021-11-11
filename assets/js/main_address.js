// Delare variable
var provinces = [];
var districtes = [];
var wards = [];

// Get data
function getDataProvinces() {
    // AJAX
    var http = new XMLHttpRequest();

    // method: GET, POST, PUT, DELETE - POST: create , PUT: update, DELETE: delete
    http.open('GET', 'http://localhost/LearnPHP/SellingBook/PHP/api/get-dataprovince.php');

    http.send();

    http.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            provinces = JSON.parse(this.responseText);
            renderDataProvinces();
        }
    }
}

function getDataDistricts() {
    var value = document.getElementById('province').value;

    var http = new XMLHttpRequest();

    http.open('POST', 'http://localhost/LearnPHP/SellingBook/PHP/api/get-datadistrict.php');

    http.send(value);

    http.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            districtes = JSON.parse(this.responseText);
            renderDataDistricts();
        }
    }
}

function getDataWards() {
    var value = document.getElementById('district').value;

    var http = new XMLHttpRequest();

    http.open('POST', 'http://localhost/LearnPHP/SellingBook/PHP/api/get-dataward.php');

    http.send(value);

    http.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            wards = JSON.parse(this.responseText);
            renderDataWards();
        }
    }
}

// render data
function renderDataProvinces() {
    var provinceDOM = document.getElementById('province');
    provinceDOM.innerHTML = '<option value="0">--Tỉnh / Thành phố--</option>';

    provinces.forEach(function(value) {
        var province = document.createElement('option');
        province.innerText = value.ten;
        province.value = value.matp;

        provinceDOM.appendChild(province);
    });
}

function renderDataDistricts() {
    var districtDOM = document.getElementById('district');
    districtDOM.innerHTML = '<option value="0">--Quận / Huyện--</option>';

    districtes.forEach(function(value) {
        var district = document.createElement('option');
        district.innerText = value.ten;
        district.value = value.maqh;

        districtDOM.appendChild(district);
    });
}

function renderDataWards() {
    var wardDOM = document.getElementById('ward');
    wardDOM.innerHTML = '<option value="0">--Xã / Phường--</option>';

    wards.forEach(function(value) {
        var ward = document.createElement('option');
        ward.innerText = value.ten;
        ward.value = value.xaid;

        wardDOM.appendChild(ward);
    });
}

function saveAddressUser() {
    var province = provinces.find(function(value) {
        return value.matp == document.getElementById('province').value;
    });
    var district = districtes.find(function(value) {
        return value.maqh == document.getElementById('district').value;
    });
    var ward = wards.find(function(value) {
        return value.xaid == document.getElementById('ward').value;
    });

    var address = {
        name: document.getElementById('name').value,
        phone: document.getElementById('phone').value,
        infoExtra: document.getElementById('info-extra').value,
        province: province.ten,
        district: district.ten,
        ward: ward.ten,
        number: document.getElementById('number').value
    };

    // Save in local storage
    localStorage.setItem('address', JSON.stringify(address));
}

// Call function
getDataProvinces();