<?php

namespace DigitalClosuxe\Business\Extension\Elloquent\Models;


use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = true;

    public $fillables = [
        'uuid', 'name', 'crm_ref'
    ];
}