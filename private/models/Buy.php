<?php

class Buy extends Model
{
    protected $table = "trade";

    protected $allowedColumns = [
        'item_name',
        'category',
        'unit_price',
        'amount',
        'date',
        'user_id',
        'duration'
    ];
    
 
    function validate($data)
    {
        $this->errors = array();
        $id = Auth::getUser_id();

        //account status
        $acc_status = $this->query("select acc_status from accounts where user_id = :user_id", ['user_id' => $id]);
        if($acc_status != null)
        {
            $acc_status = $acc_status[0]->status;
            if($acc_status == "suspended")
            {
                $this->errors['status'] = "Your account is suspended";
            }
        }       
        else
        {
            $this->errors['no_account'] = "You have no funds in your account";
        }
        
        //check amount
        $amt = $this->query("select amount from trade where item_id = :item_id",['item_id' => $data['id']]);
        
        $amt = $amt[0]->amount;


        if($data['amount'] > $amt)
        {
            $this->errors['amount'] = "U cant buy more than available amount";
        }

        //check balance
        if(!empty($data['amount']) && !empty($data['unit_price']))
        {
            $cost = doubleval($data['amount']) * doubleval($data['unit_price']);           
            $check_bal = new Acc();
            $bal = $check_bal->getBalance($id);
            if($bal != null)
            {
                if($cost > $bal->balance)
                {
                    $this->errors['balance'] = "Insufficient Funds";
                }
            }
            else
            {
                $this->errors['no_account'] = "You have no funds in your account";
            }           
        }
        else
        {
            $this->errors['empty'] = "Amount is empty";
        }

        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }

    function getSellerID($id)
    {
        $seller_id = $this->query("select user_id from trade where item_id = :item_id", ['item_id' => $id]);

        return $seller_id[0]->user_id;
    }

    function getUnitPrice($id)
    {
        $unit_price = $this->query("select unit_price from trade where item_id = :item_id", ['item_id' => $id]);
        
        return $unit_price[0]->unit_price;
    }

}