<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Requester_id')->nullable();
            $table->foreign('Requester_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('Request_get_id')->nullable();
            $table->foreign('Request_get_id')->references('id')->on('users')->onDelete('cascade');

            $table->String('Requester_name');
            $table->String('Requester_mail');

            $table->String('Request_getter_name');
            $table->String('Request_getter_mail');
            
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
        Schema::dropIfExists('blood_requests');
    }
}