
<?php
    $maSach=$_GET["maSach"];
    $tenSach="";
    $tacGia="";
    $giaBan="";
    $giaChuaGiam="";
    $giamGia="";
    $moTa="";
    $anh="";
    $idDanhMuc="";
    $tenDanhMuc="";
    $conn=mysqli_connect("localhost","root","","sellingbook");
    if($conn==true)
    {
        $query="select book.*,category.ten_danhmuc from book,category where category.id=book.id_danhmuc and book.id='".$maSach."'";
        
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $tenSach=$row["ten_sach"];
                $tacGia=$row["tac_gia"];
                $giaBan=$row["gia_ban"];
                $giaChuaGiam=$row["gia_chua_giam"];
                $giamGia=$row["giam_gia"];
                $moTa=$row["mo_ta"];
                $anh=$row["anh"];
                $idDanhMuc=$row["id_danhmuc"];
                $tenDanhMuc=$row["ten_danhmuc"];
            }
       
        }
        
        

        else{
            echo "Lỗi";
        }
    }
    else
    {
        echo "Kết nối không thành công !" . mysqli_connect_error();

    }
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truyện Cổ Grimm (Ấn Bản Đầy Đủ Nhất Kèm 184 Minh Hoạ Của Philipp Grot Johann Và Robert Leinweber)</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
        integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/icon?family=Poppins:display=swap|Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/style_home.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/style_book.css">
    <link rel="stylesheet" href="../assets/css/responsive_home.css">
</head>

<body>
    <div class="app">
        <header class="app__header">
            <div class="app-header__navbar hide-on-lower-tablet">
                <div class="grid wide">
                    <div class="app-header__navbar-wapper">
                        <div class="app-header-navbar__left">
                            <a href="#" class="app-header-navbar__item">
                                <span class="material-icons-outlined">info</span>
                                <p>Trợ giúp</p>
                            </a>
                            <a href="#" class="app-header-navbar__item">
                                <span class="material-icons-outlined">feed</span>
                                <p>Tin tức</p>
                            </a>
                            <a href="#" class="app-header-navbar__item">
                                <span class="material-icons-outlined">confirmation_number</span>
                                <p>Khuyễn mãi</p>
                            </a>
                        </div>
                        <div class="app-header-navbar__right">
                            <a href="#" class="app-header-navbar__item">
                                <span class="material-icons-outlined">card_giftcard</span>
                                <p>Ưu đãi & tiện ích</p>
                            </a>
                            <a href="#" class="app-header-navbar__item">
                                <span class="material-icons-outlined">inventory</span>
                                <p>Kiểm tra đơn hàng</p>
                            </a>
                            <a href="#" class="app-header-navbar__item">
                                <span class="material-icons-outlined">login</span>
                                <p>Đăng nhập</p>
                            </a>
                            <a href="#" class="app-header-navbar__item">
                                <span class="material-icons-outlined">logout</span>
                                <p>Đăng ký</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile hide-on-lower-pc">
                <div class="grid wide">
                    <div class="app-header__mobile-wrapper">
                        <div class="app-header-mobile__left">
                            <div class="app-header-mobile-left__menu">
                                <input type="checkbox" id="cbo-mobile-menu" hidden>
                                <label for="cbo-mobile-menu"
                                    class="app-header-mobile-left__menu-icon material-icons-outlined">subject</label>
                                <label for="cbo-mobile-menu" class="app-header-mobile-left-menu__list-modal"></label>
                                <label for="cbo-mobile-menu"
                                    class="app-header-mobile-left-menu__close material-icons-outlined">close</label>
                                <label for="none" class="app-header-mobile-left-menu__list">
                                    <ul>
                                        <li class="app-header-mobile-left-menu__item">
                                            <a href="#" class="app-header-navbar__item">
                                                <span class="material-icons-outlined">login</span>
                                                <p>Đăng nhập</p>
                                            </a>
                                        </li>
                                        <li class="app-header-mobile-left-menu__item">
                                            <a href="#" class="app-header-navbar__item">
                                                <span class="material-icons-outlined">logout</span>
                                                <p>Đăng ký</p>
                                            </a>
                                        </li>
                                        <li class="app-header-mobile-left-menu__item">
                                            <a href="#" class="app-header-navbar__item">
                                                <div class="app-header-main-cart__cart">
                                                    <span class="material-icons-outlined">shopping_cart</span>
                                                    <p>2</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="app-header-mobile-left-menu__item">
                                            <a href="#" class="app-header-navbar__item">
                                                <span class="material-icons-outlined">inventory</span>
                                                <p>Kiểm tra đơn hàng</p>
                                            </a>
                                        </li>
                                        <li class="app-header-mobile-left-menu__item">
                                            <a href="#" class="app-header-navbar__item">
                                                <span class="material-icons-outlined">card_giftcard</span>
                                                <p>Ưu đãi & tiện ích</p>
                                            </a>
                                        </li>
                                        <li class="app-header-mobile-left-menu__item">
                                            <a href="#" class="app-header-navbar__item">
                                                <span class="material-icons-outlined">confirmation_number</span>
                                                <p>Khuyễn mãi</p>
                                            </a>
                                        </li>
                                        <li class="app-header-mobile-left-menu__item">
                                            <a href="#" class="app-header-navbar__item">
                                                <span class="material-icons-outlined">feed</span>
                                                <p>Tin tức</p>
                                            </a>
                                        </li>
                                        <li class="app-header-mobile-left-menu__item">
                                            <a href="#" class="app-header-navbar__item">
                                                <span class="material-icons-outlined">info</span>
                                                <p>Trợ giúp</p>
                                            </a>
                                        </li>
                                    </ul>
                                </label>
                            </div>
                            <a href="#" class="app-header-mobile-left__logo">
                                <img src="../assets/images/logo-new.png" alt="logo-new">
                            </a>
                        </div>
                        <div class="app-header-mobile__right">
                            <div class="app-header-main-cart__hotline">
                                <span class="material-icons-outlined">headset_mic</span>
                                <div class="app-header-main-cart__hotline-sub">
                                    <h2>0933 109 009</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-header__main">
                <div class="grid wide">
                    <div class="app-header__main-wrapper">
                        <a href="#" class="app-header-main__logo hide-on-lower-tablet">
                            <img src="../assets/images/logo-new.png" alt="logo-new">
                        </a>
                        <form method="POST" class="app-header-main__search">
                            <div class="app-header-main-search__filter">
                                <div class="app-header-main-search-filter__current">
                                    <p>Tất cả</p>
                                    <span class="material-icons-outlined">unfold_more</span>
                                </div>
                                <ul class="app-header-main-search-filter__choose">
                                    <li class="app-header-main-search-filter-choose__item active-color">Tất cả</li>
                                    <li class="app-header-main-search-filter-choose__item">Truyện tranh</li>
                                    <li class="app-header-main-search-filter-choose__item">Kinh tế</li>
                                    <li class="app-header-main-search-filter-choose__item">Xã hội</li>
                                    <li class="app-header-main-search-filter-choose__item">Văn hóa - Chính trị</li>
                                    <li class="app-header-main-search-filter-choose__item">Ngoại ngữ</li>
                                    <li class="app-header-main-search-filter-choose__item">Công nghệ</li>
                                    <li class="app-header-main-search-filter-choose__item">Lập trình</li>
                                </ul>
                            </div>
                            <div class="app-header-main-search__input">
                                <input type="hidden" name="id-cate" id="id-cate" value="">
                                <input type="text" name="txt-search" id="txt-search" placeholder="Bạn cần tìm gì?">
                            </div>
                            <div class="app-header-main-search__btn">
                                <span class="material-icons-outlined">search</span>
                                <p class="hide-on-moblie">Tìm kiếm</p>
                            </div>
                        </form>
                        <div class="app-header-main__cart hide-on-moblie">
                            <div class="app-header-main-cart__hotline hide-on-lower-tablet">
                                <span class="material-icons-outlined">headset_mic</span>
                                <div class="app-header-main-cart__hotline-sub">
                                    <h2>0933 109 009</h2>
                                    <p>Hotline</p>
                                </div>
                            </div>
                            <!-- No cart: header-main--no-cart -->
                            <div id="cart-list" class="app-header-main-cart__cart">
                                <span class="material-icons-outlined">shopping_cart</span>
                                <a href="cart.html" class="number-books-cart">2</a>
                                <div class="app-header-main-cart__list">
                                    <h2>Sách trong giỏ hàng</h2>
                                    <h2 class="header-main-no-cart__text">Giỏ hàng trống</h2>
                                    <div class="header-main-no-cart__img">
                                        <img src="../assets/images/empty-cart.png" alt="empty-cart">
                                    </div>
                                    <ul class="app-header-main-cart__list-list"></ul>
                                    <div class="app-header-main-cart__view-cart">
                                        <a href="cart.html">Đi tới giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="app__content">
            <div class="app-content__linker">
                <div class="grid wide">
                    <ul class="app-content__linker-wrapper">
                        <li><a href="home.html"><span class="material-icons-outlined">home</span>Trang chủ</a></li>
                        <li><a href="#">/ <?php echo $tenDanhMuc?></a></li>
                        <li><a href="#">/ <?php echo $tenSach?></a></li>
                    </ul>
                </div>
            </div>

            <div class="app-content__info">
                <div class="grid wide">
                    <div class="app-content__info-wrapper">
                        <div class="row">
                            <div class="col l-3 m-4 c-12">
                                <div class="app-content-info__img">
                                    <img src="../assets/images/<?php echo $anh?>" alt="">
                                </div>
                            </div>
                            <div class="col l-6 m-8 c-12">
                                <div class="app-content-info__name" >
                                <?php echo $tenSach?>
                                </div>
                                <div class="app-content-info__author">
                                <?php echo $tacGia?>
                                </div>
                                <div class="app-content-info__current-price"><?php echo number_format($giaBan)?>đ</div>
                                <div class="app-content-info__sale">-<?php echo $giamGia?>%</div>
                                <div class="app-content-info__old-price"><?php echo number_format($giaChuaGiam)?>đ</div>
                                <div class="app-content-info__status">Tình trạng: <p>Còn hàng</p></div>
                                <div class="app-content-info__cate">Danh mục: <a href="#"><?php echo $tenDanhMuc?></a></div>
                                <div class="app-content-info__quantity">
                                    Số lượng: &nbsp; &nbsp;
                                    <span>-</span>
                                    <input type="text" value="1">
                                    <span>+</span>
                                </div>
                                <div class="app-content-info__btn">
                                    <span class="app__btn app-content-info__btn--btn-add">Thêm vào giỏ hàng</span>
                                    <span class="app__btn">Mua ngay</span>
                                </div>
                                <div class="app-content-info__tel">
                                    Gọi đặt hàng: <a href="tel: 0961271218">0961271218</a> 
                                    hoặc <a href="tel: 0961271218">0961271218</a>
                                </div>
                            </div>
                            <div class="col l-3 m-0 c-12">
                                <div class="app-content-info__extra">
                                    <div class="app-content-info-extra__item">
                                        <i class="far fa-heart"></i>
                                        <p>Thêm vào danh sách yêu thích</p>
                                    </div>
                                    <div class="app-content-info-extra__item">
                                        <i class="fas fa-user-shield"></i>
                                        <p>Ưu đãi cho khách hàng thân thiết</p>
                                    </div>
                                    <div class="app-content-info-extra__item">
                                        <i class="fas fa-truck-moving"></i>
                                        <p>Để được miễn phí vận chuyển</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row2">
                            <div class="row2__title">Giới thiệu sản phẩm</div>
                            <div class="row2__introduce">
                                <p><?php echo $tenSach?></p>
                                <span>
                                <?php echo $moTa?>
                                </span>
                            </div>
                        </div>
                         
                       
                    </div>
                    
                </div>
            </div>
        </div>

        <footer>
            <div class="bg-bottom-ecaward hide-responsive">
                <ul>
                    <li><a href="#">Bookbuy.vn </a></li>
                    <li><a href="#">Top 3 Website TMĐT ngành Sách tiêu biểu </a></li>
                </ul>
            </div>

            <div class="categories">
                <ul>
                    <li>
                        <b>NHÀ SÁCH TRỰC TUYẾN BOOKBUY.VN </b>
                        <ul>
                            <li
                                style="font-family: Arial,Helvetica,sans-serif; line-height: 18px; font-size:12px;text-align:justify">

                                <p style="padding:inherit">
                                    <a href="#" style="padding: 0;  border: 0;"><b>Mua sách online</b></a> tại nhà sách
                                    trực tuyến Bookbuy.vn để được cập nhật nhanh nhất các tựa sách đủ thể loại với mức
                                    giảm 15 – 35% cùng nhiều ưu đãi, quà tặng kèm. Qua nhiều năm, không chỉ là địa chỉ
                                    tin cậy để bạn <b>mua sách trực tuyến</b>, Bookbuy còn có quà tặng, văn phòng phẩm,
                                    vật dụng gia đình,…với chất lượng đảm bảo, chủng loại đa dạng, chế độ bảo hành đầy
                                    đủ và giá cả hợp lý từ hàng trăm thương hiệu uy tín trong và ngoài nước. Đặc biệt,
                                    bạn có thể chọn những mẫu <a href="#"
                                        style="color: blue; border-right: none; padding: 0px 0px; ">sổ tay handmade</a>
                                    hay nhiều món <a href="#" style="color:blue;border-right:none;padding:0px 0px;">quà
                                        tặng sinh nhật</a> độc đáo chỉ có tại Bookbuy.vn.
                                </p>
                                <p style="padding:inherit">
                                    <b>Mua sách online</b> tại Bookbuy, bạn được tận hưởng chính sách hỗ trợ miễn phí
                                    đổi trả hàng, giao hàng nhanh – tận nơi – miễn phí*, thanh toán linh hoạt - an toàn,
                                    đặc biệt giảm thêm trên giá bán khi sử dụng BBxu giúp bạn <b>mua sách online</b> giá
                                    0đ!
                                </p>
                                <p style="padding:inherit">
                                    Chỉ với 3 cú click chuột, chưa bao giờ trải nghiệm <b>mua sách online</b> lại dễ
                                    chịu và nhẹ nhàng như vậy. Còn chần chờ gì nữa, đặt mua ngay những tựa
                                    <a href="#" style="color: blue; border-right: none; padding: 0px 0px; ">sách hay</a>
                                    cùng hàng ngàn sản phẩm chất lượng khác tại Bookbuy.vn!
                                </p>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <div class="letter-bottom">
                <div class="container">
                    <div class="row form-letter">
                        <div class="letter_box" style="display: flex">
                            <div class="canh-cam-img">
                                <img src="https://bookbuy.vn/Images/frontend/base/canh-cam-letter.png">
                            </div>
                            <div class=" canh-cam-letter">
                                <p class="head-text-letter">Đăng ký nhận bản tin từ Bookbuy</p>
                                <p class="sub-text-letter">Đừng bỏ lỡ những tin nhắn ưu đãi độc quyền dành riêng cho bạn
                                </p>
                            </div>
                        </div>


                        <div class=" canh-cam-form" style="display: inline-block;">
                            <form action="" id="emailletter-bottom" method="post">
                                <div class="entry-form">
                                    <input type="text" name="EmailLetter" id="submit-letter"
                                        placeholder="Nhập địa chỉ email của bạn">
                                    <ul class="action-submit">
                                        <li><a href="#">NAM</a></li>
                                        <li><a href="#">NỮ</a></li>
                                        <li><a href="#">LGBT</a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="../assets/js/main_base.js"></script>
    <script src="../assets/js/main_home.js"></script>
</body>

</html>