<?php

class Salerecords extends Model
{
    protected $table = "trade_record_sell";

    protected $allowedColumns = [
        'item_name',
        'amount',
        'unit_price',
        'user_id',
        'date'
    ];
}