<h3>Chú ý</h3>
<div class="row">
    <div class="col-md-12">
      <div class="alert alert-info">
        <p>Cần phải thêm ảnh phù hợp trước khi thêm/ sửa ca sĩ, bài hát, danh mục.</p>
      </div>
    </div>
</div>

<!-- Dashboard ca sĩ -->
<h3>Ca sĩ</h3>
<div class="row">
  <?php
 
  // Lấy tổng chuyên mục
  $sql_get_count_singer = "SELECT id_singer FROM singer";   
  $count_singer = $db->db_num_rows($sql_get_count_singer);
 
  echo
  '
    <div class="col-md-12">
      <div class="alert alert-info">
        <h1>' . $count_singer . '</h1>
        <p>Tổng ca sĩ</p>
      </div>
    </div>
  ';
 
  ?>
 
<?php
 


?>
</div>

<!-- Dashboard bài hát -->
<h3>Bài hát</h3>
<div class="row">
  <?php
 
  if ($data_user['position'] == '1') {
    // Lấy tổng số hình ảnh
    $sql_get_count_audio = "SELECT id_audio FROM audio";
    $label = 'tổng bài hát';
  } else {
    // Lấy số hình ảnh của tác giả
    $sql_get_count_audio = "SELECT id_audio FROM audio WHERE uploader_id = '$data_user[id_acc]'";
    $label = 'bài hát';
  }
 
  $count_audio = $db->db_num_rows($sql_get_count_audio);
 
  echo
  '
    <div class="col-md-4">
      <div class="alert alert-info">
        <h1>' . $count_audio . '</h1>
        <p>' . $label . '</p>
      </div>
    </div>
  ';
 
  ?>
   
  <?php
 
  if ($data_user['position'] == '1') {
    // Lấy tổng dung lượng ảnh
    $sql_get_size_audio = "SELECT size FROM audio";
    $label = 'tổng dung lượng audio';
  } else {
    // Lấy số dung lượng ảnh của tác giả
    $sql_get_size_audio = "SELECT size FROM audio WHERE uploader_id = '$data_user[id_acc]'";
    $label = 'dung lượng audio';
  }
 
  // Tính dung lượng hình ảnh
  if ($db->db_num_rows($sql_get_size_audio)) {
    $count_size_audio = 0;
    foreach ($db->db_fetch_assoc($sql_get_size_audio, 0) as $data_audio) {
      $count_size_audio = $count_size_audio + $data_audio['size'];
    }
  } else {
    $count_size_audio = 0 . ' B';
  }
 
  // Gán đơn vị cho dung lượng
  if ($count_size_audio < 1024) {
    $count_size_audio = $count_size_audio . ' B';
  } else if ($count_size_audio < 1048576) {
    $count_size_audio = round($count_size_audio / 1024) . ' KB';
  } else if ($count_size_audio < 1073741824) {
    $count_size_audio = round($count_size_audio / 1024 / 1024) . ' MB';
  } else if ($count_size_audio < 1099511627776) {
    $count_size_audio = round($count_size_audio / 1024 / 1024 / 1024) . ' GB';
  }
 
  echo
  '
    <div class="col-md-4">
      <div class="alert alert-success">
        <h1>' . $count_size_audio . '</h1>
        <p>' . $label . '</p>
      </div>
    </div>
  ';
 
  ?>
 
  <?php
 
  if ($data_user['position'] == '1') {
    // Lấy tổng số hình ảnh
    $sql_get_count_audio = "SELECT url FROM images";
    $label = 'tổng audio lỗi';
  } else {
    // Lấy số bài viết của tác giả
    $sql_get_count_audio = "SELECT url FROM audio WHERE uploader_id = '$data_user[id_acc]'";
    $label = 'audio lỗi';
  }
 
  // Kiểm tra danh sách hình ảnh
  if ($db->db_num_rows($sql_get_count_audio)) {
    $count_audio_error = 0;
    foreach ($db->db_fetch_assoc($sql_get_count_audio, 0) as $data_audio) {
      if (!file_exists('../' . $data_audio['url'])) {
        $count_audio_error++;
      }
    }
  }
 
  echo
  '
    <div class="col-md-4">
      <div class="alert alert-danger">
        <h1>' . $count_audio_error . '</h1>
        <p>' . $label . '</p>
      </div>
    </div>
  ';
 
  ?>
</div>


<!-- Dashboard hình ảnh -->
<h3>Hình ảnh</h3>
<div class="row">
  <?php
 
  if ($data_user['position'] == '1') {
    // Lấy tổng số hình ảnh
    $sql_get_count_img = "SELECT id_img FROM images";
    $label = 'Tổng hình ảnh';
  } else {
    // Lấy số hình ảnh của tác giả
    $sql_get_count_img = "SELECT id_img FROM images WHERE uploader_id = '$data_user[id_acc]'";
    $label = 'Hình ảnh';
  }
 
  $count_img = $db->db_num_rows($sql_get_count_img);
 
  echo
  '
    <div class="col-md-4">
      <div class="alert alert-info">
        <h1>' . $count_img . '</h1>
        <p>' . $label . '</p>
      </div>
    </div>
  ';
 
  ?>
   
  <?php
 
  if ($data_user['position'] == '1') {
    // Lấy tổng dung lượng ảnh
    $sql_get_size_img = "SELECT size FROM images";
    $label = 'Tổng dung lượng ảnh';
  } else {
    // Lấy số dung lượng ảnh của tác giả
    $sql_get_size_img = "SELECT size FROM images WHERE uploader_id = '$data_user[id_acc]'";
    $label = 'Dung lượng ảnh';
  }
 
  // Tính dung lượng hình ảnh
  if ($db->db_num_rows($sql_get_size_img)) {
    $count_size_img = 0;
    foreach ($db->db_fetch_assoc($sql_get_size_img, 0) as $data_img) {
      $count_size_img = $count_size_img + $data_img['size'];
    }
  } else {
    $count_size_img = 0 . ' B';
  }
 
  // Gán đơn vị cho dung lượng
  if ($count_size_img < 1024) {
    $count_size_img = $count_size_img . ' B';
  } else if ($count_size_img < 1048576) {
    $count_size_img = round($count_size_img / 1024) . ' KB';
  } else if ($count_size_img < 1073741824) {
    $count_size_img = round($count_size_img / 1024 / 1024) . ' MB';
  } else if ($count_size_img < 1099511627776) {
    $count_size_img = round($count_size_img / 1024 / 1024 / 1024) . ' GB';
  }
 
  echo
  '
    <div class="col-md-4">
      <div class="alert alert-success">
        <h1>' . $count_size_img . '</h1>
        <p>' . $label . '</p>
      </div>
    </div>
  ';
 
  ?>
 
  <?php
 
  if ($data_user['position'] == '1') {
    // Lấy tổng số hình ảnh
    $sql_get_count_img = "SELECT url FROM images";
    $label = 'Tổng hình ảnh lỗi';
  } else {
    // Lấy số bài viết của tác giả
    $sql_get_count_img = "SELECT url FROM images WHERE uploader_id = '$data_user[id_acc]'";
    $label = 'hình ảnh lỗi';
  }
 
  // Kiểm tra danh sách hình ảnh
  if ($db->db_num_rows($sql_get_count_img)) {
    $count_img_error = 0;
    foreach ($db->db_fetch_assoc($sql_get_count_img, 0) as $data_img) {
      if (!file_exists('../' . $data_img['url'])) {
        $count_img_error++;
      }
    }
  }
 
  echo
  '
    <div class="col-md-4">
      <div class="alert alert-danger">
        <h1>' . $count_img_error . '</h1>
        <p>' . $label . '</p>
      </div>
    </div>
  ';
 
  ?>
</div>



<?php
 
if ($data_user['position'] == '1') {
 
?>
 
<!-- Dashboard chuyên mục -->
<h3>Chuyên mục</h3>
<div class="row">
  <?php
 
  // Lấy tổng chuyên mục
  $sql_get_count_cate = "SELECT id_cate FROM categories";   
  $count_cate = $db->db_num_rows($sql_get_count_cate);
 
  echo
  '
    <div class="col-md-12">
      <div class="alert alert-info">
        <h1>' . $count_cate . '</h1>
        <p>Tổng chuyên mục</p>
      </div>
    </div>
  ';
 
  ?>
 
<?php
 
}

?>
</div>



<h3>Tài khoản</h3>
<div class="row">
  <?php
 
  // Lấy tổng tài khoản
  $sql_get_count_acc = "SELECT id_acc FROM accounts";   
  $count_acc = $db->db_num_rows($sql_get_count_acc);
 
  echo
  '
    <div class="col-md-4">
      <div class="alert alert-info">
        <h1>' . $count_acc . '</h1>
        <p>tổng tài khoản</p>
      </div>
    </div>
  ';
 
  ?>
 
  <?php
 
  // Lấy số tài khoản hoạt động
  $sql_get_count_acc_active = "SELECT id_acc FROM accounts WHERE status = '0'";   
  $count_acc_active = $db->db_num_rows($sql_get_count_acc_active);
 
  echo
  '
    <div class="col-md-4">
      <div class="alert alert-success">
        <h1>' . $count_acc_active . '</h1>
        <p>tài khoản hoạt động</p>
      </div>
    </div>
  ';
 
  ?>
 
  <?php
 
  // Lấy số tài khoản bị khoá
  $sql_get_count_acc_locked = "SELECT id_acc FROM accounts WHERE status = '1'";   
  $count_acc_locked = $db->db_num_rows($sql_get_count_acc_locked);
 
  echo
  '
    <div class="col-md-4">
      <div class="alert alert-warning">
        <h1>' . $count_acc_locked . '</h1>
        <p>tài khoản bị khoá</p>
      </div>
    </div>
  ';
 
  ?>
</div>