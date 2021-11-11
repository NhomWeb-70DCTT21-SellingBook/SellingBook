//Delare variable
var provinces = [];
var districtes = [];
var wards = [];
//Get data
function getDataProvinces(){
    //AJAX
    var http = new XMLHttpRequest();
    
    //method: GET, POST, PUT, DELETE - POST: create, PUT: update, DELETE: delete
    http.open('GET','http://localhost/LearnPHP/SellingBook/PHP/api/get-dataprovince.php');

    http.send();

    http.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            provinces = JSON.parse(this.responseText);
            renderDataProvinces();
        }
    }
}

//render data
function renderDataProvinces(){
    var provinceDOM = document.getElementById('book-cate');
    provinceDOM.innerHTML = '<option value="1">--Tỉnh / Thành phố--</option>';

    provinces.forEach(function(value){
        var province = document.createElement('option');
        province.innerText = value.ten;
        province.value = value.matp;

        provinceDOM.appendChild(province);
    }); 

    }
}