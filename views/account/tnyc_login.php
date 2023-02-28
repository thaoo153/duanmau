<?php
$connect = new PDO(
    'mysql:host=127.0.0.1;dbname=converse;',
    'root',
    ''
);
$name = $_POST['name'];
$pass = $_POST['pass'];
$errors = '';
if ($name == '') {
    $errors = 'User không được để trống!.';
}
if ($pass == '') {
    $errors = 'Password không được để trống!.';
}
if ($errors != '') {
    header("location: dangnhap.php");
} else {
    $sql = "SELECT * FROM khachhang WHERE name='$name' AND pass='$pass'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $loginUser = $statement->fetch();
    if ($loginUser['name'] !== $name) {
        $errors = 'Người dùng không tồn tại!';
        header("location: dangnhap.php?errors=$errors");
        // } else if (password_verify($pass, $loginUser['pass']) == false) {
        //     $errors = 'Mật khẩu không chính xác!';
        //     header("location: dangnhap.php?errors=$errors");
    } else if ($loginUser['pass'] !== $pass && $loginUser['name'] == $name) {
        $errors = 'Mật khẩu không chính xác!';
        header("location: dangnhap.php?errors=$errors");
    } else {
        session_start();
        $_SESSION['name'] = $loginUser;
        header("location: ../index.php");
    }
}
