<?php
// Authentication
$role = 'ADMIN';

// Authenticated And Authorization Admin
$request = file_get_contents('php://input');
$param = json_decode($request, true);

$conn = mysqli_connect('localhost', 'root', '', 'sellingbook') or die('Lỗi kết nối!');

if($_SERVER['REQUEST_METHOD'] == 'POST' && $role == 'ADMIN') {
    $query = "INSERT INTO book VALUES (NULL, ".$param['id_danhmuc'].", '".$param['ten_sach']
            ."', '".$param['tac_gia']."', ".$param['so_luong'].", ".$param['gia_ban']
            .", ".$param['gia_chua_giam'].", ".$param['giam_gia'].", '".$param['mo_ta']
            ."', '".$param['anh']."')";
    
    $result = mysqli_query($conn, $query);
    
    if($result) {
        echo 'Thêm sách thành công';
    }
    else {
        echo 'Thêm sách thất bại';
    }
}
else if($_SERVER['REQUEST_METHOD'] == 'PUT' && ($role == 'ADMIN' || $role == 'USER')) {
    $query = "UPDATE book SET id_danhmuc = ".$param['id_danhmuc'].", ten_sach = '"
            .$param['ten_sach']."', tac_gia = '".$param['tac_gia']."', so_luong = "
            .$param['so_luong'].", gia_ban = ".$param['gia_ban'].", gia_chua_giam = "
            .$param['gia_chua_giam'].", giam_gia = ".$param['giam_gia'].", mo_ta = '"
            .$param['mo_ta']."', anh = '".$param['anh']."' WHERE id = ".$param['id'];
    
    $result = mysqli_query($conn, $query);
    
    if($result) {
        echo 'Cập nhật sách thành công';
    }
    else {
        echo 'Cập nhật sách thất bại';
    }
}
else if($_SERVER['REQUEST_METHOD'] == 'DELETE' && $role == 'ADMIN') {
    $query = "DELETE FROM book WHERE id = ".$param['id'];
    
    $result = mysqli_query($conn, $query);
    
    if($result) {
        echo 'Xóa sách thành công';
    }
    else {
        echo 'Xóa sách thất bại';
    }
}
?>