<?php
session_start();

$request = file_get_contents('php://input');
$param = json_decode($request, true);

if(isset($_SESSION['email']) && isset($_SESSION['id'])) {
    if($_SESSION['id'] != $param['idNguoiGui']) {
        die ('Bạn chưa được cấp quyền gửi tin nhắn!'); 
    }

    $conn = mysqli_connect('localhost', 'root', '', 'sellingbook') or die ('Ket noi DB that bai!');
    $query = "INSERT INTO message VALUES (NULL, ".$param['idNguoiGui'].", "
            .$param['idNguoiNhan'].", '".$param['noiDung']."')";
    
    $result = mysqli_query($conn, $query);
     
    if ($result) {
        die ('success');
    }
    else {
        die ('Gửi tin nhắn thất bại!');
    }
}
else {
    die ('Yêu cầu xác minh tài khoản!');
}
?>