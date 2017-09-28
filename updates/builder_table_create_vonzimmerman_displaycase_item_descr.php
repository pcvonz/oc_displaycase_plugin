<?php namespace Vonzimmerman\DisplayCase\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVonzimmermanDisplayCaseItemDescr extends Migration
{
    public function up()
    {
        Schema::create('vonzimmerman_displaycase_item_descr', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('descr_id');
            $table->integer('item_id');
            $table->primary(['descr_id', 'item_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vonzimmerman_displaycase_item_descr');
    }
}
