<?php

namespace DigitalClosuxe\Business\Profile\Entity
{
    use Illuminate\Database\Eloquent\Model;

    /**
     * Class Account
     */
    class Account extends Model
    {
        /** [@inheritdoc] */
        public $timestamps = true;

        /** [@inheritdoc] */
        public $table = 'profile_accounts';

        /** [@inheritdoc] */
        public $fillable = [
            'name', 'number', 'profile_id'
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