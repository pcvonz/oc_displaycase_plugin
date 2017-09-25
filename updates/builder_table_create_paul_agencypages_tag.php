<?php namespace Paul\AgencyPages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePaulAgencypagesTag extends Migration
{
    public function up()
    {
        Schema::create('paul_agencypages_tag', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('paul_agencypages_tag');
    }
}
