<?php
$conn = new mysqli("localhost", "root", "", "web_course");

$name = $_POST["name"];
$desc = $_POST["description"];

$file = $_FILES["image"];
$filename = "images/" . basename($file["name"]);
move_uploaded_file($file["tmp_name"], $filename);

$sql = "INSERT INTO flowers (name, description, image)
        VALUES ('$name', '$desc', '$filename')";

$conn->query($sql);

echo "Thêm hoa thành công!";
?>
