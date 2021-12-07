<?php require_once __DIR__."/../lib/databes.php" ?>

<?php 
    class cls_kieu_toc{
        public $db;

        public function __construct()
        {
            $this->db = new database();
        }

        public function show_kt(){
            $sql = "SELECT * FROM `kieu_toc`";
            $kq = $this->db->select($sql);
            if($kq){
                return $kq;
            }else return false;

        }

        public function show_kt_id($id){
            $sql = "SELECT * FROM `kieu_toc` WHERE kieu_toc.id_kt = '$id' ";
            $kq = $this->db->select($sql);
            if($kq){
                return $kq;
            }else return false;

        }

        public function them_kt($ten,$phan_loai,$anh,$mota){
            $sql = " INSERT INTO `kieu_toc` (`ten_kt`, `phan_loai`, `anh_kt`, `mo_ta_kt`) VALUES ( '$ten', '$phan_loai', '$anh', '$mota');";
            $kq = $this->db->exec($sql);
            if($kq){
                return "thêm kiểu tóc thành công";
            }else {
                return "thêm kiểu tóc Không thành công";
            }
        }

        public function xoa_kt($id){
            $sql = "DELETE FROM `kieu_toc` WHERE `kieu_toc`.`id_kt` = '$id' ";

            $kq = $this->db->exec($sql);
            if($kq){
                return "xóa kiểu tóc thành công";
            }else {
                return "xóa kiểu tóc Không thành công";
            }
        }

        public function sua_kt($ten,$phan_loai,$anh,$mota,$id){

            $sql = "UPDATE `kieu_toc` SET `ten_kt` = '$ten', `phan_loai` = '$phan_loai',`anh_kt` = '$anh' , `mo_ta_kt` = '$mota' WHERE `kieu_toc`.`id_kt` = '$id' ";

            $kq = $this->db->exec($sql);
            if($kq){
                return "sữa  kiểu tóc thành công";
            }else {
                return " thêm kiểu tóc Không thành công";
            }
        }


        // them sưa xóa bài viết 

        public function hien_bv(){
            $sql = " SELECT * FROM `bai_viet` ";
            $kq = $this->db->select($sql);
            if($kq){
                return $kq;
            }else return false;
        } 

        public function hien_bv_id($id){
            $sql = " SELECT * FROM `bai_viet` WHERE bai_viet.id = '$id'";
            $kq = $this->db->select($sql);
            if($kq){
                return $kq;
            }else return false;
        } 

        public function them_bv($ten,$anh,$mota){
            $sql = "INSERT INTO `bai_viet` ( `ten_bv`, `anh_bv`, `mo_ta_bv`) VALUES ('$ten', '$anh', '$mota')";
            $kq = $this->db->exec($sql);
            if($kq){
                return "thêm bài viết thành công" ;
            }else{
                return "thêm bài viết ko thành công" ;
            }
        }

        public function xoa_bv($id){
            $sql = "DELETE FROM `bai_viet` WHERE `bai_viet`.`id` = '$id' ";
            $kq = $this->db->exec($sql);
            if($kq){
                return "thêm bài viết thành công" ;
            }else{
                return "thêm bài viết ko thành công" ;
            }
        } 

        public function sua_bv($ten,$anh,$mota,$id){
            $sql = "UPDATE `bai_viet` SET `ten_bv` = '$ten', `anh_bv` = '$anh', `mo_ta_bv` = '$mota' WHERE `bai_viet`.`id` = '$id' ";
            $kq = $this->db->exec($sql);
            if($kq){
                return "thêm bài viết thành công" ;
            }else{
                return "thêm bài viết ko thành công" ;
            }
        }

        



    }
  

  
?>