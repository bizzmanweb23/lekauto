<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleManufacture extends Model
{
	
    use HasFactory;
	protected $table='manufacture_details';
    protected $fillable = [
	    'vehicleManufactureName',      
		'unique_id',
		'status',
    ];
}