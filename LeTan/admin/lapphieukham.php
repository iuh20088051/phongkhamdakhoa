<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <title> Bệnh Nhân</title>
    <?php
session_start();?>
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
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.menu {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    .menu-item {
        float: left;
    }

    .menu-item a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .menu-item a:hover {
        background-color: #111;
    }
    .user-info {
        float: right;
        color: white;
        padding: 14px 16px;
    }
</style>
</head>
<body>
<?php
include('../../xuly/connect.php');

$con = null;
$p = new clsKetnoi();
$p->ketnoiDB($con);

if (!isset($_SESSION['user'])) {
    header('Location: ../xuly/login.php');
    exit();
}
$hoten = isset($_SESSION['hoten']) ? $_SESSION['hoten'] : 'Người dùng';
?>

<ul class="menu">
        <li class="menu-item"><a href="../admin/TrangChuLT.php">Trang Chủ</a></li>
        <li class="menu-item"><a href="../admin/themxoasua.php">Xem Thông Tin Bệnh Nhân</a></li>
        <li class="menu-item"><a href="../admin/Laphoadon.php">Lập Hóa Đơn Bệnh Nhân</a></li>
        <li class="menu-item"><a href="../admin/dangky.php">Đăng Ký Tài Khoản</a></li>
        <li class="menu-item"><a href="../../xuly/login.php">Đăng xuất</a></li>
        <div class="user-info">Lễ Tân <?php echo htmlspecialchars($hoten); ?></div>
</ul>

<div class="box_dathen" style="min-height: 300px;">
        <form class="el-form ta-frame" method="post" action="../myclass/xulydkphieukham.php">
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
</body>
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
</html>
