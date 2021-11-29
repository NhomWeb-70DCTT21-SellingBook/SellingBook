<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Book Buy</title>
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
    <link rel="stylesheet" href="../assets/css/style_trangthai.css">
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
                    <a href="#" class="app-header__logout">
                        <span class="material-icons-outlined">logout</span>
                        <p class="hide-on-moblie">Đăng xuất</p>
                    </a>
                </div>
            </div>
        </header>

        <div class="app__container">
            <div class="app-content__linker">
                <div class="grid wide">
                    <ul class="app-content__linker-wrapper">
                        <li><a href="#"><span class="material-icons-outlined">home</span>Trang chủ</a></li>
                        <li><a href="#">/ Quản trị</a></li>
                        <li><a href="#">/ Quản lý đơn đặt hàng</a></li>
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
                                    <div class="app-container-menu-user-info__name">Admin</div>
                                    <div class="app-container-menu-user-info__email">admin@gmail.com</div>
                                </div>
                            </div>
                            <ul class="app-container-menu__control">
                                <li class="app-container-menu-control__item">
                                    <a href="http://localhost/LearnPHP/SellingBook/HTML/admin.html">
                                        <span class="material-icons-outlined">book</span>
                                        Quản lý thông tin sách
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item">
                                    <a href="http://localhost/LearnPHP/SellingBook/HTML/admin_category.html">
                                        <span class="material-icons-outlined">category</span>
                                        Quản lý danh mục sách
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item">
                                    <a href="http://localhost/LearnPHP/SellingBook/PHP/quanlybanhang.php">
                                        <span class="material-icons-outlined">inventory</span>
                                        Quản lý đơn đặt hàng
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item active-color">
                                    <a href="#">
                                        <span class="material-icons-outlined">manage_accounts</span>
                                        Quản lý tài khoản
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
                            <div class="app-container-content__text">Cập nhật tài khoản</div>
                            
                            <div class="app-container-content__text_php" style="width: 100%;">
                            <?php
                                $id = $_GET['id'];
                                $hoTen="";
                                $idTaiKhoan="";
                                $ngaySinh="";
                                $gioiTinh="";
                                $sdt="";
                                $user="";
                                $email="";
                                $pass="";
                                $phan_quyen="";
                                $conn = mysqli_connect('localhost', 'root', '', 'sellingbook');
                                if($conn==true)
                                {
                                    $query="select u.id,id_tai_khoan,ho_ten,gioi_tinh,sdt,ngay_sinh,username,u.email,password,phan_quyen from account a,user u where a.id=u.id_tai_khoan and u.id='".$id."'";
                                    $result=mysqli_query($conn,$query);
                                    if($result)
                                    {
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            $hoTen=$row["ho_ten"];
                                            $ngaySinh=$row["ngay_sinh"];
                                            $gioiTinh=$row["gioi_tinh"];
                                            $sdt=$row["sdt"];
                                            $email=$row["email"];
                                            $idTaiKhoan=$row["id_tai_khoan"];
                                            $user=$row["username"];                                          
                                            $pass=$row["password"];
                                            $phan_quyen=$row["phan_quyen"];
                                        }
                                    }
                                    else
                                    {
                                        echo "Không tìm thấy tài khoản có id là " .$id;
                                    }                              

                                }
                                else
                                {
                                    echo "Kết nối thất bại !". mysqli_connect_error();
                                }
                                mysqli_close($conn);
                            ?>
                            <div class="main">
                            <form action="" method="POST">
                                <table>
                                    <tr>
                                        <td>ID: </td>
                                        <td>
                                            <input type="text" class="input_tpye" name="txtId" id="id" required value="<?php echo $id?>" readonly disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ID tài khoản: </td>
                                        <td>
                                            <input type="text" class="input_tpye" name="txtIdTk" id="id" required value="<?php echo $idTaiKhoan?>" readonly disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Họ và tên: </td>
                                        <td>
                                            <input type="text" class="input_tpye" name="txtHoTen" id="hoTen" required value="<?php echo $hoTen?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ngày sinh: </td>
                                        <td>
                                            <input type="date" class="input_tpye" name="dtpNgaySinh" id="ngaySinh" required value="<?php echo $ngaySinh?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Giới tính: </td>
                                        <td><input type="radio" class="input_tpye" name="gioiTinh" id="Nam" required value="0"<?php echo($gioiTinh=='0') ? "checked" : ""?>>Nam
                                            <input type="radio" class="input_tpye" name="gioiTinh" id="Nữ" required value="1"<?php echo($gioiTinh=='1') ? "checked" : ""?>>Nữ
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại: </td>
                                        <td>
                                            <input type="text" class="input_tpye" name="txtSdt" id="sdt" required value="<?php echo $sdt?>">
                                            
                                    </tr>
                                    <tr>
                                        <td>Email: </td>
                                        <td>
                                            <input type="text" class="input_tpye" name="txtEmail" id="email"  required value="<?php echo $email?>" >
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Tên đăng nhập: </td>
                                        <td>
                                            <input type="text" class="input_tpye" name="txtUser" id="user" required value="<?php echo $user;?>">
                                        </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <td>Mật khẩu: </td>
                                        <td> 
                                            <input type="text" class="input_tpye" name="txtPass" id="pass" required value="<?php echo $pass?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Phân quyền:</td>
                                        <td>
                                            <select name="phan_quyen" id='cbo'>
                                            <?php 
                                                if ($phan_quyen==0) {
                                                    echo "<option value='0' selected=''>User</option>
                                                    <option value='1' >Admin</option>";
                                                }
                                                else if ($phan_quyen==1) {
                                                    echo "<option value='0' >user</option>
                                                    <option value='1' selected=''>Admin</option>";
                                                }
                                               
                                            ?>
                                            </select>
                                        </td>
                                    </tr>
                                   
                                    
                                </table>
                                <div class="put" style="padding-top: 15px;">
                                        <input type="submit" name="btnSave" value="Sửa dữ liệu" class="btntrangthai">
                                        <input  type="submit" name="btnDelete" value="Xóa dữ liệu" style="float: right;" class="btntrangthai" id="btnDelete">
                                    <a href="quanLyTaiKhoan.php" class="btntrangthai">Quay lại</a>
                                </div>
                                
                            </form>
                            <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['btnSave'])) {
                                    # code...
                                    updatedata();
                                }
                                
                                function updatedata() {
                                    //name
                                    $id = $_GET['id'];
                                    $hoTen=$_POST["txtHoTen"];
                                    $gioiTinh=$_POST["gioiTinh"];
                                    $sdt=$_POST["txtSdt"];
                                    $ngaySinh=$_POST["dtpNgaySinh"];
                                    $user=$_POST["txtUser"];
                                    $pass=$_POST["txtPass"];
                                    $email=$_POST["txtEmail"];
                                    $phan_quyen=$_POST["phan_quyen"];
                                    $conn = mysqli_connect('localhost', 'root', '', 'sellingbook');
                                
                                    if ($conn==true) {
                                        $query = "UPDATE account a,user u SET username='".$user."',email='".$email."',password='".$pass."',phan_quyen='".$phan_quyen."',ho_ten='".$hoTen."',
                                        ngay_sinh='".$ngaySinh."',sdt='".$sdt."',gioi_tinh='".$gioiTinh."' where a.id=u.id_tai_khoan and u.id='".$id."'";
                                        echo  $query;
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            echo "<script type='text/javascript'>";
                                            echo "alert('Sửa tài khoản thành công!');";
                                            echo "</script>";
                                        } else {
                                            echo 'Sửa tài khoản không thành công!';
                                        }
                                    } else {
                                        echo 'Kết nối thất bại'. mysqli_connect_errno();
                                    }
                                    mysqli_close($conn);
                                }
                            ?>
                            
                            <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['btnDelete'])) {
                                    # code...
                                    deletedata();
                                }
                                function deletedata() {
                                    $id = $_GET['id'];
                                    $conn = mysqli_connect("localhost","root","","sellingbook");
                                    if ($conn == true) {
                                        $queryGetIdTk="select id_tai_khoan from user where id='".$id."'";
                                        $resultGetIdTk=mysqli_query($conn,$queryGetIdTk);
                                        if($resultGetIdTk==true)
                                        {
                                            $rows=mysqli_fetch_assoc($resultGetIdTk);
                                            $idTk=$rows["id_tai_khoan"];
                                            $query ="delete from user where id='".$id."'";
                                            $queryAccount="delete from account where id='".$idTk."'";
                                            $result = mysqli_query($conn,$query);
                                            $resultAccount=mysqli_query($conn,$queryAccount);
                                            if ($result>0 && $resultAccount>0) {
                                                echo "<script type='text/javascript'>";
                                                echo "alert('Xóa thành công!');";
                                                echo "window.location.href='quanLyTaiKhoan.php';";
                                                echo "</script>";
                                            }
                                            else{
                                                echo "Lỗi";
                                            }
                                        }
                                        else
                                        {
                                            echo "Không lấy ra được id tài khoản";
                                        }
                                        
                                    }
                                    else{
                                        echo "Kết nối không thành công !".mysqli_connect_error();
                                    }
                                    mysqli_close($conn);
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
 <script type="text/javascript">
    var xoa = document.getElementById("btnDelete");
    xoa.onclick = function(){
        return confirm("Bạn có thực sự muốn xóa dữ liệu không ?");
    }
</script>
</html>