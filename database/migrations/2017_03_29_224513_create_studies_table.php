<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudiesTable extends Migration
{
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->increments('study_id');
            $table->integer('id')->unsigned();
            $table->string('study',1000);
            $table->string('links',1000)->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
        Schema::table('studies', function($table) {
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studies');
    }
}
