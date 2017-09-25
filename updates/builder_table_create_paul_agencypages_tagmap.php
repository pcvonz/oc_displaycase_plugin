<?php namespace Paul\AgencyPages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePaulAgencypagesTagMap extends Migration
{
    public function up()
    {
        Schema::create('paul_agencypages_tagmap', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('tags_id');
            $table->integer('item_id');
            $table->primary(['tags_id', 'item_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('paul_agencypages_tagmap');
    }
}
