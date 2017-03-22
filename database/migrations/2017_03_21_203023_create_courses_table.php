<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('course_id');
            $table->integer('branch_id')->unsigned();
            $table->string('course_abb')->unique();;
            $table->string('course_name')->unique();;
            $table->string('course_description')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
        Schema::table('courses', function($table) {
            $table->foreign('branch_id')->references('branch_id')->on('branches');
        });
        $courses = array(
            array('branch_id'=>1,'course_abb'=>'CS','course_name'=>'Computer Science', 'course_description'=>'Computer science is the study of the theory, experimentation, and engineering that form the basis for the design and use of computers.'),
            array('branch_id'=>1,'course_abb'=>'EE','course_name'=>'Electrical and Electronics', 'course_description'=>'Electrical engineering is a field of engineering that generally deals with the study and application of electricity, electronics, and electromagnetism.'),
            array('branch_id'=>1,'course_abb'=>'MEC','course_name'=>'Mechanical Engineering', 'course_description'=>'Mechanical engineering is the discipline that applies the principles of engineering, physics, and materials science for the design, analysis, manufacturing, and maintenance of mechanical systems.'),
            array('branch_id'=>1,'course_abb'=>'CVL','course_name'=>'Civil Engineering', 'course_description'=>'Civil engineering is a professional engineering discipline that deals with the design, construction, and maintenance of the physical and naturally built environment, including works like roads, bridges, canals, dams, and buildings.')
        );
        DB::table('courses')->insert($courses);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
