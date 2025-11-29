<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "web_course"; 

$conn = new mysqli($host, $user, $pass, $db);
$conn->set_charset("utf8");


if (isset($_FILES["csvfile"])) {
    $file = $_FILES["csvfile"]["tmp_name"];

    if (($handle = fopen($file, "r")) !== FALSE) {

        
        fgetcsv($handle);

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

            $username  = $conn->real_escape_string($data[0]);
            $password  = $conn->real_escape_string($data[1]);
            $lastname  = $conn->real_escape_string($data[2]);
            $firstname = $conn->real_escape_string($data[3]);
            $city      = $conn->real_escape_string($data[4]);
            $email     = $conn->real_escape_string($data[5]);
            $course1   = $conn->real_escape_string($data[6]);

            $sql = "INSERT INTO accounts (username,password,lastname,firstname,city,email,course1)
                    VALUES ('$username','$password','$lastname','$firstname','$city','$email','$course1')";

            $conn->query($sql);
        }

        fclose($handle);
        echo "✔ Upload & lưu dữ liệu thành công!";
    } else {
        echo "Không thể mở file!";
    }
} else {
    echo "Bạn chưa chọn file!";
}
?>
