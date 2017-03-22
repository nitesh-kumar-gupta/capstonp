<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('branch_id');
            $table->string('branch_name')->unique();
            $table->string('branch_description')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();

        });
        $branches = array(
            array('branch_name'=>'Engineering', 'branch_description'=>'Engineering is the application of mathematics and scientific, economic, social, and practical knowledge in order to invent, innovate, design, build, maintain, research.')
        );
        DB::table('branches')->insert($branches);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
