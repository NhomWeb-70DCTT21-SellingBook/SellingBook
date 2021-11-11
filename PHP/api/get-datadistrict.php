<?php
$matp = file_get_contents('php://input');

$conn = mysqli_connect('localhost', 'root', '', 'sellingbook') or die ('Kết nối DB thất bại');
$query = "SELECT * FROM devvn_quanhuyen WHERE matp = '" . $matp . "'";
$result = mysqli_query($conn, $query);

$datas = array();

// JSON - string
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $datas[] = array(
            'maqh' => $row['maqh'],
            'ten' => $row['name'],
            'kieu' => $row['type']
        );
    }
}

die(json_encode($datas));

?>