<?php namespace RainLab\User\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateUsersGroupsTable extends Migration
{

    public function up()
    {
        Schema::create('users_groups', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('user_id')->unsigned();
            $table->integer('user_group_id')->unsigned();
            $table->primary(['user_id', 'user_group_id'], 'user_group');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_groups');
    }

}
