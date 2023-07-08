<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title')->nullabe();
            $table->string('slug')->nullabe();
            $table->float('price')->nullabe();
            $table->string('media')->nullabe();
            $table->string('lectures')->nullabe();
            $table->string('languages')->nullabe();
            $table->string('meta_description')->nullabe();
            $table->string('meta_title')->nullabe();
            $table->string('video')->nullabe();
            $table->string('duration')->nullabe();
            $table->string('includes')->nullabe();
            $table->longText('description')->nullabe();
            $table->enum('type', array('BLOGS','COURSES'))->nullable()->default("BLOGS");
            $table->boolean('status')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_trending')->default(0);
            $table->string('created_by');
            $table->softDeletes();
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
        Schema::dropIfExists('courses');
    }
}
