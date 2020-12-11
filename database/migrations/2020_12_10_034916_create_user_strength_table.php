<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserStrengthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_strength', function (Blueprint $table) {
            $table->id();
            $table->bigIncrements("user_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigIncrements("strength_id");
            $table->foreign('strength_id')->references('id')->on('strengths');
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
        Schema::dropIfExists('user_strength');
    }




}
