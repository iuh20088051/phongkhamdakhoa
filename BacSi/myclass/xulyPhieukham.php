<?php
header('Content-Type: text/html; charset=UTF-8');

class clsKetnoi {
    function ketnoiDB(&$connect) {
        $connect = mysqli_connect('localhost', 'hoa', '123456', 'phongkhamdakhoa') or die('Không thể kết nối tới database');
        mysqli_set_charset($connect, 'UTF8');
        if ($connect === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
    }
}

$objKetnoi = new clsKetnoi();
$conn = null;
$objKetnoi->ketnoiDB($conn);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $makh = $_POST['makh'];
    $ngaykham_moi = $_POST['ngaykham_moi'];
    $ketluan_moi = $_POST['ketluan_moi'];
    $huongdieutri_moi = $_POST['huongdieutri_moi'];

    // Tạo câu truy vấn SQL để cập nhật dữ liệu
    $sql = "UPDATE phieukham 
            SET ngaykham = ?, ketluan = ?, huongdieutri = ?
            WHERE makh = ?";

    // Chuẩn bị câu truy vấn
    if ($stmt = $conn->prepare($sql)) {
        // Gán các biến vào câu truy vấn đã chuẩn bị
        $stmt->bind_param("ssss", $ngaykham_moi, $ketluan_moi, $huongdieutri_moi, $makh);

        // Thực thi câu truy vấn
        if ($stmt->execute()) {
            echo "<script>alert('Lập phiếu yêu cầu thành công')</script>";
            header("Location: ../admin/Lapdonthuoc.php?makh=$makh");
        } else {
            echo "Lỗi: Không thể cập nhật dữ liệu. " . $stmt->error;
        }

        // Đóng statement
        $stmt->close();
    } else {
        echo "Lỗi: Không thể chuẩn bị câu truy vấn. " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>
