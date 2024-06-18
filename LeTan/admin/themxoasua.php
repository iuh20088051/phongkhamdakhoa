<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<title>Thông Tin Bệnh Nhân</title>
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
<script>
    function showEditForm(makh, hotenkh, gioitinh, ngaysinh, diachi, sdt) {
        document.getElementById('makh').value = makh;
        document.getElementById('hotenkh').value = hotenkh;
        document.getElementById('gioitinh').value = gioitinh;
        document.getElementById('ngaysinh').value = ngaysinh;
        document.getElementById('diachi').value = diachi;
        document.getElementById('sdt').value = sdt;
        
        document.getElementById('form-container').style.display = 'block';
        document.getElementById('form-title').innerText = 'Chỉnh Sửa Thông Tin Bệnh Nhân';
        document.getElementById('form-submit').name = 'sua';
    }
    function showAddForm() {
        var addForm = document.getElementById('add-form-container');
        addForm.style.display = 'block';
    }
</script>
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

        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
            echo "<script>alert('Thêm thành công!')</script>";
        } else {
            echo "<script>alert('Thêm thất bại: " . mysqli_error($con) . "')</script>";
        }
    } elseif (isset($_POST['sua'])) {
        $makh = $_POST['makh'];
        $hotenkh = $_POST['hotenkh'];
        $gioitinh = $_POST['gioitinh'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];

        $update_query = "UPDATE khachhang 
                         SET hotenkh='$hotenkh', gioitinh='$gioitinh', ngaysinh='$ngaysinh', diachi='$diachi', sdt='$sdt' 
                         WHERE makh='$makh'";

        if ($con === null) {
            die("Lỗi: Không kết nối được cơ sở dữ liệu.");
        }

        $update_result = mysqli_query($con, $update_query);

        if ($update_result) {
            echo "<script>alert('Sửa thành công!')</script>";
        } else {
            echo "<script>alert('Sửa thất bại: " . mysqli_error($con) . "')</script>";
        }
    }  elseif (isset($_POST['xoa'])) {
        $makh = $_POST['makh'];
    
        echo "<script>
            var confirmation = confirm('Bạn có chắc muốn xóa bệnh nhân này?');
            if (confirmation) {
                window.location.href = 'themxoasua.php?delete_id=$makh';
            } else {
                alert('Bạn đã hủy xóa.');
            }
        </script>";
    } elseif (isset($_POST['search'])) {
        $search_query = $_POST['search_query'];
    }
}

// Xóa bệnh nhân nếu có
if(isset($_GET['delete_id'])) {
    $makh = $_GET['delete_id'];
    $delete_query = "DELETE FROM khachhang WHERE makh='$makh'";
    
    if ($con === null) {
        die("Lỗi: Không kết nối được cơ sở dữ liệu.");
    }
    
    $delete_result = mysqli_query($con, $delete_query);

}
function generateRandomID($length = 6) {
    $characters = '0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

if (!isset($_SESSION['user'])) {
    header('Location: ../xuly/login.php');
    exit();
}
$hoten = isset($_SESSION['hoten']) ? $_SESSION['hoten'] : 'Người dùng';

$search_sql = "SELECT * FROM khachhang";
if ($search_query != "") {
    $search_sql .= " WHERE hotenkh LIKE '%$search_query%'";
}

$benhnhans = mysqli_query($con, $search_sql);
?>
<ul class="menu">
        <li class="menu-item"><a href="../admin/TrangChuLT.php">Trang Chủ</a></li>
        <li class="menu-item"><a href="../admin/lapphieukham.php">Lập Phiếu Khám</a></li>
        <li class="menu-item"><a href="../admin/Laphoadon.php">Lập Hóa Đơn Bệnh Nhân</a></li>
        <li class="menu-item"><a href="../admin/dangky.php">Đăng Ký Tài Khoản</a></li>
        <li class="menu-item"><a href="../../xuly/login.php">Đăng xuất</a></li>
        <div class="user-info">Lễ Tân <?php echo htmlspecialchars($hoten); ?></div>
</ul>

<h2 class="center">Thông Tin</h2>

<div class="search-container">
    <form action="" method="POST">
        <input type="text" name="search_query" placeholder="Tìm kiếm theo tên" value="<?php echo $search_query; ?>">
        <button type="submit" name="search">Tìm kiếm</button>
        <button type="button" onclick="showAddForm()">Thêm</button>
    </form>
</div>

<div id="form-container" class="form-container">
    <h2 id="form-title">Sửa Thông Tin Bệnh Nhân</h2>
    <form action="" method="POST">
        <div class="form-item">
            <label for="makh">Mã Số Bệnh Nhân:</label>
            <input type="text" name="makh" id="makh" readonly>
        </div>
        <div class="form-item">
            <label for="hotenkh">Họ và Tên:</label>
            <input type="text" name="hotenkh" id="hotenkh" required>
        </div>
        <div class="form-item">
            <label for="gioitinh">Giới Tính:</label>
            <select name="gioitinh" id="gioitinh" required>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>
        <div class="form-item">
            <label for="ngaysinh">Ngày Sinh:</label>
            <input type="date" name="ngaysinh" id="ngaysinh" required>
        </div>
        <div class="form-item">
            <label for="diachi">Địa Chỉ:</label>
            <input type="text" name="diachi" id="diachi" required>
        </div>
        <div class="form-item">
            <label for="sdt">Số Điện Thoại:</label>
            <input type="text" name="sdt" id="sdt" required>
        </div>

        <button type="submit" id="form-submit" name="sua">Sửa</button>
    </form>
</div>
<div id="add-form-container" class="form-container" style="display: none;">
    <form action="" method="POST">
    <h2 id="form-title">Thêm Thông Tin Bệnh Nhân</h2>
    <form action="" method="POST">
        <div class="form-item">
            <label for="makh">Mã Số Bệnh Nhân:</label>
            <input type="text" name="makh" id="makh" value="<?php echo generateRandomID(); ?>" readonly>
        </div>
        <div class="form-item">
            <label for="hotenkh">Họ và Tên:</label>
            <input type="text" name="hotenkh" id="hotenkh" required>
        </div>
        <div class="form-item">
            <label for="gioitinh">Giới Tính:</label>
            <select name="gioitinh" id="gioitinh" required>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>
        <div class="form-item">
            <label for="ngaysinh">Ngày Sinh:</label>
            <input type="date" name="ngaysinh" id="ngaysinh" required>
        </div>
        <div class="form-item">
            <label for="diachi">Địa Chỉ:</label>
            <input type="text" name="diachi" id="diachi" required>
        </div>
        <div class="form-item">
            <label for="sdt">Số Điện Thoại:</label>
            <input type="text" name="sdt" id="sdt" required>
        </div>

        <button type="submit" name="them">Thêm</button>
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
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($benhnhans)): ?>
        <tr>
            <td><?php echo $row['makh']; ?></td>
            <td><?php echo $row['hotenkh']; ?></td>
            <td><?php echo $row['gioitinh']; ?></td>
            <td><?php echo $row['ngaysinh']; ?></td>
            <td><?php echo $row['diachi']; ?></td>
            <td><?php echo $row['sdt']; ?></td>
            <td>
                <form action="" method="POST" style="display:inline;">
                    <input type="hidden" name="makh" value="<?php echo $row['makh']; ?>">
                    <input type="hidden" name="hotenkh" value="<?php echo $row['hotenkh']; ?>">
                    <input type="hidden" name="gioitinh" value="<?php echo $row['gioitinh']; ?>">
                    <input type="hidden" name="ngaysinh" value="<?php echo $row['ngaysinh']; ?>">
                    <input type="hidden" name="diachi" value="<?php echo $row['diachi']; ?>">
                    <input type="hidden" name="sdt" value="<?php echo $row['sdt']; ?>">
                    <button type="submit" name="xoa">Xóa</button>
                    <button type="button" onclick="showEditForm('<?php echo $row['makh']; ?>', '<?php echo $row['hotenkh']; ?>', '<?php echo $row['gioitinh']; ?>', '<?php echo $row['ngaysinh']; ?>', '<?php echo $row['diachi']; ?>', '<?php echo $row['sdt']; ?>')">Sửa</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
