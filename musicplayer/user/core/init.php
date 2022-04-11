<?php
    // Require các thư viện PHP
    require_once 'classes/database.php';
    require_once 'classes/session.php';
    require_once 'classes/redirect.php';

    // Kết nối database
    $db = new database();
    $db->db_connect();
    $db->db_set_charset('utf8');

    //  thiết lập đường dẫn tuyệt đối
    $_DOMAIN    =   "http://localhost/musicplayer/user/";

    // Lấy thông tin website
    $sql_get_data_web = "SELECT * FROM website";
    if ($db->db_num_rows($sql_get_data_web)) {
        $data_web = $db->db_fetch_assoc($sql_get_data_web, 1);
    }
?>