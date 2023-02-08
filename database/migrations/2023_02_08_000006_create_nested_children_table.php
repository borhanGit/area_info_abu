<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNestedChildrenTable extends Migration
{
    public function up()
    {
        Schema::create('nested_children', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->string('study')->nullable();
            $table->string('study_stage')->nullable();
            $table->string('study_place')->nullable();
            $table->timestamps();
        });
    }
}
