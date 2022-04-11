<?php
    
    // Kết nối database và thông tin chung
    require_once 'core/init.php';
    
    // Nếu đăng nhập
    if ($user) 
    {
        // Nếu tồn tại song action
        if (isset($_POST['action']))
        {
            // Xử lý song action
            $action = trim(addslashes(htmlspecialchars($_POST['action'])));
    
            // Thêm bài viết
            if ($action == 'add_song')
            {
                // Xử lý các giá trị
                $audio_add_song = trim(addslashes(htmlspecialchars($_POST['audio_add_song'])));
                $title_add_song = trim(addslashes(htmlspecialchars($_POST['title_add_song'])));
                $slug_add_song = trim(addslashes(htmlspecialchars($_POST['slug_add_song'])));
                $singer_add_song = trim(addslashes(htmlspecialchars($_POST['singer_add_song'])));
                $cate_add_song = trim(addslashes(htmlspecialchars($_POST['cate_add_song'])));
                $img_add_song = trim(addslashes(htmlspecialchars($_POST['img_add_song'])));
    
                // Các biến xử lý thông báo
                $show_alert = '<script>$("#formAddSong .alert").removeClass("hidden");</script>';
                $hide_alert = '<script>$("#formAddSong .alert").addClass("hidden");</script>';
                $success = '<script>$("#formAddSong .alert").attr("class", "alert alert-success");</script>';
    
                // Nếu các giá trị rỗng
                if ($audio_add_song == '' || $title_add_song == '' || $slug_add_song == '' || $singer_add_song == '' || $cate_add_song == '' || $img_add_song == '')
                {
                    echo $show_alert.'Vui lòng điền đầy đủ thông tin.';
                }
                // Ngược lại
                else
                {
                    // Kiểm tra bài viết tồn tại 
                    $sql_check_song_exist = "SELECT name_song, slug FROM songs WHERE name_song = '$title_add_song' OR slug = '$slug_add_song'";
                    // Nếu bài viết tồn tại
                    if ($db->db_num_rows($sql_check_song_exist))
                    {
                        echo $show_alert.'Bài viết có tiêu đề hoặc slug đã tồn tại.';
                    }
                    else
                    {
                        // Thực thi thêm bài viết
                        $sql_add_song = "INSERT INTO songs VALUES (
                            '',
                            '$audio_add_song',
                            '$singer_add_song',
                            '$cate_add_song',
                            '$title_add_song',
                            '$img_add_song',
                            '$slug_add_song',
                            '',
                            '',
                            '0',
                            '0',
                            '$date_current'
                        )";
                        $db->db_query($sql_add_song);
                        echo $show_alert . $success.'Thêm bài hát thành công.';
                        $db->db_close(); // Giải phóng
                        new redirect($_DOMAIN.'songs'); // Trở về trang danh sách bài viết
                    }
                }
            }
    
            // Tải chuyên mục trong chỉnh sửa bài viết
        }
        // Ngược lại không tồn tại song action
        else
        {
            new redirect($_DOMAIN);
        }
    }
    // Nếu không đăng nhập
    else
    {
        new redirect($_DOMAIN);
    }
 
?>