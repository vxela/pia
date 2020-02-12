<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_log extends Model
{
    protected $fillable = [
        'job',
        'model_target',
        'data_target',
        'status',
        'user_id',
        'desc',
        'created_at',
        'updated_at'
    ];
}
