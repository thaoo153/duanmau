<!DOCTYPE html>
<html lang="en">

<style type="text/css">
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
    }
</style>

<div class=" row">
    <div class="row frmtitle">
        <h1>DANH SÁCH BÌNH LUẬN </h1>
    </div>
    <div class="row mb10 frmdsloai">
        <table>
            <tr>
                <th></th>
                <th>Mã bình luận </th>
                <th>Nội dung </th>
                <th>ID khách hàng </th>
                <th>ID sản phẩm </th>
                <th>Action</th>
            </tr>

            <?php
            foreach ($listbinhluan as $binhluan) {
                extract($binhluan);
                $suadm = "index.php?act=suadm&id=" . $id;
                $xoadm = "index.php?act=xoabinhluan&id=" . $id;
                echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>' . $id . '</td>
                        <td>' . $noi_dung . '</td>
                        <td>' . $id_kh . '</td>
                        <td>' . $id_sp . '</td>
                        <td>
                            <a href="' . $suadm . '">
                                <input type="button" value="Sửa">
                            </a>
                            <a href="' . $xoadm . '">
                                <input onclick="return confirm(`Are you sure?`);" type="button" value="Xóa">
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
        <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
    </div>
</div>