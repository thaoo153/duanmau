<?php
include "../../model/binhluan.php";
$noi_dung = $_POST['noi_dung'];
$id_kh = $_POST['id_kh'];
$id_sp = $_POST['id_sp'];
$ngay_bl = date('Y/m/d');
echo "$noi_dung, $id_kh, $id_sp, $ngay_bl";


if ($id_kh == null) {
    header("location: /duanmau_copy/views/account/dangnhap.php");
} else {
    insert_binhluan($noi_dung, $id_kh, $id_sp, $ngay_bl);
    header("location: /duanmau_copy/views/details.php?id=$id_sp");
}
