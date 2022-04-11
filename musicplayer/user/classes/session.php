<?php
    //  nhiệm vụ:   xử lý session

    class session{
        //  hàm bắt đầu session
        public function ss_start()
        {
            session_start();
        }

        //  hàm xóa session
        public function ss_destroy()
        {
            session_destroy();
        }

        //  hàm lưu session
        public function ss_send($user)
        {
            $_SESSION['user'] = $user;
        }

        //  hàm lấy dữ liệu session
        public function ss_get_data()
        {
            if(isset($_SESSION['user'])){
                $user = $_SESSION['user'];
            } else{
                $user = '';
            }

            return $user;
        }
    }
?>