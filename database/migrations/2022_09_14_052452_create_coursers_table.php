<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->nullable()->references('id')->on('teachers')->onDelete('set null');
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->onDelete('set null');
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('description');
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
        Schema::dropIfExists('coursers');
    }
}
