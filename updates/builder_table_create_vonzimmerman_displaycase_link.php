<?php namespace Vonzimmerman\DisplayCase\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVonzimmermanDisplaycaseLink extends Migration
{
    public function up()
    {
        Schema::create('vonzimmerman_displaycase_link', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('url');
            $table->binary('icon');
            $table->integer('sort_order')->unsigned();
            $table->integer('profile_id')->unsigned()->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vonzimmerman_displaycase_link');
    }
}
