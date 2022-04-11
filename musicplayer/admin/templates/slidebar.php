<div class="col-md-3 slidebar">
    <ul class="list-group">
        <li class="list-group-item">
            <div class="media">
                <a href="" class="pull-left">
                    <img src="<? 
                        // URL ảnh đại diện tài khoản
                        if ($data_user['url_avatar'] == '') 
                        {
                            echo 'http://localhost/musicplayer/upload/2022/04/10/account_user_default.jpg';
                        }
                        else
                        {
                            echo str_replace('admin/', '', $_DOMAIN).$data_user['url_avatar'];
                        }
                    ?>" alt="Ảnh đại diện của <?php echo $data_user['display_name']; ?>" class="img-fluid img-thumbnail" height="64px" width="64px">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $data_user['display_name']; ?></h4>
                    <?php
                    //  hiển thị cấp bạc tài khoản
                    //  nếu là admin
                    if($data_user['position'] == '0'){
                        echo '<span class="label label-success">Thành viên</span>';
                    } else{
                        echo '<span class="label label-success">Quản trị viên</span>';
                    }
                    ?>
                </div>
            </div>
        </li>
        <a class="list-group-item active" href="<?php echo $_DOMAIN; ?>">
            <span class="glyphicon glyphicon-dashboard"></span> Bảng điều khiển
        </a>
        <a class="list-group-item" href="<?php echo $_DOMAIN; ?>profile">
            <span class="glyphicon glyphicon-user"></span> Hồ sơ cá nhân
        </a>
        <a class="list-group-item" href="<?php echo $_DOMAIN; ?>songs">
            <span class="glyphicon glyphicon-music"></span> Bài hát
        </a>
        <a class="list-group-item" href="<?php echo $_DOMAIN; ?>singer">
            <span class="glyphicon glyphicon-star"></span> Ca sĩ
        </a>
        <a class="list-group-item" href="<?php echo $_DOMAIN; ?>photos">
            <span class="glyphicon glyphicon-picture"></span> Hình ảnh
        </a>
        <a class="list-group-item" href="<?php echo $_DOMAIN; ?>audio">
            <span class="glyphicon glyphicon-headphones"></span> Audio
        </a>
        <?php
 
        // Phân quyền sidebar
        // Nếu tài khoản là admin
        if ($data_user['position'] == '1')
        {
            echo
            '
                <a class="list-group-item" href="' . $_DOMAIN . 'categories">
                    <span class="glyphicon glyphicon-tags"></span> Thể loại
                </a>
                <a class="list-group-item" href="' . $_DOMAIN . 'accounts">
                    <span class="glyphicon glyphicon-lock"></span> Tài khoản
                </a>
                <a class="list-group-item" href="' . $_DOMAIN . 'setting">
                    <span class="glyphicon glyphicon-cog"></span> Cài đặt chung
                </a>  
            ';
        }
 
        ?>
        <a class="list-group-item" href="<?php echo $_DOMAIN; ?>signout.php">
            <span class="glyphicon glyphicon-off"></span> Thoát
        </a>
    </ul>   <!-- ul.list-group -->
</div>  <!-- div.sidebar -->
