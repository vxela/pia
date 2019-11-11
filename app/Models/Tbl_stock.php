<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_stock extends Model
{
    //

    public function getItem() {
        return Tbl_item::where('item_code', $this->item_cd)->get();
    }
}
