<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Book Buy|Quản lý Tài Khoản</title>
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
    <link rel="stylesheet" href="../assets/css/style_hoadon.css">
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
                        <li><a href="home.html"><span class="material-icons-outlined">home</span>Trang chủ</a></li>
                        <li><a href="#">/ Quản trị</a></li>
                        <li><a href="quanLyTaiKhoan.php">/ Quản lý đơn đặt hàng</a></li>
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
                                    <a href="admin.html">
                                        <span class="material-icons-outlined">book</span>
                                        Quản lý thông tin sách
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item">
                                    <a href="admin_category.html">
                                        <span class="material-icons-outlined">category</span>
                                        Quản lý danh mục sách
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item">
                                    <a href="quanlybanhang.php">
                                        <span class="material-icons-outlined">inventory</span>
                                        Quản lý đơn đặt hàng
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item active-color">
                                    <a href="quanLyTaiKhoan.php">
                                        <span class="material-icons-outlined">manage_accounts</span>
                                        Quản lý tài khoản
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item">
                                    <a href="chat.html">
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
                            <div class="app-container-content__text">Danh sách đơn đặt hàng</div>
                            <form action="" method="POST">
                            <div class="app-container-content__search">
                                <!-- Re-use header search -->
                                <div class="app-header__search" style="background-color: transparent;">
                                    
                                    <button class="material-icons-outlined" style="background-color: orange; color: white; border: none;" id="btn_search" name="btn_search">search</button>
                                    
                                    <!-- <input type="hidden" name="id-cate" id="id-cate" value=""> -->
                                     <input type="text" id="txtHoTen" name="txt-search_hoTen" placeholder="Nhập họ tên người dùng">
                                    <!-- <select name="txt-search_donhang" id="txt-search_donhang">
                                        <option value="" name="hocvan" value="">Hiển thị tất cả đơn hàng</option>
                                        <option value="0" name="hocvan" value="">Chờ xác nhận</option>
                                        <option value="1" name="hocvan" value="">Đã đóng gói</option>
                                        <option value="2" name="hocvan" value="">Đang vận chuyển</option>
                                        <option value="3" name="hocvan" value="">Đã hoàn thành</option>
                                        
                                    </select>
                                     -->
                                    
                                </div>
                                <!-- Re-use header filter home page -->
                                
                            </div></form>
                            <div class="app-container-content__text_php" style="width: 100%;">
                             <div class="app-container-content__btn-add">
                             <a href='addTk_user.php' class='btntrangthai'>+ Thêm mới người dùng</a>
                            </div>
                            <?php
                                $conn=mysqli_connect("localhost","root","","sellingbook") or die('Loi ket noi DB');
                                if($conn==true)
                                {
                                    $query="select u.id,id_tai_khoan,ho_ten,gioi_tinh,sdt,ngay_sinh,username,u.email,password,phan_quyen from account a,user u where a.id=u.id_tai_khoan";
                                    $result=mysqli_query($conn,$query);
                                    if($result)
                                    {
                                        echo "<table id='tblMain'><thead>";
                                        echo "<th>Mã người dùng</th><th>Họ tên</th><th>Thông tin</th><th>Mã tài khoản</th><th>Tên đăng nhập</th><th>Mật khẩu</th><th>Phân quyền</th><th>Thao tác</th>";
                                        echo "</thead>";
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            echo "<tr>";
                                            echo "<td>".$row["id"]."</td>";
                                            echo "<td>".$row["ho_ten"]."</td>";
                                            echo "<td>";
                                            echo "Ngày sinh: ".$row["ngay_sinh"]."</br>";
                                            if($row["gioi_tinh"]==0)
                                            {
                                                echo "Giới tính: Nam";
                                            }
                                            else
                                            {
                                                echo "Giới tính: Nữ";
                                            }
                                            echo "</br>";
                                            echo "Số điện thoại: ".$row["sdt"]."</br>";
                                            echo "Email: ".$row["email"];
                                            echo "</td>";
                                            echo "<td>".$row["id_tai_khoan"]."</td>";
                                            echo "<td>".$row["username"]."</td>";
                                            echo "<td>".$row["password"]."</td>";
                                            if($row["phan_quyen"]==0)
                                            {
                                                echo "<td>user</td>";
                                            }
                                            else if($row["phan_quyen"]==1)
                                            {
                                                echo "<td>admin</td>";
                                            }
                                            else
                                            {
                                                echo "";
                                            }
                                            echo "<td>"."<a href='updateAccount.php?id=".$row["id"]."' class='btntrangthai'>Cập nhật</a>"."</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                    else
                                    {
                                        echo "Không có bản ghi !";
                                    }
                                }
                                else
                                {
                                    echo "Kết nối không thành công !". mysqli_connect_error();
                                }
                                mysqli_close($conn);
                            ?>

                                    <?php
                                        if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['btn_search'])) {
                                            
                                            Searchbyname();
                                           
                                           
                                        }
                                        function Searchbyname(){
                                            echo "<script type='text/javascript'>var Main=document.getElementById('tblMain');Main.innerHTML=''</script>";
                               
                                            $key = $_POST['txt-search_hoTen'];
                                            
                                            echo "<script type='text/javascript'>var txt-search=document.getElementById('txtHoTen');txt-search.value='".$key."'</script>";
                                            $conn = mysqli_connect("localhost","root","","sellingbook");
                                           if ($conn == true) {
                               
                                           $query = "select u.id,id_tai_khoan,ho_ten,gioi_tinh,sdt,ngay_sinh,username,email,password,phan_quyen from account a,user u where a.id=u.id_tai_khoan and ho_ten like N'%".$key."%'";
                                           $result = mysqli_query($conn,$query);
                                           if(mysqli_num_rows($result)>0)
                                           {
                                               echo "<table><thead>";
                                               echo "<th>Mã người dùng</th><th>Họ tên</th><th>Thông tin</th><th>Mã tài khoản</th><th>Tên đăng nhập</th><th>Mật khẩu</th><th>Phân quyền</th><th>Thao tác</th>";
                                               echo "</thead>";
                                               while($row=mysqli_fetch_assoc($result))
                                               {
                                                   echo "<tr>";
                                                   echo "<td>".$row["id"]."</td>";
                                                   echo "<td>".$row["ho_ten"]."</td>";
                                                   echo "<td>";
                                                   echo "Ngày sinh: ".$row["ngay_sinh"]."</br>";
                                                   if($row["gioi_tinh"]==0)
                                                   {
                                                       echo "Giới tính: Nam";
                                                   }
                                                   else
                                                   {
                                                       echo "Giới tính: Nữ";
                                                   }
                                                   echo "</br>";
                                                   echo "Số điện thoại: ".$row["sdt"]."</br>";
                                                   echo "Email: ".$row["email"];
                                                   echo "</td>";
                                                   echo "<td>".$row["id_tai_khoan"]."</td>";
                                                   echo "<td>".$row["username"]."</td>";
                                                   echo "<td>".$row["password"]."</td>";
                                                   if($row["phan_quyen"]==0)
                                                   {
                                                       echo "<td>user</td>";
                                                   }
                                                   else if($row["phan_quyen"]==1)
                                                   {
                                                       echo "<td>admin</td>";
                                                   }
                                                   else
                                                   {
                                                       echo "";
                                                   }
                                                   echo "<td>"."<a href='updateAccount.php?id=".$row["id"]."' class='btntrangthai'>Cập nhật</a>"."</td>";
                                                   echo "</tr>";
                                               }
                                               echo "</table>";
                                           }
                                           else
                                           {
                                               echo "Không có bản ghi !";
                                           }
                                           
                                       }
                                       else{
                                           echo "không kết nối được dữ liệu";
                                       }
                                        }
                                    ?>
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