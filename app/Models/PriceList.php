<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
	
    use HasFactory;
	protected $table='price_list';
    protected $fillable = [
        'id_number',
		'unique_id',
		'vehicle_id',
        'vehicle_name',
        'vehicle_registration_number', 
        'broker',
        'veh_no',
        'gst',
        'reg_date',
        'make',
        'model',
        'col',
        'omv_e_tsf',
        'ul_parf',
        'propellant',
        'o',
        'coe',
        'coe_exp',
        'r_tax_exp',
        'price',
        'loc',
];
}