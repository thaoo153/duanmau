<?php
function insert_sanpham($tensp, $price, $hinh, $desc, $iddm){
    if($hinh == false){
        $sql="insert into sanpham(name, price, description, id_danhmuc) values('$tensp', '$price', '$desc', '$iddm')";
        pdo_execute($sql);
    }else{
    $sql="insert into sanpham(name, price, img, description, id_danhmuc) values('$tensp', '$price', '$hinh', '$desc', '$iddm')";
    pdo_execute($sql);
    }
}

function delete_sanpham($id){
    $sql = "delete from sanpham where id=".$id;
    pdo_execute($sql);
}
function loadall_sanpham($keyword, $iddm){
    $sql=" select * from sanpham where 1";
    if($keyword!=""){
        $sql.=" and name like '%" .$keyword."%'";
    }

    if($iddm > 0){
        $sql.=" and iddm = '".$iddm."'";
    }
    $sql.=" order by id desc";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham($id){
    $sql = "select * from sanpham where id=".$id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function load_sanpham_cungloai($id,$id_danhmuc){
    $sql=" select * from sanpham where iddm=" .$id_danhmuc." AND id <>".$id;
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function update_sanpham($id, $tensp, $pricesp, $save, $descsp){
    if(!$save){
        $sql="UPDATE sanpham SET name='".$tensp."', price='".$pricesp."', description='".$descsp."' WHERE id=".$id;
        pdo_execute($sql);
    }else{
        $sql="UPDATE sanpham SET name='".$tensp."', price='".$pricesp."', img='".$save."', description='".$descsp."' WHERE id=".$id;
        pdo_execute($sql);
    }

}

?>