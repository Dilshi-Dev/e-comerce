<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('sorderid');
            $table->string('type');
            $table->date('date');
            $table->integer('rcvq');
            $table->float('amount');
            $table->string('supid');
            $table->string('supname');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('suppliers');
    }
}
