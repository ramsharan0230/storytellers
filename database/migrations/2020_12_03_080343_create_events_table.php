<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('guest_id')->unsigned();
            $table->foreign('guest_id')->references('id')->on('guests');
            $table->unsignedBigInteger('series_id')->unsigned();
            $table->foreign('series_id')->references('id')->on('series');
            $table->string('title');
            $table->text('first_patagraph', 1000)->nullable();
            $table->text('second_patagraph', 1000)->nullable();
            $table->string('date', 50)->nullable();
            $table->string('time', 50)->nullable();
            $table->string('video_link')->nullable();
            $table->string('highlight_text')->nullable();
            $table->enum('status', array('upcoming', 'past', 'active', 'inActive'))->default('inActive');
            $table->string('banner_image', 120)->nullable();	
            $table->text('descriptions', 2500)->nullable();
            $table->string('slug', 299)->nullable();
            $table->boolean('slider', 0, 1)->default(0);
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
