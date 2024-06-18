<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2, p {
            margin: 0 0 10px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        h2 {
            color: #007bff;
            margin-top: 20px;
        }

        p {
            color: #555;
        }

        .info-box {
            margin-bottom: 20px;
        }

        .info-box h2 {
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        .info-box p {
            margin-bottom: 5px;
        }

        .info-box p strong {
            color: #007bff;
        }
        .inline {
            display: inline-block;
            margin-right: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<?php
session_start();
include('../../xuly/connect.php');

$con = null;
$p = new clsKetnoi();
$p->ketnoiDB($con);

if (!isset($_SESSION['user'])) {
    header('Location: ../../xuly/login.php');
    exit();
}

// Lấy thông tin tài khoản từ session
if (isset($_SESSION['hoten'])) {
    $hoten = $_SESSION['hoten'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hoadon'])) {
    // Lấy dữ liệu makh từ form
    $makh = isset($_POST['makh']) ? $_POST['makh'] : '';

}    

// Lấy thông tin hóa đơn từ bảng phieukham
$phieukham_query = mysqli_query($con, "SELECT * FROM phieukham WHERE makh = '$makh'");
$phieukham_row = mysqli_fetch_assoc($phieukham_query);

if (!$phieukham_row) {
    echo "Không tìm thấy thông tin hóa đơn cho bệnh nhân này.";
} else {
    // Lấy matk từ phieukham
    $matk = $phieukham_row['matk'];

    // Lấy thông tin tài khoản từ bảng taikhoan dựa trên matk
    $taikhoan_query = mysqli_query($con, "SELECT hoten FROM taikhoan WHERE matk = '$matk'");
    $taikhoan_row = mysqli_fetch_assoc($taikhoan_query);

    // Lấy thông tin khách hàng từ bảng khachhang
    $khachhang_query = mysqli_query($con, "SELECT * FROM khachhang WHERE makh = '$makh'");
    $khachhang_row = mysqli_fetch_assoc($khachhang_query);

    // Lấy thông tin đơn thuốc từ bảng donthuoc
    $donthuoc_query = mysqli_query($con, "SELECT * FROM donthuoc WHERE makh = '$makh'");

    // Hiển thị thông tin hóa đơn
    echo "<div class='container'>";
    echo "<h1 style='text-align: center;'>Đơn Thuốc</h1>";
    echo "<div class='info-box'>";
    echo "<h2>Thông Tin Bệnh Nhân</h2>";
    echo "<p class='inline'><strong>Họ và Tên:</strong> {$khachhang_row['hotenkh']}</p>";
    echo "<p class='inline'><strong>Giới Tính:</strong> {$khachhang_row['gioitinh']}</p>";
    echo "<p class='inline'><strong>Ngày Sinh:</strong> {$khachhang_row['ngaysinh']}</p>";
    echo "<p><strong>Địa Chỉ:</strong> {$khachhang_row['diachi']}</p>";
    echo "</div>";

    echo "<div class='info-box'>";
    echo "<h2>Thông Tin Khám Bệnh</h2>";
    echo "<p class='inline'><strong>Số Phòng Khám:</strong> {$phieukham_row['sophongkham']}</p>";
    echo "<p class='inline'><strong>Ngày Khám:</strong> {$phieukham_row['ngaykham']}</p>";
    echo "<p><strong>Kết Luận:</strong> {$phieukham_row['ketluan']}</p>";
    echo "<p><strong>Hướng Điều Trị:</strong> {$phieukham_row['huongdieutri']}</p>";
    echo "</div>";

    echo "<div class='info-box'>";
    echo "<h2>Bác Sĩ Chuẩn Đoán</h2>";
    echo "<p><strong>Bác Sĩ Điều Trị:</strong> {$taikhoan_row['hoten']}</p>";
    echo "</div>";

    echo "<div class='info-box'>";
    echo "<h2>Thông Tin Đơn Thuốc</h2>";
    echo "<table class='medicine-table'>";
    echo "<tr><th>Tên Thuốc</th><th>Số Lượng</th><th>Cách Dùng</th><th>Ngày Kê Đơn</th></tr>";

    while ($donthuoc_row = mysqli_fetch_assoc($donthuoc_query)) {
        echo "<tr>";
        echo "<td>{$donthuoc_row['tenthuoc']}</td>";
        echo "<td>{$donthuoc_row['soluong']}</td>";
        echo "<td>{$donthuoc_row['cachdung']}</td>";
        echo "<td>{$donthuoc_row['ngaykedon']}</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";

    echo "</div>";
}
?>

</body>
</html>
