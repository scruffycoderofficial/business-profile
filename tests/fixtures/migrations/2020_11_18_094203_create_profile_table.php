<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class CreateProfileTable extends Migration
{
    public function up()
    {
        Capsule::schema()->create('profiles', function(Blueprint $table){
            $table->uuid('uuid');
            $table->uuid('contact_id')->nullable();
            $table->uuid('account_id')->nullable();

            $table->timestamps();
            
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('profiles');
    }
}