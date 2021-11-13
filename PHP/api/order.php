<?php
$request = file_get_contents('php://input');
$param = json_decode($request);

$address = $param->address;
$carts = $param->carts;
$totalPayment = $param->totalPayment;

$conn = mysqli_connect('localhost', 'root', '', 'sellingbook') or die('Kết nối DB thất bại!');
$query = "INSERT INTO address VALUES (NULL, '" . $address->province . "', '" . $address->district
    . "', '" . $address->ward . "', '" . $address->number . "')";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Có lỗi xảy ra! ' . $query);
}
$query = "SELECT * FROM address ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$query = "INSERT INTO customer VALUES (NULL, '" . $address->name . "', '" . $address->phone
    . "', '" . $address->infoExtra . "', " . $row['id'] . ")";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Có lỗi xảy ra! ' . $query);
}
$query = "SELECT * FROM customer ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$query = "INSERT INTO bill VALUES (NULL, " . $row['id'] . ", NOW(), '', 0, " . $totalPayment . ")";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Có lỗi xảy ra! ' . $query);
}
$query = "SELECT * FROM bill ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

foreach ($carts as $cart) {
    $query = "INSERT INTO billinfo VALUES (NULL, " . $cart->id . ", " . $row['id'] . ", "
        . $cart->so_luong . ", " . $cart->gia_ban . ")";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Có lỗi xảy ra! ' . $query);
    }
}

die ('success');

?>