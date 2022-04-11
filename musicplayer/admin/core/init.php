<?php
    //  nhiệm vụ:   file trung gian kết nối db với các file xử lý, index và chứa các thông tin chung của website

    //  kết nối các file xử lý
    require "classes/database.php";
    require "classes/redirect.php";
    require "classes/session.php";

    //  kết nối đến db
    $db = new database();
    $db->db_connect();
    $db->db_set_charset('utf8');

    //  các thông tin chung của website
    $_DOMAIN =   "http://localhost/musicplayer/admin/";

    date_default_timezone_set('Asia/Ho_Chi_minh');
    $date_current    =   '';
    $date_current    =   date('Y-m-d H:i:sa');

    //  khởi tạo session
    $ss = new session();
    $ss->ss_start();

    //  kiểm tra session
    if($ss->ss_get_data() != ''){
        $user = $ss->ss_get_data();
    } else{
        $user = '';
    }

    //  nếu đăng nhâp
    if($user){
        //  lấy dữ liệu tài khoản
        $sql_get_data_user  =   "SELECT * FROM accounts WHERE username = '$user'";
        if($db->db_num_rows($sql_get_data_user)){
            $data_user = $db->db_fetch_assoc($sql_get_data_user, 1);
        }
    }
?>