<?php namespace Paul\AgencyPages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePaulAgencypagesData extends Migration
{
    public function up()
    {
        Schema::create('paul_agencypages_data', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('description')->nullable();
            $table->string('tags')->nullable();
            $table->binary('image');
            $table->string('categories')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->dateTime('date_added')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('paul_agencypages_data');
    }
}
