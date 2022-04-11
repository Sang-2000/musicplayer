<?php
    //  nhiệm vụ:   xử lý liên quan đến database

    class database{
            //  khai báo các biến chứa thông tin kết nối
        private $hostname   =   'localhost',
                $username   =   'root',
                $password   =   '',
                $dbname     =   'musicplayer';

        //  biến kết nối
        public  $conn   =   null;        

        //  hàm kết nối
        public function db_connect()
        {
            $this->conn     =   mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
        }

        //  hàm ngắt kết nối
        public function db_close()
        {
            if($this->conn){
                mysqli_close($this->conn);          
            }
        }

        //  hàm truy vấn
        public function db_query($sql = null)
        {
            if($this->conn){
                mysqli_query($this->conn, $sql);
            }
        }

        //  hàm đếm số dòng
        public function db_num_rows($sql = null)
        {
            if($this->conn){
                $query  =   mysqli_query($this->conn, $sql);

                if($query){
                    $rows   =   mysqli_num_rows($query); 
                    return $rows;
                }
            }
        }

        //  hàm lấy dữ liệu
        public function db_fetch_assoc($sql = null, $type)
        {
            if($this->conn){
                $query  =   mysqli_query($this->conn, $sql);
                if($query){
                    if($type == 0){
                        while($rows = mysqli_fetch_assoc($query)){
                            $data[] =   $rows;
                        }
                        return $data;
                    } elseif($type == 1){
                        $row = mysqli_fetch_assoc($query);
                        $data = $row;
                        return $data;
                    }
                }
            }
        }

        //  hàm lấy id cao nhất
        public function db_insert_id()
        {
            if($this->conn){
                $last_id    =   mysqli_insert_id($this->conn);
                if($last_id == '0'){
                    $last_id == 1;
                } else{
                    $last_id = $last_id;
                }

                return $last_id;
            }
        }

        //  hàm thiết lập bộ ký tự cho database
        public function db_set_charset($uni)
        {
            if($this->conn){
                mysqli_set_charset($this->conn, $uni);
            }
        }
    }
?>