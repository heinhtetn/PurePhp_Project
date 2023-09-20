<?php

class Records extends Model
{
    protected $table = 'records';

    protected $allowedColumns = [
        'item_id',
        'item_name',
        'buyer_id',
        'seller_id',
        'amount',
        'unit_price',
        'date'
    ];   


}