<?php

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHT Chương 5 - MVC (Quản lý sinh viên)</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 16px; }
        table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        input[type="text"], input[type="email"] { padding:6px; margin-right:6px; }
        button { padding:6px 10px; }
        .form-row { margin-bottom: 8px; }
    </style>
</head>
<body>
    <h2>Thêm Sinh Viên Mới (Kiến trúc MVC)</h2>
    <form action="index.php" method="POST">
        <div class="form-row">
            Tên sinh viên:
            <input type="text" name="ten_sinh_vien" required>
            Email:
            <input type="email" name="email" required>
            <button type="submit">Thêm</button>
        </div>
    </form>

    <h2>Danh Sách Sinh Viên (Kiến trúc MVC)</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên Sinh Viên</th>
            <th>Email</th>
            <th>Ngày Tạo</th>
        </tr>
        <?php
        
        if (!empty($danh_sach_sv) && is_array($danh_sach_sv)) {
            foreach ($danh_sach_sv as $sv) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($sv['id']) . "</td>";
                echo "<td>" . htmlspecialchars($sv['ten_sinh_vien']) . "</td>";
                echo "<td>" . htmlspecialchars($sv['email']) . "</td>";
                echo "<td>" . $sv['ngay_tao'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Chưa có sinh viên nào.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
