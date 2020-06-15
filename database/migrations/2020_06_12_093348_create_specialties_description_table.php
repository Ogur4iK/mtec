<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialtiesDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialties_description', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('form');
            $table->string('specialization')->nullable();
            $table->string('period');
            $table->string('short_period');
            $table->string('tests');
            $table->string('education');
            $table->string('plan');
            $table->bigInteger('speciality_id')->unsigned();
            $table->foreign('speciality_id')->references('id')->on('specialties')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('specialties_description');
    }
}
