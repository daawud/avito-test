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
            $table->bigInteger('room_id')->unsigned();
            $table->string('date_start');
            $table->string('date_end');

            $table->foreign('room_id')
                  ->references('id')->on('rooms')
                  ->onDelete('cascade');
            $table->index('date_start');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropIndex(['date_start']);
            $table->dropForeign(['room_id']);
        });
        Schema::dropIfExists('bookings');
    }
}
