<?php
header('Content-Type: text/html; charset=UTF-8');

// Mảng câu trả lời mặc định
$responses = array(
    'default' => array(
        'Tôi không hiểu câu hỏi của bạn.',
        'Xin lỗi, tôi không thể trả lời câu hỏi này.',
        'Tôi không có câu trả lời cho câu hỏi đó.'
    ),
    "nhanvien" => array(
        "Hiện tại công ty có %d nhân viên.",
        "Số lượng nhân viên hiện tại là %d."
    ),
	"mathang" => array(
        "Ý bạn là Thành phẩm hay Nguyên vật liệu",
        "Bạn muốn hỏi Thành phẩm hay Nguyên vật liệu"
	),
    "loaitp" => array(
        "Hiện tại trong kho có %d loại thành phẩm.",
        "Có %d loại thành phẩm đang có trong kho"
    ),
    "loainvl" => array(
        "Hiện tại trong kho có %d loại nguyên vật liệu.",
        "Có %d loại nguyên vật liệu đang có trong kho"
    ),
	"NVL" => array(
        "Danh sách NVL: %d"
    ),
	"TP" => array(
        "Danh sách TP: %d",

    ),
	"saphetnvl" => array(
        "Nguyên vật liệu sắp hết: %d",
    ),
	"saphetthanhpham" => array(
        "Thành phẩm sắp hết: %d",
    ),
);


function getResponse($question) {
    global $conn, $responses;
    include "../myclasschatbot/Chatconnect.php";
    $luu = "INSERT INTO bangcauhoi (cauhoi) VALUES ('$question')";
    $conn->query($luu);
    $sql = "SELECT answer FROM questions_answers WHERE question LIKE CONCAT('%', ?, '%')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $question);
    $stmt->execute();
    $stmt->bind_result($answer);

    $response = "";
    while ($stmt->fetch()) {
        $response .= "" . $answer . "<br>";
    }

    if (!empty($response)) {
        return $response;
    } else {
        $conn->close();
        if (stripos($question, 'nhân viên') !== false) {
            include "../myclasschatbot/Khoconnect.php";
            // Lấy số lượng nhân viên từ cơ sở dữ liệu
            $sql = "SELECT COUNT(*) AS num_employees FROM nhanvien";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $num_employees = $row["num_employees"];
                return sprintf($responses['nhanvien'][array_rand($responses['nhanvien'])], $num_employees);
            }

        } 			
		elseif (stripos($question, 'bao nhiêu loại nguyên vật liệu') !== false) {
			include "../myclasschatbot/Khoconnect.php";
			$sql = "SELECT COUNT(*) AS num_nvl FROM nguyenvatlieu";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $num_nvl = $row["num_nvl"];
                return sprintf($responses['loainvl'][array_rand($responses['loainvl'])], $num_nvl);
            }
      
		}
		elseif (stripos($question, 'bao nhiêu loại thành phẩm') !== false) {
			include "../myclasschatbot/Khoconnect.php";
			$sql = "SELECT COUNT(*) AS num_tp FROM thanhpham";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $num_tp = $row["num_tp"];
                return sprintf($responses['loaitp'][array_rand($responses['loaitp'])], $num_tp);
            }
      
		}
		elseif (stripos($question, 'danh sách nguyên vật liệu') !== false) {
			include "../myclasschatbot/Khoconnect.php";
			$sql = "SELECT tenNVL FROM nguyenvatlieu";
			$result = $conn->query($sql);
			$nvl_list = array();
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$nvl_list[] = $row["tenNVL"];
				}
			}
			$conn->close();
		
			if (!empty($nvl_list)) {
				$response = sprintf($responses['NVL'][array_rand($responses['NVL'])], count($nvl_list));
				$response .= "<br>" . implode(", ", $nvl_list);
			} else {
				$response = "Không tìm thấy danh sách nguyên vật liệu.";
			}
		
			return $response;
		}
		elseif (stripos($question, 'danh sách thành phẩm') !== false) {
			include "../myclasschatbot/Khoconnect.php";
			$sql = "SELECT tenTP FROM thanhpham";
			$result = $conn->query($sql);
			$nvl_list = array();
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$nvl_list[] = $row["tenTP"];
				}
			}
			$conn->close();
		
			if (!empty($nvl_list)) {
				$response = sprintf($responses['TP'][array_rand($responses['TP'])], count($nvl_list));
				$response .= "<br>" . implode(", ", $nvl_list);
			} else {
				$response = "Không tìm thấy danh sách nguyên vật liệu.";
			}
		
			return $response;
		}
		elseif (stripos($question, 'nguyên vật liệu sắp hết') !== false) {
			include "../myclasschatbot/Khoconnect.php";
			$threshold = 5; // Ngưỡng số lượng nguyên vật liệu sắp hết
			$sql = "SELECT tenNVL FROM nguyenvatlieu
					WHERE Soluong <= $threshold
					ORDER BY Soluong ASC";
			$result = $conn->query($sql);
			$nvl_list = array();
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$nvl_list[] = $row["tenNVL"];
				}
			}
			$conn->close();
		
			if (!empty($nvl_list)) {
				$response = sprintf($responses['saphetnvl'][array_rand($responses['saphetnvl'])], count($nvl_list));
				$response .= "<br>" . implode(", ", $nvl_list);
			} else {
				$response = "Không tìm thấy danh sách nguyên vật liệu sắp hết.";
			}
		
			return $response;
		}
		elseif (stripos($question, 'thành phẩm sắp hết') !== false) {
			include "../myclasschatbot/Khoconnect.php";
			$threshold = 10; // Ngưỡng số lượng nguyên vật liệu sắp hết
			$sql = "SELECT tenTP FROM thanhpham
					WHERE Soluong <= $threshold
					ORDER BY Soluong ASC";
			$result = $conn->query($sql);
			$nvl_list = array();
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$nvl_list[] = $row["tenTP"];
				}
			}
			$conn->close();
		
			if (!empty($nvl_list)) {
				$response = sprintf($responses['saphetthanhpham'][array_rand($responses['saphetthanhpham'])], count($nvl_list));
				$response .= "<br>" . implode(", ", $nvl_list);
			} else {
				$response = "Không tìm thấy danh sách thành phẩm sắp hết.";
			}
		
			return $response;
		}
		elseif (stripos($question, 'mặt hàng') !== false) {
        		return $responses['mathang'][array_rand($responses['mathang'])];

		}else {
            return $responses['default'][array_rand($responses['default'])];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy câu hỏi từ dữ liệu POST
    $question = $_POST['question'];

    // Chọn câu trả lời phù hợp với câu hỏi
    $response = getResponse($question);

    // Trả về câu trả lời dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode(array('response' => $response));

    exit;
}
?>