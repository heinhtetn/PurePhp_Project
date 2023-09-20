<?php

class Inventorysell extends Model
{
    protected $table = "trade_record_sell";

    protected $allowedColumns = [
        'item_name',
        'amount',
        'unit_price',
        'user_id',
        'date'
    ];

    function validate($data)
    {

        $this->errors = array();
        $id = Auth::getUser_id();

        //account status
        $acc_status = $this->query("select acc_status from accounts where user_id = :user_id", ['user_id' => $id]);

        if($acc_status != null)
        {
            $acc_status = $acc_status[0]->acc_status;
            if($acc_status == "suspended")
            {
                $this->errors['status'] = "Your account is suspended";
            }
        }
        else
        {
            $this->errors['create'] = "You need to first deposit 5000 to start selling";
        }
        
        
        //amount check
        $row = $this->query("select amount from inventory where item_name = :item_name and user_id = :user_id",['item_name' => $data['item_name'],'user_id' => $id]);
        if($row[0]->amount < $data['amount'])
        {
            $this->errors['amount'] = "You dont have that amount in inventory";
        }
        //check category
        $category = ['construction', 'jewelery','poison','medicine', 'technology', 'edible', 'vehicles','miscellaneous'];
        if(empty($data['category']) || !in_array($data['category'], $category))
        {
            $this->errors['category'] = "Invalid or empty category";
        }

        //unit price check
        if(!preg_match('/^[0-9]*(\.[0-9]+)?$/', $data['unit_price']))
        {
            $this->errors['unit_price'] = "Unit price must be digits or decimals stupid!";
        }

        //empty fields
        if(empty($data['unit_price']) || empty($data['amount']) || empty($data['duration']) || empty($data['item_name']))
        {
            $this->errors['empty_fields'] = "Please fill empty fields";
        }

        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;

    }
}