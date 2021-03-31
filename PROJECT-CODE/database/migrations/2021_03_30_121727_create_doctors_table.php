<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
    $table->bigIncrements('doc_id');
    $table->string('doc_name');
    $table->string('doc_post');
    $table->string('doc_division');
    $table->string('doc_address');
    $table->string('doc_degree');
    $table->string('doc_spec'); //doctor's spceicialty,
    $table->string('doc_hospital'); // the doctor's chamber
    $table->string('doc_contact'); //contact number
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
        Schema::dropIfExists('doctors');
    }
}
