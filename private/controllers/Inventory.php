<?php

class Inventory extends Controller
{
    function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $invent = new Inventories();

        $id = Auth::getUser_id();

        $data = $invent->getInventory($id);


        $this->view('inventory',[
            'rows' => $data
        ]);
    }
}