<?php
 

    // Kiểm tra bài hát có tồn tại
    $sql_check_audio = "SELECT id_audio, name FROM audio";
    if ($db->db_num_rows($sql_check_audio)) {
        $data_audio = $db->db_fetch_assoc($sql_check_audio, 1);
 
        $name_audio = $data_audio['name'];
        // ...
    } else {
        $title = 'Chưa có dũ liệu bài hát.';
    }

    // kiểm tra ca sĩ có tồn tại
 
    // Kiểm tra chuyên mục tồn tại
    $sql_check_singer = "SELECT id_singer, name_singer FROM singer";
    if ($db->db_num_rows($sql_check_singer)) {
        $data_singer = $db->db_fetch_assoc($sql_check_singer, 1);
 
        $name_singer = $data_singer['name_singer'];
        // ...
    } else {
        $title = 'Chưa có dữ liệu ca sĩ.';
    }

 
?>

<div class="container">
    <div class="row">

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h2>Gợi ý hôm nay</h2>
            <hr width="70%" align="left" size="3px" color="black" />
            <div class="row list" id="today_songs">
                List 9 bài chọn ngầu nhiên
                <br/>
                <?php 
                    // Lấy danh sách bài hát
                    $sql_get_list_audio = "SELECT * FROM songs INNER JOIN audio ON songs.audio_id = audio.id_audio 
                        INNER JOIN singer ON songs.singer_id = singer.id_singer";
                    if ($db->db_num_rows($sql_get_list_audio)) {
                        // In bài hát
                        foreach ($db->db_fetch_assoc($sql_get_list_audio, 0) as $data_audio) {
                            echo '
                            <div class="col-md-4">
                                <div class="thumbnail" style="background-color: black;">
                                    <img src="'. $data_audio['url_thumb'] .'" />
                                    <div class="caption">
                                        <a href="'. $_DOMAIN . $data_audio['slug_song'] . '-'. $data_audio['id_song'] .'.html">
                                            <h4>'. $data_audio['name_song'] . '</h4>
                                        </a>
                                        <a href="'. $_DOMAIN . $data_audio['slug'] .'-'. $data_audio['singer_id'] .'.html">
                                            <span class="glyphicon glyphicon-user"></span> '. $data_audio['name_singer'] . '
                                        </a>
                                    </div>
                                    <audio controls style="max-width: 100%;" id="view_songs">
                                        <source src="'. str_replace('user/', '', $_DOMAIN) . $data_audio['url'] . '" />
                                    </audio>
                                </div>  <!-- div.thumbnail -->
                            </div>  <!-- div.col-md-4 -->
                            ';
                        }
                    } else {
                        echo 'Lỗi dữ liệu. Chưa đúng id của 2 bảng';
                    }
                ?>
            </div>  <!-- div.row -->

            <div class="row">
                <h2>Top</h2>
                <hr width="70%" align="left" size="3px" color="black" />
                <div class="col-md-12" id="top_songs">
                    List 10 bài đc nghe nhiều nhất
                </div>
            </div>  <!-- div.row -->

            <div class="row">
                <h2>Khu vực</h2>
                <hr width="70%" align="left" size="3px" color="black" />
                <div class="col-md-12" id="area_songs">
                    các khu vực Việt, hàn, trung, US_UK trong singer
                </div>
            </div>  <!-- div.row -->
        </div>  <!-- div.col-md-9 -->

        
        <div class="col-md-3" id="list_singer">
            <h2>Ca sĩ</h2>
            <hr width="70%" align="left" size="3px" color="black" />
            <ul class="nav navbar-nav">
                <?php 
                    // Lấy danh sách ca sĩ
                    $sql_get_list_singer = "SELECT * FROM singer";
                    if ($db->db_num_rows($sql_get_list_singer)) {
                        // In tên ca sĩ
                        foreach ($db->db_fetch_assoc($sql_get_list_singer, 0) as $data_singer) {
                            echo '
                                <li class="nav-item">
                                    <a href="'. $_DOMAIN . $data_singer['slug'] .'-'. $data_singer['id_singer'] .'.html">
                                        '. $data_singer['name_singer'] . '
                                    </a>
                                </li>
                            ';
                        }
                    } else {
                        echo 'Chưa có ca sĩ.';
                    }
                ?>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid hidden">
    <div class="row">
        <div class="col-md-12">
            <audio controls>
                <source src="" />
            </audio>
        </div>
    </div>
</div>

<?php
    /*
        Chưa làm: 
            content home:
                top: chưa đếm lượt nghe, lượt view
                khu vực chưa chia bài hát theo khu vực nhạc
            content bên phải:
                ca sĩ: chưa chia theo khu vực
            singer: chưa có trang ca sĩ
                chưa có thông tin ca sĩ
                chưa có các bài hát của ca sĩ
                chưa có từ khóa tìm kiếm nhanh
            lyric:
                chưa có lời bài hát
                chưa có gợi ý bài hát kế tiếp theo ca sĩ
                chưa có từ khóa tìm kiếm nhanh
            tìm kiếm:
                chưa có tìm kiếm tổng quát
                chưa có gợi ý bài hát kế theo ca sĩ
                chưa có tìm kiếm nhanh theo từ khóa ở từng trang (singer, lyric)
    */
?>