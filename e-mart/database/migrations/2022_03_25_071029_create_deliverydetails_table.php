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
        Schema::create('deliverydetails', function (Blueprint $table) {
            $table->id();
            $table->string('trackingno');
            $table->string('orderplacement');
            $table->string('vehicleno');
            $table->string('deliverycharge');
            $table->string('receiversnumber');

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
        Schema::dropIfExists('deliverydetails');
    }
};
