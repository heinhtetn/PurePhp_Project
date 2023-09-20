<?php

class Inventories extends Model
{
    protected $table = 'inventory';

    protected $allowedColumns = [
        'item_name',
        'user_id',
        'amount'
    ];

    function getInventory($id)
    {
        $row = $this->query("select * from inventory where user_id = :user_id and amount > 0", ['user_id' => $id]);

        if($row != null)
        {
            return $row;
        }

        return [];
         
    }

    function getTotal($id, $columns)
    {
        $amtAndPrice = $this->selectCol($id, $columns);

        if($amtAndPrice)
        {
            return $amtAndPrice;
        }

        return "Error";

    }

    function getAmt($item_name)
    {
        $amt = $this->query("select amount from records where item_name = :item_name", ['item_name' => $item_name]);
        if($amt)
        {
            return $amt;
        }

        return [];
    }

    function getItem($item_name,$user_id)
    {
        $row = $this->query("select * from inventory where item_name = :item_name && user_id = :user_id", ['item_name' => $item_name, 'user_id' => $user_id]);
        if($row)
        {
            return $row;
        }
        return null;
    }

    function getId($user_id)
    {
        $row = $this->where('user_id', $user_id);
        if($row)
        {
            return $row;
        }
        return null;
    }
}