<?php namespace Vonzimmerman\DisplayCase\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVonzimmermanDisplaycaseProfile extends Migration
{
    public function up()
    {
        Schema::create('vonzimmerman_displaycase_profile', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->text('occupation');
            $table->text('description');
            $table->text('links');
            $table->string('profile_key');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vonzimmerman_displaycase_profile');
    }
}
