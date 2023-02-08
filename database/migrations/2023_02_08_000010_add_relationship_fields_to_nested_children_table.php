<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNestedChildrenTable extends Migration
{
    public function up()
    {
        Schema::table('nested_children', function (Blueprint $table) {
            $table->unsignedBigInteger('children_id')->nullable();
            $table->foreign('children_id', 'children_fk_7995402')->references('id')->on('children');
        });
    }
}
