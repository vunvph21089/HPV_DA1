<?php
include "view/header.php";
?>

<table class="table align-middle" id="customerTable">
    <thead class="table-light text-muted">
        <tr>
            <th class="sort" data-sort="eamil">ID Tư vấn</th>
            <th class="sort" data-sort="eamil">ID Bất động sản</th>
            <th class="sort" data-sort="eamil">Tên bất động sản</th>
            
            <th class="sort" data-sort="action">Ảnh</th>
            <th class="sort" data-sort="customer_name">Tên khách hàng</th>
            <th class="sort" data-sort="email">Email</th>
            <th class="sort" data-sort="phone">Sđt</th>
            <th class="sort" data-sort="date">Nội dung</th>
            <th class="sort" data-sort="status">Thời gian yêu cầu</th>
            <th class="sort" data-sort="action">Trạng thái</th>
        </tr>
    </thead>
    <tbody class="list form-check-all">
        <tr>
            <?php
            foreach ($listtuvan as $tuvan) {
                extract($tuvan);
                echo  '<tr>
                            <td class="customer_name">' . $id . '</td>
                            <td class="customer_name">' . $id_bds. '</td>
                            <td class="customer_name">' . $name . '</td>
                            <td class="customer_name"><img src="' .$img. '" width="60" height="60"></td>
                            <td class="customer_name">' . $name_kh . '</td>
                            <td class="customer_name">' . $email . '</td>
                            <td class="customer_name">' . $tel . '</td>
                            <td class="customer_name">' . $note_user . '</td>
                            <td class="customer_name">' . $time_yeucau . '</td>
                            <td class="customer_name"></td>

                            </tr>';
            }
            ?>
        </tr>
    </tbody>
</table>
<?php
include "view/footer.php";
?>