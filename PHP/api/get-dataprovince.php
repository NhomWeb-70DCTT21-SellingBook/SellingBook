<?php
$conn = mysqli_connect('localhost', 'root', '', 'sellingbook') or die ('Kết nối DB thất bại');
$query = 'SELECT * FROM devvn_tinhthanhpho';
$result = mysqli_query($conn, $query);

$datas = array();

// JSON - string
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $datas[] = array(
            'matp' => $row['matp'],
            'ten' => $row['name'],
            'kieu' => $row['type']
        );
    }
}

die(json_encode($datas));

?>