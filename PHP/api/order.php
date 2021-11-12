<?php
$request = file_get_contents('php://input');
$param = json_decode($request);

$address = $param->address;
$carts = $param->carts;
$totalPayment = $param->totalPayment;

$conn = mysqli_connect('localhost', 'root', '', 'sellingbook') or die ('Kết nối DB thất bại!');
$query = "INSERT INTO address VALUES (NULL, '".$address->province."', '".$address->district
        ."', '".$address->ward."', '".$address->number."')";
$result = mysqli_query($conn, $query);
if(!$result) {
    die ('Có lỗi sảy ra!');
}
$query = "SELECT * FROM address ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

die ($row['id']);


$query = "INSERT INTO customer VALUES (NULL, '".$address->name."')"
?>