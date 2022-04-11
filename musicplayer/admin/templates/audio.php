<?php
    //  nếu đã đăng nhập
    if($user) {
        echo '<h3>Bài hát</h3>';

        //  lấy tham số ac
        //  nếu tồn tại tham số ac
        if(isset($_GET['ac'])) {
            //  lấy giá trị tham số ac
            $ac = trim(addslashes(htmlspecialchars($_GET['ac'])));
        }
        //  ngược lại, khong tồn tại tham só ac
        else {
            $ac = '';
        }

        //  nếu tham số ac khác rỗng
        if($ac != '') {
            //  nếu tham số ac là add
            if($ac == 'add') {
                //  dãy nút của upload audio
                echo '
                    <a href="'. $_DOMAIN .'audio" class="btn btn-default">
                        <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                    </a>
                ';

                //  content của upload audio
                echo '
                    <p class="form-up-audio">
                        <div class="alert alert-info">
                            Mỗi lần upload tối đa 10 file âm thanh. Mỗi file có dung lượng không quá 10MB.
                        </div>
                        <form action="'. $_DOMAIN .'audio.php" method="POST" id="formUpAudio" enctype="multipart/form-data" onsubmit="return false;">
                            <div class="form-group">
                                <label>Chọn file nhạc</label>
                                <input type="file" class="form-control" accept="audio/*" name="audio_up[]" multiple="true" id="audio_up" onchange="preUpAudio();" />
                            </div> <!-- div.form-group -->
                            <div class="form-group box-pre-audio hidden">
                                <!-- nơi xem trước tệp audio trước khi upload -->
                                <p>
                                    <strong>File âm thanh xem trước</strong>
                                </p>
                            </div> <!-- div.form-group -->
                            <div class="form-group box-progress-bar hidden">
                                <!-- thanh chạy 0% đén 100% -->
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar"></div>
                                </div>  <!-- div.progress-->
                            </div>  <!-- div.form-group -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Upload</button>
                                <button type="reset" class="btn btn-default">Chọn lại</button>
                            </div>  <!-- div.form-group -->
                            <div class="alert alert-danger hidden"></div>
                        </form>
                    </p>
                ';
            }
        }
        //  ngược lại, nếu tham số ac là rỗng
        else {
            //  dãy nút của trang danh sách hình ảnh
            echo '
                <a href="'. $_DOMAIN .'audio/add" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus"></span> Thêm
                </a>
                <a href="'. $_DOMAIN .'audio" class="btn btn-default">
                    <span class="glyphicon glyphicon-repeat"></span> Tải lại
                </a>
                <a class="btn btn-danger" id="del_audio_list">
                    <span class="glyphicon glyphicon-trash"></span> Xóa nhiều
                </a>
            ';

            //  content hiển thị danh sách bài hát
            $sql_get_audio = "SELECT * FROM audio ORDER BY id_audio DESC";

            //  nếu có dữ liệu
            if($db->db_num_rows($sql_get_audio)) {
                echo '
                    <div class="row list" id="list_audio">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" /> Chọn/Bỏ chọn tất cả
                                </label>
                            </div>    <!-- div.checkbox -->
                        </div>    <!-- div.col-md-12 -->
                ';

                //  lặp tất cả dữ liệu
                foreach($db->db_fetch_assoc($sql_get_audio, 0) as $key => $data_audio) {
                    //  trạng thái file audio
                    if(file_exists('../' . $data_audio['url'])) {
                        $status_audio = '<label class="label label-success">Tồn tại</label>';
                    }
                    //  ngược lại
                    else {
                        $status_audio = '<label class="label label-danger">Hỏng</label>';
                    }

                    //  dung lượng file âm thanh
                    if($data_audio['size'] < 1024) {
                        $size_audio = $data_audio['size'] . 'B';
                    } elseif($data_audio['size'] < 1048576) {
                        $size_audio = round($data_audio['size'] / 1024) . 'KB';
                    } elseif($data_audio['size'] < 1073741824) {
                        $size_audio = round($data_audio['size'] / 1024 / 1024) . 'MB';
                    }

                    //  hiển thị danh sách file âm thanh
                    echo '
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <audio controls>
                                    <source src="'. str_replace('admin/', '', $_DOMAIN) . $data_audio['url'] . '" />
                                </audio>
                                <p>'. $data_audio['name'] .'</p>
                                <div class="caption">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="id_audio[]" value="'. $data_audio['id_audio'] .'" />
                                        </span>
                                        <input type="text" class="form-control" value="' . str_replace('admin/', '', $_DOMAIN)  . $data_audio['url'] . '" disabled>
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger del-audio" data-id="' . $data_audio['id_audio'] . '">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </span>
                                    </div>  <!-- div.input-group -->
                                    <p>Trạng thái: '. $status_audio .'</p>
                                    <p>Dung lượng: '. $size_audio .'</p>
                                    <p>Định dạng: '. strtoupper($data_audio['type']) .'</p>
                                </div>  <!-- div.caption -->
                            </div>  <!-- div.thumbnail -->
                        </div>  <!-- div.col-md-3 -->
                    ';
                }
                echo '</div>  <!-- div.row -->';
            } else {
                echo '
                    <br/><br/>
                    <div class="alert alert-info">Chưa có tệp âm thanh nào.</div>
                ';
            }
        }
    } 
    //   ngược lại, nếu chưa đăng nhập
    else {
        new redirect($_DOMAIN);
    }
?>
