<?php
include "model/account.php";
include "model/bds.php";
include "model/loai_bds.php";
include "model/pdo.php";
include "model/tuvan.php";
include "model/tintuc.php";
include "model/danhmuc_tintuc.php";
// include "model/user.php";
$ds_bds = loadall_bds();
$bds_new = loadall_bds_home();
$loaibds = loadAll_danhmuc();
$danhmuctt = loadAll_danhmuctintuc();
session_start();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'batdongsanchitiet':
            if (isset($_GET['idbds']) && ($_GET['idbds'] > 0)) {
                $url_bds = $_SERVER['REQUEST_URI'];
                $id = $_GET['idbds'];
                tang_view($id);
                $onebds = loadone_bds($id);
                extract($onebds);
                $anhmota = load_anhmota($id);
                $oneuser = loadOne_user($id_user);
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
            if (isset($_POST['location']) && ($_POST['location'] != "")) {
                $kyw = $_POST['location'];
            } else {
                $kyw = "";
            }
            // code  vao day
            // $id_loaibds = $_POST['loaibds'];
            $dstop5 = loadAll_bds_top5();
            include 'view/hotdeals.php';
            break;

        case 'features':
            include 'view/features.php';
            break;

        case 'tintucchitiet':
            if (isset($_GET['idtt']) && ($_GET['idtt'] > 0)) {
                $id = $_GET['idtt'];
                $onett = loadOne_tintuc($id);
                extract($onett);

                $tintuc_cungloai = load_tintuc_cungloai($id, $id_danhmuctt);
                include "view/tintucchitiet.php";
            } else {
                include "view/blog.php";
            }
            break;


        case 'blog':
            // code  vao day
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['id_tintuc']) && ($_GET['id_tintuc'] > 0)) {
                $id_dm_tintuc = $_GET['id_tintuc'];
            } else {
                $id_dm_tintuc = 0;
            }

            $ds_tt = loadAll_tintuc($kyw, $id_dm_tintuc);
            include 'view/blog.php';
            break;

        case 'contact':
            // code  vao day
            require 'view/account/validate.php';
            if (isset($_POST['submit']) && ($_POST['submit'])) {
                if (empty($_POST['name'])) {
                    $error['name'] = "Bạn chưa nhập vào họ tên";
                }
                if (empty($_POST['email'])) {
                    $error['email'] = "Bạn chưa nhập vào email";
                } else if (!is_email($_POST['email'])) {
                    $error['email'] = "Định dạng email không đúng";
                }
                if (empty($_POST['message'])) {
                    $error['message'] = "Bạn chưa nhập vào lời nhắn";
                }

                if (empty($error)) {
                    $thongbao = "Bạn đã gửi yêu cầu liên hệ thành công !";
                }
            }


            include 'view/contact.php';
            break;
        case 'listtuvan':
            $id_nhanvien = $_SESSION['user']['id'];
            $listtuvan = load_Bds_Tuvan_Nhanvien($id_nhanvien);
            include 'view/batdongsantuvan.php';
            break;

        case 'tuvan':
            if (isset($_POST['tuvan']) && $_POST['tuvan']) {
                $id_user = $_POST['id_login'];
                $note_user = $_POST['note_user'];
                $id_bds = $_POST['id_bds'];
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $time_yeucau = date('h:i:sa d/m/Y');
                insert_bds_tuvan($id_user, $note_user, $id_bds, $time_yeucau);
                $thongbaotuvan = 1;
                $linkbdschitiet = 'index.php?act=batdongsanchitiet&idbds=' . $id_bds;
                header('location:' . $linkbdschitiet);
            }

            break;
        case 'dangky':
            require 'view/account/validate.php';
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                if (empty($_POST['hoten'])) {
                    $error['hoten'] = "Không được bỏ trống họ tên";
                }

                if (empty($_POST['user'])) {
                    $error['user'] = "Không được bỏ trống tên đăng nhập";
                }

                if (empty($_POST['email'])) {
                    $error['email'] = "Không được bỏ trống email";
                } else if (!is_email($_POST['email'])) {
                    $error['email'] = "Định dạng email không đúng";
                }

                if (empty($_POST['pass'])) {
                    $error['pass'] = "Bạn chưa nhập vào mật khẩu";
                }

                if (empty($_POST['repass'])) {
                    $error['repass'] = "Không được bỏ trống nhập lại mật khẩu";
                } else if ($_POST['repass'] != $_POST['pass']) {
                    $error['repass'] = "Nhập lại mật khẩu không chính xác";
                }

                if (empty($_POST['tel'])) {
                    $error['tel'] = "Không được bỏ trống số điện thoại";
                } else if (!is_tel($_POST['tel'])) {
                    $error['tel'] = "Định dạng số điện thoại không phù hợp";
                }

                if (empty($error)) {
                    $email = $_POST['email'];
                    $hoten = $_POST['hoten'];
                    $user = $_POST['user'];
                    $tel = $_POST['tel'];
                    $pass = md5($_POST['pass']);
                    $repass = md5($_POST['repass']);
                    $thongbao = "";
                    if ($pass == $repass) {
                        insert_account($email, $hoten, $tel, $user, $pass);
                        $thongbao = "Đăng ký thành công. Đăng nhập để sử dụng chức năng !";
                    } else {
                        $thongbao = "Nhập lại mật khẩu không đúng. Vui lòng nhập lại chính xác để đăng ký!";
                    }
                }
            }
            include "view/account/register.php";
            break;
        case 'dangnhap':
            $url_bds = $_GET;
            if (isset($_GET['url'])) {
                setcookie('url_bds', $_GET['url'], time() + 3600);
                setcookie('id_bds', $_GET['idbds'], time() + 3600);
            }
            if (isset($_POST['dangnhap'])) {
                if (empty($_POST['user'])) {
                    $error['user'] = 'Không được bỏ trống tên đăng nhập';
                }

                if (empty($_POST['pass'])) {
                    $error['pass'] = 'Không được bỏ trống mật khẩu';
                }

                if (empty($error)) {
                    $user = isset($_POST['user']) ? $_POST['user'] : '';
                    $pass = isset($_POST['pass']) ? md5($_POST['pass']) : '';

                    $checkuser = checkuser($user, $pass);
                    if (isset($_COOKIE['url_bds']) && ($_COOKIE['id_bds'])) {
                        if (is_array($checkuser)) {
                            $_SESSION['user'] = $checkuser;
                            if ($_SESSION['user']['id_role'] == 1) {
                                header('location:admin/index.php');
                            } else {
                                header('location:' . $_COOKIE['url_bds'] . '&idbds=' . $_COOKIE['id_bds']);
                                setcookie("url_bds", "", time() - 3600);
                                setcookie("id_bds", "", time() - 3600);
                            }
                        } else {
                            $thongbao = "Tài khoản không tồn tại vui lòng kiểm tra hoặc đăng kí mới";
                        }
                    } else {

                        if (is_array($checkuser)) {

                            $_SESSION['user'] = $checkuser;
                            if ($_SESSION['user']['id_role'] == 1) {
                                header('location:admin/index.php');
                            } else {
                                header('location:index.php');
                            }
                        } else {
                            $thongbao = "Tài khoản không tồn tại vui lòng kiểm tra hoặc đăng kí mới";
                        }
                    }
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
    include "view/home.php";
}
