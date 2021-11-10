<?php
// Authentication
$role = 'ADMIN';

// Authenticated And Authorization Admin
if($_SERVER['REQUEST_METHOD'] == 'POST' && $role == 'ADMIN') {
    $request = file_get_contents('php://input');
    $param = json_decode($request, true);
    
    $conn = mysqli_connect('localhost', 'root', '', 'sellingbook') or die('Lỗi kết nối!');
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
?>