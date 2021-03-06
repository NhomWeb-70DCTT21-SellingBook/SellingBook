<?php
//Khai báo sử dụng session
session_start();
 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 
//Xử lý đăng nhập
if (isset($_POST['dangnhap'])) 
{
    //Kết nối tới database
    include('ketnoi.php');
     
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['txtEmail']);
    $password = addslashes($_POST['txtPassword']);
    
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    
     
    //Kiểm tra tên đăng nhập có tồn tại không
    // $query = mysqli_query("SELECT username, password FROM account WHERE username='$username'");
    $conn =mysqli_connect('localhost', 'root', '', 'sellingbook');
    $query = "SELECT id, username, password FROM account WHERE username='".$username."'";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) <=0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    
    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_assoc($result);

    // Lấy id ra
    $id = $row['id'];
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Lưu tên đăng nhập
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $username;
    
    header('Location: home.html');
    die();
}
?>