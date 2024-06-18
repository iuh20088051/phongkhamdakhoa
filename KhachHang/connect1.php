<?php
// Thông tin kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$database = "phongkhamdakhoa";

// Tạo kết nối
$con = mysqli_connect($servername, $username, $password, $database);

// Kiểm tra kết nối
if (!$con) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
?>
