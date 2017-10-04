<?php namespace Vonzimmerman\DisplayCase\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVonzimmermanDisplaycaseProfile2 extends Migration
{
    public function up()
    {
        Schema::table('vonzimmerman_displaycase_profile', function($table)
        {
            $table->renameColumn('profile_id', 'id');
        });
    }
    
    public function down()
    {
        Schema::table('vonzimmerman_displaycase_profile', function($table)
        {
            $table->renameColumn('id', 'profile_id');
        });
    }
}
