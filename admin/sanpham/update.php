<?php
if (is_array($dm)){
    extract($dm);
}

?>


<div class="row">
            <div class="row frmtitle">
                <h1>Cập nhật loại hàng hóa</h1>
            </div>
            <div class="row frmcontent">
                <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                    <div class="row mb10">
                        Mã sản phẩm <br>
                        <input type="text" name="masp" disabled>
                    </div>

                    <div class="row mb10">
                        Tên sản phẩm <br>
                        <input type="text" name="tensp" value="<?php if(isset($name) && ($name!="")) echo $name ;?>">
                    </div>

                    <div class="row mb10">
                        Giá sản phẩm <br>
                        <input type="text" name="pricesp" value="<?php if(isset($price) && ($price!="")) echo $price ;?>">
                    </div>

                    <div class="row mb10">
                        Hình ảnh sản phẩm <br>
                        <input type="file" name="imgsp" >
                    </div>

                    <div class="row mb10">
                        Mô tả sản phẩm <br>
                        <textarea name="descsp" cols="30" rows="10" ><?php if(isset($description) && ($description!="")) echo $description ;?></textarea>
                    </div>

                    <div class="row mb10">
                        <input type="hidden" name="id" id="" value="<?php if(isset($id) && ($id > 0 )) echo $id ;?>">
                        <input type="submit" name="capnhat" value="CẬP NHẬT">
                        <input type="reset" value="NHẬP LẠI">
                        <a href="index.php?act=listsp"> <input type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php
                    if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
                </form>
            </div>
        </div>