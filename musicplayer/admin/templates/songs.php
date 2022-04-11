<?php
    
    // Nếu đăng nhập
    if ($user)
    {
        echo '<h3>Bài hát</h3>';

        //  lấy tham số ac
        //  nếu tồn tại tham số ac
        if (isset($_GET['ac']))
        {
            $ac = trim(addslashes(htmlspecialchars($_GET['ac'])));
        }
        //  ngược lại, không ctồn tại tham số ac
        else
        {
            $ac = '';
        }
    
        // Lấy tham số id
        //  nếu tồn tại tham số id
        if (isset($_GET['id']))
        {
            $id = trim(addslashes(htmlspecialchars($_GET['id'])));
        }
        //  ngược lại, không tồn tại tham số id
        else
        {
            $id = '';
        }
    
        // Nếu có tham số ac
        if ($ac != '') 
        {
            // Trang thêm bài hát
            if ($ac == 'add')
            {
                // Dãy nút của thêm bài hát
                echo
                '
                    <a href="' . $_DOMAIN . 'songs" class="btn btn-default">
                        <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                    </a> 
                ';
    
                // Content thêm bài hát
                echo
                '
                    <p class="form-add-song">
                        <form method="POST" id="formAddSong" onsubmit="return false;">
                            <div class="form-group audio_add_song">
                                <label>Audio bài hát</label>
                                <select class="form-control" id="audio_add_song">
                                    <option value="" label="Thả xuống để chọn" disabled="disabled" selected></option>
                    ';

                    $sql_audio_add_song = "SELECT * FROM audio";
                    if($db->db_num_rows($sql_audio_add_song)) {
                        foreach($db->db_fetch_assoc($sql_audio_add_song, 0) as $key => $data_audio) {
                            echo '<option value="'. $data_audio['id_audio'] .'" id="option_audio_add_song">'. $data_audio['id_audio'] . ' - ' . $data_audio['name'] .'</option>';
                        }
                    } else {
                        echo '<option value="">Chưa có audio nào</option>';
                    }

                echo '
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên bài hát</label>
                                <input type="text" class="form-control title" id="title_add_song">
                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <input type="text" class="form-control title" id="slug_add_song">
                            </div>
                            <div class="form-group singer_add_cate">
                                <label>Ca sĩ</label>
                                <select class="form-control" id="singer_add_song">
                                    <option value="" label="Thả xuống để chọn" disabled="disabled" selected></option>
                    ';

                    $sql_singer_add_song = "SELECT * FROM singer";
                    if($db->db_num_rows($sql_singer_add_song)) {
                        foreach($db->db_fetch_assoc($sql_singer_add_song, 0) as $key => $data_singer) {
                            echo '
                                <option value="'. $data_singer['id_singer'] .'" id="option_singer_add_song">'. $data_singer['id_singer'] . ' - '. $data_singer['name_singer'] .'</option>
                            ';
                        }
                    } else {
                        echo '<option value="">Chưa có Ca sĩ</option>';
                    }

                   echo '
                                </select>
                            </div>
                            <div class="form-group cate_add_song">
                                <label>Thể loại</label>
                                <select class="form-control" id="cate_add_song">
                                    <option value="" label="Thả xuống để chọn" disabled="disabled" selected></option>
                ';

                $sql_cate_add_song = "SELECT * FROM categories";
                if($db->db_num_rows($sql_cate_add_song)) {
                    foreach($db->db_fetch_assoc($sql_cate_add_song, 0) as $key => $data_cate_add_song) {
                        echo '<option value="'. $data_cate_add_song['id_cate'] .'" id="option_cate_add_song">'. $data_cate_add_song['id_cate'] . ' - ' . $data_cate_add_song['label'] .'</option>
                        
                        ';
                    }
                } else {
                    echo '<option value="">Chưa có Ca sĩ</option>';
                }

               echo '
                                </select>
                            </div>
                            <div class="form-group img_add_song">
                                <label>Hình ảnh</label>
                                <select class="form-control" id="img_add_song">
                                    <option value="" label="Thả xuống để chọn" disabled="disabled" selected></option>
                    ';
    
                    $sql_url_img_add_song = "SELECT * FROM images";
                    if($db->db_num_rows($sql_url_img_add_song)) {
                        foreach($db->db_fetch_assoc($sql_url_img_add_song, 0) as $key => $data_url_img) {
                            echo '<option value="'. str_replace('admin/', '', $_DOMAIN) . $data_url_img['url'] .'" id="option_img_add_song">'. str_replace('admin/', '', $_DOMAIN) . $data_url_img['url'] .'
                                </option>
                            ';
                        }
                    } else {
                        echo '<option value="">Chưa có hình ảnh nào</option>';
                    }
    
                   echo '
                                    </select>
                                </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Tạo</button>
                            </div>
                            <div class="alert alert-danger hidden"></div>
                        </form>
                    </p>  
                ';

            } 
            // Trang chỉnh sửa bài hát
            else if ($ac == 'edit')
            {
                $sql_check_id_cate = "SELECT * FROM songs WHERE id_song = '$id'";
                // Nếu tồn tại tham số id trong table
                if ($db->db_num_rows($sql_check_id_cate)) 
                {
                    $data_song = $db->db_fetch_assoc($sql_check_id_cate, 1);

                    // Dãy nút của chỉnh sửa bài hát
                    echo
                    '
                        <a href="' . $_DOMAIN . 'songs" class="btn btn-default">
                            <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                        </a>
                        <a class="btn btn-danger" id="del_song" data-id="' . $id . '">
                            <span class="glyphicon glyphicon-trash"></span> Xoá
                        </a> 
                    ';  
        
                    // Content chỉnh sửa bài hát
                    echo 
                    '
                        <p class="form-edit-song">
                            <form method="POST" id="formEditSong" onsubmit="return false;">
                                <div class="form-group">
                                    <label>Tên bài hát</label>
                                    <input type="text" value="'. $data_song['name_song'] .'" class="form-control title" id="title_edit_song">
                                </div>
                                <div class="form-group">
                                    <label>Url</label>
                                    <input type="text" value="'. $data_song['slug_song'] .'" class="form-control title" id="slug_edit_song">
                                </div>
                                <div class="form-group">
                                    <label>Lời bài hát</label>
                                    <textarea id="desc_add_singer" class="form-control">'. $data_song['lyric'] .'</textarea>
                                </div>
                                <div class="form-group img_edit_song">
                                    <label>Hình ảnh</label>
                                    <select class="form-control" id="img_edit_song">
                                        <option value="'. $data_song['url_thumb'] .'" label="'. $data_song['url_thumb'] .'" disabled="disabled" selected></option>
                    ';
    
                    $sql_url_img_add_song = "SELECT * FROM images";
                    if($db->db_num_rows($sql_url_img_add_song)) {
                        foreach($db->db_fetch_assoc($sql_url_img_add_song, 0) as $key => $data_url_img) {
                            echo '<option value="'. str_replace('admin/', '', $_DOMAIN) . $data_url_img['url'] .'" id="option_img_add_song">'. str_replace('admin/', '', $_DOMAIN) . $data_url_img['url'] .'
                                </option>
                            ';
                        }
                    } else {
                        echo '<option value="">Chưa có hình ảnh nào</option>';
                    }
    
                   echo '
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Từ khóa</label>
                                    <input type="text" value="'. $data_song['keywords'] .'" class="form-control title" id="keyword_edit_song">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Tạo</button>
                                </div>
                                <div class="alert alert-danger hidden"></div>
                            </form>
                        </p>  
                    ';
                }
            }
    }
        // Ngược lại không có tham số ac
        // Trang danh sách bài hát
        else
        {
            // Dãy nút của danh sách bài hát
            echo
            '
                <a href="' . $_DOMAIN . 'songs/add" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus"></span> Thêm
                </a> 
                <a href="' . $_DOMAIN . 'songs" class="btn btn-default">
                    <span class="glyphicon glyphicon-repeat"></span> Reload
                </a> 
                <a class="btn btn-danger" id="del_song_list">
                    <span class="glyphicon glyphicon-trash"></span> Xoá
                </a> 
            ';
    
            // Content danh sách bài hát
            $sql_get_list_song = "SELECT * FROM songs ORDER BY id_song DESC";
                // Nếu có thể loại
                if ($db->db_num_rows($sql_get_list_song))
                {
                    echo 
                    '
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-striped list" id="list_cate">
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><strong>ID</strong></td>
                                    <td><strong>Bài hát</strong></td>
                                    <td><strong>ID audio</strong></td>
                                    <td><strong>ID ca sĩ</strong></td>
                                    <td><strong>ID thể loại</strong></td>
                                    <td><strong>Url hình ảnh</strong></td>
                                    <td><strong>Tools</strong></td>
                                </tr>
                    ';

                    // In danh sách thể loại
                    foreach ($db->db_fetch_assoc($sql_get_list_song, 0) as $key => $data_song)
                    {
                        
                    
                        echo 
                        '
                            <tr>
                                <td><input type="checkbox" name="id_song[]" value="' . $data_song['id_song'] .'"></td>
                                <td>' . $data_song['id_song'] .'</td>
                                <td><a href="' . $_DOMAIN . 'songs/edit/' . $data_song['id_song'] .'">' . $data_song['name_song'] . '</a></td>
                                <td>' . $data_song['audio_id'] . '</td>
                                <td>' . $data_song['singer_id'] . '</td>
                                <td>' . $data_song['cate_id'] . '</td>
                                <td>
                                    <a href="' . $data_song['url_thumb'] . '">
                                        <img src="' . $data_song['url_thumb'] . '" class="img-fluid img-thumbnail" height="50px" width="50px" alt="ảnh thể loại">
                                        ' . $data_song['url_thumb'] . '
                                    </a>
                                </td>
                                <td>
                                    <a href="' . $_DOMAIN . 'songs/edit/' . $data_song['id_song'] .'" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a class="btn btn-danger btn-sm del-cate-list" data-id="' . $data_song['id_song'] . '">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        ';
                    }

                    echo 
                    '
                            </table>
                        </div>
                    ';
                }
                // Nếu không có thể loại
                else
                {
                    echo '<br><br><div class="alert alert-info">Chưa có Bài hát nào.</div>';
                }
        }
    }
    // Ngược lại chưa đăng nhập
    else
    {
        new redirect($_DOMAIN); // Trở về trang index
    }
  
?>