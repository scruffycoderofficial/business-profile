<?php

use Illuminate\Database\{
    Capsule\Manager as Capsule,
    Migrations\Migration,
    Schema\Blueprint,
};

/**
 * Class CreateProfileAccountTable
 */
class CreateProfileAccountTable extends Migration
{
    public function up()
    {
        Capsule::schema()->create('profile_accounts', function(Blueprint $table){
            $table->increments('id');

            $table->string('name', 255);
            $table->string('number', 10);

            $table->integer('profile_id')->unsigned()->index()->nullable();
            $table->foreign('profile_id')->references('id')->on('profiles');

            $table->timestamps();
            
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('profile_accounts');
    }
}