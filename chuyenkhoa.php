<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phòng khám đa khoa</title>
    <!-- Thêm CSS của Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg_brand { background-color: #0000FF; }
        .cl_white { color: white; }
        .pt_10 { padding-top: 5px; }
        .pb_10 { padding-bottom: 10px; }
        .mb_center { margin-bottom: 10px; }
        .header_left { float: left; }
        .header_right { float: right; }
        .icon_menu { border: none; background: none; padding: 0; }
        .icon-bar { background-color: white; display: block; height: 2px; margin: 5px 0; width: 20px; }
        .logo-small { height: 40px; }
        .logo-custom { height: 80px; }
        .logo-online { height: 80px; }
        .flex-container { display: flex; align-items: center; }
        .pl_15 { padding-left: 15px; }
        .header_top {
            display: flex;
            align-items: center;
        }
        .header_top a {
            margin-right: 10px; /* Khoảng cách giữa hai ảnh */
        }
        .header_top img {
            width: 250px; /* Độ rộng của ảnh */
            height: auto; /* Chiều cao tự động điều chỉnh theo tỉ lệ */
        }
        .navbar {
            background-color: #FFFFFF;
            text-align: left;
        }
        .navbar-light .navbar-nav .nav-link {
            color: #0000FF; 
        }
        .navbar-nav {
            margin-left: 0;
        }
        .navbar-nav .nav-item {
            margin-right: 20px;
        }
        .navbar-nav .nav-link {
            padding-right: 0;
            padding-left: 0;
        }
        .main_menu ul { list-style: none; padding: 0; margin: 0; float: left; }
        .main_menu ul li { display: inline-block; }
        .main_menu ul li a { color: white; text-decoration: none; padding: 10px 15px; }
        .main_menu ul li a:hover { background-color: #FFFFFF; }
        .navbar-toggle .icon-bar { background-color: white; }
        .navbar-form { display: flex; align-items: center; }
        .navbar-form input[type="text"] { margin-right: 5px; }
        /* #multiItemCarouselDifferent {
        margin-top: 15px; 
        background-color: #f0f0f0; 
        border: 1px solid #ccc; 
        border-radius: 5px; 
        padding: 10px; 
        }
        .carousel-caption p {
            color: black;
        } */

        .div_flex {
            display: flex;
            justify-content: space-between; /* Căn đều các phần tử */
            align-items: center; /* Căn giữa theo chiều dọc */
            flex-wrap: wrap; /* Đảm bảo các phần tử sẽ xuống dòng nếu không đủ chỗ */
            gap: 10px; /* Khoảng cách giữa các phần tử, điều chỉnh nếu cần */
        }

        .div_flex a {
            display: inline-block;
        }

        .div_flex img {
            max-width: 100%;
            height: auto;
        }
        .vision-mission {
            text-align: center;
            padding: 20px;
        }

        .vision-mission h1 {
            color: #333;
        }

        .vision-mission figure {
            display: inline-block;
            margin: 20px;
            text-align: center;
        }

        .vision-mission img {
            width: 300px; /* Bạn có thể điều chỉnh kích thước theo ý muốn */
            height: auto;
            border: 2px solid #ddd; /* Thêm đường viền nếu muốn */
            border-radius: 10px; /* Thêm góc bo tròn nếu muốn */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Thêm bóng nếu muốn */
        }

        .vision-mission figcaption {
            margin-top: 10px;
            font-size: 16px;
            color: #555;
        }
        .carousel-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px; /* Khoảng cách giữa các ô */
            padding: 10px; /* Khoảng cách xung quanh lưới */
        }

        .carousel-cell {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .carousel-cell img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .carousel-caption {
            position: static;
            text-align: center;
            color: #333;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<header id="header" class="bg_brand cl_white pt_10 pb_10 mb_center">
    <div class="container">
        <div class="row">
            <div class="div_logo header_left col-lg-2 col-sm-3 col-xs-10">
                <div class="hidden-xs">
                    <a href="index.php">
                        <img class="logo-custom" alt="logo ta" src="image/logo-ta.png">
                    </a>
                </div>
            </div>
            
            <div class="header_right col-lg-10 col-sm-9 hidden-xs text-right">
                <div class="header_left mb_5 mt_0 item div_inline ">
                    <a rel="nofollow" href="">
                        <img class="logo-online" src="image/icon-dang-dien-ra-1.png" alt="phòng khám online">
                    </a>
                </div>
                <div class="header_top mb_5 mt_5 pull-right">
                    <a rel="" href="tel:+842471066858" class="d-inline-block mr-3">
                        <img class="" src="image/phone-f-hn.png" alt="">
                    </a>
                    <a rel="" href="tel:+842871026789" class="d-inline-block">
                        <img class="" src="image/phone-f-hcm.png" alt="">
                    </a>
                </div>
                <div class="header_footer pt_10 flex-container">
                    <div class="pl_15 item">
                        <span class="icon_img">
                            <a rel="nofollow" href="">
                                <img class="" height="26" width="auto" src="image/i_customer.png" alt="i_customer">
                            </a>
                        </span>
                        <a rel="nofollow" href="">
                           <a rel="" href="Hoadon.php">
                            <span class="text cl_white">Dành Cho Khách Hàng</span>
                        </a>
                    </div>
                    <div class="pl_15 item">
                        <span class="icon_img">
                            <a rel="" target="_blank" href="">
                                <img class="" height="26" width="auto" src="image/i_faq.png" alt="i_faq">
                            </a>
                        </span>
                        <a rel="" target="_blank" href="lienhe.php">
                            <span class="text cl_white">Hỏi đáp</span>
                        </a>
                    </div>
                    <div class="pl_15 item">
                        <span class="icon_img">
                            <a rel="" href="">
                                <img class="" height="26" width="auto" src="image/i_calendar.png" alt="i_calendar">
                            </a>
                        </span>
                        <a rel="" href="dangkylichkham.php">
                            <span class="text cl_white">Đặt lịch khám</span>
                        </a>
                    </div>
                    <div class="pl_15 item">
                        <span class="icon_img">
                            <a rel="" href="">
                                <img class="" height="26" width="auto" src="image/i_customer.png" alt="i_employee">
                            </a>
                        </span>
                        <a rel="" href="xuly/login.php">
                            <span class="text cl_white">Bác Sĩ</span>
                        </a>
                    </div>
                    <div class="pl_15 item">
                        <span class="icon_img">
                            <a rel="" href="">
                                <img class="" height="26" width="auto" src="image/i_customer.png" alt="i_employee">
                            </a>
                        </span>
                        <a rel="" href="xuly/login.php">
                            <span class="text cl_white">Lễ Tân</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav id="navigation" class="navbar navbar-expand-lg navbar-light bg_brand">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><div class="icon-bar"></div><div class="icon-bar"></div><div class="icon-bar"></div></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto main_menu">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Giới thiệu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="tamnhinsumenh.php">Tầm nhìn – Sứ mệnh</a>
                        <a class="dropdown-item" href="sodophongkham.php">Sơ đồ tổ chức</a>
                        <a class="dropdown-item" href="thongtintuyendung.php">Thông Tin Tuyển Dụng</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chuyenkhoa.php">Chuyên khoa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chuyengiabacsi.php">Chuyên gia – bác sĩ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dichvu.php">Dịch vụ đặc biệt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="thanhtuu.php">Thành tựu</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tin tức
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="tapchi.php">Tạp chí</a>
                        <a class="dropdown-item" href="tructuyen.php">Hội nghị trực tuyến</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lienhe.php">Liên Hệ</a>
                </li>
            </ul>
        </div>
</nav>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="image/chuyenkhoa.jpg" class="d-block w-100" alt="">
        </div>
    </div>
</div>    
<div id="multiItemCarouselDifferent" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                <div class="col-md-4">
                    <img src="image/timmach.png" class="d-block w-100" alt="Image 1">
                    <div class="carousel-caption">
                        <p>TIM MẠCH</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="image/tamthan.png" class="d-block w-100" alt="Image 2">
                    <div class="carousel-caption">
                        <p>THẦN KINH</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="image/sanphukhoa.png" class="d-block w-100" alt="Image 3">
                    <div class="carousel-caption">
                        <p>SẢN PHỤ</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="image/noikhoa.png" class="d-block w-100" alt="Image 4">
                    <div class="carousel-caption">
                        <p>NỘI KHOA</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="image/nhikhoa.png" class="d-block w-100" alt="Image 5">
                    <div class="carousel-caption">
                        <p>NHI KHOA</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="image/nhakhoa.png" class="d-block w-100" alt="Image 6">
                    <div class="carousel-caption">
                        <p>NHA KHOA</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="image/khoamat.png" class="d-block w-100" alt="Image 7">
                    <div class="carousel-caption">
                        <p>KHOA MẮT</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="image/chanthuongchinhhinh.png" class="d-block w-100" alt="Image 8">
                    <div class="carousel-caption">
                        <p>CHỈNH HÌNH</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="image/xuongkhop.png" class="d-block w-100" alt="Image 9">
                    <div class="carousel-caption">
                        <p>XƯƠNG KHỚP</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
</div>
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="phongkhamdakhoa"
  agent-id="bbe4176e-b373-4db3-82df-a510be277f85"
  language-code="vi"
></df-messenger>
<footer id="footer" class="cl_white bg_brand pt_30 mb_center">
    <div class="container">
        <div class="row">
                            <div class="footer-1  col-sm-3 col-xs-12">
                    <style>.widget.widget_media_image { overflow: hidden; }.widget.widget_media_image img { height: auto; max-width: 100%; }</style><img loading="lazy" width="253" height="155" src="https://tamanhhospital.vn/wp-content/uploads/2023/05/logo-ta.png" class="image wp-image-87275  attachment-full size-full" alt="logo ta" style="max-width: 100%; height: auto;">                </div>
                                        <div class="footer-2  col-sm-6  col-xs-12">
                    <h3 class="widget-title sz_16 mt_0 font_hel mb_0"><span>HỆ THỐNG BỆNH VIỆN</span></h3><div class="textwidget custom-html-widget"><ul>
	<li class="row">
		<div class="col-sm-7 col-xs-12">
			<i class="fa fa-map-marker" aria-hidden="true"></i>
		108 Phố Hoàng Như Tiếp,<br> P. Bồ Đề, Q. Long Biên, Tp. Hà Nội 
			<a href="https://g.page/benhvientamanh?share" target="_blank" class="small" rel="nofollow noreferrer noopener">Xem bản đồ</a>
		</div>
		<div class="col-sm-5 col-xs-12">
			<i class="fa fa-phone" aria-hidden="true"></i>
		<a href="tel:+842471066858"><span class="cl_white">024 7106 6858</span></a> <br><a href="tel:+842438723872"><span class="cl_white"> 024 3872 3872</span></a> (HN) <br>
			<span class="small">làm việc từ 7:30 - 16:30</span>
			<br>
			<i class="fa fa-envelope" aria-hidden="true"></i>
			<a href="mailto:cskh@tamanhhospital.vn"><span class="cl_white"> cskh@tamanhhospital.vn</span></a>
		</div>
	</li>
	<li class="row">
		<div class="col-sm-7 col-xs-12">
			<i class="fa fa-map-marker" aria-hidden="true"></i>
		2B Phổ Quang, Phường 2, <br> Q. Tân Bình, Tp. Hồ Chí Minh
			<a href="https://g.page/BVTamAnhHCM?share" target="_blank" class="small" rel="nofollow noreferrer noopener">Xem bản đồ</a>
		</div>
		<div class="col-sm-5 col-xs-12">
			<i class="fa fa-phone" aria-hidden="true"></i>
			<a href="tel:+842871026789"><span class="cl_white"> 0287 102 6789 </span></a> <br><a href="tel:+84931806858"><span class="cl_white"> 093 180 6858</span></a> (TP.HCM) <br>
		<span class="small">làm việc từ 6:00 - 19:00 (Chủ nhật từ 6:30 - 12:00)</span>
		<br>
			<i class="fa fa-envelope" aria-hidden="true"></i>
			<a href="mailto:cskh@tahospital.vn"><span class="cl_white"> cskh@tahospital.vn</span></a>	
		</div>
	</li>
</ul></div></div>
    <div class="footer-4 col-sm-3  col-xs-12">
                    <h3 class="widget-title  sz_16 mt_0 font_hel mb_0"><span>ĐƯỜNG DẪN NHANH</span></h3><div class="menu-footer_duong-dan-nhanh-container"><ul id="menu-footer_duong-dan-nhanh" class="menu"><li id="menu-item-14754" class="menu-item menu-item-type-taxonomy menu-item-object-catkhoa menu-item-14754"><a href="https://tamanhhospital.vn/danh-muc-khoa/chuyen-khoa/">Chuyên khoa</a></li>
<li id="menu-item-15591" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15591"><a href="https://tamanhhospital.vn/benh/">Chuyên mục bệnh học</a></li>
<li id="menu-item-67129" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-67129"><a rel="privacy-policy" href="https://tamanhhospital.vn/chinh-sach-bao-mat-thong-tin/">Chính sách bảo mật</a></li>
<li id="menu-item-109040" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-109040"><a rel="nofollow" href="https://tamanhhospital.vn/dac-san/">Đặc san</a></li>
</ul></div><h3 class="widget-title  sz_16 mt_0 font_hel mb_0"><span>WEBSITE CÙNG TẬP ĐOÀN</span></h3><div class="textwidget custom-html-widget"><a title="Viện Nghiên cứu Tâm Anh" href="https://tamri.vn/" target="_blank" rel="nofollow noreferrer noopener">Viện Nghiên cứu Tâm Anh</a><br>
<a title="Trung tâm Hỗ trợ sinh sản Tâm Anh" href="https://ivfta.com" target="_blank" rel="nofollow noreferrer noopener">Trung tâm Hỗ trợ sinh sản Tâm Anh</a></div>                </div>
                                        <div class="div_footer mb_30 text-right  col-xs-12">
                    <div class="widget_text item"><div class="textwidget custom-html-widget"><div class="div_flex">
<div class="item">
<p class="text-left pr_25">
CÔNG TY CỔ PHẦN BỆNH VIỆN ĐA KHOA TÂM ANH<br>
Số đăng ký kinh doanh: 0102362369<br>
cấp bởi Sở kế hoạch và đầu tư Thành phố Hà Nội, đăng ký lần đầu ngày 11 tháng 9 năm 2007
</p>
</div>
<div class="item">
<div class="div_flex div_flex_mobile">
<a rel="nofollow noreferrer noopener" href="https://tinnhiemmang.vn/danh-ba-tin-nhiem/tamanhhospitalvn-1663728132" title="Chung nhan Tin Nhiem Mang" target="_blank">
<img src="https://tinnhiemmang.vn/handle_cert?id=tamanhhospital.vn" width="80px" height="auto" alt="Chung nhan Tin Nhiem Mang"></a>
<a href="https://www.dmca.com/Protection/Status.aspx?ID=d559761b-d67b-49db-a7b7-8e19686deb81&amp;refurl=https://tamanhhospital.vn/" rel="nofollow noreferrer noopener" title="DMCA.com Protection Status" class="dmca-badge" target="_blank"> 
<img src="https://images.dmca.com/Badges/DMCA_logo-grn-btn100w.png?ID=d559761b-d67b-49db-a7b7-8e19686deb81" alt="DMCA.com Protection Status"></a> 
<script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
<a class="logobct" target="_blank" style="max-width: 110px; display: inline-block;" title="Đã thông báo" href="http://online.gov.vn/CustomWebsiteDisplay.aspx?DocId=47919" rel="nofollow noreferrer noopener">
<img class="img-responsive" src="image/dathongbao.png" alt="Đã thông báo"> </a>
<a class="icon-lh" target="_blank" href="" title="bv tâm anh fanpage" rel="nofollow noreferrer noopener"><img src="image/icon-facebook-tam-anh.png" alt="bv tâm anh facebook icon"></a> 
<a class="icon-lh" target="_blank" href="" title="bv tâm anh youtube" rel="nofollow noreferrer noopener"><img src="image/icon-youtube-tam-anh.png" alt="bv tâm anh youtube icon"></a>
<a class="icon-lh" target="_blank" href="" title="bv tâm anh twitter" rel="nofollow noreferrer noopener"><img src="image/icon-x-tam-anh-2.png" alt="bv tâm anh twitter icon"></a>
</div>
</div>
</div></div></div>                </div>
                    </div>
    </div>
    <div class="open_chat"></div>
</footer>

<!-- Thêm JavaScript của jQuery và Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>


</script>
</body>
</html>