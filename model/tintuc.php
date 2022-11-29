<?php
function delete_tintuc($id)
{
    $sql = "DELETE FROM tintuc WHERE id =" . $id;
    pdo_query($sql);
}

function insert_tintuc($tieude, $hinh, $noidung, $mota_ngan, $id_danhmuctt, $id_user)
{
    $sql = "INSERT INTO  tintuc(tieude,img,noidung,mota_ngan,id_danhmuctt,id_user) 
        values('$tieude','$hinh','$noidung','$mota_ngan','$id_danhmuctt','$id_user')";
    pdo_execute($sql);
}

function loadOne_tintuc($id)
{
    $sql = "SELECT * FROM tintuc where id=" . $id;
    $tintuc = pdo_query_one($sql);
    return $tintuc;
}

function loadAll_tintuc()
{
    $sql = "SELECT * FROM tintuc order by tieude";
    $listtintuc = pdo_query($sql);
    return $listtintuc;
}
function tang_view($id)
{
    $sql = "UPDATE tintuc SET view = view + 1 WHERE id=" . $id;
    pdo_query($sql, true);
}
function load_tintuc_cungloai($id, $id_danhmuctt)
{
    $sql = "Select * from tintuc WHERE id_danhmuctt = " . $id_danhmuctt . " AND id <> " . $id;
    $tintuc = pdo_query($sql, true);
    return $tintuc;
}
function loadAll_tintuc_top5()
{
    $sql = "Select * from tintuc WHERE 1 order by view desc limit 05";
    $listtintuc = pdo_query($sql, true);
    return $listtintuc;
}
function update_tintuc($id, $tieude, $imgValue, $noidung, $mota_ngan, $id_danhmuctt, $id_user)
{
    $sql = "UPDATE `tintuc` SET 
        `tieude`='$tieude',
        `noidung`='$noidung',
        `img`='$imgValue',
        `id_danhmuctt`='$id_danhmuctt',
        `id_user`=' $id_user',
        `mota_ngan`='$mota_ngan'
         WHERE id = " . $id;
    pdo_execute($sql);
}