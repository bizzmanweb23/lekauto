<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceProviderDetails extends Model
{
	
    use HasFactory;
	protected $table='insuranceprovider_details';
    protected $fillable = [
	    'insuranceProviderName',      
		'unique_id',
		'status',
    ];
}