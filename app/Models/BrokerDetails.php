<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrokerDetails extends Model
{
	
    use HasFactory;
	protected $table='broker_details';
    protected $fillable = [
	    'first_name',
        'last_name',
        'address',
        'city',
		'country',
		'landline_number',
		'mobile_number',
		'email_address',
		'unique_id',
		'status',
    ];
}