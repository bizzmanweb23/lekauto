<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleDetails extends Model
{
	
    use HasFactory;
	protected $table='vehicle_details';
    protected $fillable = [
	    'system_id',
        'vehicle_status',
        'vehicle_number',
        'vehicle_make',
		'vehicle_year',
		'body_type',
		'price_list_make',
		'price_list_model',
		'pricelist_plus',
		'accessory',
		'chasis_number',
		'engine_number',
		'propellant',
		'laden',
		'unladen',
		'enginecap_ton',
		'pax',
		'year_of_manufacture',
		'original_reg_date',
		'color',
		'number_of_tsf',
		'location',
		'incharge_by',
		'entry_date',
		'Created_by',
		'last_modifiedBy',
		'transfer_fee',
		'road_tax',
		'roadTax_expiry',
		'road_tax_type',
		'inspection_expiry',
		'layUp_expiry',
		'coe_logcard',
		'coe_acc',
		'coe_number',
		'coe_expiryDate',
		'coe_to_pay',
		'omv',
		'parf_amount',
		'registeration_fee',
		'arf_amount',
		'cves_surcharge',
		'cevs_rebate',
		'ets_paper_form',
		'use_tcoe',
    ];
}