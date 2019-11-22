<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_warehouse extends Model
{
    protected $fillable = [
        'name',
        'lokasi',
        'user_id'
    ];
}
