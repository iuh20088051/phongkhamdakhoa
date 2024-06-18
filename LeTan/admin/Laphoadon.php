<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<title>Hóa Đơn Bệnh Nhân</title>
<style>
    /* Add your CSS styles here */
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

    .form-container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        border-radius: 10px;
        background-color: #f9f9f9;
        display: none;
    }

    .form-item {
        margin-bottom: 15px;
    }

    .form-item label {
        display: block;
        margin-bottom: 5px;
    }

    .form-item input[type="text"],
    .form-item input[type="date"],
    .form-item select {
        width: calc(100% - 16px);
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #007BFF;
        color: white;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        border: 1px solid black;
        padding: 10px;
        text-align: left;
    }

    th:nth-child(4),
    td:nth-child(4) {
        width: 10%;
    }

    .center {
        text-align: center;
    }

    .search-container {
        width: 80%;
        margin: 20px auto;
        text-align: center;
    }

    .search-container input[type="text"] {
        padding: 8px;
        width: 300px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .search-container button {
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        background-color: #007BFF;
        color: white;
        cursor: pointer;
    }

    .search-container button:hover {
        background-color: #0056b3;
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

$search_query = "";  // Initialize the search query to an empty string

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['them'])) {
        $makh = $_POST['makh'];
        $hotenkh = $_POST['hotenkh'];
        $gioitinh = $_POST['gioitinh'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];

        $insert_query = "INSERT INTO khachhang (makh, hotenkh, gioitinh, ngaysinh, diachi, sdt) 
                         VALUES ('$makh', '$hotenkh', '$gioitinh', '$ngaysinh','$diachi','$sdt')";

        if ($con === null) {
            die("Lỗi: Không kết nối được cơ sở dữ liệu.");
        }
    }
}
if (!isset($_SESSION['user'])) {
    header('Location: ../xuly/login.php');
    exit();
}
$hoten = isset($_SESSION['hoten']) ? $_SESSION['hoten'] : 'Người dùng';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search_query = isset($_POST['search_query']) ? $_POST['search_query'] : "";
}

$benhnhans = mysqli_query($con, "SELECT * FROM khachhang INNER JOIN phieukham ON khachhang.makh = phieukham.makh" . ($search_query != "" ? " WHERE khachhang.hotenkh LIKE '%$search_query%'" : ""));
if (!$benhnhans) {
    die(mysqli_error($con)); // Print any error message from the query execution
}
?>
<ul class="menu">
        <li class="menu-item"><a href="../admin/TrangChuLT.php">Trang Chủ</a></li>
        <li class="menu-item"><a href="../admin/lapphieukham.php">Lập Phiếu Khám</a></li>
        <li class="menu-item"><a href="../admin/themxoasua.php">Xem Thông Tin Bệnh Nhân</a></li>
        <li class="menu-item"><a href="../admin/dangky.php">Đăng Ký Tài Khoản</a></li>
        <li class="menu-item"><a href="../../xuly/login.php">Đăng xuất</a></li>
        <div class="user-info">Lễ Tân <?php echo htmlspecialchars($hoten); ?></div>
</ul>

<h2 class="center">Thông Tin</h2>

<div class="search-container">
    <form action="" method="POST">
        <input type="text" name="search_query" placeholder="Tìm kiếm theo tên" value="<?php echo isset($_POST['search_query']) ? htmlspecialchars($_POST['search_query']) : ''; ?>">
        <button type="submit" name="search">Tìm kiếm</button>
    </form>
</div>
<table>
<thead>
        <tr>
            <th>Mã Số Bệnh Nhân</th>
            <th>Họ và Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Địa Chỉ</th>
            <th>Số Điện Thoại</th>
            <th>Số Phòng Khám</th>
            <th>Chi Phí Dịch Vụ</th>
            <th>Hành Động</th>
        </tr>
</thead>
<tbody>
    <?php while ($row = mysqli_fetch_assoc($benhnhans)): ?>
        <?php
        $makh = $row['makh'];
        $phieukham_query = mysqli_query($con, "SELECT sophongkham FROM phieukham WHERE makh = '$makh'");
        $phieukham_row = mysqli_fetch_assoc($phieukham_query);
        $sophongkham = isset($phieukham_row['sophongkham']) ? $phieukham_row['sophongkham'] : '';
        
        
        switch ($sophongkham) {
            case 1:
                $chi_phi = 200000;
                break;
            case 2:
                $chi_phi = 300000;
                break;
            case 3:
                $chi_phi = 500000;
                break;
            case 4:
                $chi_phi = 3000000;
                break;
            case 5:
                $chi_phi = 800000;
                break;
            case 6:
                $chi_phi = 400000;
                break;
            case 7:
                $chi_phi = 500000;
                break;
            case 8:
                $chi_phi = 300000;
                break;
            case 9:
                $chi_phi = 500000;
                break;
            default:
                $chi_phi = 0; // Giá trị mặc định nếu không có giá trị nào khớp
        }
        ?>
    <tr>
        <td><?php echo $row['makh']; ?></td>
        <td><?php echo $row['hotenkh']; ?></td>
        <td><?php echo $row['gioitinh']; ?></td>
        <td><?php echo $row['ngaysinh']; ?></td>
        <td><?php echo $row['diachi']; ?></td>
        <td><?php echo $row['sdt']; ?></td>
        <td><?php echo $row['sophongkham']; ?></td>
        <td><?php echo number_format($chi_phi); ?> VNĐ</td>
        <td>
        <form action="../myclass/xulyhoadon.php" method="POST" style="display:inline;">
            <input type="hidden" name="makh" value="<?php echo $row['makh']; ?>">
            <input type="hidden" name="hotenkh" value="<?php echo $row['hotenkh']; ?>">
            <input type="hidden" name="gioitinh" value="<?php echo $row['gioitinh']; ?>">
            <input type="hidden" name="ngaysinh" value="<?php echo $row['ngaysinh']; ?>">
            <input type="hidden" name="diachi" value="<?php echo $row['diachi']; ?>">
            <input type="hidden" name="sdt" value="<?php echo $row['sdt']; ?>">
            <input type="hidden" name="chiphi" value="<?php echo $chi_phi; ?>">
            <button type="submit" name="hoadon">Xem Đơn Thuốc</button>
        </form>
        </td>
    </tr>
    <?php endwhile; ?>
</tbody>
</table>

</body>
</html>
