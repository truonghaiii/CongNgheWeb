<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/models/SinhVienModel.php';


$host = '127.0.0.1';
$dbname = 'cse485_web';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}


if (isset($_POST['ten_sinh_vien']) && isset($_POST['email'])) {
    
    $ten = trim($_POST['ten_sinh_vien']);
    $email = trim($_POST['email']);

    
    if ($ten !== '' && $email !== '') {
        
        addSinhVien($pdo, $ten, $email);
    }

    
    header('Location: index.php');
    exit;
}


$danh_sach_sv = getAllSinhVien($pdo);


include __DIR__ . '/views/sinhvien_view.php';
