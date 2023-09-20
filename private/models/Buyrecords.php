<?php

class Buyrecords extends Model
{
    protected $table = 'trade_record_buy';

    protected $allowedColumns = [
        'item_name',
        'amount',
        'unit_price',
        'user_id',
        'date'
    ];
}