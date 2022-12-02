<?php
include "model/account.php";
include "model/bds.php";
include "model/loai_bds.php";
include "model/pdo.php";
include "model/tuvan.php";
// include "model/user.php";
$bds_new = loadall_bds_home();
$loaibds = loadAll_danhmuc();
$dstop5 = loadAll_bds_top5();
session_start();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'batdongsanchitiet':
            if (isset($_GET['idbds']) && ($_GET['idbds'] > 0)) {
                $id = $_GET['idbds'];
                tang_view($id);
                $onebds = loadone_bds($id);
                extract($onebds);
                $anhmota = load_anhmota($id);
                $oneuser=loadOne_user($id_user);
                $bds_cungloai = load_bds_cungloai($id, $id_loaibds);
                include "view/bds_chitiet.php";
            } else {
                include "view/batdongsan.php";
            }
            break;

        case 'batdongsan':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['id_loaibds']) && ($_GET['id_loaibds'] > 0)) {
                $id_loaibds = $_GET['id_loaibds'];
            } else {
                $id_loaibds = 0;
            }
            $ds_bds = loadall_bds($kyw, $id_loaibds);
            include 'view/batdongsan.php';
            break;
        case 'home':         
           
            include 'view/home.php';
            break;
        case 'detail':
            // code  vao day

            include 'view/detail.php';
            break;

        case 'hotdeals':
            // code  vao day
            // $id_loaibds = $_POST['loaibds'];
            $ds_bds = loadall_bds();
            include 'view/hotdeals.php';
            break;

        case 'features':
            include 'view/features.php';
            break;

        case 'blog':
            // code  vao day

            include 'view/blog.php';
            break;

        case 'contact':
            // code  vao day

            include 'view/contact.php';
            break;
        case 'listtuvan':
            $listtuvan = loadAll_bds_tuvan();
            include 'view/batdongsantuvan.php';
            break;

        case 'tuvan':
            if (isset($_POST['tuvan']) && $_POST['tuvan']) {
                $id_user = $_POST['id_login'];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $note_user = $_POST['note_user'];
                $id_bds = $_POST['id_bds'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $time_yeucau = date('h:i:sa d/m/Y');
                insert_bds_tuvan($id_user,$fullname, $note_user, $id_bds,$name,$img,$time_yeucau, $email, $tel);
                $thongbao = "Bạn đã gửi yêu cầu tư vấn thành công";
                header('location:index.php?act=batdongsan');
            }
            break;
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = md5($_POST['pass']);
                insert_account($email, $user, $pass);
                $thongbao = "Đăng ký thành công.Đăng nhập để sử dụng chức năng !";
            }
            include "view/account/register.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('location:index.php');
                } else {
                    $thongbao = "Tài khoản không tồn tại vui lòng kiểm tra hoặc đăng kí mới";
                }
            }
            include "view/account/login.php";
            break;
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];

                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = checkuser($user, $pass);
                // header('Location: index.php?act=edit_taikhoan');
            }
            include "view/account/edit_taikhoan.php";
            break;
        case 'quenmk':
            if (isset($_POST['gui']) && ($_POST['gui'])) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                } else {
                    $thongbao = "Email không tồn tại.";
                }
            }
            include "view/account/quenmk.php";
            break;
        case 'exit':
            session_unset();
            include "view/home.php";
            break;
    }
} else {
    $ds_bds = loadall_bds();
    include "view/home.php";
}
