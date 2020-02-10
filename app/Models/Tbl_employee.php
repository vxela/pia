<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_employee extends Model
{
    protected $fillable = [
        'name',
        'code',
        'nik',
        'address',
        'phone',
        'date_in',
        'created_at',
        'updated_at',
        'user_id',
        'job_id'
    ];
}
