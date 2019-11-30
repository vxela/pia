<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('nik')->nullable();
            $table->text('address');
            $table->string('phone');
            $table->date('date_in');
            $table->timestamps();
        });

        Schema::table('tbl_employees', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('job_id')->nullable();
        
            $table->foreign('job_id')->references('id')->on('tbl_jobs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_employees');
    }
}
