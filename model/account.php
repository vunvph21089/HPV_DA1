<?php
        function insert_account($email, $user, $pass){
            $sql = "INSERT INTO account(email, user, pass) values('$email', '$user', '$pass')";
            pdo_execute($sql);
        }
        function checkuser($user, $pass){
            $sql = "SELECT * FROM account WHERE user = '$user' AND pass='$pass'";
            $sp = pdo_query_one($sql);
            return $sp;
        }
        function checkemail($email){
            $sql = "SELECT * FROM account WHERE email='".$email."'";
            $sp = pdo_query_one($sql);
            return $sp;
        }
        function update_taikhoan($id,$user, $pass, $email, $address, $tel){
            $sql = "UPDATE `account` SET `user` = '$user', `pass` = '$pass', `email` = '$email', `tel` = '$tel', `address` = '$address'
            WHERE `account`.`id` = $id";
            pdo_execute($sql);
        }
        function loadall_taikhoan(){
            $sql = "SELECT*FROM account ORDER BY id DESC";
            $listtaikhoan = pdo_query($sql);
            return $listtaikhoan;
        }
        function delete_taikhoan($id){
            $sql = "DELETE FROM  account WHERE id=".$id;
            pdo_execute($sql);
        }
