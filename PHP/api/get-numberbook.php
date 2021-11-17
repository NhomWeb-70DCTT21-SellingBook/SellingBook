<?php
$search = ''; $cate = 0;
if(isset($_GET['search'])) {
    $search = $_GET['search'];
}
if(isset($_GET['cate'])) {
    $cate = $_GET['cate'];
}
$conn = mysqli_connect('localhost', 'root', '', 'sellingbook') or die ('Can not connect to mysql');

$query = '';

if($cate == 0)
    $query = "SELECT COUNT(*) number FROM book WHERE ten_sach LIKE '%" . $search . "%'";
else
    $query = "SELECT COUNT(*) number FROM book WHERE ten_sach LIKE '%" . $search . "%' AND id_danhmuc = " . $cate;

$result = mysqli_query($conn, $query);
 
if (mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_array($result);

    die ($row['number']);
}
?>