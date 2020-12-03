<?php

namespace DigitalClosuxe\Business\Profile\Entity
{
    use Illuminate\Database\Eloquent\Model;

    /**
     * Class Contact
     */
    class Contact extends Model
    {
        /** [@inheritdoc] */
        public $timestamps = true;

        /** [@inheritdoc] */
        public $table = 'profile_contacts';

        /** [@inheritdoc] */
        public $fillable = [
            'firstname', 'lastname', 'email_address', 'mobile_number', 'profile_id'
        ];

        /**
         * A Business Contact belongs to a Busines Profile
         */
        public function profile()
        {
            return $this->belongsTo(Profile::class);
        }
    }
}