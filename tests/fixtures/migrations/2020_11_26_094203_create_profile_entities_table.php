<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class CreateProfileEntitiesTable extends Migration
{
    public function up()
    {
        Capsule::schema()->create('profile_entities', function(Blueprint $table){
            $table->uuid('uuid');
            $table->string('blueprint');
            $table->string('contract');
            $table->uuid('client_id');

            $table->timestamps();
            
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('profile_entities');
    }
}