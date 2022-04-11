<!-- trang sẽ show các bài viết theo chuyên mục chỉ định trên url -->

<?php
 
    // Nhận giá trị slug của chuyên mục
    $sc = trim(htmlspecialchars(addslashes($_GET['sc'])));
    
    // Lấy id của thể loại
    $sql_get_id_cate = "SELECT id_cate, url FROM categories WHERE url = '$sc'";
    
    // Chuyên mục tồnta5i
    if ($db->db_num_rows($sql_get_id_cate)) {
        $data_cate = $db->db_fetch_assoc($sql_get_id_cate, 1);
        $id_cate = $data_cate['id_cate'];

 
?>
    <div class="container">
        <div class="row">
        <?php
            // Lấy số hàng trong table
            $sqlGetCountSong = "SELECT id_song FROM songs WHERE songs.cate_id = $id_cate";
            $countSong = $db->db_num_rows($sqlGetCountSong);
        
            // Lấy tham số trang
            if (isset($_GET['p'])) {
                $page = trim(htmlspecialchars(addslashes($_GET['p'])));
            
                if (preg_match('/\d/', $page)) {
                    $page = $page;
                } else {
                    $page = 1;
                }
            } else {
                $page = 1;
            }
        
            $limit = 2; // Giới hạn số bài viết hiển thị trong 1 trang
            $totalPage = ceil($countSong / $limit); // Tổng số trang sau khi tính toán
                
            // Validate tham số page    
            if ($page > $totalPage) {
                $page = $totalPage;
            } else if ($page < 1) {
                $page = 1;
            }
            
            $start = ($page - 1) * $limit;
        
            // Lấy danh sách bài hát
            $sql_get_list_audio = "SELECT * FROM songs INNER JOIN audio ON songs.audio_id = audio.id_audio 
                INNER JOIN singer ON songs.singer_id = singer.id_singer WHERE songs.cate_id = '$id_cate' ORDER BY id_song DESC LIMIT $start, $limit";
            if ($db->db_num_rows($sql_get_list_audio)) {
                // In bài hát
                foreach ($db->db_fetch_assoc($sql_get_list_audio, 0) as $data_audio) {
                    echo '
                    <div class="col-md-3">
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
                    </div>  <!-- div.col-md-3 -->
                    ';
                }
            }
        
            echo '</div>';
    
            echo '
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group">
            ';
    
            # Pagination button
            if ($page > 1 && $totalPage > 1) {
                echo '
                    <a href="' . $_DOMAIN .'categories/' . $data_cate['url'] . ($page - 1 ) . '" class="btn btn-default">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                ';
            }
                
            for ($i = 1; $i <= $totalPage; $i++) {
                if ($i == $page){
                    echo '<a class="btn btn-primary">' . $i . '</a>';
                } else {
                    echo '
                        <a href="' . $_DOMAIN . $data_cate['url'] . $i . '" class="btn btn-default">
                            ' . $i . '
                        </a>
                    ';
                }
            }
                
            if ($page < $totalPage && $totalPage > 1) {
                echo '
                    <a href="' . $_DOMAIN .'categories/'. $data_cate['url'] . ($page + 1 ) . '" class="btn btn-default">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                    </div>
                </div>
                ';
            }

            if ($countSong < 1){
                echo '<div class="well well-lg">Chưa có bài hát nào thuộc chuyên mục này.</div>';
            }
        ?>
</div>

<?php
    // Chuyên mục không tồn tại
    } else {
        require 'templates/404.php';
    }
?>