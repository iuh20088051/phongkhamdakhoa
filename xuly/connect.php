<?php
    class clsKetnoi{
        function ketnoiDB(& $connect){
            $connect = mysqli_connect ('localhost', 'root', '', 'phongkhamdakhoa') or die ('Không thể kết nối tới database');
            // $connect = mysqli_connect ('localhost', 'root', '', 'dangnhap') or die ('Không thể kết nối tới database');
            mysqli_set_charset($connect, 'UTF8');
            if($connect === false){ 
            die("ERROR: Could not connect. " . mysqli_connect_error()); 
            }
        }
    }

    function getUserEmail($email){
        $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
        $result = $this->db->select($sql);
        if($result){
            return $result;
        }else{
            echo "<h4 style='color:red;'>Email không tồn tại</h4> <br>";
        }
    }
?>

