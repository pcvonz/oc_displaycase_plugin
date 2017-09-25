<?php namespace Paul\AgencyPages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePaulAgencypagesLicenses extends Migration
{
    public function up()
    {
        Schema::create('paul_agencypages_licenses', function($table)
        {
            $table->engine = 'InnoDB';
            $table->string('license')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('paul_agencypages_licenses');
    }
}
