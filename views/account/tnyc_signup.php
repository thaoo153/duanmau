<?php

// Lấy thông tin từ form
$name = $_POST['name'];
$pass = $_POST['pass'];
$email = $_POST['email'];

// Tạo kết nối đến database
$servername = "localhost";
$dbname = "converse";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thực thi câu lệnh SQL để chèn dữ liệu vào bảng khách hàng
$sql = "INSERT INTO khachhang (name, pass, email) VALUES ('$name', '$pass', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Tạo tài khoản thành công";
    $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập để sử dụng các chức năng";
    // header('location:dangky.php');
} else {
    $thongbao = "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
<p><a href="dangky.php" class="btn btn-link">Quay lại</a></p>