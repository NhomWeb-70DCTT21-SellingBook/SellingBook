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
                        <li><a href="#">/ Quản lý thông tin sách</a></li>
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
                                <li class="app-container-menu-control__item active-color">
                                    <a href="#">
                                        <span class="material-icons-outlined">book</span>
                                        Quản lý thông tin sách
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item" >
                                    <a href="#">
                                        <span class="material-icons-outlined">inventory</span>
                                        Quản lý đơn đặt hàng
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
                            <div class="app-container-content__text">Chỉnh sửa đơn đặt hàng</div>
                            
                            <div class="app-container-content__text_php" style="width: 100%;">
                            <?php
                                $id = $_GET['id'];
                                $conn = mysqli_connect('localhost', 'root', '', 'sellingbook');
                                if ($conn) {
                                    //$query = "SELECT * FROM bill WHERE id = '" . $id . "'";
                                    $query = "SELECT * FROM bill l,customer c,address d WHERE l.id_nguoimua = c.id and d.id = c.id_diachi and l.id =  '" . $id . "'";
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id_nguoimua = $row['id_nguoimua'];
                                            $ho_ten = $row['ho_ten'];
                                            $sdt = $row['sdt'];
                                            $thong_tin_them = $row['thong_tin_them'];
                                            $tinh_tp = $row['tinh_tp'];
                                            $quan_huyen = $row['quan_huyen'];
                                            $xa_phuong = $row['xa_phuong'];
                                            $so_nha = $row['so_nha'];
                                            $thoi_gian_dat = $row['thoi_gian_dat'];
                                            $thoi_gian_nhan = $row['thoi_gian_nhan'];
                                            $trang_thai = $row['trang_thai'];
                                            $tong_tien = $row['tong_tien'];
                                        }
                                    }
                                    else {
                                        echo 'Không tìm thấy đơn hàng!';
                                    }
                                }
                                else {
                                    echo 'Kết nối thất bại!';
                                }
                            ?>
                            <div class="main">
                            <form action="" method="POST">
                                <table>
                                    <tr>
                                        <td style="font-size: 20px; font-weight: bold; color: orange;">Thông tin người mua hàng:</td>
                                    </tr>
                                    <tr>
                                        <td>ID:</td>
                                        <td>
                                            <input type="text" class="input_tpye" name="id_nguoimua" id="id_nguoimua" required value="<?php echo $id_nguoimua;?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Họ tên:</td>
                                        <td>
                                            <input type="text" class="input_tpye" name="ho_ten" id="ho_ten" required value="<?php echo $ho_ten;?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại:</td>
                                        <td>
                                            <input type="text" class="input_tpye" name="sdt" id="sdt" required value="<?php echo $sdt;?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Thông tin thêm:</td>
                                        <td>
                                            <input type="text" class="input_tpye" name="thong_tin_them" id="thong_tin_them" required value="<?php echo $thong_tin_them;?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tỉnh:</td>
                                        <td>
                                            <input type="text" class="input_tpye" name="tinh_tp" id="tinh_tp" required value="<?php echo $tinh_tp;?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Quận / Huyện:</td>
                                        <td>
                                            <input type="text" class="input_tpye" name="quan_huyen" id="quan_huyen" required value="<?php echo $quan_huyen;?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Xã / Phường:</td>
                                        <td>
                                            <input type="text" class="input_tpye" name="xa_phuong" id="xa_phuong" required value="<?php echo $xa_phuong;?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Số Nhà:</td>
                                        <td>
                                            <input type="text" class="input_tpye" name="so_nha" id="so_nha" required value="<?php echo $so_nha;?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 20px; font-weight: bold; color: orange;">Thông tin đơn hàng:</td>
                                    </tr>
                                    <tr>
                                        <td>Thời gian đặt hàng:</td>
                                        <td>
                                            <input type="datetime" class="input_tpye" name="thoi_gian_dat" id="thoi_gian_dat" required value="<?php echo $thoi_gian_dat;?>" readonly>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Thời gian nhận hàng:</td>
                                        <td>
                                            
                                            <input type="datetime" class="input_tpye" name="thoi_gian_nhan" id="thoi_gian_nhan" value="<?php echo $thoi_gian_nhan;?>" required  readonly>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Trạng thái:</td>
                                        <td>
                                            <select name="trang_thai" id='cbo'>
                                            <?php 
                                                if ($trang_thai==0) {
                                                    echo "<option value='0' selected=''>Chờ xác nhận</option>
                                                    <option value='1' >Đã đóng gói</option>
                                                    <option value='2'>Đang vận chuyển</option>
                                                    <option value='3'>Đã hoàn thành</option>";
                                                }
                                                elseif ($trang_thai==1) {
                                                    echo "<option value='0'>Chờ xác nhận</option>
                                                    <option value='1' selected=''>Đã đóng gói</option>
                                                    <option value='2'>Đang vận chuyển</option>
                                                    <option value='3'>Đã hoàn thành</option>";
                                                }
                                                elseif ($trang_thai==2) {
                                                    echo "<option value='0'>Chờ xác nhận</option>
                                                    <option value='1'>Đã đóng gói</option>
                                                    <option value='2'selected=''>Đang vận chuyển</option>
                                                    <option value='3'>Đã hoàn thành</option>";
                                                }
                                                elseif ($trang_thai==3) {
                                                    echo "<option value='0'>Chờ xác nhận</option>
                                                    <option value='1'>Đã đóng gói</option>
                                                    <option value='2'>Đang vận chuyển</option>
                                                    <option value='3' selected=''>Đã hoàn thành</option>";

                                                }
                                            ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tổng tiền:</td>
                                        <td>
                                            <input type="text" class="input_tpye" name="tong_tien" id="tong_tien" required value="<?php echo $tong_tien;?>" readonly>
                                        </td>
                                    </tr>
                                    
                                </table>
                                <div class="put" style="padding-top: 15px;">
                                        <input type="submit" name="btnSave" value="Sửa dữ liệu" class="btntrangthai">
                                        <input type="submit" name="btnDelete" value="Xóa hóa đơn" style="float: right;" class="btntrangthai" id="btnDelete">
                                    <a href="quanlybanhang.php" class="btntrangthai">Quay lại</a>
                                </div>
                                
                            </form>
                            <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['btnSave'])) {
                                    # code...
                                    updatedata();
                                }
                                
                                function updatedata() {
                                    $id = $_GET['id'];
                                    
                                    $id_nguoimua = $_POST['id_nguoimua'];
                                    $thoi_gian_dat = $_POST['thoi_gian_dat'];
                                    $thoi_gian_nhan = $_POST['thoi_gian_nhan'];
                                    $trang_thai = $_POST['trang_thai'];
                                    $tong_tien = $_POST['tong_tien'];

                                    // $thoigian = date("Y-m-d H:i:s");
                                    // if($trang_thai==3){
                                        
                                    //     $thoi_gian_nhan = $thoigian;
                                    // }
                                    // else 
                                    // $thoi_gian_nhan = date("0-0-0-0-0-0");

                                    $conn = mysqli_connect('localhost', 'root', '', 'sellingbook');
                                
                                    if ($conn) {
                                        $query = "UPDATE bill l,customer c,address d SET id_nguoimua ='".$id_nguoimua."', thoi_gian_dat ='".$thoi_gian_dat."', thoi_gian_nhan = NOW() , trang_thai ='".$trang_thai."', tong_tien ='".$tong_tien."' WHERE l.id_nguoimua = c.id and d.id = c.id_diachi and l.id ='".$id."'";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            echo '<script>
                                            alert("sửa thông tin thành công")
                                            
                                        </script>';
                                        } else {
                                            echo 'Sửa đơn hàng không thành công!';
                                        }
                                    } else {
                                        echo 'Kết nối thất bại', mysqli_connect_errno();
                                    }
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
                                        $query = "DELETE FROM bill WHERE id='".$id."'";
                                        $result = mysqli_query($conn,$query);
                                        if ($result>0) {
                                            echo "<script type='text/javascript'>";
                                            echo "alert('xóa thành công');";
                                            echo "window.location.href='quanlybanhang.php';";
                                            echo "</script>";
                                        }
                                        else{
                                            echo "Sai";
                                        }
                                        
                                    }
                                    else{
                                        echo "sr";
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
<script type="text/javascript">
    var xoa = document.getElementById("btnDelete");
    xoa.onclick = function(){
        return confirm("ban co muon xoa khong");
    }
</script>
</html>