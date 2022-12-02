<?php
  function delete_taikhoan($id){
    $sql = "DELETE FROM  account WHERE id=".$id;
    pdo_execute($sql);
}
    function delete_user($id){
        $sql = "DELETE FROM account WHERE id =".$id;
        pdo_query($sql);
    }

    function loadAll_user(){
        $sql = "SELECT * FROM account order by id";
        $listuser=pdo_query($sql);
        return $listuser;
    }
    function update_user($id,$id_role){
        $sql="update account set id_role='".$id_role."' where id=".$id;
        pdo_execute($sql);              
    }
    function loadAll_nhanvien(){
        $sql = "SELECT * FROM account where id_role=2";
        $listnhanvien=pdo_query($sql);
        return $listnhanvien;
    } 
    function loadOne_Nhanvien($id){
        $sql = "SELECT * FROM account where id_role=2 and id=".$id;
        $nhanvien=pdo_query_one($sql);
        return $nhanvien;
    }
    function loadOne_user($id){
        $sql="SELECT * FROM account where id=".$id;
        $user=pdo_query_one($sql);
        return $user;
    }
?>
