<?php 
function loadAll_role(){
        $sql = "SELECT * FROM role order by id_role";
        $listrole=pdo_query($sql);
        return $listrole;
    }
?>