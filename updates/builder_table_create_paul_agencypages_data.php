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
            $table->string('url')->nullable();
            $table->string('tags')->nullable();
            $table->string('license')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->dateTime('date_added')->nullable();
            $table->boolean('published')->nullable()->default(0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('paul_agencypages_data');
    }
}
