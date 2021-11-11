<?php
// Authentication
$role = 'ADMIN';

// Authenticated And Authorization Admin
$request = file_get_contents('php://input');
$param = json_decode($request, true);

$conn = mysqli_connect('localhost', 'root', '', 'sellingbook') or die('Lỗi kết nối!');

if($_SERVER['REQUEST_METHOD'] == 'POST' && $role == 'ADMIN') {
    $query = "INSERT INTO category VALUES (NULL, '".$param['ten_danhmuc']."')";
    
    $result = mysqli_query($conn, $query);
    
    if($result) {
        echo 'Thêm danh mục sách thành công';
    }
    else {
        echo 'Thêm danh mục sách thất bại';
    }
}
else if($_SERVER['REQUEST_METHOD'] == 'PUT' && $role == 'ADMIN') {
    $query = "UPDATE category SET ten_danhmuc = '".$param['ten_danhmuc']."' WHERE id = ".$param['id'];
    
    $result = mysqli_query($conn, $query);
    
    if($result) {
        echo 'Cập nhật danh mục sách thành công';
    }
    else {
        echo 'Cập nhật danh mục sách thất bại';
    }
}
else if($_SERVER['REQUEST_METHOD'] == 'DELETE' && $role == 'ADMIN') {
    $query = "DELETE FROM category WHERE id = ".$param['id'];
    
    $result = mysqli_query($conn, $query);
    
    if($result) {
        echo 'Xóa danh mục sách thành công';
    }
    else {
        echo 'Xóa danh mục sách thất bại';
    }
}
?>