<?php require_once __DIR__ . "/../lib/databes.php" ?>
<?php require_once __DIR__ . "/../class/cls_tai_khoan.php";?>


<?php
class cls_dich_vu
{
    public $db;
    public $tk;

    public function __construct()
    {
        $this->db = new database();
        $this->tk = new cls_tai_khoan();
        
    }

    //dich _vụ 

    public function hien_dv()
    {
        $sql = "SELECT * FROM `dich_vu`";
        $kq = $this->db->select($sql);
        if ($kq) {
            return $kq;
        } else return false;
    }
    public function hien_dv_id($id)
    {
        $sql = "SELECT * FROM `dich_vu` WHERE dich_vu.id_dv = $id ";
        $kq = $this->db->select($sql);
        if ($kq) {
            return $kq;
        } else return false;
    }

    public function xoa_dv($id)
    {
        $sql = "DELETE FROM `dich_vu` WHERE `dich_vu`.`id_dv` = $id ";
        $kq = $this->db->exec($sql);
        if ($kq) {
            return "xóa thành công";
        } else return "xóa không thanh công";
    }

    public function them_dv($ten, $gia, $giam_gia, $mo_ta, $anh) {
        $sql = "INSERT INTO `dich_vu` (`ten_dv`, `gia_dv`, `giam_gia`, `mo_ta`, `anh1`) VALUES ( '$ten', '$gia', '$giam_gia', '$mo_ta', '$anh');";
        $kq = $this->db->exec($sql);
        if ($kq) {
            return 'them dich vu thanh cong';
        } else {
            return 'them ko dich vu thanh cong';
        }
    }

    public function sua_dv($ten, $gia, $giam_gia, $mo_ta, $anh, $id){
        $sql = "UPDATE `dich_vu` SET `ten_dv` = '$ten',`gia_dv` = '$gia', `giam_gia` = '$giam_gia', `mo_ta` = '$mo_ta', `anh1` = '$anh' WHERE `dich_vu`.`id_dv` = '$id' ";
        $kq = $this->db->exec($sql);
        if ($kq) {
            return 'sữa dich vu thanh cong';
        } else {
            return 'sữa ko dich vu thanh cong';
        }
    }
    /**** đặt lịch * */


    public function hien_dl()
    {
        $sql = "SELECT*FROM dat_lich,nhan_vien,tai_khoan WHERE nhan_vien.id_nv = dat_lich.id_nv AND nhan_vien.id_tk = tai_khoan.id_tk ORDER BY dat_lich.id_dl DESC;";
        $kq = $this->db->select($sql);
        if ($kq) {
            return $kq;
        } else return false;
    }

    public function hien_dl_nv($id)
    {
        $sql = "SELECT * FROM `dat_lich` WHERE id_nv = $id";
        $kq = $this->db->select($sql);
        if ($kq) {
            return $kq;
        } else return false;
    }

    public function xoa_lich($id)
    {
        $sql = "DELETE FROM `dat_lich` WHERE `dat_lich`.`id_dl` = '$id' ";
        $kq = $this->db->exec($sql);
        if ($kq) {
            return ' xoa đắt lịch thành công';
        } else {
            return  'xóa  lịch ko thành công ';
        }
    }

    public function them_lich($ten, $sdt, $dich_vu, $gio, $ngay_dat, $ngay_hen, $trang_thai, $id_nv, $id_tk)
    {
        $sql = "INSERT INTO `dat_lich` ( `ten_kh`, `sdt_kh`, `dich_vu`, `gio_hen`, `ngay_dat`, `ngay_hen`, `trang_thai`, `id_nv`, `id_tk`) 
            VALUES ('$ten', '$sdt', '$dich_vu', '$gio', '$ngay_dat', '$ngay_hen', '$trang_thai', '$id_nv', '$id_tk');";
        $kq = $this->db->exec($sql);
        if ($kq) {
            return  " <script> 
            alert('đặt lịch thành công thành công');
             location.replace('trangchu.php');
             
             </script>";

        } else {
            return  "<span style='color: red ;'> * đạt lịch ko thành công. </span>";
        }
    }

    public function sua_lich_ad($ten, $sdt, $dich_vu, $ngay_dat, $ngay_hen, $trang_thai, $id)
    {
        $sql = "UPDATE `dat_lich` SET `ten_kh` = '$ten', `sdt_kh` = '$sdt', `dich_vu` = '$dich_vu', `ngay_dat` = '$ngay_dat', `ngay_hen` = '$ngay_hen', `trang_thai` = '$trang_thai'
             WHERE `dat_lich`.`id_dl` = $id ";
        $kq = $this->db->exec($sql);
        if ($kq) {
            return ' sữa lịch thành công';
        } else {
            return  'sữa lịch ko thành công ';
        }
    }

    public function hien_dl_id($id)
    {
        $sql = "SELECT * FROM `dat_lich` WHERE dat_lich.id_nv = '$id' ";
        $kq = $this->db->select($sql);
        if ($kq) {
            return $kq;
        } else return false;
    }

    public function hien_dl_id2($id)
    {
        $sql = "SELECT * FROM `dat_lich` WHERE dat_lich.id_tk = '$id' ";
        $kq = $this->db->select($sql);
        if ($kq) {
            return $kq;
        } else return false;
    }

    public function sua_dl_id($id)
    {
        $sql = "SELECT * FROM `dat_lich` WHERE dat_lich.id_dl = '$id' ";
        $kq = $this->db->select($sql);
        if ($kq) {
            return $kq;
        } else return false;
    } 

    public function sua_trang_thai($trang_thai,$id){
        $sql = "UPDATE `dat_lich` SET `trang_thai` = '$trang_thai' WHERE `dat_lich`.`id_dl` = $id";
        $kq = $this->db->exec($sql);
        if ($kq) {
            return "sữa trạng thái thành công";
        } else return "sữa trạng thái ko thành công";
    }


    /**** nhan vien */

    public function nhan_vien(){
        $sql = "SELECT * FROM nhan_vien left JOIN tai_khoan ON nhan_vien.id_tk = tai_khoan.id_tk ";
        $kq = $this->db->select($sql);
        if ($kq) {
            return $kq;
        } else return false;
    }

    public function gio_lam()  {
        $sql = "SELECT * FROM `ca_lam`";
        $kq = $this->db->select($sql);
        if ($kq) {
            return $kq;
        } else return false;
    }

    public function nhan_vien_2($id)
    {
        $sql = "SELECT * FROM `nhan_vien` inner JOIN ca_lam WHERE nhan_vien.id_ca = ca_lam.id_ca AND nhan_vien.id_ca = $id";
        $kq = $this->db->select($sql);
        if ($kq) {
            return $kq;
        } else return false;
    }

    /**** kiểm tra */

    public function kt_ca($ca)
    {
        $sql = "SELECT COUNT(dat_lich.gio_hen) AS ca_lam FROM dat_lich WHERE dat_lich.trang_thai != 4 AND dat_lich.gio_hen = '$ca' ";
        $kq = $this->db->select($sql);
        if ($kq) {
            
            while ($so = $kq->fetch_assoc()) {
            if ($so['ca_lam'] >= 3) {
                return  "<span style='color: red ;'> * ca làm đã đầy rồi bạn à </span>";
            }
           
        }

           
        } else return false;
    }

    

    public function kt_ngay($date1, $date2)
    {
        if (strtotime($date1) > strtotime($date2)) {
            return  "<span style='color: red ;'> * ngày nhập đúng ngày hẹn. </span>";
        }
    } 


    public function kt_nv($nv){
        $sql = "SELECT COUNT(*) AS ca_lam FROM dat_lich WHERE dat_lich.id_nv AND dat_lich.id_nv = '$nv' ";
          $kq = $this->db->select($sql);
        if ($kq) {
        return $kq;
      } else return false;

    } 

    public function kt_mk($mat_khau){
        if (strlen($mat_khau) != 6) {
            return  "<span style='color: red ;'> * mật khẩu phải là 6 chữ số. </span>";
        }
    }

    public function kt_emai($email){
        if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
            return  "<span style='color: red ;'> * ngày đúng email đủ @ và gmail.com  </span>";
        }else if($email){

            $e = $this->tk->danh_sach_tk();
            while ($so = $e->fetch_assoc()) {
                if ($so['email'] == $email) {
                    return  "<span style='color: red ;'> * email đã tồn tại </span>";
                }}
        }
    } 

    public function kt_sdt($sdt)
    {
        if (!preg_match("/^[0-9]*$/", $sdt)) {
            return  "<span style='color: red ;'> * Không Nhập Ký tự đặc biệt </span>";
        } else if (strlen($sdt) != 10) {
            return  "<span style='color: red ;'> * Số điện thoại phải là 10 chữ số. </span>";
        }
    } 

    public function kt_sdt_tk($sdt)
    {
        if (!preg_match("/^[0-9]*$/", $sdt)) {
            return  "<span style='color: red ;'> * Không Nhập Ký tự đặc biệt </span>";
        } else if (strlen($sdt) != 10) {
            return  "<span style='color: red ;'> * Số điện thoại phải là 10 chữ số. </span>";
        }else if($sdt){
            $s = $this->tk->danh_sach_tk();
            while ($so = $s->fetch_assoc()) {
                if ($so['sdt_tk'] == $sdt) {
                    return  "<span style='color: red ;'> * số điện đã tồn tại </span>";
                }}


        }
    } 


}
?> 
