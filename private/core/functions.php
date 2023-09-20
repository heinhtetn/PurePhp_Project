<?php

function get_var($key, $default = "")
{
    if(isset($_POST[$key]))
    {
        return $_POST[$key];
    }
    return $default;
}

function get_select($key, $value)
{
    if(isset($_POST[$key]))
    {
        if($_POST[$key] == $value)
        {
            return "selected";
        }
        return "";
    }
}


function get_date($date)
{
    return date("Y/m/d H:i:s", strtotime($date));
}


function view_path($view, $data = array())
{
    
    if(file_exists("../private/views/" . $view . ".inc.php"))
    {
        return "../private/views/" . $view . ".inc.php";
    }
    else
    {
        return "../private/views/404.view.php";
    }
}