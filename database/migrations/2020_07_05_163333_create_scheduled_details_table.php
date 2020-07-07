<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduledDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduled_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 100);
            $table->string('subject', 100);
            $table->text('emailBody');
            $table->date('send_date');
            $table->string('status',1)->default("0");
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
        Schema::dropIfExists('scheduled_details');
    }
}
