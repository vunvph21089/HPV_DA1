<?php
include "../model/pdo.php";
include "../model/bds.php";
include "../model/loai_bds.php";
include "../model/user.php";
include "../model/role.php";
include "../model/tintuc.php";
include "../model/danhmuc_tintuc.php";
include "../model/dbConfig.php";

include "header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            // Controller bat dong san
        case 'addbds':
            if (isset($_POST['submit']) && ($_POST['submit'])) {
                $id_loaibds = $_POST['loaibds'];
                $tenbds = $_POST['name_bds'];
                $filename = "";
                $price = $_POST['gia'];
                $diachi = $_POST['diachi'];
                $dientich = $_POST['dientich'];
                $info = $_POST['mota'];
                $sophong = $_POST['sophong'];
                $id_user = $_POST['nguoidang'];
                $targetDir = '../uploads/';
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

                // UPLOAD ẢNH
                if ($_FILES["anh"]['size'] > 0) {
                    $filename = uniqid() . '-' . $_FILES["anh"]['name'];
                    move_uploaded_file($_FILES["anh"]['tmp_name'], '../uploads/' . $filename);
                    $filename = 'uploads/' . $filename;
                }
                // END UPLOAD

                // UPLOAD ẢNH MÔ TẢ
                $id = insert_bds($tenbds, $filename, $price, $diachi, $dientich, $info, $sophong, $id_loaibds, $id_user);
                foreach ($_FILES["files"]['name'] as $key => $val) {
                    $fileName = basename($_FILES['files']['name'][$key]);
                    $targetFilePath = $targetDir . $fileName;

                    // Check whether file type is valid 
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                    if (in_array($fileType, $allowTypes)) {
                        // Upload file to server 

                        if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                            // Image db insert sql 
                            $upload_img = '/DA1_HPV/uploads/' . $fileName;
                            var_dump($upload_img);
                            insert_anhmota($upload_img, $id);
                        }
                    }
                }
                $thongbao = "Add Succesfull";
            }
            $listloaibds = loadAll_danhmuc();
            $listuser = loadAll_user();
            include "bds/add_bds.php";
            break;
        case 'listbds':
            $listloaibds = loadAll_danhmuc();
            $listbds = loadall_bds();
            include "bds/list_bds.php";
            break;
        case 'deletebds':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_bds($_GET['id']);
            }
            $listbds = loadall_bds();
            include "bds/list_bds.php";
            break;
        case 'fixbds':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $bds = loadone_bds($_GET['id']);
                $anhmota = load_anhmota($_GET['id']);
                if (is_array($bds)) {
                    extract($bds);
                }
            }
            $listuser = loadAll_user();
            $listloaibds = loadAll_danhmuc();
            include "bds/update_bds.php";
            break;
        case 'updatebds':
            if (isset($_POST['submit']) && ($_POST['submit'])) {
                $id = $_POST['id'];
                $bds = loadone_bds($id);
                $tenbds = $_POST['name_bds'];
                $anh = $_FILES['anh'];
                $imgValue = $bds['img'];
                $price = $_POST['gia'];
                $diachi = $_POST['diachi'];
                $dientich = $_POST['dientich'];
                $info = $_POST['mota'];
                $sophong = $_POST['sophong'];
                $id_loaibds = $_POST['loaibds'];
                $id_user = $_POST['nguoidang'];
                $targetDir = '../uploads/';
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

                // UPDATE ẢNH
                if ($anh['size'] > 0) {
                    $filename = uniqid() . '-' . $anh['name'];
                    move_uploaded_file($anh['tmp_name'], '../uploads/' . $filename);
                    $imgValue = 'uploads/' . $filename;
                }
                // UPLOAD ẢNH MÔ TẢ


                update_bds($id, $tenbds, $imgValue, $price, $diachi, $dientich, $info, $sophong, $id_loaibds, $id_user);
                $thongbao = "Add Succesfull";
            }
            $listloaibds = loadAll_danhmuc();
            $listbds = loadall_bds();
            $listuser = loadAll_user();
            include "bds/list_bds.php";
            break;
        case 'fix_anhmota':
            if (isset($_GET['id_anhmota']) && ($_GET['id_anhmota'] > 0)) {
                $oneanhmota = one_anhmota($_GET['id_anhmota']);
                if (
                    is_array($oneanhmota)
                ) {
                    extract($oneanhmota);
                }
            }
            include "index.php?act=fixbds";
            break;
        case 'update_anhmota':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST["id"];
                $anh = $_FILES['anh'];
                $imgValue = $oneanhmota['file_name'];
                $oneanhmota = one_anhmota($id);
                if ($anh['size'] > 0) {
                    $filename = $anh['name'];
                    move_uploaded_file($anh['tmp_name'], '/DA1_HPV/uploads/' . $filename);
                    $oneanhmota = '/DA1_HPV/uploads/' . $filename;
                }
                update_anhmota($id, $oneanhmota);
            }
            include 'index.php?act=fixbds';
            break;
        case 'delete_anhmota':
            if (isset($_GET['id_anhmota']) && ($_GET['id_anhmota'] > 0)) {
                $id = $_GET['id_anhmota'];
                delete_anhmota($id);
            }
            include 'index.php?act=fixbds=';
            break;
            // Controller loai bat dong san
        case "addloaibds": {
                if (isset($_POST["loaibds"]) && $_POST["loaibds"]) {
                    $loaibds = $_POST["loaibds"];
                    insert_danhmuc($loaibds);
                    $thongbao = 1;
                } else {
                    $thongbao = 0;
                }
                include "loai_bds/add.php";
                break;
            }
        case 'listloaibds':
            $listloaibds = loadAll_danhmuc();
            include "loai_bds/list.php";
            break;
        case 'deleteloaibds':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listloaibds = loadAll_danhmuc();
            include "loai_bds/list.php";
            break;
        case 'sualoaibds':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $loaibds = loadOne_danhmuc($_GET['id']);
                if (is_array($loaibds)) {
                    extract($loaibds);
                }
            }
            include "loai_bds/update.php";
            break;
        case 'updateloaibds':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $loaibds = $_POST["loaibds"];
                $id = $_POST["id"];
                update_danhmuc($id, $loaibds);
            }
            $listloaibds = loadAll_danhmuc();
            include "loai_bds/list.php";
            break;

            // Controller user
        case 'listuser':
            $listuser = loadAll_user();
            include "user/list.php";
            break;
        case 'deleteuser':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_user($_GET['id']);
            }
            $listuser = loadAll_user();
            include "user/list.php";
            break;
        case 'suauser':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $user = loadOne_user($_GET['id']);
                if (is_array($user)) {
                    extract($user);
                }
            }
            $listrole = loadAll_role();
            include "user/update.php";
            break;
        case 'updateuser':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id_role = $_POST["id_role"];
                $id = $_POST["id"];
                update_user($id, $id_role);
            }
            $listrole = loadAll_role();
            $listuser = loadAll_user();
            include "user/list.php";
            break;

            //role
        case 'listrole':
            $listrole = loadAll_role();
            break;

            // Controller danh muc tin tuc
        case "add_dm_tintuc": {
                if (isset($_POST['danhmuc_tintuc']) && $_POST['danhmuc_tintuc']) {
                    $danhmuctt = $_POST["danhmuc_tintuc"];
                    insert_danhmuctintuc($danhmuctt);
                    $thongbao = 1;
                } else {
                    $thongbao = 0;
                }
                include "dm_tintuc/add_tt.php";
                break;
            }
        case 'list_dmtintuc':
            $list_dmtintuc = loadAll_danhmuctintuc();
            include "dm_tintuc/list_tt.php";
            break;
        case 'deletedm-tintuc':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuctintuc($_GET['id']);
            }
            $list_dmtintuc = loadAll_danhmuctintuc();
            include "dm_tintuc/list_tt.php";
            break;
        case 'sua_dmtintuc':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $danhmuc_tintuc = loadOne_danhmuctintuc($_GET['id']);
                if (is_array($danhmuc_tintuc)) {
                    extract($danhmuc_tintuc);
                }
            }

            include "dm_tintuc/update_tt.php";
            break;
        case 'update_dmtintuc':
            if (isset($_POST['capnhat'])) {
                $id = $_POST["id"];
                $danhmuc_tintuc = $_POST["danhmuctintuc"];

                update_danhmuctintuc($id, $danhmuc_tintuc);
            }
            $list_dmtintuc = loadAll_danhmuctintuc();
            include "dm_tintuc/list_tt.php";
            break;

            // Controller tin tuc
        case 'addtintuc':
            if (isset($_POST['submit']) && ($_POST['submit'])) {
                $tieude = $_POST['tieude'];
                $anh = $_FILES["anh"];
                $filename = "";
                $noidung = $_POST['noidung'];
                $mota_ngan = $_POST['mota_ngan'];
                $id_danhmuctt = $_POST['danhmuctt'];
                $id_user = $_POST['nguoidang'];
                // UPLOAD ẢNH
                if ($anh['size'] > 0) {
                    $filename = uniqid() . '-' . $anh['name'];
                    move_uploaded_file($anh['tmp_name'], '../uploads/' . $filename);
                    $filename = 'uploads/' . $filename;
                }
                // END UPLOAD
                insert_tintuc($tieude, $filename, $noidung, $mota_ngan, $id_danhmuctt, $id_user);
                $thongbao = "Add Succesfull";
            }
            $list_tintuc = loadAll_danhmuctintuc();
            $listtintuc = loadAll_tintuc();
            $listuser = loadAll_user();
            include "tintuc/add.php";
            break;
        case 'listtintuc':
            $listtintuc = loadAll_tintuc();
            include "tintuc/list.php";
            break;
        case 'deletetintuc':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_tintuc($_GET['id']);
            }
            $listtintuc = loadAll_tintuc();
            include "tintuc/list.php";
            break;
        case 'suatintuc':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $tintuc = loadOne_tintuc($_GET['id']);
                if (is_array($tintuc)) {
                    extract($tintuc);
                }
            }
            $listuser = loadAll_user();
            $list_tintuc = loadAll_danhmuctintuc();
            include "tintuc/update.php";
            break;
        case 'updatetintuc':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST["id"];
                $tintuc = loadOne_tintuc($id);
                $tieude = $_POST['tieude'];
                $anh = $_FILES['anh'];
                $imgValue = $tintuc['img'];
                $noidung = $_POST['noidung'];
                $mota_ngan = $_POST['mota_ngan'];
                $id_danhmuctt = $_POST['danhmuctt'];
                $id_user = $_POST['nguoidang'];
                // UPDATE ẢNH
                if ($anh['size'] > 0) {
                    $filename = uniqid() . '-' . $anh['name'];
                    move_uploaded_file($anh['tmp_name'], '../uploads/' . $filename);
                    $imgValue = 'uploads/' . $filename;
                }
                update_tintuc($id, $tieude, $imgValue, $noidung, $mota_ngan, $id_danhmuctt, $id_user);
                $thongbao = "Add Succesfull";
            }
            $list_tintuc = loadAll_danhmuctintuc();
            $listtintuc = loadall_tintuc();
            $listuser = loadAll_user();
            include "tintuc/list.php";
            break;
            // Tu van
        case 'them_bds_tuvan':
            
            break;
        case 'delete_bds_tuvan':
            break;
        case 'list_bds_tuvan':
            break;
        case 'sua_bds_tuvan':
            break;
        case 'update_bds_tuvan':
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
