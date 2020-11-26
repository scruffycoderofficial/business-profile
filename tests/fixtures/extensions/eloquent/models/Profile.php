<?php

namespace DigitalClosuxe\Business\Extension\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use DigitalClosuxe\Business\Profile\Model\Contact;

class Profile extends Model
{
    public $timestamps = true;

    public $fillable = [
        'uuid', 'contact_id', 'account_id'
    ];

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function account()
    {
        return $this->hasOne(Account::class);
    }
}