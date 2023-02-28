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
        <h1>DANH SÁCH KHÁCH HÀNG </h1>
    </div>
    <div class="row mb10 frmdsloai">
        <table>
            <tr>
                <th></th>
                <th>Mã khách hàng </th>
                <th>Tên khách hàng </th>
                <th>Email </th>
                <th>Action</th>
            </tr>

            <?php
            foreach ($listkhachhang as $khachhang) {
                extract($khachhang);
                $suadm = "index.php?act=suadm&id=" . $id;
                $xoadm = "index.php?act=xoakhachhang&id=" . $id;
                echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>' . $id . '</td>
                        <td>' . $name . '</td>
                        <td>' . $email . '</td>
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