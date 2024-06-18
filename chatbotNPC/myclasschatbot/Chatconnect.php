<?php // db_connect.php
$servername = "localhost";
$username = "hoa";
$password = "123456";
$dbname = "chatbot_db";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối với cơ sở dữ liệu thất bại: " . $conn->connect_error);
}
?>