<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>PHT Chương 2 - PHP Căn Bản</title>
</head>
<body>
  <h1>Kết quả PHP Căn Bản</h1>

  <?php

  $ho_ten = "Trương Tuấn Hải"; 
  $diem_tb = 8.6;             
  $co_di_hoc_chuyen_can = true; 

  
  echo "Họ tên: $ho_ten<br>";
  echo "Điểm trung bình: $diem_tb<br>";

  
  if ($diem_tb >= 8.5 && $co_di_hoc_chuyen_can) {
      echo "Xếp loại: Giỏi<br>";
  } elseif ($diem_tb >= 6.5 && $co_di_hoc_chuyen_can) {
      echo "Xếp loại: Khá<br>";
  } elseif ($diem_tb >= 5.0 && $co_di_hoc_chuyen_can) {
      echo "Xếp loại: Trung bình<br>";
  } else {
      echo "Xếp loại: Yếu (Cần cố gắng thêm!)<br>";
  }

  
  function chaoMung() {
      echo "Chúc mừng Hải đã hoàn thành PHT Chương 2!";
  }

  
  chaoMung();
  ?>
</body>
</html>
