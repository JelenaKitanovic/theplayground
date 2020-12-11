<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerStrengthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_strength', function (Blueprint $table) {
            $table->id();
            $table->bigIncrements('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->bigIncrements('strength_id');
            $table->foreign('strength_id')->references('id')->on('strength');
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
        Schema::dropIfExists('customer_strength');
    }
}
