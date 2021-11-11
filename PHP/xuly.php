<?php
    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (!isset($_POST['txtUsername'])){
        die('');
    }
     
    //Nhúng file kết nối với database
    include('ketnoi.php');
          
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
          
    //Lấy dữ liệu từ file dangky.php
    $username   = addslashes($_POST['txtUsername']);
    $password   = addslashes($_POST['txtPassword']);
    $email      = addslashes($_POST['txtEmail']);
    //kiem tra nhapj du chua
    if (!$username || !$password || !$email )
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     // Mã khóa mật khẩu
     $password = md5($password);
      //Kiểm tra tên đăng nhập này đã có người dùng chưa
    $conn = mysqli_connect('localhost', 'root', '', 'sellingbook');
    $query = "SELECT username FROM account WHERE username = '".$username."' ";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) >0) {
        echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
    //Kiểm tra email có đúng định dạng hay không
    if (!mb_eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
    {
        echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
    //Kiểm tra email đã có người dùng chưa
    $conn = mysqli_connect('localhost', 'root', '', 'sellingbook');
    $query = "SELECT email FROM account WHERE email='".$email."' ";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) >0) {
        echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    //Thêm tài khoản
    function insertData() {
        $username   = addslashes($_POST['txtUsername']);
        $password   = addslashes($_POST['txtPassword']);
        $email      = addslashes($_POST['txtEmail']);
        
        $conn = mysqli_connect('localhost', 'root', '', 'sellingbook');
    
        if ($conn) {
            $query = "INSERT INTO account(username,password,email) VALUES ('" . $username ."', '". $password . "', '". $email . "')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo 'Thêm sinh viên thành công!';
            } else {
                echo 'Thêm sinh viên không thành công!';
            }
        } else {
            echo 'Kết nối thất bại', mysqli_connect_errno();
        }
    }
    insertData();
        
?>