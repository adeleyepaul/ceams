<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->string('appraiser_id');
            $table->integer('accountability');
            $table->integer('integrity');
            $table->integer('judgement');
            $table->integer('communication');
            $table->integer('quality');
            $table->integer('quantity');
            $table->integer('leadership');
            $table->integer('safety');
            $table->integer('commitment');
            $table->integer('planning');
            $table->timestamps();

            $table->foreign('appraiser_id')->references('staff_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessments');
    }
}
