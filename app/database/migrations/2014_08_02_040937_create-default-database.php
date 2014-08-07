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
            $table->string('name', 100);
            $table->string('display');
            $table->integer('value_type')->default(1);
        });
        
        
        Schema::create('fields', function($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('field_type_id');
            $table->string('object_dependences');
            $table->string('field_dependences');
            $table->string('value_in_object');
            $table->string('value_in_field');
            
        });    
        
        
        
        Schema::create('field_values', function($table) {
            $table->increments('id');
            $table->integer('field_id');
            $table->string('value');
            
        });
        
        
        Schema::create('groups', function($table) {
            $table->increments('id');
            $table->string('name');                    
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
        Schema::dropIfExists('field_values');
        Schema::dropIfExists('groups');
    }

}
