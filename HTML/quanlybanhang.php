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
    <link rel="stylesheet" href="../assets/css/style_hoadon.css">

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
    <script src="../assets/css/jquery.table2excel.min.js"></script>
    <div class="app">
        <header class="app__header">
            <div class="grid wide">
                <div class="app__header-wrapper">
                    <div class="app-header__img hide-on-moblie">
                        <img src="../assets/images/logo-new.png" alt="logo-new" srcset="">
                    </div>
                    <div class="app-header__search">
                        <span class="material-icons-outlined">search</span>
                        <input type="text" id="txt-search" name="txt-search" placeholder="B???n mu???n t??m g???">
                    </div>
                    <a href="#" class="app-header__logout">
                        <span class="material-icons-outlined">logout</span>
                        <p class="hide-on-moblie">????ng xu???t</p>
                    </a>
                </div>
            </div>
        </header>

        <div class="app__container">
            <div class="app-content__linker">
                <div class="grid wide">
                    <ul class="app-content__linker-wrapper">
                        <li><a href="#"><span class="material-icons-outlined">home</span>Trang ch???</a></li>
                        <li><a href="#">/ Qu???n tr???</a></li>
                        <li><a href="#">/ Qu???n l?? th??ng tin s??ch</a></li>
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
                                    <a href="admin.html">
                                        <span class="material-icons-outlined">book</span>
                                        Qu???n l?? th??ng tin s??ch
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item">
                                    <a href="admin_category.html">
                                        <span class="material-icons-outlined">category</span>
                                        Qu???n l?? danh m???c s??ch
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item active-color">
                                    <a href="quanlybanhang.php">
                                        <span class="material-icons-outlined">inventory</span>
                                        Qu???n l?? ????n ?????t h??ng
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item">
                                    <a href="quanLyTaiKhoan.php">
                                        <span class="material-icons-outlined">manage_accounts</span>
                                        Qu???n l?? t??i kho???n
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item">
                                    <a href="chat.html">
                                        <span class="material-icons-outlined">question_answer</span>
                                        Chat v???i kh??ch h??ng
                                    </a>
                                </li>
                                <li class="app-container-menu-control__item">
                                    <a href="#">
                                        <span class="material-icons-outlined">info</span>
                                        Th??ng tin c???a h??ng
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col l-9 m-12 c-12">
                        <div class="app-container__content">
                            <div class="app-container-content__text">Danh s??ch ????n ?????t h??ng</div>
                            <form action="" method="POST">
                            <div class="app-container-content__search">
                                <!-- Re-use header search -->
                                <div class="app-header__search" style="background-color: transparent;">
                                    
                                    <button class="material-icons-outlined" style="background-color: orange; color: white; border: none;" id="btn_search" name="btn_search">search</button>
                                    
                                    <!-- <input type="hidden" name="id-cate" id="id-cate" value=""> -->
                                    <!-- <input type="text" id="txt-search_donhang" name="txt-search_donhang" placeholder="Nh???p tr???ng th??i ????n h??ng"> -->
                                    <select name="txt-search_donhang" id="txt-search_donhang">
                                        <option value="" name="hocvan" value="">Hi???n th??? t???t c??? ????n h??ng</option>
                                        <option value="0" name="hocvan" value="">Ch??? x??c nh???n</option>
                                        <option value="1" name="hocvan" value="">???? ????ng g??i</option>
                                        <option value="2" name="hocvan" value="">??ang v???n chuy???n</option>
                                        <option value="3" name="hocvan" value="">???? ho??n th??nh</option>
                                        
                                    </select>
                                    
                                    
                                </div>
                                <!-- Re-use header filter home page -->
                                
                            </div></form>
                            <div class="app-container-content__text_php" style="width: 100%; margin-top: 16px;">
                            
                            <?php

                                $conn = mysqli_connect('localhost','root','','sellingbook');
                                if ($conn) {
                                    $query = 'SELECT * FROM bill';
                                    $result = mysqli_query($conn,$query);
                                    if (mysqli_num_rows($result) >0) {
                                        
                                        echo '<table id="tblMain"><thead>';
                                        // ?????m
                                        $dem = mysqli_num_rows($result);
                                        echo 'T???ng s???: '.$dem.' ????n ?????t h??ng';
                                        
                                        //
                                        echo '<th>id</th><th>id ng?????i mua</th><th>Th???i gian ?????t</th><th>Th???i gian nh???n</th><th>Tr???ng th??i</th><th>T???ng ti???n</th><th>Thao t??c</th>';
                                        echo '</thead>';
                                            while ($row = mysqli_fetch_assoc($result)) {

                                                echo '<tr>';
                                                echo '<td>'.$row['id'].'</td>';
                                                echo '<td>'.$row['id_nguoimua'].'</td>';
                                                echo '<td>'.$row['thoi_gian_dat'].'</td>';
                                                echo '<td>'.$row['thoi_gian_nhan'].'</td>';
                                                if ($row['trang_thai'] == 0) {
                                                    echo '<td>Ch??? x??c nh???n</td>';
                                                }
                                                else if ($row['trang_thai'] == 1) {
                                                    echo '<td>???? ????ng g??i</td>';
                                                }
                                                else if ($row['trang_thai'] == 2) {
                                                    echo '<td>??ang v???n chuy???n</td>';
                                                }
                                                else if ($row['trang_thai'] == 3) {
                                                    echo '<td>???? ho??n th??nh</td>';
                                                }
                                                else if ($row['trang_thai'] == 4) {
                                                    echo '<td></td>';
                                                }
                                                echo '<td>'.$row['tong_tien'].'</td>';
                                                echo "<td>".
                                                     "<a  href='updatetrangthai.php?id=".$row['id']."' class='btntrangthai'>Thay ?????i ????n h??ng</a>";
                                                    "</td>";
                                                    // ." "."<a onclick='return confirm(\"B???n c?? mu???n x??a kh??ng?\")' href='delete.php?id=".$row['id']."' class='btntrangthai'>H???y ????n h??ng</a>".
                                        echo '</tr>';
                                            }
                                        echo '</table>';
                                        
                                        
                                    }
                                    else {
                                        echo 'd??? li???u tr???ng';
                                    }
                                }
                                else {
                                    echo 'K???t n???i th???t b???i',mysqli_connect_errno();
                                }
                            ?>

                                    <?php
                                        if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['btn_search'])) {
                                            
                                            Searchbyname();
                                           
                                           
                                        }
                                        function Searchbyname(){
                                            echo "<script type='text/javascript'>var Main=document.getElementById('tblMain');Main.innerHTML=''</script>";
                               
                                            $key = $_POST['txt-search_donhang'];
                                            
                                            echo "<script type='text/javascript'>var txt-search_donhang=document.getElementById('txt-search_donhang');txt-search_donhang.value='".$key."'</script>";
                                            $conn = mysqli_connect("localhost","root","","sellingbook");
                                           if ($conn == true) {
                               
                                           $query = "SELECT * FROM bill WHERE trang_thai LIKE N'%".$key."%'";
                                           $result = mysqli_query($conn,$query);
                                           if (mysqli_num_rows($result)>0) {
                                                echo '<table id="tblMain"><thead>';
                                               echo '<th>id</th><th>id ng?????i mua</th><th>Th???i gian ?????t</th><th>Th???i gian nh???n</th><th>Tr???ng th??i</th><th>T???ng ti???n</th><th>Thao t??c</th>';
                                               echo "</thead>";
                               
                                               while($row=mysqli_fetch_assoc($result))
                                           {
                                            echo '<tr>';
                                            echo '<td>'.$row['id'].'</td>';
                                            
                                            echo '<td>'.$row['id_nguoimua'].'</td>';
                                            echo '<td>'.$row['thoi_gian_dat'].'</td>';
                                            echo '<td>'.$row['thoi_gian_nhan'].'</td>';
                                            if ($row['trang_thai'] == 0) {
                                                echo '<td>Ch??? x??c nh???n</td>';
                                            }
                                            else if ($row['trang_thai'] == 1) {
                                                echo '<td>???? ????ng g??i</td>';
                                            }
                                            else if ($row['trang_thai'] == 2) {
                                                echo '<td>??ang v???n chuy???n</td>';
                                            }
                                            else if ($row['trang_thai'] == 3) {
                                                echo '<td>???? ho??n th??nh</td>';
                                            }
                                            else if ($row['trang_thai'] == 4) {
                                                echo '<td></td>';
                                            }
                                            echo '<td>'.$row['tong_tien'].'</td>';
                                            echo "<td>".
                                                 "<a  href='updatetrangthai.php?id=".$row['id']."' class='btntrangthai'>Thay ?????i ????n h??ng</a>";
                                                "</td>";
                                                // ." "."<a onclick='return confirm(\"B???n c?? mu???n x??a kh??ng?\")' href='delete.php?id=".$row['id']."' class='btntrangthai'>H???y ????n h??ng</a>".
                                    echo '</tr>';
                                           }
                                           echo "</table>";
                                           }else{
                                               echo "kh??ng c?? ????n h??ng";
                                           }
                                           
                                       }
                                       else{
                                           echo "kh??ng k???t n???i ???????c d??? li???u";
                                       }
                                        }
                                    ?>
                                    <button id="xuatfile" class="app__btn" style="border: none; margin-top: 12px;">Xu???t excel</button>
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

    <script src="../assets/js/main_base.js"></script>
    <script src="../assets/js/jquery.table2excel.min.js"></script>
    
</body>
<script>
    $("#xuatfile").click(function(){
    $("#tblMain").table2excel({
    name: "Worksheet Name",
    filename: "????n h??ng",
    fileext: ".xls"
    }) 
    });
</script>
</html>