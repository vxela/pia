<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_item extends Model
{
    protected $fillable = [
        'item_code',
        'item_name',
        'item_unit',
        'item_price',
        'user_id'
    ];

    public function getUser() {
        return \App\User::find($this->id)->first();
    }
}
