<?php namespace Vonzimmerman\DisplayCase\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVonzimmermanDisplayCaseLicenses extends Migration
{
    public function up()
    {
        Schema::create('vonzimmerman_displaycase_licenses', function($table)
        {
            $table->engine = 'InnoDB';
            $table->string('license')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vonzimmerman_displaycase_licenses');
    }
}
