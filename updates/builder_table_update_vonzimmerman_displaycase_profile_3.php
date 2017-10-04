<?php namespace Vonzimmerman\DisplayCase\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVonzimmermanDisplaycaseProfile3 extends Migration
{
    public function up()
    {
        Schema::table('vonzimmerman_displaycase_profile', function($table)
        {
            $table->string('profile_key');
        });
    }
    
    public function down()
    {
        Schema::table('vonzimmerman_displaycase_profile', function($table)
        {
            $table->dropColumn('profile_key');
        });
    }
}
