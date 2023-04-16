<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestAcceptedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_request_accepteds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Accepter_id')->nulable();
            $table->foreign('Accepter_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('Requester_id')->nulable();
            $table->foreign('Requester_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('requestId')->nulable();
            $table->foreign('requestId')->references('id')->on('blood_requests')->onDelete('cascade');
            
            $table->String('requester_name')->nulable();
            $table->String('requester_blood_type')->nulable();
            $table->String('requester_address')->nulable();
            $table->String('requester_contact')->nulable();
            $table->String('requester_age')->nulable();
            $table->String('requester_gender')->nulable();
            $table->String('requester_requestmade')->nulable();
            $table->String('Accepter_name')->nulable();
            $table->String('Accepter_blood_type')->nulable();
            $table->String('Accepter_address')->nulable();
            $table->String('Accepter_contact')->nulable();
            $table->String('Accepter_age')->nulable();
            $table->String('Accepter_gender')->nulable();
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
        Schema::dropIfExists('blood_request_accepteds');
    }
}