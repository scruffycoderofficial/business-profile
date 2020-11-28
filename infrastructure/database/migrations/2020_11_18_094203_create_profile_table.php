<?php

use Illuminate\Database\{
    Capsule\Manager as Capsule,
    Migrations\Migration,
    Schema\Blueprint,
};

/**
 * Class CreateProfileTable
 */
class CreateProfileTable extends Migration
{
    public function up()
    {
        Capsule::schema()->create('profiles', function(Blueprint $table){
            $table->increments('id');

            $table->string('crm_ref');

            $table->timestamps();
            
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('profiles');
    }
}