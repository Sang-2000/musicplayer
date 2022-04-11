<?php
    // Get tham số post
    $sp = trim(htmlspecialchars(addslashes($_GET['sp'])));
    $id = trim(htmlspecialchars(addslashes($_GET['id'])));

    $sql_data_song = "SELECT * FROM songs WHERE slug_song = '$sp'";
    $sql_data_singer = "SELECT * FROM singer WHERE slug = '$sp'";

    // đếm số dữ liệu cho song và singer
    $count_song = $db->db_num_rows($sql_data_song);
    $count_singer = $db->db_num_rows($sql_data_singer);

    
    //  nếu slug là của bài hát
    if($count_song == 1){
        // Lấy thông tin bài viết
        $sql_get_data_song = "SELECT * FROM songs WHERE id_song = '$id'";
        if ($db->db_num_rows($sql_get_data_song)) {
            $data_song = $db->db_fetch_assoc($sql_get_data_song, 1);
        } else {
            // Nếu không tồn tại 
            require 'templates/404.php';
            exit;
        }

?>
<div class="container">
    <div class="row">
        <h1><?php echo $data_song['name_song']; ?></h1>
        <span class="glyphicon glyphicon-user"></span>
        <?php
            $singer_id = $data_song['singer_id'];
            $sql_get_data_singer = "SELECT * FROM singer WHERE singer.id_singer = $singer_id";
            if ($db->db_num_rows($sql_get_data_singer)) {
                $data_singer = $db->db_fetch_assoc($sql_get_data_singer, 1);
                echo $data_singer['name_singer'];
            }
        ?>
        <br/><br/>

        <div class="col-md-9">
            <div class="body-song">
                <?php
                    $audio_id = $data_song['audio_id'];
                    $sql_get_data_audio = "SELECT * FROM audio WHERE audio.id_audio = $audio_id";
                    if ($db->db_num_rows($sql_get_data_audio)) {
                        $data_audio = $db->db_fetch_assoc($sql_get_data_audio, 1);
                        echo '
                            <div style="text-align: center;">
                                <audio controls style="max-width: 100%;">
                                    <source src="'. str_replace('user/', '', $_DOMAIN) . $data_audio['url'] . '" />
                                </audio>
                            </div>
                        ';
                    }
                ?>
                <h3>Lời: </h3>
                <?php echo htmlspecialchars_decode($data_song['lyric']); ?>

                <div>
                    <h3>Từ khóa</h3>
                    <a href="<?php echo $_DOMAIN; ?>"></a>
                </div>
            </div>  <!-- div.body-song -->
            
        </div>  <!-- div.col-md-9-->

        <div class="col-md-3" style="background-color: silver;">
        <h3>Bài hát cùng ca sĩ</h3>
            <?php
                $singer_id = $data_song['singer_id'];

                // Hiển thị các bài hát của cùng ca sĩ
                $sql_get_invole_songs = "SELECT DISTINCT * FROM songs WHERE songs.singer_id = $singer_id";

                // Nếu tồn tại các bài hát của cùng ca sĩ
                if ($db->db_num_rows($sql_get_invole_songs)) {
                    // In danh sách bài viết liên quan
                    foreach ($db->db_fetch_assoc($sql_get_invole_songs, 0) as $data_song) {
                        $sql_get_data_singer = "SELECT * FROM singer WHERE singer.id_singer = $singer_id";
                        $name_singer = '';
                        if ($db->db_num_rows($sql_get_data_singer)) {
                            $data_singer = $db->db_fetch_assoc($sql_get_data_singer, 1);
                            $name_singer = $data_singer['name_singer'];
                        }
                        echo '
                            <div class="col-md-12-fluid">
                                <ul>
                                    <a href="' . $_DOMAIN . $data_song['slug_song'] . '-' . $data_song['id_song'] . '.html">
                                        <p>'. $data_song['name_song'] .'</p>
                                    </a>
                                    <span class="glyphicon glyphicon-user"></span> '. $name_singer .'
                                </ul>
                            </div>
                            <br/>
                        ';
                    }
                }
            ?>
        </div>
    </div>  <!-- div.row -->    
    <hr>
    <div class="row" style="width: 50px;">
        
    </div>  <!-- div.row -->
</div>  <!-- div.container -->

<?php
    }   //  kết thức if ($sp == $data_song)
    //  ngược lại, nếu slug là của ca sĩ
    else if($count_singer == 1){
        // Lấy thông tin ca sĩ
        $sql_get_data_singer = "SELECT * FROM singer WHERE id_singer = $id";
        if ($db->db_num_rows($sql_get_data_singer)) {
            $data_singer = $db->db_fetch_assoc($sql_get_data_singer, 1);
        } else {
            // Nếu không tồn tại 
            require 'templates/404.php';
            exit;
        }
?>

<div class="container-fluid">
    <div class="row" style="background-color: black; color: red;">
        <?php
            $sql_get_data_singer = "SELECT * FROM singer WHERE id_singer=$id";
            if ($db->db_num_rows($sql_get_data_singer)) {
                $data_singer = $db->db_fetch_assoc($sql_get_data_singer, 1);
                echo '
                    <div class="col-md-8">
                    <h3 style="text-align: center;"><strong>'. $data_singer['name_singer'] .'</strong></h3>
                        <p style="margin: 0 5% 0 5%; word-wrap: break-word; margin-bottom: 50px;">'. $data_singer['description'] .'</p>
                    </div>  <!-- div.col-md-8 -->
                    <div class="col-md-4" style="text-align: center;">
                        <img src="'. $data_singer['url_avatar'] .'" style="max-width: 80%; margin: 50px 0;">
                    </div>  <!-- div.col-md-4 -->
                ';
            }
        ?>
    </div>  <!-- div.row -->
</div>  <!-- div.container -->

<div class="container">
    <div class="row" style="margin: 50px 0;">
        <h3>Bài hát</h3>
        <?php
            // Hiển thị các bài hát của cùng ca sĩ
            $sql_get_invole_songs = "SELECT DISTINCT * FROM songs INNER JOIN singer ON songs.singer_id = singer.id_singer WHERE singer_id = $id";

            // Nếu tồn tại các bài hát của của ca sĩ
            if ($db->db_num_rows($sql_get_invole_songs)) {
                // In danh sách bài hát của ca sĩ
                foreach ($db->db_fetch_assoc($sql_get_invole_songs, 0) as $data_song) {
                    echo '
                            <div class="col-md-12-fluid">
                                <ul>
                                    <a href="'. $_DOMAIN . $data_song['slug_song'] . '-'. $data_song['id_song'] .'.html">
                                        <h4><strong>'. $data_song['name_song'] .'</strong></h4>
                                    </a>
                                    <span class="glyphicon glyphicon-user"></span> '. $data_song['name_singer'] .'
                                </ul>
                            </div>
                            <br/>
                        ';
                    }
                }
            ?>
    </div>  <!-- div.row -->
</div>

<?php
    }   //  kết thúc else if ($sp == $data_singer)
?>