<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //        original name: emihamn
        Schema::create('swedish_port_passenger_list_records', function (Blueprint $table) {
            $table->id();
            $table->integer('old_id')->nullable();

            $table->unsignedBigInteger('user_id')->default('1');
            $table->unsignedBigInteger('archive_id')->default('4');

            $table->string('last_name')->index()->nullable();
            $table->string('first_name')->index()->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('profession')->index()->nullable();
            $table->string('departure_date')->nullable();
            $table->string('departure_parish')->nullable();
            $table->string('destination')->index()->nullable();
            $table->string('source_reference')->index()->nullable();
            $table->string('departure_county')->index()->nullable();
            $table->string('traveling_partners')->index()->nullable();
            $table->string('main_act')->nullable();
            $table->string('departure_port')->index()->nullable();
            $table->mediumText('comments')->nullable();
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('swedish_port_passenger_list_reocrds');
    }
};