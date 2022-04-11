<div class="container">
	<div class="row">
		<h3>Tìm kiếm</h3>
		<?php

		// Lấy tham số từ khóa tìm kiếm
		$s = trim(htmlspecialchars(addslashes($_GET['s'])));

		if ($s) {
			// Lấy số hàng trong table
			$sqlGetCountSong = "SELECT id_song FROM songs INNER JOIN singer ON songs.singer_id = singer.id_singer
                 WHERE songs.name_song LIKE '%$s%' OR songs.lyric LIKE '%$s%' OR songs.name_singer LIKE '%$s%'";
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

		    $limit = 9; // Giới hạn số bài hiển thị trong 1 trang
		    $totalPage = ceil($countSong / $limit); // Tổng số trang sau khi tính toán
		        
		    // Validate tham số page    
		    if ($page > $totalPage) {
		      $page = $totalPage;
		    } else if ($page < 1) {
		      $page = 1;
		    }
		      
		    $start = ($page - 1) * $limit;

			$sql_get_search = "SELECT * FROM songs INNER JOIN audio ON songs.audio_id = audio.id_audio 
                INNER JOIN singer ON songs.singer_id = singer.id_singe
                WHERE songs.name_song LIKE '%$s%' OR songs.lyric LIKE '%$s%' OR songs.name_singer LIKE '%$s%'";
			if ($db->db_num_rows($sql_get_search)) {
				foreach ($db->db_fetch_assoc($sql_get_search, 0) as $data_song) {
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
		                    </div>
		                </div>
					';
				}

				echo '</div>';

				echo '
					<div class="btn-toolbar" role="toolbar">
						<div class="btn-group">
				';

				# Pagination button
		      	if ($page > 1 && $totalPage > 1) {
		        	echo '
		          		<a href="' . $_DOMAIN . ($page - 1 ) . '" class="btn btn-default">
		            		<span class="glyphicon glyphicon-chevron-left"></span>
		          		</a>
		        	';
		      	}
		       
		      	for ($i = 1; $i <= $totalPage; $i++) {
		        	if ($i == $page){
		          		echo '<a class="btn btn-primary">' . $i . '</a>';
		        	} else {
		          		echo '
		            		<a href="' . $_DOMAIN . $i . '" class="btn btn-default">
		              			' . $i . '
		            		</a>
		          		';
		        	}
		      	}
		       
		      	if ($page < $totalPage && $totalPage > 1) {
		        	echo '
		          		<a href="' . $_DOMAIN . ($page + 1 ) . '" class="btn btn-default">
		            		<span class="glyphicon glyphicon-chevron-right"></span>
		          		</a>
		        	';
		      	}

		      	echo '
						</div>
					</div>
		      	';
		    } else {
		    	echo '<div class="well well-lg">Không tìm thấy kết quả nào.</div>';
		    }
		} else {
			echo '<div class="alert alert-danger">Vui lòng nhập từ khóa tìm kiếm.</div>';
		}

		?>
	</div>
</div>