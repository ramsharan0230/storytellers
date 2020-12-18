<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpcomingEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upcoming_events', function (Blueprint $table) {
            $table->id();
            $table->string('title', 1000);
            $table->unsignedBigInteger('guest_id')->unsigned();
            $table->foreign('guest_id')->references('id')->on('guests');
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('slug')->nullable();
            $table->text('descriptions', 10000)->nullable();
            $table->boolean('publish', 0, 1)->default(1);
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
        Schema::dropIfExists('upcoming_events');
    }
}
