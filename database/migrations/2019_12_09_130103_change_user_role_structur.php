<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUserRoleStructur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('users', 'role_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id')->default(3)->change();
            });            
        }
        elseif (Schema::hasColumn('users', 'user_role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->renameColumn('user_role', 'role_id');
            });    
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id')->default(3)->change();
            });
        } else {
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id')->default(3)->after('emp_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        if(Schema::hasColumn('users', 'role_id')){
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('role_id');
            });
        } elseif(Schema::hasColumn('users', 'user_role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('user_role');
            });            
        }
    }
}
