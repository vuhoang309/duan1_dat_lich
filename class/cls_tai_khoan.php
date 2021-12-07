<?php require_once __DIR__ . "/../lib/databes.php" ?>

<?php
class cls_tai_khoan
{
    public $db;

    public function __construct()
    {
        $this->db = new database();
    }

    // các trường chứa câu lệnh sql dung để thêm sữa xóa tài khản
   
    public function danh_sach_tk()
    {
        $sql = "SELECT * FROM `tai_khoan`";
        $kq = $this->db->select($sql);
        if ($kq) {
            return $kq;
        } else return false;
    } 
    
    public function tai_khoan($id)
    {
        $sql = "SELECT * FROM `tai_khoan` WHERE id_tk = '$id'";
        $kq = $this->db->select($sql);
        if ($kq) {
            return $kq;
        } else return false;
    } 
    
    public function nhan_vien_id($id)
    {
        $sql = "SELECT * FROM `nhan_vien` WHERE id_tk = $id ";
        $kq = $this->db->select($sql);
        if ($kq) {
            return $kq;
        } else return false;
    } 


    public function dang_nhap_tk($email, $mat_khau)
    {    
        $sql = "SELECT * FROM `tai_khoan` WHERE email = '$email' AND mk_tk = '$mat_khau' ";
        $result = $this->db->select($sql);

        if ($result) {
            $row = $result->fetch_assoc();

            //khach hang dang nhap
            if ($row['vai_tro'] == 2) {
                $_SESSION['vai_tro'] = $row['vai_tro'];
                $_SESSION['sdt_tk'] = $row['sdt_tk'];
                $_SESSION['use_name'] = $row['ten_tk'];
                $_SESSION['id_tk'] = $row['id_tk'];

                 header("Location: ../web/trangchu.php ");
            }  
            //admin dang nhap  
            if ($row['vai_tro'] == 1) {
                $_SESSION['vai_tro'] = $row['vai_tro'];
                $_SESSION['use_name'] = $row['ten_tk'];
                $_SESSION['sdt_tk'] = $row['sdt_tk'];
                $_SESSION['id_tk'] = $row['id_tk'];
                
                header("Location: ../web/trangchu.php ");
            } 

            if ($row['vai_tro'] == 3) {
                $_SESSION['vai_tro'] = $row['vai_tro'];
                $_SESSION['sdt_tk'] = $row['sdt_tk'];
                $_SESSION['use_name'] = $row['ten_tk'];
                $_SESSION['id_tk'] = $row['id_tk'];
                
                header("Location: ../web/trangchu.php ");
            } 

        } else {
            return "<script> alert('Đăng nhập thất bại !'); </script>";
        }
    }

    public function them_tk($ten,$anh,$email, $sdt, $mat_khau, $vai_tro)
    {
        $sql = " INSERT INTO `tai_khoan` (`ten_tk`,`avt_tk`,`email`, `sdt_tk`, `mk_tk`, `vai_tro`) 
            VALUES ('$ten','$anh', '$email', '$sdt', '$mat_khau', '$vai_tro');";
        $kq = $this->db->exec($sql);
        if ($kq) {
            return "Đăng ký Thành công ";
        } else {
            return "Đăng ký Không thành công";
        }
    }
    
    public function xoa_tk($id){
        $sql = "DELETE FROM `tai_khoan` WHERE `tai_khoan`.`id_tk` = '$id'";
        $kq = $this->db->exec($sql);
        if ($kq) {
            return "xóa tài khảo Thành công ";
        } else {
            return "xóa tài khoản Không thành công";
        }
    }
    
    public function sua_tk($ten,$image ,$email, $sdt, $mat_khau, $vai_tro,$id){
        $sql = "UPDATE `tai_khoan` 
        SET `ten_tk` = '$ten', `avt_tk` = '$image', `email` = '$email', `sdt_tk` = '$sdt', `mk_tk` = '$mat_khau', `vai_tro` = '$vai_tro' WHERE `tai_khoan`.`id_tk` = $id;
        ";
        $kq = $this->db->exec($sql);
        if($kq){
            return "sữa tài khoản thành công";
        }else {
            return "sữa tài khoản không thành công";
        }
    }
    //cách trường chứa sql của đanh giá

    public function them_dg($noi_dung,$id_tk,$ngay_dg){
        $sql = " INSERT INTO `danh_gia` (`noi_dung`, `id_tk`, `ngay_dg`) VALUES ('$noi_dung', '$id_tk', '$ngay_dg'); ";
        $kq = $this->db->exec($sql);
        if($kq){
            return "Đánh Giá thành công";
        }else {
            return "Đánh Giá không thành công";
        }

    } 

    public function ds_chitiet($id){
        $sql = "SELECT danh_gia.id_dg,danh_gia.noi_dung,tai_khoan.ten_tk,tai_khoan.email,tai_khoan.avt_tk 
        FROM danh_gia inner JOIN tai_khoan ON danh_gia.id_tk = tai_khoan.id_tk WHERE danh_gia.trang_thai = $id ";
        $kq = $this->db->select($sql);
        if($kq){
            return $kq;
        }else {
            return false;
        }
    } 
    public function ds_danh_gia(){
        $sql = " SELECT * FROM danh_gia";
        $kq = $this->db->select($sql);
        if($kq){
            return $kq;
        }else {
            return false;
        }
    }

    public function xoa_dg($id){
        $sql = "DELETE FROM `danh_gia` WHERE `danh_gia`.`id_dg` = '$id' ";
        $kq = $this->db->exec($sql);
        if ($kq) {
            return "xóa đánh giá Thành công ";
        } else {
            return "xóa đánh giá Không thành công";
        }
    } 

    
    




}
?>
