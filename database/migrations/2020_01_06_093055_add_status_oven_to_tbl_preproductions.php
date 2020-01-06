<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusOvenToTblPreproductions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_preproductions', function (Blueprint $table) {
            $table->enum('status_oven', ['tunggu', 'masuk', 'keluar'])->default('tunggu')->after('satuan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_preproductions', function (Blueprint $table) {
            $table->dropColumn('status_oven');
        });
    }
}
