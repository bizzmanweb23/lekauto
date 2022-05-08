<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostTypeDetails extends Model
{
	
    use HasFactory;
	protected $table='costtype_details';
    protected $fillable = [
	    'costType',      
		'unique_id',
		'status',
    ];
}