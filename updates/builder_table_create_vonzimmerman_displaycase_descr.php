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
            $table->string('descr_title');
            $table->integer('sort_order')->unsigned();
            $table->integer('item_id')->unsigned()->nullable()->index();
            $table->text('descr');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vonzimmerman_displaycase_descr');
    }
}
