<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('upcoming_event_id')->unsigned();
            $table->foreign('upcoming_event_id')->references('id')->on('upcoming_events');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address', 199)->nullable();
            $table->text('message', 2500)->nullable();
            $table->text('remarks', 25000)->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
