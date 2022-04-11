<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player Administrator</title>

    <!-- liên kết bootdtrap css -->
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>bootstrap-3.1.1-dist/css/bootstrap.min.css">

    <!-- liên kết thư viện jQuery -->
    <script src="<?php echo $_DOMAIN; ?>js/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
        #   nếu chưa đăng nhập
        if ($user){
            echo '
                <div class="container">
                    <div class="page-header">
                        <h1>Music Player <small><br/>Administration</small></h1>
                    </div><!-- div.page-header -->
                </div><!-- div.container -->
            ';
        } else {
            echo '
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="' . $_DOMAIN . '">Music Player Administration</a>
                        </div><!-- div.navbar-header -->
                    </div><!-- div.container-fluid -->
                </nav>
            ';
        }
    ?>
