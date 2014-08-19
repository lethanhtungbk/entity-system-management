<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultDatabase extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('field_types', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('groupId')->default(1);
            $table->string('group');
            $table->string('display');
        });
        
        Schema::create('fields', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('field_type_id')->default(0);
            $table->integer('value_type')->default(0);
            $table->integer('object_id')->default(0);
            $table->integer('attribute_id')->default(0);
        });
        
        Schema::create('field_define_values',function($table) {
            $table->increments('id');
            $table->integer('field_id');
            $table->string('value');
            $table->integer('ordering');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('field_types');
        Schema::dropIfExists('fields');
        Schema::dropIfExists('field_define_values');
        Schema::dropIfExists('groups');
    }

}
