<?php namespace Vonzimmerman\DisplayCase\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVonzimmermanDisplaycaseProfile extends Migration
{
    public function up()
    {
        Schema::table('vonzimmerman_displaycase_profile', function($table)
        {
            $table->increments('profile_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('vonzimmerman_displaycase_profile', function($table)
        {
            $table->dropColumn('profile_id');
        });
    }
}
