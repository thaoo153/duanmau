<?php
	include 'model/sanpham.php';
	include 'model/danhmuc.php';
    include 'connect.php'
	include 'model/pdo.php';

    if ((isset($_GET['act'])) && ($_GET['act'])!="") {
        $act = $_GET['act'];
        switch ($act) {
            case 'spct':
                if (isset($_GET['id']) && ($_GET['id']>0)) {
                    $id = $_GET['id'];
                    $onesp =  loadone_sanpham($id);
                    extract($onesp);

                    $sp_cung_loai = load_sanpham_cungloai($id,$iddm);
                    include "details.php";
                }else{
                    include "index.php";
                }
                break;
            
            default: 
                include 'index.php';
                break;
        }
    }else{
        include 'index.php';
    }

?>