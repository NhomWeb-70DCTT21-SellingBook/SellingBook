<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $conn = mysqli_connect('localhost', 'root', '', 'sellingbook');
    $query = "SELECT * FROM account WHERE id = " . $id;
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if($row['phan_quyen'] == 0) {
            die ('USER');
        }
        else if($row['phan_quyen'] == 1) {
            die ('ADMIN');
        }
        else {
            die ('NOT AUTHORIZATION');
        }
    }
}
else {
    die ('NOT AUTHENTICATE');
}
?>