<?php
require_once "pdo.php";
function insert_binhluan($noi_dung, $id_kh, $id_sp, $ngay_bl)
{
    $sql = "INSERT INTO `binhluan` (`noi_dung`, `id_sp`, `id_kh`, `ngay_bl`) VALUES ('$noi_dung', '$id_sp', '$id_kh', '$ngay_bl')";
    pdo_execute($sql);
}

function loadall_binhluan()
{
    $sql = " select * from binhluan order by id desc";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
function load_binhluan()
{
    $sql = " select * from binhluan";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
function delete_binhluan($id)
{
    $sql = "delete from binhluan where id=" . $id;
    pdo_execute($sql);
}
function loadOneSp_binhluan($id_sp)
{
    $sql = "select * from binhluan where id_sp ='$id_sp' order by id desc";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
