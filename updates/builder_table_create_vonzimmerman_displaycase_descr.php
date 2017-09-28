<?php namespace Vonzimmerman\DisplayCase\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVonzimmermanDisplayCaseDescr extends Migration
{
    public function up()
    {
        Schema::create('vonzimmerman_displaycase_descr', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('descr');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vonzimmerman_displaycase_descr');
    }
}
