// Declare variable
var books = [], categories = [];

var page = 1, size = 20;

if (GetURLParameter('page') != -1) {
    page = parseInt(GetURLParameter('page'));
}
if (GetURLParameter('size') != -1) {
    size = parseInt(GetURLParameter('size'));
}

// Get data
function getDataBook() {
    var http = new XMLHttpRequest();

    http.open('GET', path + `api/get-databook.php?page=${page}&size=${size}`, true);

    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            books = JSON.parse(this.responseText);
            loadListBooks()
        }
    }
}

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

// Format book's id
function formatBookID(id) {
    var tmp = id;
    var count = 0;
    while (tmp > 0) {
        count++;
        tmp = (tmp - tmp % 10) / 10;
    }
    while (4 - count > 0) {
        id = '0' + id;
        count++;
    }
    return id;
}


// Show modal input
function showEdit(id) {
    var book = books.find(function (value) {
        return value.id == id;
    });

    var modalDOM = document.querySelector('.modal__input');

    if (modalDOM.classList.contains('modal__input-create')) {
        modalDOM.classList.remove('modal__input-create');
    }
    if (!modalDOM.classList.contains('modal__input-edit')) {
        modalDOM.classList.add('modal__input-edit');
    }

    document.getElementById('book-id').value = book.id;
    document.getElementById('book-name').value = book.ten_sach;
    document.getElementById('book-author').value = book.tac_gia;
    document.getElementById('book-cate').value = book.id_danhmuc;
    document.getElementById('book-current-price').value = book.gia_ban;
    document.getElementById('book-old-price').value = book.gia_chua_giam;
    document.getElementById('book-sale').value = book.giam_gia;
    document.getElementById('book-quantity').value = book.so_luong;
    document.getElementById('book-description').value = book.mo_ta;
    document.querySelector('.modal-input__img img').src = `../assets/images/${book.anh}`;
}

function showCreate() {
    var modalDOM = document.querySelector('.modal__input');

    if (modalDOM.classList.contains('modal__input-edit')) {
        modalDOM.classList.remove('modal__input-edit');
    }
    if (!modalDOM.classList.contains('modal__input-create')) {
        modalDOM.classList.add('modal__input-create');
    }

    document.getElementById('book-id').value = 0;
    document.getElementById('book-name').value = '';
    document.getElementById('book-author').value = '';
    document.getElementById('book-cate').value = 0;
    document.getElementById('book-current-price').value = '';
    document.getElementById('book-old-price').value = '';
    document.getElementById('book-sale').value = '';
    document.getElementById('book-quantity').value = '';
    document.getElementById('book-description').value = '';
}

// load list books
function loadListBooks() {
    var listBooksDOM = document.querySelector('.app-container-content__list tbody');
    listBooksDOM.innerHTML = '';

    books.forEach(function (value) {
        var cate = categories.find(function (cate) {
            return cate.id == value.id_danhmuc;
        });

        var book = document.createElement('tr');

        book.innerHTML = `
        <td>SA${formatBookID(value.id)}</td>
        <td>
            <div class="app-container-content__item-img">
                <img src="../assets/images/${value.anh}" alt="">
            </div>
        </td>
        <td>
            <div class="app-container-content__item-name">${value.ten_sach}</div>
            <div class="app-container-content__item-author">${value.tac_gia}</div>
            <div class="app-container-content__item-category">${cate.ten_danhmuc}</div>
        </td>
        <td>
            <div class="app-container-content__item-current-price">${new Intl.NumberFormat().format(value.gia_ban)}đ</div>
            <div class="app-container-content__item-old-price">${new Intl.NumberFormat().format(value.gia_chua_giam)}đ</div>
            <div class="app-container-content__item-sale">-${value.giam_gia}%</div>
        </td>
        <td style="white-space: nowrap;">${value.so_luong} quyển</td>
        <td style="text-align: center;">
            <label for="cbo-show-modal" class="app__btn" onclick="showEdit(${value.id})">Chi tiết</label>
        </td>
        `;

        listBooksDOM.appendChild(book);
    });
}

function loadListCate() {
    var cateDOM = document.getElementById('book-cate');
    cateDOM.innerHTML = '';

    var itemFirst = document.createElement('option');
    itemFirst.value = 0;
    itemFirst.innerText = '--Chọn danh mục sách--';
    cateDOM.appendChild(itemFirst);

    categories.forEach(function (value) {
        var item = document.createElement('option');
        item.value = value.id;
        item.innerText = value.ten_danhmuc;

        cateDOM.appendChild(item);
    });

    cateDOM.value = 0;
}

// Load pagination
function loadPagination() {
    var http = new XMLHttpRequest();

    http.open('GET', path + `api/get-numberbook.php?`, true);

    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            loadPaginationToView(this.responseText);
        }
    }
}

function loadPaginationToView(numberBook) {
    var tmp = (numberBook - numberBook % size) / size; // Chia lay nguyen
    var numberPage = (numberBook / size) > tmp ? tmp + 1 : tmp;
    var pageDOM = document.querySelector('.app-content__pagination');
    pageDOM.innerHTML = `
    <a href="admin.html?page=1&size=${size}" class="app-content-pagination__first-page">Về trang đầu</a>
    <a href="admin.html?page=${(page - 1 > 1) ? page - 1 : 1}&size=${size}" class="app-content-pagination__before-page"><</a>
    `;

    var from, to;
    if (page <= 3) {
        from = 1;
        to = 5;
    }
    else if (page + 2 > numberPage) {
        from = numberPage - 4;
        to = numberPage;
    }
    else {
        from = page - 2;
        to = page + 2;
    }
    for (let i = from; i <= to; i++) {
        pageDOM.innerHTML += `
        <a href="admin.html?page=${i}&size=${size}" class="app-content-pagination__item-page">${i}</a>
        `;
        if (i == numberPage) break;
    }
    if (to < numberPage) {
        pageDOM.innerHTML += `
        <a href="admin.html?page=${numberPage}&size=${size}" class="app-content-pagination__item-page">...</a>
        `;
    }

    pageDOM.innerHTML += `
    <a href="admin.html?page=${(page + 1 < numberPage) ? page + 1 : numberPage}&size=${size}" class="app-content-pagination__before-page">></a>
    <a href="admin.html?page=${numberPage}&size=${size}" class="app-content-pagination__last-page">Về trang cuối</a>
    `;

    var arr = document.querySelectorAll('.app-content-pagination__item-page');
    arr.forEach(function (value) {
        if (value.innerHTML == page) {
            value.classList.add('current-page');
        }
    })
}

// Create - Update - Delete book
function editBook(method) {
    var book = {
        id: document.getElementById('book-id').value,
        ten_sach: document.getElementById('book-name').value.trim(),
        tac_gia: document.getElementById('book-author').value.trim(),
        id_danhmuc: document.getElementById('book-cate').value,
        gia_ban: document.getElementById('book-current-price').value,
        gia_chua_giam: document.getElementById('book-old-price').value,
        giam_gia: document.getElementById('book-sale').value,
        so_luong: document.getElementById('book-quantity').value,
        mo_ta: document.getElementById('book-description').value.trim(),
        anh: document.querySelector('.modal-input__img img').src.split('/')[7]
    }

    var http = new XMLHttpRequest();

    http.open(method, path + `admin/api/edit-book.php`, true);
    http.setRequestHeader('Content-Type', 'application/json');
    http.send(JSON.stringify(book));

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if (method == 'POST') {
                showToast({
                    message: `Bạn đã thêm sách thành công: ${book.ten_sach}`,
                    type: 'success',
                    duration: 2000
                });
            }
            else if (method == 'PUT') {
                showToast({
                    message: `Bạn đã cập nhật sách thành công: ${book.ten_sach}`,
                    type: 'success',
                    duration: 2000
                });
            }
            else {
                showToast({
                    message: `Bạn đã xóa sách thành công: ${book.ten_sach}`,
                    type: 'error',
                    duration: 2000
                });
            }
            getDataBook();
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
getDataBook();
loadPagination();