<div class="col-md-9 content">
    <?php
        //  phân trang content
        //  lấy tham số tab
        if(isset($_GET['tab'])){
            $tab    =   trim(addslashes(htmlspecialchars($_GET['tab'])));
        } else {
            $tab = '';
        }

        //  nếu có tham số tab
        if($tab != ''){
            //  hiển thị chức năng templates theo tham số tab

            if($tab == 'profile'){
                //  hiển thị templates profile
                require_once 'templates/profile.php';
            }
            elseif ($tab == 'songs') {
                //  hiển thị templates songs
                require_once 'templates/songs.php';
            }
            elseif ($tab == 'singer') {
                //  hiển thị templates singer
                require_once 'templates/singer.php';
            }
            elseif ($tab == 'photos') {
                //  hiển thị templates photos
                require_once 'templates/photos.php';
            }
            elseif ($tab == 'audio') {
                //  hiển thị templates photos
                require_once 'templates/audio.php';
            }
            elseif ($tab == 'categories') {
                //  hiển thị templates categories
                require_once 'templates/categories.php';
            }
            elseif ($tab == 'accounts') {
                //  hiển thị templates accounts
                require_once 'templates/accounts.php';
            }
            elseif ($tab == 'setting') {
                //  hiển thị templates setting
                require_once 'templates/setting.php';
            }
        } else{
            //  hiển thị templates dashboard
            require_once 'templates/dashboard.php';
        }

    ?>
</div>  <!-- div.content -->