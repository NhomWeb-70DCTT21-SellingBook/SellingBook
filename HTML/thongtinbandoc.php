<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin bạn đọc | Book Buy</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
        integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/icon?family=Poppins:display=swap|Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/style_admin.css">
    <link rel="stylesheet" href="../assets/css/responsive_base.css">
    <link rel="stylesheet" href="../assets/css/responsive_admin.css">
    <link rel="stylesheet" href="../assets/css/style_thongtinbandoc.css">
    
</head>

<body>
    <div class="app">
        <header class="app__header">
            <div class="grid wide">
                <div class="app__header-wrapper">
                    <div class="app-header__img hide-on-moblie">
                        <img src="../assets/images/logo-new.png" alt="logo-new" srcset="">
                    </div>
                    <div class="app-header__search">
                        <span class="material-icons-outlined">search</span>
                        <input type="text" id="txt-search" name="txt-search" placeholder="Bạn muốn tìm gì?">
                    </div>
                    <div href="#" class="app-header__logout">
                        <span class="material-icons-outlined">logout</span>
                        <a href="logout.php" class="hide-on-moblie" style="color: black; text-decoration: none;">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </header>

        <div class="app__container">
            <div class="app-content__linker">
                <div class="grid wide">
                    <ul class="app-content__linker-wrapper">
                        <li><a href="home.html"><span class="material-icons-outlined">home</span>Trang chủ</a></li>
                        <li><a href="thongtinbandoc.php">/ Thông tin độc giả</a></li>
                    </ul>
                </div>
            </div>
            <div class="grid wide">
                <div class="row">
                    <div class="col l-3 m-12 c-12">
                        <div class="app-container__menu">
                            <div class="app-container-menu__user">
                                <div class="app-container-menu-user__img">
                                    <img src="../assets/images/5ef966aae04712194b56.jpg" alt="user-image">
                                </div>
                                <div class="app-container-menu-user__info">
                                    <!-- <div class="app-container-menu-user-info__name">Nguyễn Quốc Khánh</div>
                                    <div class="app-container-menu-user-info__email">quockhanh01091@gmail.com</div> -->
                                    <span class="app-container-menu-user-info__name" id="hoten_change">Nguyễn Quốc Khánh</span>
                                    <span class="app-container-menu-user-info__email" id="email_change">quockhanh@gmail.com</span>
                                </div>
                            </div>
                            <ul class="app-container-menu__control">
                                <li class="app-container-menu-control__item active-color">
                                    <a href="#">
                                        <span class="material-icons-outlined">book</span>
                                        
                                        Thông tin bạn đọc
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item" >
                                    <a href="#">
                                        <span class="material-icons-outlined">inventory</span>
                                        Thông báo
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item">
                                    <a href="#">
                                        <span class="material-icons-outlined">question_answer</span>
                                        Chat với khách hàng
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item">
                                    <a href="#">
                                        <span class="material-icons-outlined">info</span>
                                        Thông tin cửa hàng
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col l-9 m-12 c-12">
                        <div class="app-container__content">
                            <div class="app-container-content__text text_tieude">Thông tin bạn đọc</div>
                            <p>Thông tin cá nhân của tài khoản bạn <br></p>
                            <hr style="margin: 12px 0; opacity: 0.6;">
                            <div class="get_information">
                            
                            <?php 
                                if (isset($_SESSION['email']) && $_SESSION['email']){
                                    echo 'Bạn đã đăng nhập với tên là '.$_SESSION['email']."<br/>";
                                }
                                else{
                                    echo 'Bạn chưa đăng nhập';
                                }
                                ?>
                            </div>
                            <div class="app-container__content_php">
                                <div class="app-container__content_php_left">
                                <?php
                                $id_tai_khoan = ''; $username = ''; $password = ''; $ho_ten = ''; $gioi_tinh = ''; $sdt = ''; $ngay_sinh = ''; $email = '';
                                $conn = mysqli_connect('localhost', 'root', '', 'sellingbook') or die('Loi ket noi DB');
                                if ($conn) {
                                    $id_account = $_SESSION['id'];
                                    $query = "SELECT * FROM account a,user u WHERE u.id_tai_khoan = a.id and a.id='".$id_account."'";
                            
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id_tai_khoan = $row['id_tai_khoan'];
                                            $username = $row['username'];
                                            $password = $row['password'];
                                            $ho_ten = $row['ho_ten'];
                                            $gioi_tinh = $row['gioi_tinh'];
                                            $sdt = $row['sdt'];
                                            $ngay_sinh = $row['ngay_sinh'];
                                            $email = $row['email'];
                                        }
                                    }
                                    else {
                                        echo 'Không tìm thấy tài khoản!';
                                    }
                                }
                                else {
                                    echo 'Kết nối thất bại!';
                                }
                            ?>
                                <form action="" method="POST">
                                    
                                        <table style="width: 80%;">
                                            <tr>
                                                <td class="input_type active-color">ID:</td >
                                                <td class="input_type">
                                                    <input type="text" name ="id_tai_khoan" value="<?php echo isset($_POST['id_tai_khoan'])?$_POST['id_tai_khoan']:$id_tai_khoan ?>" id="id_tai_khoan" required class="input_type_text" value="<?php echo $id_tai_khoan;?>" readonly>
                                                </td >
                                            </tr>
                                            <tr>
                                                <td class="input_type active-color">USER NAME:</td >
                                                <td class="input_type">
                                                    <input type="text" name ="username" value="<?php echo isset($_POST['username'])?$_POST['username']:$username ?>" id="username" required class="input_type_text" value="<?php echo $username;?>" readonly>
                                                </td >
                                            </tr>
                                            <tr>
                                                <td class="input_type active-color">PASSWORD:</td >
                                                <td class="input_type">
                                                    <input type="text" name ="password" value="<?php echo isset($_POST['password'])?$_POST['password']:$password ?>" id="password" required class="input_type_text" value="<?php echo $password;?>" readonly>
                                                </td >
                                            </tr>
                                            <tr>
                                                <td class="input_type active-color">Họ và tên:</td >
                                                <td class="input_type">
                                                    <input class="input_type_text" value="<?php echo isset($_POST['ho_ten'])?$_POST['ho_ten']:$ho_ten ?>" type="text" name="ho_ten" id="ho_ten" required value="<?php echo $ho_ten;?>" readonly>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="input_type active-color">Giới tinh:</td >
                                                <td class="input_type">
                                                    <input class="input_type_text" value="<?php echo isset($_POST['gioi_tinh'])?$_POST['gioi_tinh']:$gioi_tinh ?>" type="text" name="gioi_tinh" id="gioi_tinh" required value="<?php echo $gioi_tinh;?>" readonly>
                                                    
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="input_type active-color">Số điện thoại:</td >
                                                <td class="input_type">
                                                    <input type="tel" value="<?php echo isset($_POST['sdt'])?$_POST['sdt']:$sdt ?>"  name="sdt" id="sdt" required class="input_type_text" value="<?php echo $sdt;?>" readonly>
                                                </td >
                                            </tr>
                                            <tr>
                                            <td class="input_type active-color">Ngày sinh:</td >
                                                <td class="input_type">
                                                    <input type="date" value="<?php echo isset($_POST['ngay_sinh'])?$_POST['ngay_sinh']:$ngay_sinh ?>"  name="ngay_sinh" id="ngay_sinh" required class="input_type_text" value="<?php echo $ngay_sinh;?>" readonly>
                                                </td >
                                            </tr>
                                            <tr>
                                            <td class="input_type active-color">Email:</td >
                                                <td class="input_type">
                                                    <input type="text"  value="<?php echo isset($_POST['email'])?$_POST['email']:$email ?>"  name="email" id="email" required class="input_type_text" value="<?php echo $email;?>" readonly>
                                                </td >
                                            </tr>
                                        </table>
                                    <span class="app__btn" id="button_change">Thay đổi thông tin</span>
                                    <button name="btnSave" id="btnSave" class="app__btn" style="border: none;">Lưu thay đổi</button>
                                </form>
                                <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['btnSave'])) {
                                    # code...
                                    updatedata();
                                    
                                }
                                
                                function updatedata() {
                                    $id_tai_khoan = $_POST['id_tai_khoan'];
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];
                                    $ho_ten = $_POST['ho_ten'];
                                    $gioi_tinh = $_POST['gioi_tinh'];
                                    $sdt = $_POST['sdt'];
                                    $ngay_sinh = $_POST['ngay_sinh'];
                                    $email = $_POST['email'];
                                    
                                
                                    
                                    $conn = mysqli_connect('localhost', 'root', '', 'sellingbook');
                                
                                    if ($conn) {
                                        $query = "UPDATE user u,account a SET ho_ten ='".$ho_ten."', username ='".$username."', password ='".$password."', gioi_tinh ='".$gioi_tinh."', sdt ='".$sdt."', ngay_sinh ='".$ngay_sinh."', email ='".$email."' WHERE u.id_tai_khoan = a.id and a.id ='".$id_tai_khoan."'";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            echo '<script>
                                            alert("sửa thông tin thành công")
                                            
                                        </script>';

                                        } else {
                                            echo 'Sửa  thông tin không thành công!';
                                        }
                                    } else {
                                        echo 'Kết nối thất bại', mysqli_connect_errno();
                                    }
                                }
                                
                            ?>
                                
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <footer class="app__footer">
            <p>Powered by <a href="https://github.com/kasisoiqk">Khanh dz 2021</a></p>
        </footer>
        
    </div>
    
</body>
<script src="../assets/js/main_base.js"></script>
<script>
    var change = document.getElementById("button_change");
    change.onclick = function(){
        var modal = document.querySelectorAll(".input_type_text");
        modal.forEach(function(value){
            value.readOnly = false;
            
        })
    
    }
    var name = document.getElementById("ho_ten").value
    document.getElementById("hoten_change").innerText = name;
    var email = document.getElementById("email").value
    document.getElementById("email_change").innerText = email;
    

</script>

</html>