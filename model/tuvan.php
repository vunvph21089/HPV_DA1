<?php
function insert_bds_tuvan($id_user,$note_user, $id_bds,$time_yeucau)
{
    $sql = "INSERT INTO `bds_tuvan`(`id_user`,`note_user`, `id_bds`,`time_yeucau`)
    VALUES ('$id_user','$note_user','$id_bds' ,'$time_yeucau')";
    pdo_execute($sql);
}

function delete_tuvan($id)
{
    $sql = "DELETE FROM bds_tuvan WHERE id=" . $id;
    pdo_query($sql);
}

function update_bds_tuvan($id,$nhanvien,$trangthai,$time_tuvan)
{
    $sql = "UPDATE `bds_tuvan` 
        SET `id_nhanvien`='$nhanvien',`trangthai`='$trangthai',`time_tuvan`='$time_tuvan' 
        WHERE `id`=" . $id;
    pdo_execute($sql);
}

function loadOne_bds_tuvan($id)
{
    $sql = "SELECT * FROM bds_tuvan where id=" . $id;
    $bds_tuvan = pdo_query_one($sql);
    return $bds_tuvan;
}

function loadAll_bds_tuvan($kyw = "")
{
    $sql = "SELECT * FROM bds_tuvan WHERE 1";
    if ($kyw != "") {
        $sql .= " and id like '%" . $kyw . "%'";
    }
    $sql .= " ORDER BY id ";
    $list_bds_tuvan = pdo_query($sql);
    return $list_bds_tuvan;
}
function trangthai($n)
{
    switch ($n) {
        case '0':
            $tt = "Đang chờ";
            break;
        case '1':
            $tt = "Đã giao việc";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}
