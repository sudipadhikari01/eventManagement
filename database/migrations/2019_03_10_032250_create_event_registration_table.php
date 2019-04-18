<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_registration', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_title');
            $table->string('location_name');
            $table->string('address');
            $table->string('address2');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('zip_code');
            $table->string('event_frequency');
            $table->string('date');
            $table->string('from');
            $table->string('to');
            $table->string('event_image');
            $table->string('event_description');
            $table->string('organizer_name');
            $table->string('organizer_description');
            $table->string('ticket_type');
            $table->string('ticket_name');
            $table->integer('ticket_quantity');
            $table->double('price');
            $tabel->string('ticket_description');
            $tabel->string('sales_chanel');
            $tabel->string('sales_start_date');
            $tabel->string('sales_start_time');
            $tabel->string('sales_end_date');
            $tabel->string('sales_end_time');
            $table->string('event_type');
            $table->string('event_topic');
            $table->string('event_sub_topic');
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
        Schema::dropIfExists('event_registration');
    }
}
