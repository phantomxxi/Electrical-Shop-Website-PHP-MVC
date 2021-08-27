<?php
include '../lib/database.php';
include '../helpers/format.php';

?>

<?php

class category
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_category($catName)
    {
        $catName = $this->fm->validation($catName);

//       hàm để xử lý các biến trước khi đưa vào câu query dùng để bảo mật/ bảo vệ website
        $catName = mysqli_real_escape_string($this->db->link, $catName);

//      Check user and pass must be not empty
        if (empty($catName))
        {
            $alert = "<span class='error'>Category must be not empty</span>";
            return $alert;
        } else
        {
            $query = "INSERT INTO tbl_category(catName) VALUES('$catName') ";
            $result = $this->db->insert($query);

            if ($result == true)
            {
                $alert = "<span class='success'>Insert Category Sucessfully</span>";
                return $alert;
            }else
            {
                $alert = "<span class='error'>Insert Category Not Sucessfully</span>";
                return $alert;
            }


        }
    }

    public function show_category()
    {
        $query = "SELECT * FROM tbl_category ORDER BY catId desc ";
        $result = $this->db->select($query);
        return $result;
    }
}

?>