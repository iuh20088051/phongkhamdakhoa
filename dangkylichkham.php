<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
        #multiItemCarouselDifferent {
        margin-top: 15px; 
        background-color: #f0f0f0; 
        border: 1px solid #ccc; 
        border-radius: 5px; 
        padding: 10px; 
        }
        .carousel-caption p {
            color: black;
        }

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
                /* Đảm bảo form nằm giữa trung tâm của trang */
        .col-sm-6.col-sm-offset-3.col-xs-12 {
            margin: auto;
        }

        /* Định dạng cho tiêu đề form */
        .div_head {
            color: #333;
            font-weight: bold;
        }
        .ta-frame {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        /* CSS cho phần tử label */
    .el-form-item__label {
        font-weight: bold;
        color: #333; /* Màu chữ */
    }

    /* CSS cho phần tử input */
    .el-input__inner {
        border: 1px solid #ccc; /* Viền */
        padding: 8px; /* Khoảng cách giữa viền và nội dung */
        border-radius: 5px; /* Bo góc */
        width: 100%; /* Độ rộng */
        box-sizing: border-box; /* Sửa lỗi về box model */
    }

    /* CSS cho phần tử select */
    .el-select {
        border: 1px solid #ccc;
        padding: 8px;
        border-radius: 5px;
        width: 100%;
        box-sizing: border-box;
    }

    /* CSS cho nút Đăng Ký */
    .el-button {
        background-color: blue; /* Màu nền */
        color: white; /* Màu chữ */
        padding: 10px 20px; /* Khoảng cách giữa chữ và viền */
        border-radius: 5px; /* Bo góc */
        border: none; /* Bỏ viền */
        cursor: pointer; /* Con trỏ */
        font-weight: bold;
    }

    /* CSS cho nút Đăng Ký khi rê chuột vào */
    .el-button:hover {
        background-color: darkblue; /* Màu nền */
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
<div class="col-sm-6 col-sm-offset-3 col-xs-12 mt_15 mb_15">
    <div class="text-center">
        <h1 class="div_head text-center cl_head text-uppercase font_hel sz_24 mb_25 pb_15">
            Đăng ký khám bệnh
        </h1>
    </div>
    <p style="text-align: justify;">Quý khách hàng có nhu cầu đặt hẹn khám tại <a href="https://tamanhhospital.vn/"><strong>Hệ thống Bệnh viện Đa khoa Tâm Anh</strong></a>, xin vui lòng thực hiện theo hướng dẫn:</p>
    <ul>
        <li style="text-align: justify;">Đặt hẹn bằng cách gọi tổng đài Chăm sóc khách hàng tại số <strong><a href="tel:+842871026789">0287 102 6789</a> – <a href="tel:+84931806858">093 180 6858</a> </strong>(Bệnh viện Đa khoa Tâm Anh TPHCM) hoặc <strong><a href="tel:+842438723872">024 3872 3872</a> – <a href="tel:+842471066858">024 7106 6858</a></strong> (Bệnh viện Đa khoa Tâm Anh Hà Nội)</li>
        <li style="text-align: justify;">Đặt hẹn trực tuyến bằng cách điền thông tin vào mẫu bên dưới.</li>
        <li style="text-align: justify;">Xin lưu ý, trong các trường hợp khẩn cấp, quý khách vui lòng đến ngay cơ sở y tế gần nhất hoặc đến trực tiếp Hệ thống bệnh viện Đa khoa Tâm Anh</li>
    </ul>
    <div class="box_dathen" style="min-height: 300px;">
        <form class="el-form ta-frame" method="post" action="xulydklichkham.php">
            <div class="ta-frame__header">
            <div class="ta-frame__header-title" style="font-size: 20px; color: blue; font-weight: bold; text-align: center;">ĐĂNG KÝ KHÁM BỆNH</div>
            </div>
            <div class="ta-frame__content">
                <div class="el-form el-form--label-top">
                    <div class="el-form-item is-required">
                        <label for="center" class="el-form-item__label">Chọn địa điểm khám</label>
                        <div class="el-form-item__content">
                            <select name="center" class="eco-el-radio-group">
                                <option value="ha-noi">BVĐK Tâm Anh Hà Nội</option>
                                <option value="ho-chi-minh">BVĐK Tâm Anh TP. HCM</option>
                            </select>
                        </div>
                    </div>
                    <div class="ta-frame__blocker ta-frame__blocker--blocked">
                        <div class="ta-frame__blocker-content">
                            <div class="el-form-item is-required">
                                <label for="speciality" class="el-form-item__label">Chọn chuyên khoa</label>
                                <div class="el-form-item__content">
                                    <select name="speciality" class="el-select">
                                        <option value="TIM">TIM MẠCH</option>
                                        <option value="THANKINH">THẦN KINH</option>
                                        <option value="SAN">SẢN PHỤ</option>
                                        <option value="NOI">NỘI KHOA</option>
                                        <option value="NHI">NHI KHOA</option>
                                        <option value="NHAKHOA">NHA KHOA</option>
                                        <option value="MAT">KHOA MẮT</option>
                                        <option value="CHINHHINH">CHỈNH HÌNH</option>
                                        <option value="XUONG">XƯƠNG KHỚP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="el-form-item is-required">
                            <label for="service_date" class="el-form-item__label">Chọn ngày muốn khám</label>
                            <div class="el-form-item__content">
                                <input type="date" name="service_date" class="gia-scheduler__input el-input__inner" min="<?php echo date('Y-m-d'); ?>">
                            </div>
                            </div>
                            <label for="fullname" class="el-form-item__label">Họ và tên</label>
                            <div class="el-form-item__content">
                                <input type="text" name="fullname" class="el-input__inner" required>
                            </div>

                            <label for="birthdate" class="el-form-item__label">Ngày sinh</label>
                            <div class="el-form-item__content">
                                <input type="date" name="birthdate" class="el-input__inner" required>
                            </div>

                            <label for="gender" class="el-form-item__label">Giới tính</label>
                            <div class="el-form-item__content">
                                <select name="gender" class="el-select" required>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>

                            <label for="address" class="el-form-item__label">Địa chỉ</label>
                            <div class="el-form-item__content">
                                <input type="text" name="address" class="el-input__inner" required>
                            </div>

                            <label for="phone" class="el-form-item__label">Số điện thoại</label>
                            <div class="el-form-item__content">
                                <input type="tel" name="phone" class="el-input__inner" required>
                            </div>

                            <div class="el-form-item is-required">
                                <label for="note" class="el-form-item__label">Nhập vấn đề sức khỏe cần khám</label>
                                <div class="el-form-item__content">
                                    <textarea name="note" rows="4" placeholder="Nhập tình trạng sức khoẻ của bạn, câu hỏi dành cho bác sĩ và các vấn đề sức khỏe cần khám" class="el-textarea__inner" style="min-height: 33px;"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="el-button expanded el-button--primary"><span>ĐĂNG KÝ</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
</ul></div>                </div>
                                                    <div class="footer-4 col-sm-3  col-xs-12">
                    <h3 class="widget-title  sz_16 mt_0 font_hel mb_0"><span>ĐƯỜNG DẪN NHANH</span></h3><div class="menu-footer_duong-dan-nhanh-container"><ul id="menu-footer_duong-dan-nhanh" class="menu"><li id="menu-item-14754" class="menu-item menu-item-type-taxonomy menu-item-object-catkhoa menu-item-14754"><a href="">Chuyên khoa</a></li>
<li id="menu-item-15591" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15591"><a href="">Chuyên mục bệnh học</a></li>
<li id="menu-item-67129" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-67129"><a rel="privacy-policy" href="">Chính sách bảo mật</a></li>
<li id="menu-item-109040" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-109040"><a rel="nofollow" href="">Đặc san</a></li>
</ul></div><h3 class="widget-title  sz_16 mt_0 font_hel mb_0"><span>WEBSITE CÙNG TẬP ĐOÀN</span></h3><div class="textwidget custom-html-widget"><a title="Viện Nghiên cứu Tâm Anh" href="" target="_blank" rel="nofollow noreferrer noopener">Viện Nghiên cứu Tâm Anh</a><br>
<a title="Trung tâm Hỗ trợ sinh sản Tâm Anh" href="" target="_blank" rel="nofollow noreferrer noopener">Trung tâm Hỗ trợ sinh sản Tâm Anh</a></div>                </div>
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

<script>
    // Lấy ngày hiện tại
var now = new Date();
var currentDate = new Date(now.getFullYear(), now.getMonth(), now.getDate());

// Thiết lập ngày tối thiểu là ngày hiện tại
var minDate = currentDate.toISOString().slice(0, 10); // Lấy chỉ ngày

// Lấy trường input date
var dateInput = document.querySelector('input[type="date"]');

// Thiết lập giá trị tối thiểu cho trường input date
dateInput.min = minDate;

// Thiết lập sự kiện onchange cho trường input date
dateInput.addEventListener('change', function() {
    // Chuyển đổi giá trị của trường input date thành đối tượng ngày
    var selectedDate = new Date(this.value);

    // Kiểm tra nếu ngày được chọn nhỏ hơn ngày hiện tại
    if (selectedDate < currentDate) {
        alert("Vui lòng chọn ngày tiếp theo so với hôm nay.");
        this.value = minDate; // Đặt lại giá trị thành ngày hiện tại
    }
});
    var birthdateInput = document.querySelector('input[name="birthdate"]');

    // Thêm sự kiện onchange
    birthdateInput.addEventListener('change', function() {
        // Lấy ngày hiện tại
        var currentDate = new Date();
        // Chuyển đổi giá trị ngày sinh thành đối tượng Date
        var selectedDate = new Date(this.value);

        // So sánh ngày sinh với ngày hiện tại
        if (selectedDate > currentDate) {
            alert('Ngày sinh không thể lớn hơn ngày hiện tại!');
            // Xóa giá trị không hợp lệ
            this.value = '';
        }
    });
</script>
</script>
</body>
</html>