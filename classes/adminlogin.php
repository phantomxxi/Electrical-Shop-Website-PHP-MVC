<?php
    include '../lib/session.php';
    Session::checkLogin();
    include '../lib/database.php';
    include '../helpers/format.php';

?>

<?php

class adminlogin
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function login_admin($adminUser, $adminPass)
    {
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);
//       hàm để xử lý các biến trước khi đưa vào câu query dùng để bảo mật/ bảo vệ website
        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
//      Check user and pass must be not empty
        if (empty($adminUser) || empty(($adminPass)))
        {
            $alert = "User and Pass must be not empty";
            return $alert;
        } else
        {
            $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' LIMIT 1";
            $result = $this->db->select($query);
//           Check do chinh xac cua tk va mk
            if ($result != false)
            {
//              Trả về dữ liệu dạng mảng với key là tên của column (column của các table trong database)
                $value = $result->fetch_assoc();
                Session::set('adminlogin',true);
//                Set gia tri value cho cac tieu de
                Session::set('adminId',$value['adminId']);
                Session::set('adminUser',$value['adminUser']);
                Session::set('adminName',$value['adminName']);
//                Neu nhap user va pass dung thi huong chi muc ve index.php
                header('Location:index.php');
            }else
            {
                $alert = "User and Pass not match";
                return $alert;
            }
        }
    }
}

?>