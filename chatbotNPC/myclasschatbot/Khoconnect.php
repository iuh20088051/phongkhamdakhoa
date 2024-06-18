<?php

//Kết nối với cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "qlkho";
$password = "123456";
$database = "quanlykho";

$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

?>