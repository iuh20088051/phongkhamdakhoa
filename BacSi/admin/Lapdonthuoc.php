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
            width: 50%;
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
            width: 100%;
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
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<?php
header('Content-Type: text/html; charset=UTF-8');

session_start();

class clsKetnoi {
    function ketnoiDB(&$connect) {
        $connect = mysqli_connect('localhost', 'hoa', '123456', 'phongkhamdakhoa') or die('Không thể kết nối tới database');
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
        <li class="menu-item"><a href="../admin/TrangchuBS.php">Trang chủ</a></li>
        <li class="menu-item"><a href="../admin/Phieukham.php">Lập phiếu khám</a></li>
        <li class="menu-item"><a href="../../xuly/login.php">Đăng xuất</a></li>
        <div class="user-info">Xin chào <?php echo htmlspecialchars($hoten); ?></div>
    </ul>
    <!-- Bảng nhập liệu -->
    <h2 style="text-align: center;">Phiếu khám bệnh </h2>
    <div class="form-container">
        <?php
        // Kiểm tra nếu 'makh' đã được lưu trong session
        if(isset($_GET['makh'])) {
            // Lấy giá trị 'makh' từ URL
            $makh = $_GET['makh'];
    
            // Truy vấn để lấy dữ liệu từ bảng phieu kham và khach hang
            $sql = "SELECT phieukham.makh, phieukham.matk, phieukham.sophongkham, phieukham.ngaykham, phieukham.ketluan, phieukham.huongdieutri, khachhang.hotenkh, khachhang.gioitinh, khachhang.ngaysinh 
                    FROM phieukham 
                    INNER JOIN khachhang ON phieukham.makh = khachhang.makh
                    WHERE phieukham.makh = '$makh'";
    
    
            $result = $conn->query($sql);
    
            // Kiểm tra có lỗi trong quá trình thực hiện truy vấn không
            if ($conn->error) {
                echo "Lỗi truy vấn: " . $conn->error;
            } else {
                if ($result->num_rows > 0) {
                    echo "<table>
                            <tr>
                                <th>Mã KH</th>
                                <th>Họ tên</th>
                                <th>Số phòng khám</th>
                                <th>Ngày khám</th>
                                <th>Kết luận</th>
                                <th>Hướng điều trị</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                            </tr>";
    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["makh"]. "</td>
                                <td>" . $row["hotenkh"]. "</td>
                                <td>" . $row["sophongkham"]. "</td>
                                <td>" . $row["ngaykham"]. "</td>
                                <td>" . $row["ketluan"]. "</td>
                                <td>" . $row["huongdieutri"]. "</td>
                                <td>" . $row["gioitinh"]. "</td>
                                <td>" . $row["ngaysinh"]. "</td>
                              </tr>";
                    }
    
                    echo "</table>"; // Đóng bảng
                } else {
                    echo "Không có phiếu khám nào cho mã số bệnh nhân này.";
                }
            }
        } 
        ?>
    </div>
    <!-- Form nhập liệu đơn thuốc -->
    <h2 style="text-align: center;">Lập đơn thuốc</h2>
    <div class="form-container">
        <form method="post" action="../myclass/xulydonthuoc.php">
            <div class="form-item">
                <label for="htbs">Họ tên bác sĩ</label>
                <input type="text" id="htbs" name="htbs" value="<?php echo htmlspecialchars($hoten); ?>" readonly>
            </div>
            <div class="form-item">
                <label for="makh">Mã khách hàng</label>
                <input type="text" id="makh" name="makh" value="<?php echo htmlspecialchars($makh); ?>" readonly>
            </div>
            <div class="form-item" id="thuoc-container">
                <label for="thuoc">Tên thuốc</label>
                <input type="text" id="thuoc" name="thuoc[]" required>
                <label for="sl">Số lượng</label>
                <input type="text" id="sl" name="sl[]" required>
                <label for="lieudung">Liều dùng</label>
                <textarea id="lieudung" name="lieudung[]" required></textarea>
            </div>
            <button type="submit" name="submit">Lập đơn thuốc</button>
            <button type="button" onclick="addMedicine()">Thêm thuốc</button>
        </form>
    </div>
</body>
<script>
        function addMedicine() {
            var container = document.getElementById('thuoc-container');
            var newMedicine = document.createElement('div');
            newMedicine.classList.add('form-item');
            newMedicine.innerHTML = `
                <label for="thuoc">Tên thuốc</label>
                <input type="text" name="thuoc[]" required>
                <label for="sl">Số lượng</label>
                <input type="text" name="sl[]" required>
                <label for="lieudung">Liều dùng</label>
                <textarea name="lieudung[]" required></textarea><br>
                <button type="button" class="remove-button" onclick="removeMedicine(this)">Xóa</button>
                
            `;
            container.appendChild(newMedicine);
        }

        function removeMedicine(button) {
            var container = document.getElementById('thuoc-container');
            container.removeChild(button.parentElement);
        }
    </script>
</html>
