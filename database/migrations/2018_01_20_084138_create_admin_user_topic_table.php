<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {



        //角色
        Schema::create('admin_role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default("");
            $table->timestamps();
        });
        //权限
        Schema::create('admin_authority', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default("");
            $table->timestamps();
        });
        //用户角色
        Schema::create('admin_user_role', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(0);
            $table->integer('role_id')->default(0);
            $table->timestamps();
        });
        //角色权限
        Schema::create('admin_role_authority', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->default(0);
            $table->integer('authority_id')->default(0);
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
        Schema::dropIfExists('admin_role');
        Schema::dropIfExists('admin_authority');
        Schema::dropIfExists('admin_user_role');
        Schema::dropIfExists('admin_role_authority');

    }
}
