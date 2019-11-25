<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_preproduction extends Model
{
    protected $fillable = [
        'item_id',
        'jml_item',
        'satuan_id',
        'user_id',
        'date',
        'time'
    ];
}
