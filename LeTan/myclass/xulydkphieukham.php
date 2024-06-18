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

// Hàm để tạo mã khách hàng ngẫu nhiên
function generateRandomID($length = 6) {
    $characters = '0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

// Kiểm tra xem phương thức yêu cầu là POST hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Kiểm tra xem tất cả các trường đã được gửi từ biểu mẫu hay không
    if (isset($_POST["fullname"]) && isset($_POST["birthdate"]) && isset($_POST["gender"]) && isset($_POST["address"]) && isset($_POST["phone"]) && isset($_POST["center"]) && isset($_POST["speciality"]) && isset($_POST["service_date"]) && isset($_POST["note"])) {
        // Gán các giá trị từ biểu mẫu vào các biến
        $fullname = $_POST["fullname"];
        $birthdate = $_POST["birthdate"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $center = $_POST["center"];
        $speciality = $_POST["speciality"];
        $service_date = $_POST["service_date"];
        $note = $_POST["note"];

        // Tạo mã khách hàng ngẫu nhiên
        $makh = generateRandomID();
        
        // Điền số phòng khám theo khoa
        $phongkham = 0;
        switch ($speciality) {
            case 'TIM':
                $phongkham = 1;
                break;
            case 'THANKINH':
                $phongkham = 2;
                break;
            case 'SAN':
                $phongkham = 3;
                break;
            case 'NOI':
                $phongkham = 4;
                break;
            case 'NHI':
                $phongkham = 5;
                break;
            case 'NHAKHOA':
                $phongkham = 6;
                break;
            case 'MAT':
                $phongkham = 7;
                break;
            case 'CHINHHINH':
                $phongkham = 8;
                break;
            case 'XUONG':
                $phongkham = 9;
                break;
            default:
                $phongkham = 0;
        }
        // Thực hiện truy vấn SQL để chèn dữ liệu vào bảng khachhang
        $sql_insert_khachhang = "INSERT INTO khachhang (makh, hotenkh, gioitinh, ngaysinh, diachi, sdt) VALUES ('$makh', '$fullname', '$gender', '$birthdate', '$address', '$phone')";

        // Thực hiện truy vấn SQL để chèn dữ liệu vào bảng phieukham
        $sql_insert_phieukham = "INSERT INTO phieukham (makh, sophongkham, ngaykham, mota) VALUES (?, ?, ?, ?)";

        // Thực hiện chèn dữ liệu vào bảng khachhang
        if (mysqli_query($conn, $sql_insert_khachhang)) {
            // Chuẩn bị và thực thi câu lệnh SQL chèn dữ liệu vào bảng phieukham
            $stmt = mysqli_prepare($conn, $sql_insert_phieukham);
            mysqli_stmt_bind_param($stmt, "ssss", $makh, $phongkham, $service_date, $note);
            mysqli_stmt_execute($stmt);

            echo "<script>alert('Đây là số thự tự của bạn $makh hãy ghi chú lại để đưa cho lễ tân nhé!!! cảm ơn bạn')</script>";
            header("refresh:3;url=../admin/TrangChuLT.php");
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }

        // Đóng kết nối đến cơ sở dữ liệu
        mysqli_close($conn);
    } else {
        echo "Thiếu thông tin từ biểu mẫu.";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>
