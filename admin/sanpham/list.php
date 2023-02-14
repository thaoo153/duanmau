<!DOCTYPE html>
<html lang="en">

<style type="text/css"> 
table, th, td {  
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {  
    padding: 10px;  
}
</style>

<div class=" row">
    <div class="row frmtitle">
        <h1>DANH SÁCH LOẠI HÀNG </h1>
    </div>
    <div class="row mb10 frmdsloai">
        <form action="index.php?act=listsp" method = "post">
            <input type="text" name="keyword">
            <select name="iddm">
                <option value="0" selected>Tất cả</option>
                <?php
                foreach($listdanhmuc as $danhmuc){
                    extract($danhmuc);
                    echo '<option value="'.$id.'">'.$name.'</option>';
                }                       
                ?>
            </select>
            <input type="submit" name="listok" value="OK">
        </form>
        <table>
            <tr>
                <th>Chọn</th>
                <th>Mã loại</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Mô tả sản phẩm</th>
                <th>Lượt xem</th>
                <th>Hành động</th>
            </tr>

            <?php
                foreach ($listsanpham as $sanpham) {
                    extract($sanpham);
                    
                    $suasp = "index.php?act=suasp&id=".$id;
                    $xoasp = "index.php?act=xoasp&id=".$id;
                    $hinhpath = "/DUANMAU_COPY/admin/".$img;
                    if($img){
                        $hinh="<img src='".$hinhpath."' height='80'>";
                    }else{
                        $hinh="no photo";
                    }
                    echo '<tr>
                        <td><input type="checkbox"></td>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$hinh.'</td>
                        <td>'.$price.'</td>
                        <td>'.$description.'</td>
                        <td>'.$view.'</td>

                        <td>
                            <a href="'.$suasp.'">
                                <input type="button" value="Sửa">
                            </a>
                            <a href="'.$xoasp.'">
                                <input type="button" value="Xóa">
                            </a>
                        </td>
                    </tr>';
                }

            ?>
            
        </table>
    </div>

    <div class="row mb10">
        <input type="button" value="Chọn tất cả ">
        <input type="button" value="Bỏ chọn tất cả ">
        <input type="button" value="Xóa các mục đã chọn ">
        <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
    </div>
</div>