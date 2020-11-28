<?php

use Illuminate\Database\{
    Capsule\Manager as Capsule,
    Migrations\Migration,
    Schema\Blueprint,
};

/**
 * Class CreateProfileContactTable
 */
class CreateProfileContactTable extends Migration
{
    public function up()
    {
        Capsule::schema()->create('profile_contacts', function(Blueprint $table){
            $table->increments('id');

            $table->string('firstname');
            $table->string('lastname');

            $table->integer('profile_id')->unsigned()->index()->nullable();
            $table->foreign('profile_id')->references('id')->on('profiles');

            $table->timestamps();
            
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('profile_contacts');
    }
}