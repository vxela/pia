<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('item_id')->references('id')->on('tbl_items')->onDelete('cascade');
            $table->enum('stock_type', ['in', 'out']);
            $table->string('item_cd');
            $table->integer('item_qty');
            $table->integer('user_id');
            $table->text('stock_desk');
            $table->date('stock_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_stocks');
    }
}
