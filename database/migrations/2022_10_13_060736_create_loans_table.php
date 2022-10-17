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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->string('type_of_bike');
            $table->string('amount');
            $table->string('number_plate');
            $table->integer('loan_type_id');
            $table->string('loan_duration');
            $table->bigInteger('amount_paid')->nullable();
            $table->bigInteger('balance')->nullable();
            $table->string('reason');
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
        Schema::dropIfExists('clients');
    }
};
