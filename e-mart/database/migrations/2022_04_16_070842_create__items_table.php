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
        Schema::create('_items', function (Blueprint $table) {
            $table->id();
            $table->string('itemname');
            $table->string('itemquantity');
            $table->string('itemprice');
            $table->string('suppliername');
            $table->string('itemimg');
            
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
        Schema::dropIfExists('_items');
    }
};
