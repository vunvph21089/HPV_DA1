<?php
function insert_bds_tuvan($user, $note_user, $id_bds,$name,$img, $time_yeucau, $email, $tel)
{
    $sql = "INSERT INTO `bds_tuvan`(`name_kh`, `note_user`, `id_bds`,`name`,`img`, `time_yeucau`, `email`, `tel`) VALUES ('$user','$note_user','$id_bds','$name','$img' ,'$time_yeucau','$email','$tel')";
    pdo_execute($sql);
}

function delete_tuvan($id)
{
    $sql = "DELETE FROM bds_tuvan WHERE id=" . $id;
    pdo_query($sql);
}

function update_bds_tuvan($id)
{
    $sql = "UPDATE `bds_tuvan` 
        SET `trangthai`='[value-2]',`id_user`='[value-3]',`id_nhanvien`='[value-4]',`note_user`='[value-5]',`id_bds`='[value-6]',`time_yeucau`='[value-7]',`time_tuvan`='[value-8]' 
        WHERE `id`=" . $id;
    pdo_execute($sql);
}

function loadOne_bds_tuvan($id)
{
    $sql = "SELECT * FROM bds_tuvan where id=" . $id;
    $bds_tuvan = pdo_query_one($sql);
    return $bds_tuvan;
}

function loadAll_bds_tuvan()
{
    $sql = "SELECT * FROM bds_tuvan order by id";
    $list_bds_tuvan = pdo_query($sql);
    return $list_bds_tuvan;
}

