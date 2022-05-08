<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostDetails extends Model
{
	
    use HasFactory;
	protected $table='cost_details';
    protected $fillable = [
	    'unique_id',
		'vehicle_id',
        'vehicleNameCost',
        'vehicleRegistrationNumberCost',
        'vendorNameCost',
		'cost_description',
		'totalAmount',
		'transaction_type',
		'floor_interest',
    ];
}