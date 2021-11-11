// Declare variable
var categories = [];

var path = 'http://localhost/LearnPHP/SellingBook/PHP/';

// Get data
function getDataCate() {
    var http = new XMLHttpRequest();

    http.open('GET', path + `api/get-datacate.php`, true);

    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            categories = JSON.parse(this.responseText);
            loadListCate();
        }
    }
}

// Format categories's id
function formatCateID(id) {
    var tmp = id;
    var count = 0;
    while(tmp > 0) {
        count++;
        tmp = (tmp - tmp%10)/10;
    }
    while(4 - count > 0) {
        id = '0' + id;
        count++;
    }
    return id;
}


// Show modal input
function showEdit(id) {
    var cate = categories.find(function(value) {
        return value.id == id;
    });

    var modalDOM = document.querySelector('.modal__input');

    if(modalDOM.classList.contains('modal__input-create')) {
        modalDOM.classList.remove('modal__input-create');
    }
    if(!modalDOM.classList.contains('modal__input-edit')) {
        modalDOM.classList.add('modal__input-edit');
    }

    document.getElementById('cate-id').value = cate.id;
    document.getElementById('cate-name').value = cate.ten_danhmuc;
}

function showCreate() {
    var modalDOM = document.querySelector('.modal__input');

    if(modalDOM.classList.contains('modal__input-edit')) {
        modalDOM.classList.remove('modal__input-edit');
    }
    if(!modalDOM.classList.contains('modal__input-create')) {
        modalDOM.classList.add('modal__input-create');
    }

    document.getElementById('cate-id').value = '';
    document.getElementById('cate-name').value = '';
}

// load list categories
function loadListCate() {
    var listCatesDOM = document.querySelector('.app-container-content__list tbody');
    listCatesDOM.innerHTML = '';

    categories.forEach(function(value) {
        var cate = document.createElement('tr');

        cate.innerHTML = `
        <td>DA${formatCateID(value.id)}</td>
        <td>${value.ten_danhmuc}</td>
        <td style="text-align: center;">
            <label for="cbo-show-modal" class="app__btn" onclick="showEdit(${value.id})">Chi tiết</label>
        </td>
        `;

        listCatesDOM.appendChild(cate);
    });
}

// Create - Update - Delete cate
function editCate(method) {
    var cate = {
        id: document.getElementById('cate-id').value,
        ten_danhmuc: document.getElementById('cate-name').value.trim()
    }

    var http = new XMLHttpRequest();

    http.open(method, path + `admin/api/edit-cate.php`, true);
    http.setRequestHeader('Content-Type', 'application/json');
    http.send(JSON.stringify(cate));

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if (method == 'POST') {
                showToast({
                    message: `Bạn đã thêm danh mục thành công: ${cate.ten_danhmuc}`,
                    type: 'success',
                    duration: 2000
                });
            }
            else if (method == 'PUT') {
                showToast({
                    message: `Bạn đã cập nhật danh mục thành công: ${cate.ten_danhmuc}`,
                    type: 'success',
                    duration: 2000
                });
            }
            else {
                showToast({
                    message: `Bạn đã xóa danh mục thành công: ${cate.ten_danhmuc}`,
                    type: 'error',
                    duration: 2000
                });
            }
            getDataCate();
        }
        else if (this.status != 200) {
            showToast({
                message: `Có lỗi sảy ra! Vui lòng thử lại`,
                type: 'error',
                duration: 2000
            });
        }
    }
}

// Call function
getDataCate();