<?php namespace Vonzimmerman\DisplayCase\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVonzimmermanDisplaycaseLink3 extends Migration
{
    public function up()
    {
        Schema::table('vonzimmerman_displaycase_link', function($table)
        {
            $table->renameColumn('link_id', 'profile_id');
        });
    }
    
    public function down()
    {
        Schema::table('vonzimmerman_displaycase_link', function($table)
        {
            $table->renameColumn('profile_id', 'link_id');
        });
    }
}
