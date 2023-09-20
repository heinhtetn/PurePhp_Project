<?php

class Controller{
    public function view($view, $data = array())
    {
        extract($data);

        if(file_exists("../private/views/" . $view . ".view.php"))
        {
            require "../private/views/" . $view . ".view.php";
        }
        elseif(file_exists("../private/views/" . $view . ".inc.php"))
        {
            require "../private/views/" . $view . ".inc.php";
        }
        else
        {
            require "../private/views/404.view.php";
        }
    }

    
    public function load_model($model)
    {
        if(file_exists("../private/models/" . ucfirst($model) . ".php"))
        {
            require "../private/models/" . ucfirst($model) . ".php";
            return $model = new $model();
        }
        return false;
    }

    public function redirect($link)
    {
        header('location:' . ROOT . '/' . trim($link, '/'));
        die;
    }
    public function tab_jump($link)
    {
        header('location:' . ROOT . '/' . 'trade?tab=' . trim($link," "));
        die;
    }

    public function navigate($link)
    {
        header('location:' . ROOT . '/' . 'admin?tab=' . trim($link," "));
        die;
    }
}