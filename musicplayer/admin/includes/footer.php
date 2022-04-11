
    <!-- liên kết thư viện jQuery Form -->
    <script src="<?php echo $_DOMAIN; ?>js/jquery.form.min.js"></script>

    <!-- liên kết thư viện hàm xử lý form - admin/js/form.js  -->
    <script src="<?php echo $_DOMAIN; ?>js/form.js"></script>

    <!-- Liên kết thư viện CKEditor -->
    <script src="<?php echo $_DOMAIN; ?>ckeditor/ckeditor.js"></script>
    <script>
        config = {};
        config.entities_latin = false;
        config.language = "vi";
        CKEDITOR.replace("desc_add_singer", config);
    </script>

    <!-- thêm hiệu ứng active cho sidebar -->
    <?php
        //  active slidebar
        //  lấy tham số tab
        if(isset($_GET['tab'])){
            $tab = trim(addslashes(htmlspecialchars($_GET['tab'])));
        } else{
            $tab = '';
        }

        //  kiểm tra tham số tab
        //  nếu có tham số tab
        if($tab != ''){
            //  xóa .active mặc định của bảng điều khiển
            echo '<script>$(".slidebar ul a:eq(1)").removeClass("active");</script>';

            //  thêm .active theo giá trị tham số rab
            if($tab == 'profile'){
                echo '<script>$(".slidebar ul a:eq(2)").addClass("active");</script>';
            } 
            elseif($tab == 'songs'){
                echo '<script>$(".slidebar ul a:eq(3)").addClass("active");</script>';
            }
            elseif($tab == 'singer'){
                echo '<script>$(".slidebar ul a:eq(4)").addClass("active");</script>';
            }
            elseif($tab == 'photos'){
                echo '<script>$(".slidebar ul a:eq(5)").addClass("active");</script>';
            }
            elseif($tab == 'audio'){
                echo '<script>$(".slidebar ul a:eq(6)").addClass("active");</script>';
            }
            elseif ($tab == 'categories') {
                echo '<script>$(".slidebar ul a:eq(7)").addClass("active");</script>';
            }
            elseif ($tab == 'accounts') {
                echo '<script>$(".slidebar ul a:eq(8)").addClass("active");</script>';
            }
            elseif ($tab == 'setting') {
                echo '<script>$(".slidebar ul a:eq(9)").addClass("active");</script>';
            }
        } else{

        }
    ?>
</body>
</html>