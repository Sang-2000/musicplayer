<?php
    
    // Nếu đăng nhập
    if ($user)
    {
        echo '<h3>Ca sĩ</h3>';

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
            // Trang thêm singer
            if ($ac == 'add')
            {
                // Dãy nút của thêm singer
                echo
                '
                    <a href="' . $_DOMAIN . 'singer" class="btn btn-default">
                        <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                    </a> 
                ';
    
                // Content thêm singer
                echo
                '
                    <p class="form-add-singer">
                        <form method="POST" id="formAddSinger" onsubmit="return false;">
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" class="form-control title" id="label_add_singer">
                            </div>
                            <div class="form-group">
                                <label>Thông tin ca sĩ</label>
                                <textarea id="desc_add_singer" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <input type="text" class="form-control title" id="url_add_singer">
                            </div>
                            <div class="form-group url_img_add_singer">
                                <label>URL hình ảnh</label>
                                <select class="form-control" id="url_img_add_singer">
                                    <option value="" label="Thả xuống để chọn" disabled="disabled" selected></option>
                    ';

                    $sql_url_img_singer = "SELECT * FROM images";
                    if($db->db_num_rows($sql_url_img_singer)) {
                        foreach($db->db_fetch_assoc($sql_url_img_singer, 0) as $key => $data_url_img) {
                            echo '<option value="'. str_replace('admin/', '', $_DOMAIN) . $data_url_img['url'] .'" id="option_url_img_cate">'. str_replace('admin/', '', $_DOMAIN) . $data_url_img['url'] .'</option>';
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
            // Trang chỉnh sửa singer
            else if ($ac == 'edit')
            {
                $sql_check_id_singer = "SELECT * FROM singer WHERE id_singer = '$id'";

                // Nếu tồn tại tham số id trong table
                if ($db->db_num_rows($sql_check_id_singer)) 
                {
                    $data_edit_singer = $db->db_fetch_assoc($sql_check_id_singer, 1);
    
                    if ($data_user['position'] == '1')
                    {
                        // Dãy nút của chỉnh sửa singer
                        echo
                        '
                            <a href="' . $_DOMAIN . 'singer" class="btn btn-default">
                                <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                            </a>
                            <a class="btn btn-danger" id="del_singer" data-id="' . $id . '">
                                <span class="glyphicon glyphicon-trash"></span> Xoá
                            </a> 
                        ';  
        
                        // Content chỉnh sửa singer
                        echo
                        '
                            <p class="form-edit-singer">
                                <form method="POST" id="formEditSinger" onsubmit="return false;">
                                    <div class="form-group">
                                        <label>Tên</label>
                                        <input type="text" class="form-control title" value="' . $data_edit_singer['name_singer'] . '" id="label_edit_singer">
                                    </div>
                                    <div class="form-group">
                                        <label>Thông tin ca sĩ</label>
                                        <textarea id="desc_add_singer" class="form-control">' . $data_edit_singer['description'] . '</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>URL</label>
                                        <input type="text" class="form-control title" value="' . $data_edit_singer['slug'] . '" id="url_edit_singer">
                                    </div>
                                    <div class="form-group url_img_edit_singer">
                                        <label>URL hình ảnh</label>
                                        <select class="form-control" id="url_img_edit_singer">
                                            <option value="' . $data_edit_singer['url_avatar'] . '" disabled="disabled" selected>' . $data_edit_singer['url_avatar'] . '</option>
                            ';

                            $sql_url_img_singer = "SELECT * FROM images";
                            if($db->db_num_rows($sql_url_img_singer)) {
                                foreach($db->db_fetch_assoc($sql_url_img_singer, 0) as $key => $data_url_img) {
                                    echo '<option value="'. str_replace('admin/', '', $_DOMAIN) . $data_url_img['url'] .'" id="option_url_img_cate">'. str_replace('admin/', '', $_DOMAIN) . $data_url_img['url'] .'</option>';
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
                }
                else
                {
                    // Hiển thị thông báo lỗi
                    echo
                    '
                        <div class="alert alert-danger">ID singer đã bị xoá hoặc không tồn tại.</div>
                    ';
                }
            }
        }
        // Ngược lại không có tham số ac
        // Trang danh sách singer
        else
        {
            // Dãy nút của danh sách singer
            echo
            '
                <a href="' . $_DOMAIN . 'singer/add" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus"></span> Thêm
                </a> 
                <a href="' . $_DOMAIN . 'singer" class="btn btn-default">
                    <span class="glyphicon glyphicon-repeat"></span> Reload
                </a> 
                <a class="btn btn-danger" id="del_singer_list">
                    <span class="glyphicon glyphicon-trash"></span> Xoá
                </a> 
            ';
    
            // Content danh sách singer
            $sql_get_list_singer = "SELECT * FROM singer ORDER BY id_singer DESC";
                // Nếu có ca sĩ
                if ($db->db_num_rows($sql_get_list_singer))
                {
                    echo 
                    '
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-striped list" id="list_cate">
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><strong>ID</strong></td>
                                    <td><strong>Tên ca sĩ</strong></td>
                                    <td><strong>URL</strong></td>
                                    <td><strong>Url hình ảnh</strong></td>
                                    <td><strong>Tools</strong></td>
                                </tr>
                    ';

                    // In danh sách ca sĩ
                    foreach ($db->db_fetch_assoc($sql_get_list_singer, 0) as $key => $data_list_singer)
                    {
                        
                    
                        echo 
                        '
                            <tr>
                                <td><input type="checkbox" name="id_singer[]" value="' . $data_list_singer['id_singer'] .'"></td>
                                <td>' . $data_list_singer['id_singer'] .'</td>
                                <td><a href="' . $_DOMAIN . 'singer/edit/' . $data_list_singer['id_singer'] .'">' . $data_list_singer['name_singer'] . '</a></td>
                                <td>' . $data_list_singer['slug'] . '</td>
                                <td>
                                    <a href="' . $data_list_singer['url_avatar'] . '">
                                        <img src="' . $data_list_singer['url_avatar'] . '" class="img-fluid img-thumbnail" height="50px" width="50px" alt="ảnh ca sĩ">
                                        ' . $data_list_singer['url_avatar'] . '
                                    </a>
                                </td>
                                <td>
                                    <a href="' . $_DOMAIN . 'singer/edit/' . $data_list_singer['id_singer'] .'" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a class="btn btn-danger btn-sm del-cate-list" data-id="' . $data_list_singer['id_singer'] . '">
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
                // Nếu không có ca sĩ
                else
                {
                    echo '<br><br><div class="alert alert-info">Chưa có ca sĩ nào.</div>';
                }
        }
    }
    // Ngược lại chưa đăng nhập
    else
    {
        new redirect($_DOMAIN); // Trở về trang index
    }
  
?>