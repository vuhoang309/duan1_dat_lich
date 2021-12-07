<?php 

        class database{

            public $host = "localhost";
            public $name = "root";
            public $pass = "";
            public $db = "du_an_1";

            public $link;

            public function __construct()
            {
                $this->connect();
            }

            // Kết nối cơ sở dữ liệu
            public function connect(){
                $this->link = new mysqli($this->host, $this->name, $this->pass, $this->db);
                mysqli_set_charset($this->link, "UTF8");

                if(!$this->link){
                    echo "Không kết nối được !";
                }
            }

            // Lấy dữ liệu
            public function select($query){
                $result = $this->link->query($query);
                if($result->num_rows > 0){
                    return $result;
                }else{
                    return false;
                }
            }
            
            // Thêm, sửa, xóa dữ liệu
            public function exec($query){
                $result = $this->link->query($query);
                if($result){
                    return $result;
                }else{
                    return false;
                }
            }
        }

    ?>