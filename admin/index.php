<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            // ktra xem người dùng có click vào nsut add hay không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;

        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $dm = loadone_danhmuc($_GET['id']);
            }

            include "danhmuc/update.php";
            break;

        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);
                $thongbao = "Cập nhật thành công";
            }

            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
            /*controller sản phẩm*/

        case 'addsp':
            // ktra xem người dùng có click vào nút add hay không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $price = $_POST['pricesp'];
                $desc = $_POST['descsp'];
                $imgsp = $_FILES['hinh'];
                if($imgsp['size'] == 0){
                    $hinh = false;
                    insert_sanpham($tensp, $price, $hinh, $desc, $iddm);
                    $thongbao = "Thêm thành công";
                    // header('location: /duanmau_copy/admin/index.php?act=listsp');
                }else{
                    $hinh = 'imgs/'. basename($imgsp['name']);
                    if (move_uploaded_file($imgsp["tmp_name"], $hinh)) {
                        insert_sanpham($tensp, $price, $hinh, $desc, $iddm);
                        $thongbao = "Thêm thành công";
                        // header('location: /duanmau_copy/admin/index.php?act=listsp');

                    }

                }

            }

            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;

        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $keyword = $_POST['keyword'];
                $iddm = $_POST['iddm'];
            }else{
                $keyword = '';
                $iddm = 0;
            }

            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($keyword, $iddm);
            include "sanpham/list.php";
            break;

        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham("",0);
            include "sanpham/list.php";
            break;
        
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $dm = loadone_sanpham($_GET['id']);
            }

            include "sanpham/update.php";
            break;

        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tensp = $_POST['tensp'];
                $pricesp = $_POST['pricesp'];
                $imgsp = $_FILES['imgsp'];
                $descsp = $_POST['descsp'];
                $id = $_POST['id'];
                if($imgsp['size'] == 0){
                    $save = false;
                    update_sanpham($id, $tensp, $pricesp,$save,$descsp);
                    $thongbao = "Cập nhật thành công";
                }else{
                    $save = 'imgs/'. basename($imgsp['name']);
                    if(move_uploaded_file($imgsp['tmp_name'], $save)){
                        
                        update_sanpham($id, $tensp, $pricesp, $save, $descsp);
                        $thongbao = "Cập nhật thành công";
                    }
                }
            }

            $listsanpham = loadall_sanpham("",0);
            include "sanpham/list.php";
            break;

        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
