<?php namespace Vonzimmerman\DisplayCase\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVonzimmermanDisplaycaseLink4 extends Migration
{
    public function up()
    {
        Schema::table('vonzimmerman_displaycase_link', function($table)
        {
            $table->dropPrimary(['profile_id']);
        });
    }
    
    public function down()
    {
        Schema::table('vonzimmerman_displaycase_link', function($table)
        {
            $table->primary(['profile_id']);
        });
    }
}
