<?php namespace Vonzimmerman\DisplayCase\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVonzimmermanDisplaycaseLink5 extends Migration
{
    public function up()
    {
        Schema::table('vonzimmerman_displaycase_link', function($table)
        {
            $table->increments('id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('vonzimmerman_displaycase_link', function($table)
        {
            $table->dropColumn('id');
        });
    }
}
