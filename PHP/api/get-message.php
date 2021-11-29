<?php
session_start();

$request = file_get_contents('php://input');
$param = json_decode($request, true);

if(isset($_SESSION['username']) && isset($_SESSION['id'])) {
    if($_SESSION['id'] != $param['idNguoiGui']) {
        die ('Bạn chưa được cấp quyền đọc tin nhắn!'); 
    }    

    $conn = mysqli_connect('localhost', 'root', '', 'sellingbook') or die ('Ket noi DB that bai!');
    $query = "SELECT * FROM message WHERE (id_nguoigui = ".$param['idNguoiGui']
            ." AND id_nguoinhan = ".$param['idNguoiNhan'].") OR (id_nguoigui = "
            .$param['idNguoiNhan']." AND id_nguoinhan = ".$param['idNguoiGui'].")";
    
    $result = mysqli_query($conn, $query);
    
    $datas = array();
     
    if (mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_array($result)){
            $datas[] = array(
                'id' => $row['id'],
                'id_nguoigui' => $row['id_nguoigui'],
                'id_nguoinhan' => $row['id_nguoinhan'],
                'noi_dung' => $row['noi_dung']
            );
        }
    }
    
    die (json_encode($datas));
}
else {
    die ('Yêu cầu xác minh tài khoản!');
}

?>