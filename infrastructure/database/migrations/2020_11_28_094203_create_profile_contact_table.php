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

            $table->string('firstname', 255);
            $table->string('lastname', 255);
            $table->string('email_address', 255);
            $table->string('mobile_number', 12);

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