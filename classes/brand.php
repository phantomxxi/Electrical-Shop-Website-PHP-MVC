<?php
include '../lib/database.php';
include '../helpers/format.php';

?>

<?php

class brand
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_brand($brandName)
    {
        $brandName = $this->fm->validation($brandName);

//       hàm để xử lý các biến trước khi đưa vào câu query dùng để bảo mật/ bảo vệ website
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);

//      Check user and pass must be not empty
        if (empty($brandName))
        {
            $alert = "<span class='error'>Brand must be not empty</span>";
            return $alert;
        } else
        {
            $query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName') ";
            $result = $this->db->insert($query);

            if ($result == true)
            {
                $alert = "<span class='success'>Insert Brand Sucessfully</span>";
                return $alert;
            }else
            {
                $alert = "<span class='error'>Insert Brand Not Sucessfully</span>";
                return $alert;
            }
        }
    }

    public function show_brand()
    {
        $query = "SELECT * FROM tbl_brand ORDER BY brandId desc ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getbrandbyId($id)
    {
        $query = "SELECT * FROM tbl_brand WHERE brandId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_brand($brandName, $id)
    {
        $brandName = $this->fm->validation($brandName);
//       hàm để xử lý các biến trước khi đưa vào câu query dùng để bảo mật/ bảo vệ website
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if (empty($brandName))
        {
            $alert = "<span class='error'>Brand must be not empty</span>";
            return $alert;
        } else
        {
            $query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId = '$id'";
            $result = $this->db->update($query);

            if ($result)
            {
                $alert = "<span class='success'>Update Brand Sucessfully</span>";
                return $alert;
            }else
            {
                $alert = "<span class='error'>Update Brand Not Sucessfully</span>";
                return $alert;
            }
        }
    }

    public function del_brand($id)
    {
        $query = "DELETE FROM tbl_brand WHERE brandId = '$id'";
        $result = $this->db->delete($query);
        if ($result){
            $alert = "<span class='success'>Delete Brand Sucessfully</span>";
            return $alert;
        }else{
            $alert = "<span class='error'>Delete Brand Not Sucessfully</span>";
            return $alert;
        }
    }


}

?>