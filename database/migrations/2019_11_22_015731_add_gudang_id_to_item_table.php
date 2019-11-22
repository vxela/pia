<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGudangIdToItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_items', function (Blueprint $table) {
            $table->integer('gudang_id')->nullable()->default(0)->after('item_unit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_items', function (Blueprint $table) {
            $table->dropColumn('gudang_id');
        });
    }
}
