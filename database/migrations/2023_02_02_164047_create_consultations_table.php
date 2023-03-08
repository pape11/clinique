<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('temperature')->nullable();
            $table->string('tension')->nullable();
            $table->string('glycerine')->nullable();
            $table->string('poids')->nullable();
            $table->string('motif')->nullable();
            $table->string('specialite')->nullable();
            $table->string('tdr')->nullable();
            $table->string('image')->default('default.png');
            $table->string('image1')->default('default.png');
            $table->string('image2')->default('default.png');
            $table->string('rendez_vous')->nullable();
            $table->string('analyse')->nullable();
            $table->string('radio')->nullable();
            $table->string('echo')->nullable();
            $table->string('test_grossesse')->nullable();
            $table->mediumText('traitement') ->nullable();
            $table->mediumText('remarque');
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     *
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
