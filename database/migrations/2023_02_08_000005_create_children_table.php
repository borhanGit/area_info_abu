<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenTable extends Migration
{
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('children_name');
            $table->string('profession')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_mobile_no')->nullable();
            $table->string('spouse_profession')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('children_number')->nullable();
            $table->timestamps();
        });
    }
}
