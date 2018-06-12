<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('business_name');
            $table->string('domain_name');
            $table->integer('rank')->unsigned();
            $table->string('admins_name');
            $table->string('email');
            $table->string('phone');
            $table->string('mailing_address');
            $table->integer('flag')->unsigned();
            $table->integer('issues')->unsigned();
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
        Schema::dropIfExists('info');
    }
}
