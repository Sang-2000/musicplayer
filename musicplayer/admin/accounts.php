<?php
 
// Kết nối database và thông tin chung
require_once 'core/init.php';
 
// Nếu đăng nhập
if ($user) 
{
    // Nếu tồn tại POST action
    if (isset($_POST['action']))
    {
        // Xử lý POST action
        $action = trim(addslashes(htmlspecialchars($_POST['action'])));
 
        // Thêm tài khoản
        if ($action == 'add_acc') 
        {
            // Xử lý các giá trị
            $username_add_acc = trim(htmlspecialchars(addslashes($_POST['username_add_acc'])));
            $password_add_acc = trim(htmlspecialchars(addslashes($_POST['password_add_acc'])));
            $repassword_add_acc = trim(htmlspecialchars(addslashes($_POST['repassword_add_acc'])));
 
            // Các biến xử lý thông báo
            $show_alert = '<script>$("#formAddAcc .alert").removeClass("hidden");</script>';
            $hide_alert = '<script>$("#formAddAcc .alert").addClass("hidden");</script>';
            $success = '<script>$("#formAddAcc .alert").attr("class", "alert alert-success");</script>';
 
            // Kiểm tra tên đăng nhập
            $sql_check_un_exist = "SELECT username FROM accounts WHERE username = '$username_add_acc'";
 
            if ($username_add_acc == '' || $password_add_acc == '' || $repassword_add_acc == '') {
                echo $show_alert.'Vui lòng điền đầy đủ thông tin.';
            } 
            else if (strlen($username_add_acc) < 6 || strlen($username_add_acc) > 32) {
                echo $show_alert.'Tên đăng nhập nằm trong khoảng 6 - 32 ký tự.';
            } 
            else if (preg_match('/\W/', $username_add_acc)) {
                echo $show_alert.'Tên đăng nhập không được chứa kí tự đậc biệt và khoảng trắng.';
            } 
            else if ($db->db_num_rows($sql_check_un_exist)) {
                echo $show_alert.'Tên đăng nhập đã tồn tại.';
            } 
            else if (strlen($password_add_acc) < 6) {
                echo $show_alert.'Mật khẩu phải nhiều hơn hoặc bằng 6 kí tự.';
            } 
            else if ($password_add_acc != $repassword_add_acc) {
                echo $show_alert.'Mật khẩu nhập lại không khớp.';
            } 
            else {
                //  mã hóa md5
                //  $password_add_acc = md5($password_add_acc); 

                $password_add_acc = $password_add_acc;
                $sql_add_acc = "INSERT INTO accounts VALUES (
                    '',
                    '$username_add_acc',
                    '$password_add_acc',
                    '',
                    '',
                    '0',
                    '0',
                    '$date_current'
                    '',
                    ''
                )";
                $db->db_query($sql_add_acc);
                $db->db_close();
 
                echo $show_alert.$success.'Thêm tài khoản thành công.';
                new redirect($_DOMAIN.'accounts'); // Trở về trang danh sách tài khoản
            }
        }
        // Mở tài khoản
        // Mở khoá 1 tài khoản
        else if ($action == 'unlock_acc')
        {       
            $id_acc = trim(htmlspecialchars(addslashes($_POST['id_acc'])));
            $sql_check_id_acc_exist = "SELECT id_acc FROM accounts WHERE id_acc = '$id_acc'";
            if ($db->db_num_rows($sql_check_id_acc_exist))
            {
                $sql_unlock_acc = "UPDATE accounts SET status = '0' WHERE id_acc = '$id_acc'";
                $db->db_query($sql_unlock_acc);
                $db->db_close();
            }       
        }
        // Mở khoá nhiều tài khoản cùng lúc     
        else if ($action == 'unlock_acc_list')
        {
            foreach ($_POST['id_acc'] as $key => $id_acc)
            {
                $sql_check_id_acc_exist = "SELECT id_acc FROM accounts WHERE id_acc = '$id_acc'";
                if ($db->db_num_rows($sql_check_id_acc_exist))
                {
                    $sql_unlock_acc = "UPDATE accounts SET status = '0' WHERE id_acc = '$id_acc'";
                    $db->db_query($sql_unlock_acc);
                }
            }   
            $db->db_close();
        }
        // Khoá tài khoản
        // Khoá 1 tài khoản
        else if ($action == 'lock_acc')
        {       
            $id_acc = trim(htmlspecialchars(addslashes($_POST['id_acc'])));
            $sql_check_id_acc_exist = "SELECT id_acc FROM accounts WHERE id_acc = '$id_acc'";
            if ($db->db_num_rows($sql_check_id_acc_exist))
            {
                $sql_lock_acc = "UPDATE accounts SET status = '1' WHERE id_acc = '$id_acc'";
                $db->db_query($sql_lock_acc);
                $db->db_close();
            }       
        }
        // Khoá nhiều tài khoản cùng lúc        
        else if ($action == 'lock_acc_list')
        {
            foreach ($_POST['id_acc'] as $key => $id_acc)
            {
                $sql_check_id_acc_exist = "SELECT id_acc FROM accounts WHERE id_acc = '$id_acc'";
                if ($db->db_num_rows($sql_check_id_acc_exist))
                {
                    $sql_lock_acc = "UPDATE accounts SET status = '1' WHERE id_acc = '$id_acc'";
                    $db->db_query($sql_lock_acc);
                }
            }   
            $db->db_close();
        }
        // Xoá tài khoản
        // Xoá 1 tài khoản
        else if ($action == 'del_acc')
        {       
            $id_acc = trim(htmlspecialchars(addslashes($_POST['id_acc'])));
            $sql_check_id_acc_exist = "SELECT id_acc FROM accounts WHERE id_acc = '$id_acc'";
            if ($db->db_num_rows($sql_check_id_acc_exist))
            {
                $sql_del_acc = "DELETE FROM accounts WHERE id_acc = '$id_acc'";
                $db->db_query($sql_del_acc);
                $db->db_close();
            }       
        }   
        // Xoá nhiều tài khoản cùng lúc     
        else if ($action == 'del_acc_list')
        {
            foreach ($_POST['id_acc'] as $key => $id_acc)
            {
                $sql_check_id_acc_exist = "SELECT id_acc FROM accounts WHERE id_acc = '$id_acc'";
                if ($db->db_num_rows($sql_check_id_acc_exist))
                {
                    $sql_del_acc = "DELETE FROM accounts WHERE id_acc = '$id_acc'";
                    $db->db_query($sql_del_acc);
                }
            }   
            $db->db_close();
        }
    }
    //  ngược lại, không tồn tại POST action
    else
    {
        new redirect($_DOMAIN); // Trở về trang index 
    }
}
//  ngược lại, chưa đăng nhập
else
{
    new redirect($_DOMAIN); // Trở về trang index đăng nhập
}