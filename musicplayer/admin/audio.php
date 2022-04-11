<?php
    
    // Kết nối database và thông tin chung
    require_once 'core/init.php';

    /*
        Các thành phần $_FILE khi var_dump
        myfile      :   chỉ số mảng tương ứng với tên phần tử input, upload file.
        name        :   tên gốc (ban đầu) của file.
        type        :   kiểu file (tùy phần mở rộng có thể là text/plain, image/jpg, image/png ...)
        tmp_name    :   nơi lưu tạm file upload lên, nếu muốn di chuyển nó ra khỏi thư mục tạm dùng hàm move_uploaded_file.
        error       :   mã lỗi, nếu mã này bằng 0 là không lỗi.
        size        :   cỡ file (byte).
    */
    
    // Nếu đăng nhập
    if ($user) 
    {
        // Nếu có file upload
        if (isset($_FILES['audio_up'])) 
        {
            foreach($_FILES['audio_up']['name'] as $name => $value)
            {
                $dir = "../audio/"; 
                $name_audio = stripslashes($_FILES['audio_up']['name'][$name]);
                $source_audio = $_FILES['audio_up']['tmp_name'][$name];
    
                // Lấy ngày, tháng, năm hiện tại
                $day_current = substr($date_current, 8, 2);
                $month_current = substr($date_current, 5, 2);
                $year_current = substr($date_current, 0, 4);
    
                // Tạo folder năm hiện tại
                if (!is_dir($dir.$year_current))
                {
                    mkdir($dir.$year_current.'/');
                } 
    
                // Tạo folder tháng hiện tại
                if (!is_dir($dir.$year_current.'/'.$month_current))
                {
                    mkdir($dir.$year_current.'/'.$month_current.'/');
                }   
    
                // Tạo folder ngày hiện tại
                if (!is_dir($dir.$year_current.'/'.$month_current.'/'.$day_current))
                {
                    mkdir($dir.$year_current.'/'.$month_current.'/'.$day_current.'/');
                }
    
                $path_audio = $dir.$year_current.'/'.$month_current.'/'.$day_current.'/'.$name_audio; // Đường dẫn thư mục chứa file
                move_uploaded_file($source_audio, $path_audio); // Upload file
                $type_audio = array_pop(explode(".", $name_audio)); // Loại file
                $url_audio = substr($path_audio, 3); // Đường dẫn file
                $size_audio = $_FILES['audio_up']['size'][$name]; // Dung lượng file
                $length_audio = $_FILES['audio_up']['length'][$name];   //  thời gian của file âm thanh    
                // Thêm dữ liệu vào table
                $sql_up_file = "INSERT INTO audio VALUES (
                    '',
                    '$name_audio',
                    '$url_audio',
                    '$type_audio',
                    '$size_audio',
                    '$date_current'
                )";
                $db->db_query($sql_up_file);
            }
            echo 'Upload tệp âm thanh thành công.';
            $db->db_close();
            new redirect($_DOMAIN.'audio');
        }
        // Nếu tồn tại POST action
        if (isset($_POST['action']))
        {
            $action = trim(addslashes(htmlspecialchars($_POST['action'])));
        
            // Xoá nhiều tệp âm thanh củng lúc
            if ($action == 'delete_audio_list') 
            {
                foreach ($_POST['id_audio'] as $key => $id_audio)
                {
                    $sql_check_id_audio_exist = "SELECT * FROM audio WHERE id_audio = '$id_audio'";
                    if ($db->db_num_rows($sql_check_id_audio_exist))
                    {
                        $data_audio = $db->db_fetch_assoc($sql_check_id_audio_exist, 1);
                        if (file_exists('../'.$data_audio['url']))
                        {
                            unlink('../'.$data_audio['url']);
                        }
        
                        $sql_delete_audio = "DELETE FROM audio WHERE id_audio = '$id_audio'";
                        $db->db_query($sql_delete_audio);
                    }
                }   
                $db->db_close();
            }
            // Xoá tệp âm thanh chỉ định
            else if ($action == 'delete_audio')
            {       
                $id_audio = trim(htmlspecialchars(addslashes($_POST['id_audio'])));
                $sql_check_id_audio_exist = "SELECT * FROM audio WHERE id_audio = '$id_audio'";
                if ($db->db_num_rows($sql_check_id_audio_exist))
                {
                    $data_audio = $db->db_fetch_assoc($sql_check_id_audio_exist, 1);
                    if (file_exists('../'.$data_audio['url']))
                    {
                        unlink('../'.$data_audio['url']);
                    }
            
                    $sql_delete_audio = "DELETE FROM audio WHERE id_audio = '$id_audio'";
                    $db->db_query($sql_delete_audio);
                    $db->db_close();
                }       
            }
        }
        else
        {
            new redirect($_DOMAIN);
        }
    }
    // Ngược lại chưa đăng nhập
    else
    {
        new redirect($_DOMAIN); // Trở về trang index
    }
  
?>