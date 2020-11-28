<?php

namespace DigitalClosuxe\Business\Profile\Entity
{
    use Illuminate\Database\Eloquent\Model;

    /**
     * Class Profile
     */
    class Profile extends Model
    {
        /** [@inheritdoc] */
        public $timestamps = true;

        /** [@inheritdoc] */
        public $fillable = [
            'crm_ref'
        ];

        /**
         * A Business Profile has one Contact
         */
        public function contact()
        {
            return $this->hasOne(Contact::class, 'profile_id');
        }

        /**
         * A Buisiness Profile has one Account
         */
        public function account()
        {
            return $this->hasOne(Account::class, 'profile_id');
        }
    }
}