<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairDetails extends Model
{
	
    use HasFactory;
	protected $table='repair_details';
    protected $fillable = [
	    'unique_id',
		'vehicle_id',
        'vehicle_name',
        'vehicle_registration_number',
        'vendor_name',
		'repair_cost'
    ];
}