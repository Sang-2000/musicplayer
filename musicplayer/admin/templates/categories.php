<?php
    //  nếu đã đăng nhập
    if($user){
        //  nếu tài khoản là admin
        if($data_user['position'] == 1) {
            echo '<h3>Thể loại nhạc</h3>';

            //  lấy tham số ac
            if(isset($_GET['ac'])) {
                $ac = trim(addslashes(htmlspecialchars($_GET['ac'])));
            } else {
                $ac = '';
            }

            //  lấy tham số id
            if(isset($_GET['id'])) {
                $id = trim(addslashes(htmlspecialchars($_GET['id'])));
            } else {
                $id = '';
            }

            //  kiểm tra dữ liệu của tham số ac
            //  nếu giá trị khác rỗng
            if($ac != '') {
                //  trang thêm thể loại
                if($ac == 'add') {
                    //  dãy nút thêm thể loại
                    //  nút trở về trang hiển thị
                    echo '
                        <div class="row">
                            <a href="'. $_DOMAIN .'categories" class="btn btn-default">
                                <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                            </a>
                        </div>
                        
                    ';

                    //  content thêm thể loại
                    echo
                    '   <div class="row">
                            <div class="col-md-9">
                                <p class="form-add-cate">
                                    <form method="POST" id="formAddCate" onsubmit="return false;">
                                        <div class="form-group">
                                            <label>Tên thể loại</label>
                                            <input type="text" class="form-control title" id="label_add_cate">
                                        </div>
                                        <div class="form-group">
                                            <label>URL thể loại</label>
                                            <input type="text" class="form-control slug" placeholder="Nhấp vào để tự tạo" id="url_add_cate">
                                        </div>
                                        <div class="form-group url_img_add_cate">
                                            <label>Ảnh thể loại</label>
                                            <select class="form-control" id="url_img_add_cate">
                                                <option value="" label="Thả xuống để chọn hình ảnh" disabled="disabled" selected></option>
                    ';

                    $sql_url_img_cate = "SELECT * FROM images";
                    if($db->db_num_rows($sql_url_img_cate)) {
                        foreach($db->db_fetch_assoc($sql_url_img_cate, 0) as $key => $data_url_img) {
                            echo '<option value="'. $data_url_img['url_img'] .'" id="option_url_img_cate">'. str_replace('admin/', '', $_DOMAIN) . $data_url_img['url'] .'
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
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                        </div>
                                        <div class="alert alert-danger hidden"></div>
                                    </form>
                                </p>
                            </div> <!-- div.col-md-9 -->
                            <div class="col-md-3">
                                <img src="#" class="img-fluid img-thumbnail" height="auto" max-width="100%" alt="ảnh chuyên mục">
                            </div>
                        </div>  <!-- div.row -->
                    ';
                }
                //  trang sửa thể loại
                else if($ac == 'edit') {
                    //  kiểm tra id trong csdl
                    $sql_check_id_cate = "SELECT id_cate FROM categories WHERE id_cate = '$id'";

                    //  nếu id có tồn tại trong csdl
                    if($db->db_num_rows($sql_check_id_cate)) {
                        //  dãy nút sửa thể loại
                        echo '
                            <a href="'. $_DOMAIN .'categories" class="btn btn-default">
                                <span class="glyphicon glyphicon-arrow-left"></span> Trờ về
                            </a>
                            <a class="btn btn-danger" id="del_cate" data-id="'. $id .'">
                                <span class="glyphicon glyphicon-trash"></span> Xóa
                            </a>
                        ';

                        //  content sửa thể loại
                        $sql_get_data_cate = "SELECT * FROM categories WHERE id_cate = '$id'";
                        if ($db->db_num_rows($sql_get_data_cate))
                        {
                            $data_cate = $db->db_fetch_assoc($sql_get_data_cate, 1);
                        
                            echo
                            '   <p class="form-edit-cate">
                                    <form method="POST" id="formEditCate" data-id="' . $data_cate['id_cate'] . '" onsubmit="return false;" class="form-cate">
                                        <div class="form-group">
                                            <label>Tên chuyên mục</label>
                                            <input type="text" class="form-control title" value="' . $data_cate['label'] . '" id="label_edit_cate">
                                        </div>

                                        <div class="form-group">
                                            <label>URL chuyên mục</label>
                                            <input type="text" class="form-control slug" value="' . $data_cate['url'] . '" id="url_edit_cate">
                                        </div>

                                        <div class="form-group url_img_edit_cate">
                                            <label>Ảnh thể loại</label>
                                            <select class="form-control" id="url_img_edit_cate">
                                                <option value="" label="Thả xuống để chọn hình ảnh" disabled="disabled" selected></option>
                    ';

                    $sql_url_img_cate = "SELECT * FROM images";
                    if($db->db_num_rows($sql_url_img_cate)) {
                        foreach($db->db_fetch_assoc($sql_url_img_cate, 0) as $key => $data_url_img) {
                            echo '<option value="'. $data_url_img['url_img'] .'" id="option_url_img_cate">'. str_replace('admin/', '', $_DOMAIN) . $data_url_img['url'] .'
                                <img src="'. str_replace('admin/', '', $_DOMAIN) . $data_url_img['url'] .'" />
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
                                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                        </div>
                                        <div class="alert alert-danger hidden"></div>
                                    </form>
                                </p>
                            ';
                        }
                    }
                }
            } 
            //  ngược lại, giá trị là rỗng
            else {
                //  dãy nút của categories
                echo '
                    <a href="'. $_DOMAIN .'categories/add" class="btn btn-default">
                        <span class="glyphicon glyphicon-plus"></span> Thêm
                    </a>
                    <a href="'. $_DOMAIN .'categoties/relaod" class="btn btn-default">
                        <span class="glyphicon glyphicon-repeat"></span> Tải lại
                    </a>
                    <a href="" class="btn btn-danger" id="del_cate_list">
                        <sapn class="glyphicon glyphicon-trash"></sapn> Xóa 
                    </a>
                ';

                //  content danh sách categories
                $sql_get_list_cate = "SELECT * FROM categories ORDER BY id_cate DESC";
                // Nếu có chuyên mục
                if ($db->db_num_rows($sql_get_list_cate))
                {
                    echo 
                    '
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-striped list" id="list_cate">
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><strong>ID</strong></td>
                                    <td><strong>Tên chuyên mục</strong></td>
                                    <td><strong>URL</strong></td>
                                    <td><strong>Url hình ảnh</strong></td>
                                    <td><strong>Tools</strong></td>
                                </tr>
                    ';

                    // In danh sách chuyên mục
                    foreach ($db->db_fetch_assoc($sql_get_list_cate, 0) as $key => $data_cate)
                    {
                        
                    
                        echo 
                        '
                            <tr>
                                <td><input type="checkbox" name="id_cate[]" value="' . $data_cate['id_cate'] .'"></td>
                                <td>' . $data_cate['id_cate'] .'</td>
                                <td><a href="' . $_DOMAIN . 'categories/edit/' . $data_cate['id_cate'] .'">' . $data_cate['label'] . '</a></td>
                                <td>' . $data_cate['url'] . '</td>
                                <td>
                                    <a href="' . $data_cate['url_avatar'] . '">
                                        <img src="' . $data_cate['url_avatar'] . '" class="img-fluid img-thumbnail" height="50px" width="50px" alt="ảnh chuyên mục">
                                        ' . $data_cate['url_avatar'] . '
                                    </a>
                                </td>
                                <td>
                                    <a href="' . $_DOMAIN . 'categories/edit/' . $data_cate['id_cate'] .'" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a class="btn btn-danger btn-sm del-cate-list" data-id="' . $data_cate['id_cate'] . '">
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
                // Nếu không có chuyên mục
                else
                {
                    echo '<br><br><div class="alert alert-info">Chưa có chuyên mục nào.</div>';
                }
            }
        }
    } 
    //  ngược lại, chưa đăng nhập
    else {
        //  trở về trang index
        new redirect($_DOMAIN);
    }
?>
