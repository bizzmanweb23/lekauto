<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceDetails extends Model
{
	
    use HasFactory;
	protected $table='insurance_details';
    protected $fillable = [
	    'unique_id',
        'insuranceVehicleName',
        'insuranceRegistrationNumber',
        'insuranceStartDate',
		'insuranceEndDate',
		'insuranceType',
		'SKU_Code',
		'insuranceProvider',
		'insuranceValidity'
    ];
}