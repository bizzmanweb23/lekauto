<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GSTDetails extends Model
{
	
    use HasFactory;
	protected $table='gst_details';
    protected $fillable = [
	    'gst_name',
        'gst_charges',
		'unique_id',
		'status',
    ];
}