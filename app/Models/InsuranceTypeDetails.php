<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceTypeDetails extends Model
{
	
    use HasFactory;
	protected $table='insurancetype_details';
    protected $fillable = [
	    'insuranceType',      
		'unique_id',
		'status',
    ];
}