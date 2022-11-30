<?php
include "view/header.php";
?>

<div class="row mb box">
    <div class="box_left">
        <div class="mb">
            <div class="box_title">DKTV</div>
            <div class="box_content form_account">
                <?php
                    if(isset($_SESSION['user']) && (is_array($_SESSION['user']))){
                        extract($_SESSION['user']);
                    }
                ?>
                <form action="index.php?act=edit_taikhoan" method="POST">
                    <div>
                        Email
                        <input type="email" name="email" value="<?=$email?>">
                    </div>
                    <div>
                        Username
                        <input type="text" name="user" value="<?=$user?>">
                    </div>
                    <div>
                        Password
                        <input type="password" name="pass" value="<?=$pass?>">
                    </div>
                    <div>
                        Address
                        <input type="text" name="address" value="<?=$tel?>">
                    </div>
                    <div>
                        Điện thoại
                        <input type="text" name="tel" value="<?=$address?>">
                    </div>
                    <div class="mt">
                        <input type="hidden" name="id" id="" value="<?=$id?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" name="reset" value="Nhập lại">
                    </div>
                </form>
                <h2 class="thongbao">
                <?php
                    if(isset($thongbao) &&($thongbao!="")){
                        echo $thongbao;
                    }
                ?>
                </h2>
            </div>
        </div>
    </div>
    
</div>

<?php
include "view/footer.php";
?>