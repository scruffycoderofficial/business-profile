<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class CreateProfileTable extends Migration
{
    public function up()
    {
        Capsule::schema()->create('profiles', function(Blueprint $table){
            $table->increments('id');
            $table->bigInteger('contact_id');
            $table->bigInteger('account_id');

            $table->timestamps();
            
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('profiles');
    }
}