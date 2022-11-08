<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',200);
            $table->text('description');
            $table->string('date',60);
            $table->string('formatted_address',300);
            $table->string('locality',100)->nullable();
            $table->string('state',200)->nullable();
            $table->string('country',200)->nullable();
            $table->string('administrative_area_level_1',300)->nullable();
            $table->string('lat',300);
            $table->string('lng',300);
            $table->string('host',60);
            $table->integer('user_id');
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
        Schema::dropIfExists('events');
    }
}
