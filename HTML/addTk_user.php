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
                                    <div class="app-container-menu-user-info__name">Nguyễn Quốc Khánh</div>
                                    <div class="app-container-menu-user-info__email">quockhanh01091@gmail.com</div>
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
                                <li class="app-container-menu-control__item active-color">
                                    <a href="http://localhost/LearnPHP/SellingBook/PHP/quanlybanhang.php">
                                        <span class="material-icons-outlined">inventory</span>
                                        Quản lý đơn đặt hàng
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item">
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
                            <div class="app-container-content__text">Thêm tài khoản</div>
                            
                            <div class="app-container-content__text_php" style="width: 100%;">
                            
                            <div class="main">
                            <form action="" method="POST">
                                <table>                                 
                                    <tr>
                                        <td>Họ và tên: </td>
                                        <td>
                                            <input type="text" class="input_tpye" name="txtHoTen" id="hoTen" required value="" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ngày sinh: </td>
                                        <td>
                                            <input type="date" class="input_tpye" name="dtpNgaySinh" id="ngaySinh" required value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Giới tính: </td>
                                        <td><input type="radio" class="input_tpye" name="gioiTinh" id="Nam" required value="0">Nam
                                            <input type="radio" class="input_tpye" name="gioiTinh" id="Nữ" required value="1">Nữ
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại: </td>
                                        <td>
                                            <input type="text" class="input_tpye" name="txtSdt" id="sdt" required value="">
                                            
                                    </tr>
                                    <tr>
                                        <td>Email: </td>
                                        <td>
                                            <input type="text" class="input_tpye" name="txtEmail" id="email"  required value="" >
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Tên đăng nhập: </td>
                                        <td>
                                            <input type="text" class="input_tpye" name="txtUser" id="user" required value="">
                                        </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <td>Mật khẩu: </td>
                                        <td> 
                                            <input type="text" class="input_tpye" name="txtPass" id="pass" required value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Phân quyền:</td>
                                        <td>
                                            <select name="phan_quyen" id='cbo'>
                                            <option value='0' selected=''>User</option>
                                            <option value='1' >Admin</option>
                                            
                                            </select>
                                        </td>
                                    </tr>
                                   
                                    
                                </table>
                                <div class="put" style="padding-top: 15px;">
                                        <input type="submit" name="btnAdd" value="Thêm dữ liệu" class="btntrangthai">
                                        <a href="quanLyTaiKhoan.php" class="btntrangthai">Quay lại</a>
                                </div>
                                
                            </form>
                            <?php
                                if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['btnAdd'])){
                                    insert();
                                }
                                function insert()
                                {
                                    $hoTen=$_POST['txtHoTen'];
                                    $sdt=$_POST['txtSdt'];
                                    $gioiTinh=$_POST['gioiTinh'];
                                    $Email=$_POST['txtEmail'];
                                    $user=$_POST['txtUser'];
                                    $pass=$_POST['txtPass'];
                                    $ngaySinh=$_POST['dtpNgaySinh'];
                                    $phan_quyen=$_POST['phan_quyen'];
                                    $conn=mysqli_connect("localhost","root","","sellingbook");
                                    if($conn==true)
                                    {
                                        $query="insert into account(username,email,password,phan_quyen) values ('".$user."','".$Email."','".$pass."','".$phan_quyen."')";
                                        $result=mysqli_query($conn,$query);
                                       
                                        if($result==true )
                                        {
                                            echo "Thêm thành công! ";
                                            $getIdTk="select id from account group by id desc limit 1";
                                            $resultGetId=mysqli_query($conn,$getIdTk);
                                            if($resultGetId==true)
                                            {
                                                $row=mysqli_fetch_assoc($resultGetId);
                                                $idTK=$row["id"];
                                            }
                                            $queryUser="insert into user(id_tai_khoan,ho_ten,gioi_tinh,sdt,ngay_sinh) values ('".$idTK."','".$hoTen."','".$gioiTinh."','".$sdt."','".$ngaySinh."')";
                                            $resultUser=mysqli_query($conn,$queryUser);
                                            if($resultUser==true)
                                            {
                                                echo "Thêm thành công!";
                                            }
                                            else
                                            {
                                                echo "Thêm thất bại !";
                                            }
                                        } 
                                        else
                                        {
                                            echo "Không thành công !";
                                        }
                                    }
                                    else
                                    {
                                        echo "Kết nối không thành công".mysqli_connect_error();
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
 
</html>