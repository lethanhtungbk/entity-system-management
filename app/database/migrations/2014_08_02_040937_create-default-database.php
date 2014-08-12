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
            $table->integer('value_type')->default(1);
            $table->string('display');
        });
        
        Schema::create('fields', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('value_type')->default(1);
            $table->integer('display_type')->default(1);
            $table->string('depend_on_objects');
            $table->string('depend_on_fields');
            $table->integer('assign_type')->default(1);            
        });
        
        
        Schema::create('field_values', function($table) {
            $table->increments('id');
            $table->string('field_id');
            $table->string('vaue');
        });
        
        Schema::create('groups', function($table) {
            $table->increments('id');
            $table->string('name');       
            $table->string('fields');       
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('field_types');
        Schema::dropIfExists('field_values');
        Schema::dropIfExists('fields');
        Schema::dropIfExists('groups');
    }

}
