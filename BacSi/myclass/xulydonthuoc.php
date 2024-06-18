<?php
session_start();
// Kiểm tra xem phương thức yêu cầu là POST hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các trường đã được gửi từ biểu mẫu hay không
    if (isset($_POST["thuoc"]) && isset($_POST["sl"]) && isset($_POST["lieudung"]) && isset($_POST['makh'])) {
        // Kết nối đến cơ sở dữ liệu
        $conn = mysqli_connect('localhost', 'hoa', '123456', 'phongkhamdakhoa');

        // Kiểm tra kết nối
        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }

        // Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng donthuoc
        $sql = "INSERT INTO donthuoc (soluong, cachdung, ngaykedon, makh, hotenbacsi, tenthuoc) VALUES (?, ?, ?, ?, ?, ?)";

        // Chuẩn bị câu lệnh SQL
        $stmt = mysqli_prepare($conn, $sql);

        // Kiểm tra câu lệnh SQL đã được chuẩn bị thành công hay không
        if ($stmt) {
            // Gán các giá trị từ biểu mẫu vào các biến
            $soluong = $_POST["sl"];
            $lieudung = $_POST["lieudung"];
            $tenthuoc = $_POST["thuoc"];
            $hotenbs =  isset($_SESSION['hoten']) ? $_SESSION['hoten'] : 'Người dùng';
            $makh = $_POST['makh'] ;
            $ngaykedon = date("Y-m-d"); // Lấy ngày hiện tại

            // Lặp qua mảng các thuốc và thực hiện thêm vào cơ sở dữ liệu
            foreach ($_POST["thuoc"] as $key => $tenthuoc_value) {
                // Lấy các giá trị tương ứng từ mảng sl và lieudung
                $soluong_value = $_POST["sl"][$key];
                $lieudung_value = $_POST["lieudung"][$key];

                // Gán các giá trị vào câu lệnh SQL
                mysqli_stmt_bind_param($stmt, "ississ", $soluong_value, $lieudung_value, $ngaykedon, $makh, $hotenbs, $tenthuoc_value);

                // Thực thi câu lệnh SQL
                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>alert('Dữ liệu đã được lưu thành công cho thuốc: $tenthuoc_value')</script>";
                    header("Location:../admin/TrangchuBS.php");
                } else {
                    echo "Lỗi: " . mysqli_error($conn);
                }
            }

            // Đóng câu lệnh SQL
            mysqli_stmt_close($stmt);
    } else {
        echo "Thiếu thông tin từ biểu mẫu.";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}
}
?>
