<?php
    //  nhiệm vụ: điều hướng trang web

    class redirect{
        public function __construct($url = null)
        {
            echo '<script>location.href = "'. $url .'";</script>';
        }
    }
?>