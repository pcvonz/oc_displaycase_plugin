<?php namespace Vonzimmerman\DisplayCase\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVonzimmermanDisplaycaseLink extends Migration
{
    public function up()
    {
        Schema::table('vonzimmerman_displaycase_link', function($table)
        {
            $table->integer('sort_order')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('vonzimmerman_displaycase_link', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
