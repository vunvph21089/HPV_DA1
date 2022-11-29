<div class="row mb box">
    <div class="box_left">
        <div class="mb">
            <div class="box_title">DKTV</div>
            <div class="box_content form_account">
                <form action="index.php?act=quenmk" method="POST">
                    <div>
                        Email
                        <input type="email" name="email">
                    </div>
                    <div class="mt">
                        <input type="submit" name="gui" value="Gửi">
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
