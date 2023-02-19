<?php
	include '../model/sanpham.php';
	include '../model/danhmuc.php';
    include '../connect.php';
	include '../model/pdo.php';
    include 'home.php';

    if ((isset($_GET['act'])) && ($_GET['act'])!="") {
        $act = $_GET['act'];
        switch ($act) {
            case 'details':
                if (isset($_GET['id']) && ($_GET['id']>0)) {
                    $id = $_GET['id'];
                    $onesp =  loadone_sanpham($id);
                    include "details.php";
                }else{
                    echo 'bhsd';
                }
                break;
            
            default: 
                // include 'home.php';
                echo 'bhsd';

                break;
        }
    }else{
        // include 'home.php';
        echo 'bhsd';

    }

?>