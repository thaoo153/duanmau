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
        <h1>DANH SÁCH </h1>
    </div>
    <div class="row mb10 frmdsloai">
        <!-- <form action="index.php?act=listsp" method="post">
            <input type="text" name="keyword">
            <select name="iddm">
                <option value="0" selected>Tất cả</option>
                <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    echo '<option value="' . $id . '">' . $name . '</option>';
                }
                ?>
            </select>
            <input type="submit" name="listok" value="OK">
        </form> -->
        <table>
            <tr>
                <th>Chọn</th>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Số lượng</th>
                <th>Giá cao nhất</th>
                <th>Giá thấp nhất</th>
                <th>Giá trung bình</th>

            </tr>

            <?php
            foreach ($listthongke as $thongke) {
                extract($thongke);
                echo '<tr>
                        <td><input type="checkbox"></td>
                        <td>' . $madm . '</td>
                        <td>' . $tendm . '</td>
                        <td>' . $countsp . '</td>
                        <td>' . $maxprice . '</td>
                        <td>' . $minprice . '</td>
                        <td>' . $avgprice . '</td>
                    </tr>';
            }

            ?>

        </table>
    </div>

    <div class="row mb10">
        <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
    </div>
</div>