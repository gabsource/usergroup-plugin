<?php namespace RainLab\User\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateUserGroupsTable extends Migration
{

    public function up()
    {
        Schema::create('user_groups', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('code')->unique('code_unique');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_groups');
    }

}
