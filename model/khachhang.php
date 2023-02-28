<?php

function loadall_khachhang()
{
    $sql = " select * from khachhang";
    $listkhachhang = pdo_query($sql);
    return $listkhachhang;
}
function delete_khachhang($id)
{
    $sql = "delete from khachhang where id=" . $id;
    pdo_execute($sql);
}
