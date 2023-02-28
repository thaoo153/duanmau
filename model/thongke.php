<?php

function loadall_thongke()
{
    $sql = "SELECT danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
    $sql .= " FROM sanpham left JOIN danhmuc ON danhmuc.id=sanpham.id_danhmuc";
    $sql .= " GROUP BY danhmuc.id ORDER BY danhmuc.id DESC";
    $listthongke = pdo_query($sql);
    return $listthongke;
}

?>