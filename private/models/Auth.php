<?php
class Auth{

    public static function authenticate($row){
        if($row->rank == 'user')
        {
            $_SESSION['USER'] = $row; 
        }
        else
        {
            $_SESSION['ADMIN'] = $row; 
        }
        
    }

    public static function logout()
    {
        if(isset($_SESSION['USER']))
        {
            unset($_SESSION['USER']);
        }
        elseif(isset($_SESSION['ADMIN']))
        {
            unset($_SESSION['ADMIN']);
        }
    }

    public static function logged_in(){
        if(isset($_SESSION['USER']))
        {
            return true;
        }
        return false;
    }

    public static function admin_logged_in(){
        if(isset($_SESSION['ADMIN']))
        {
            return true;
        }
        return false;
    }

    public static function user()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->firstname . ' ' . $_SESSION['USER']->lastname;
        }
        return "Unknown";
    }

    public static function admin()
    {
        if(isset($_SESSION['ADMIN']))
        {
            return $_SESSION['ADMIN']->firstname . ' ' . $_SESSION['ADMIN']->lastname;
        }
        return "Unknown";
    }


    public static function id()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->id;
        }
        return "Unknown";
    }

    public static function __callStatic($method, $params)
    {
        $prop = strtolower(str_replace("get","",$method));
        if(isset($_SESSION['USER']->$prop))
        {
            return $_SESSION['USER']->$prop;
        }
        elseif(isset($_SESSION['ADMIN']->$prop))
        {
            return $_SESSION['ADMIN']->$prop;
        }
        
        return 'Unknown';
    }
}   
