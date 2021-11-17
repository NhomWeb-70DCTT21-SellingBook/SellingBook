<?php
session_start();

$request = file_get_contents('php://input');
$param = json_decode($request, true);

if(isset($_SESSION['id'])) {   
    $conn = mysqli_connect('localhost', 'root', '', 'sellingbook') or die ('Ket noi DB that bai!');
    $query = "SELECT * FROM account WHERE id <> " . $_SESSION['id'];
    
    $result = mysqli_query($conn, $query);
    
    $datas = array();
     
    if (mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_array($result)){
            $datas[] = array(
                'id' => $row['id'],
                'email' => $row['email']
            );
        }
    }
    
    die (json_encode($datas));
}
else {
    die ('Yêu cầu xác minh tài khoản!');
}

?>