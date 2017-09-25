<?php namespace Vonzimmerman\DisplayCase\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVonzimmermanDisplayCaseTag extends Migration
{
    public function up()
    {
        Schema::create('vonzimmerman_displaycase_tag', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vonzimmerman_displaycase_tag');
    }
}
