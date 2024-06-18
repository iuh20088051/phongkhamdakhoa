<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <title>Quản lý kho</title>
    <style>
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
    width: 80%; /* Thay đổi kích thước của form container */
    margin: 0 auto;
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 10px;
    background-color: #f9f9f9;
}

.form-item {
    margin-bottom: 15px;
}

.form-item label {
    display: block;
    margin-bottom: 5px;
}

.form-item input {
    width: calc(100% - 16px); /* Thay đổi kích thước của input */
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

th:nth-child(4), /* Thêm một cột mới ở đây */
td:nth-child(4) {
    width: 10%; /* Thiết lập kích thước cho cột mới */
}
    </style>
</head>
<?php
header('Content-Type: text/html; charset=UTF-8');

session_start();

class clsKetnoi {
    function ketnoiDB(&$connect) {
        $connect = mysqli_connect('localhost', 'root', '', 'phongkhamdakhoa') or die('Không thể kết nối tới database');
        mysqli_set_charset($connect, 'UTF8');
        if ($connect === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
    }
}
// Tạo đối tượng kết nối từ lớp clsKetnoi
$objKetnoi = new clsKetnoi();

// Biến để lưu trữ kết nối CSDL
$conn = null;

// Gọi phương thức ketnoiDB để kết nối CSDL
$objKetnoi->ketnoiDB($conn);

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['user'])) {
    header('Location: ../xuly/login.php');
    exit();
}
$hoten = isset($_SESSION['hoten']) ? $_SESSION['hoten'] : 'Người dùng';
?>

<body>
    <!-- Thanh menu -->
    <ul class="menu">
        <li class="menu-item"><a href="../admin/Trangchu.php">Trang chủ</a></li>
        <li class="menu-item"><a href="../../xuly/login.php">Đăng xuất</a></li>
        <div class="user-info">Xin chào <?php echo htmlspecialchars($hoten); ?></div>
    </ul>
    <!-- Bảng nhập liệu -->
    <h2 style="text-align: center;">Phiếu khám bệnh </h2>
    <div class="form-container">
    <form action="" method="POST">
        <div class="form-item">
            <label for="makh">Mã số bệnh nhân:</label>
            <input type="text" name="makh" id="makh" required>
        </div>
        <button type="submit">Lấy Phiếu Khám</button>
    </form>

    <?php
    // Kiểm tra nếu form đã được gửi đi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy giá trị mã số bệnh nhân từ form
        $makh = $_POST['makh'];

        // Truy vấn để lấy dữ liệu từ bảng phieu kham và khach hang
        $sql = "SELECT phieukham.makh, phieukham.matk, phieukham.sophongkham, phieukham.ngaykham, phieukham.ketluan, phieukham.mota, phieukham.huongdieutri, khachhang.hotenkh, khachhang.gioitinh, khachhang.ngaysinh 
                FROM phieukham 
                INNER JOIN khachhang ON phieukham.makh = khachhang.makh
                WHERE phieukham.makh = '$makh'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Mã KH</th>
                        <th>Họ tên</th>
                        <th>Số phòng khám</th>
                        <th>Ngày khám</th>
                        <th>Mô tả</th>
                        <th>Kết luận</th>
                        <th>Hướng điều trị</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Hành động</th>
                    </tr>";

            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <form action='../myclass/xulyPhieukham.php' method='POST'>
                            <td><input type='hidden' name='makh' value='" . $row["makh"] . "'>" . $row["makh"] . "</td>
                            <td><input type='hidden' name='hotenkh' value='" . $row["hotenkh"] . "'>" . $row["hotenkh"] . "</td>
                            <td><input type='hidden' name='sophongkham' value='" . $row["sophongkham"] . "'>" . $row["sophongkham"] . "</td>
                            <td><input type='date' name='ngaykham_moi' id='ngaykham_moi' value='" . $row["ngaykham"] . "' required></td>
                            <td><input type='hidden' name='mota' value='" . $row["mota"] . "'>" . $row["mota"] . "</td>
                            <td><textarea name='ketluan_moi' required>" . $row["ketluan"] . "</textarea></td>
                            <td><textarea name='huongdieutri_moi' required>" . $row["huongdieutri"] . "</textarea></td>
                            <td><input type='hidden' name='gioitinh' value='" . $row["gioitinh"] . "'>" . $row["gioitinh"] . "</td>
                            <td><input type='hidden' name='ngaysinh' value='" . $row["ngaysinh"] . "'>" . $row["ngaysinh"] . "</td>
                            <td><button type='capnhat'>Hoàn tất</button></td>
                        </form>
                      </tr>";
            }

            echo "</table>"; // Đóng bảng
        } else {
            echo "Không có phiếu khám nào cho mã số bệnh nhân này.";
        }
    }
    ?>
</div>
<script>
    // Lấy ngày hiện tại
    var today = new Date();
    
    // Format ngày hiện tại thành YYYY-MM-DD
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // Tháng bắt đầu từ 0
    var yyyy = today.getFullYear();
    
    today = yyyy + '-' + mm + '-' + dd;

    // Đặt giá trị cho trường nhập liệu ngày tháng
    document.getElementById('ngaykham_moi').value = today;
</script>

</body>
</html>
