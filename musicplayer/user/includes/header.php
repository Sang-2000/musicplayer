<?php
 
$title_error_404 = 'Không tìm thấy trang';
 
// Url bài viết
if (isset($_GET['sp']) && isset($_GET['id'])) {
    $slug_post = trim(htmlspecialchars($_GET['sp']));
    $id_post = trim(htmlspecialchars($_GET['id']));
 
    // Kiểm tra bài viết tồn tại
    $sql_check_post = "SELECT id_post, slug, title FROM posts WHERE slug = '$slug_post' AND id_post = '$id_post'";
    if ($db->db_num_rows($sql_check_post)) {
        $data_post = $db->db_fetch_assoc($sql_check_post, 1);
 
        $title = $data_post['title'];
        // ...
    } else {
        $title = $title_error_404;
    }
// Url chuyên mục
} else if (isset($_GET['sc'])) {
    $slug_cate = trim(htmlspecialchars($_GET['sc']));
 
    // Kiểm tra chuyên mục tồn tại
    $sql_check_cate = "SELECT url, label FROM categories WHERE url = '$slug_cate'";
    if ($db->db_num_rows($sql_check_cate)) {
        $data_cate = $db->db_fetch_assoc($sql_check_cate, 1);
 
        $title = $data_cate['label'];
        // ...
    } else {
        $title = $title_error_404;
    }
} else {
    $title = $data_web['title'];
    // ...
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    
    <!-- liên kết bootdtrap css -->
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>bootstrap-3.1.1-dist/css/bootstrap.min.css">

    <!-- liên kết thư viện jQuery -->
    <script src="<?php echo $_DOMAIN; ?>js/jquery-3.6.0.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $_DOMAIN; ?>">MusicPlayer</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                            
                            // Lấy danh sách chuyên mục (cấp 1)
                    $sql_get_list_menu = "SELECT * FROM categories";
                    if ($db->db_num_rows($sql_get_list_menu)) {
                        // In chuyên mục (cấp 1)
                        foreach ($db->db_fetch_assoc($sql_get_list_menu, 0) as $data_menu) {
                            $sub_menu = '';
                            echo '<li><a href="' . $_DOMAIN . 'category/' . $data_menu['url'] . '">' . $data_menu['label'] . '</a>' . $sub_menu . '</li>';
                        }
                    }

                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li data-toggle="modal" data-target="#boxSearch">
                        <a href="#">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    
