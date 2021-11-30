<?php 
$conn = mysqli_connect('localhost', 'root', '', 'sellingbook') or die ('Can not connect to mysql');

$query = 'SELECT * FROM category';

$result = mysqli_query($conn, $query);
 
$datas = array();
 
if (mysqli_num_rows($result) > 0)
{
    while ($row = mysqli_fetch_array($result)){
        $datas[] = array(
            'id' => $row['id'],
            'ten_danhmuc' => $row['ten_danhmuc']
        );
    }
}
 
die (json_encode($datas));
?> 