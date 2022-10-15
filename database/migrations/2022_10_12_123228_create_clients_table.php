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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('date_of_birth');
            $table->string('contact1');
            $table->string('contact2');
            $table->string('photo');
            $table->string('contract');
            $table->string('place_of_residence');
            $table->string('guarantee_name');
            $table->string('guarantee_contact');
            $table->string('boda_stage');
            $table->string('spouse_name');
            $table->string('spouse_contact');
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
