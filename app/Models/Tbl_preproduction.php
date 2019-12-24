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

    public function getUnit() {
        return Tbl_unit::find($this->satuan_id);
    }
    public function getItem() {
        return Tbl_Item::find($this->item_id);
    }
}
