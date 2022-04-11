<?php
    /*
        yêu cầu:
            url_img của table categories lấy từ url_img của table images
            date_created theo thời gian cập nhật lúc tạo
            label, url llaf tự nhập vào
            id_cate là tự động tạo
    */

    //  kết nối đến file trung tâm init.php
    require_once "core/init.php";

    //  nếu đã đăng nhập
    if($user) {
        //  nếu tồn tại POST action
        if(isset($_POST['action'])) {
            //  xử lý POST action
            $action = trim(addslashes(htmlspecialchars($_POST['action'])));

            //  tạo chuyên mục
            if($action == 'add') {
                //  xử lý các giá trị
                $label_add_cate = trim(addslashes(htmlspecialchars($_POST['label_add_cate'])));
                $url_add_cate = trim(addslashes(htmlspecialchars($_POST['url_add_cate'])));
                $url_img_add_cate = trim(addslashes(htmlspecialchars($_POST['url_img_add_cate'])));

                //  các biến xử lý thông báo
                $show_alert = '<script>$("#formAddCate .alert").removeClass("hidden");</script>';
                $hide_alert = '<script>$("#formAddCate .alert").addClass("hidden");</script>';
                $success = '<script>$("#formAddCate .alert").attr("class", "alert alert-success");</script>';

                // Nếu các giá trị rỗng
                if ($label_add_cate == '' || $url_add_cate == '' || $url_img_add_cate == '')
                {
                    echo $show_alert.'Vui lòng điền đầy đủ thông tin';
                }
                //  ngược lại, không có giá trị rỗng
                else {
                    //  tạo chuyên mục
                    $sql_add_cate = "INSERT INTO categories VALUES (
                        '',
                        '$label_add_cate',
                        '$url_add_cate',
                        '$url_img_add_cate',
                        '$date_current'
                    )";

                    $db->db_query($sql_add_cate);
                    echo $show_alert.$success.'Tạo chuyên mục thành công.';
                    $db->db_close(); // Giải phóng
                    new redirect($_DOMAIN.'categories'); // Trở về trang danh sách chuyên m
                }
            }
            //  chỉnh sửa chuyên mục
            else if($action == 'edit') {
                
            }
        }
        //  ngược lại, không tồn tại POSt action
        else {
            //  trở về trang danh sách action
            new redirect($_DOMAIN);
        }
    }
    //  ngược lại, nếu chưa đăng nhập
    else {
        //  trở về trang index
        new redirect($_DOMAIN);
    }
?>