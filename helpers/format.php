<?php

/**
 * Format class
 */

class Format {
    public function formatDate($date) {
        return date('F j, Y, g:i a',strtotime($date));
    }

    public function textShorten($text, $limit = 400){
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text.".....";
        return $text;
    }

    public function validation($data)
    {
        $data = trim($data); // loai bo cac dau space dau va cuoi $data
        $data = stripcslashes($data); // loai bo cac dau "\" hoac cac ki tu dac biet " \n, \r, ..."
        $data = htmlspecialchars($data); // chuyển các thể html trong chuỗi $data sang dạng thực thể của chúng
        return $data;
    }

    public function title()
    {
        $path = $_SERVER['SCRIPT_FILENAME']; // Trả lại tên đường dẫn tuyệt đối của kịch bản hiện đang thực hiện
        $title = basename($path, '.php'); // lấy về phần đuôi của đường dẫn được truyền vào.
//        $title = str_replace('_', ' ', $title);
        if ($title == 'index') {
            $title = 'home';
        }elseif ($title == 'contact') {
            $title = 'contact';
        }
        return $title = ucfirst($title);
    }

}

?>