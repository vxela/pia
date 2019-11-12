<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_stock extends Model
{
    protected $fillable = [
        'item_id',
        'item_cd',
        'item_qty',
        'user_id',
        'stock_date',
    ];

    public function getItem() {
        return Tbl_item::where('item_code', $this->item_cd)->first();
    }
}