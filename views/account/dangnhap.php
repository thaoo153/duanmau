<?php
session_start();
$errors = isset($_GET['errors']) ? $_GET['errors'] : '';

// $errors = isset($_GET['errors']) ? $_GET['errors'] : '';
// include "account.php";
// $thongbao = "";
// include "tnyc_signup.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
    <h3 class="m-5" style="text-align: center;">Đăng ký thành viên</h3>
    <form action="tnyc_login.php" method="POST" style="width: 400px; margin: 0 auto">
        <div class="mb-3">
            <label for="" class="form-label">Username</label>
            <input type="text" name="name" class="form-control" id="" aria-describedby="">
            <!-- <div id="" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" name="dangnhap" class="btn btn-primary">Đăng nhập</button>
        <div style="color: red;">
            <?php echo $errors ?>
        </div>
        <input class="btn btn-link" type="reset" value="Nhập lại">
        <a href="../index.php" class="btn btn-link">Quay lại</a>
    </form>

</body>

</html>