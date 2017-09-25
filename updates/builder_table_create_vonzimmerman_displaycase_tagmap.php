<?php namespace Vonzimmerman\DisplayCase\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVonzimmermanDisplayCaseTagMap extends Migration
{
    public function up()
    {
        Schema::create('vonzimmerman_displaycase_tagmap', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('tags_id');
            $table->integer('item_id');
            $table->primary(['tags_id', 'item_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vonzimmerman_displaycase_tagmap');
    }
}
