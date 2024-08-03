<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'client_name',
        'client_email',
        'phone_number',
        'address',
        'city',
        'state',
        'zip_code',
        'country',
        'joined_date',
    ];
}
