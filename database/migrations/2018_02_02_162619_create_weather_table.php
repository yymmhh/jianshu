<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //储存天气的
        Schema::create('weather', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("date")->default("");
            $table->string("city")->default("");
            $table->string("quality")->default("");
            $table->string("wendu")->default("");
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
        Schema::dropIfExists('weather');
    }
}
