<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email_id',50)->nullable();
            $table->string('name',50)->nullable();
            $table->string('number',20)->nullable();
            $table->string('email',100);
            $table->integer('batch_id');




            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_details');
    }
}
