<?php

/**
 * Session Class
 */

// Session dung de luu phien giao dich
class Session {
    public static function init()
    {
        if (version_compare(phpversion(), '5.4.0', '<'))
        {
            if (session_id() == '')
            {
                session_start();
            }
        } else
        {
            if (session_start() == PHP_SESSION_NONE)
            {
                session_start();
            }
        }
    }

    public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        } else
        {
            return false;
        }

    }

// Check phien lam viec co ton tai hay ko
    public static function checkSession()
    {
        self::init();
        if(self::get("adminlogin") == false)
        {
            self::destroy();
            header("Location: login.php");
        }


    }

    public static function checkLogin()
    {
        self::init();
        if (self::get("adminlogin")== true)
        {
            header("Location:index.php");
        }

    }

//    Xoa/Huy phien lam viec do
    public static function destroy()
    {
        session_destroy();
        header("Location:login.php");
    }
}

?>