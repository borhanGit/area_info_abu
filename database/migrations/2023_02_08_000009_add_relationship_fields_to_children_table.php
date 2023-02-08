<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToChildrenTable extends Migration
{
    public function up()
    {
        Schema::table('children', function (Blueprint $table) {
            $table->unsignedBigInteger('house_id')->nullable();
            $table->foreign('house_id', 'house_fk_7995246')->references('id')->on('houses');
        });
    }
}
