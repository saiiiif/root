<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdcs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locator');
            $table->date('date');
            $table->string('amount');
            $table->string('title');
            $table->string('payement');
            $table->string('attach_file');
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
        Schema::dropIfExists('pdcs');
    }
}
