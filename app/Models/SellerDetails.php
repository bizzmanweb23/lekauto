<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerDetails extends Model
{
	
    use HasFactory;
	protected $table='seller_details';
    protected $fillable = [
	    'id_number',
		'vehicle_id',
        'seller_address',
        'purchase_date',
        'estimate_delivery_date',
		'date_of_delivery',
		'purchase_price',
		'gst',
		'total_purchase_price',
		'agreement_number',
		'settlement_number',
		'note',
		'ap_payment',
		'amount',
		'bank',
		'cheque_number',
		'cheque_date',
		'to_from',
		'unique_id',
		'remarks',
		'transaction_type',
		'DN/CN_Number',
		'DN/CN_Amount',
		'GST_Amount',
		'GST_Decimal_Adjustment',
		'GST_Amount_Before_Adjustment',
		'AP_Balance',
		'P_settlement_Remark',
		'E-Transfer_In_Date',
		'Asking_Price',
		'E-Transfer_By',
		'Alternate_price',
		'Log_card',
		'Alternate',
		'Buy_Code',
		'Trade_In_By',
		'Broker1',
		'Com.Rtn',
		'Return_Date',
		'Broker2',
		'Com.Rtn2',
		'Return_Date2'              
    ];
}