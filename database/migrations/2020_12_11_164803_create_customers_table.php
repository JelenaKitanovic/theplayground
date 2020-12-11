<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('full_name')->nullable();
            $table->string('email')->unique();
            $table->string('goal')->nullable();
            $table->integer('age')->nullable();
            $table->string('ideal_partner')->nullable();
            $table->string('favourite_quote')->nullable();
            $table->string('favourite_game')->nullable();
            $table->string('availability')->nullable();
            $table->boolean('is_matched')->default(false);
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
        Schema::dropIfExists('customers');
    }
}
