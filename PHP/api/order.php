<?php
// Lấy dữ liệu gửi lên từ client
$request = file_get_contents('php://input');
// Chuyển kiểu dữ liệu nhận được sang đối tượng (JSON -> Object)
$param = json_decode($request);

// Chia nhỏ Object thành từng Object con
$address = $param->address;
$carts = $param->carts;
$totalPayment = $param->totalPayment;

// Mở kết nối với Database
$conn = mysqli_connect('localhost', 'root', '', 'sellingbook') or die('Kết nối DB thất bại!');
## Thao tác với bảng address ##
// Chuẩn bị câu lệnh query: thêm mới dữ liệu vào bảng address
$query = "INSERT INTO address VALUES (NULL, '" . $address->province . "', '" . $address->district
    . "', '" . $address->ward . "', '" . $address->number . "')";
// Thực thi câu lệnh
$result = mysqli_query($conn, $query);
// Kiểm tra thêm mới thành công hay chưa?
if ($result == false) {
    die('Có lỗi xảy ra! ' . $query);
}
// Chuẩn bị câu lệnh query: lấy dữ liệu vừa thêm mới (là bản ghi cuối cùng trong bảng address)
// Mục đích lấy id của address vừa thêm để thêm vào bảng customer
$query = "SELECT * FROM address ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);
// Lấy ra từng dòng 1
$row = mysqli_fetch_assoc($result);

## Thao tác với bảng customer ##
// Chuẩn bị câu lệnh query: thêm mới dữ liệu vào bảng customer
$query = "INSERT INTO customer VALUES (NULL, '" . $address->name . "', '" . $address->phone
    . "', '" . $address->infoExtra . "', " . $row['id'] . ")";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Có lỗi xảy ra! ' . $query);
}
// Chuẩn bị câu lệnh query: lấy ra dữ liệu vừa thêm mới
// Mục đích để lấy ra id của khách hàng vừa thêm để thêm vào bảng hóa đơn
$query = "SELECT * FROM customer ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

## Thao tác với bảng bill ##
// Chuẩn bị câu lệnh query: thêm mới dữ liệu vào bảng hóa đơn
$query = "INSERT INTO bill VALUES (NULL, " . $row['id'] . ", NOW(), '', 0, " . $totalPayment . ")";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Có lỗi xảy ra! ' . $query);
}
// Chuẩn bị câu lệnh query: lấy ra dữ liệu vừa thêm mới
// Mục đích để lấy ra id của hóa đơn vừa thêm để thêm vào bảng chi tiết hóa đơn
$query = "SELECT * FROM bill ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

## Thao tác với bảng billinfo ##
// Thêm mới từng dòng(sản phẩm) vào bảng chi tiết hóa đơn
foreach ($carts as $cart) {
    // Chuẩn bị câu lệnh: thêm mới vào bảng chi tiết hóa đơn
    $query = "INSERT INTO billinfo VALUES (NULL, " . $cart->id . ", " . $row['id'] . ", "
        . $cart->so_luong . ", " . $cart->gia_ban . ")";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Có lỗi xảy ra! ' . $query);
    }
}

// Trả về client nội dung 'success'
die ('success');

?>