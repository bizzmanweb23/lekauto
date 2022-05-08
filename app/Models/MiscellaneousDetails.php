<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiscellaneousDetails extends Model
{
	
    use HasFactory;
	protected $table='miscellaneous_details';
    protected $fillable = [
	    'unique_id',
		'vehicle_id',
        'vehicleName',
        'vehicleRegistrationNumber',
        'vendorName',
		'description',
		'amount_spent',
		'gst_charges',
		'total_amount'
    ];
}