<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerDetails extends Model
{
	
    use HasFactory;
	protected $table='buyer_details';
    protected $fillable = [
	    'unique_id',
		'vehicle_id',
		'id_number',
        'delivery_out_date',
		'delivery_time',      
        'invoice_number',
		'pl_date',
		'booking_date',
		'sell_code',
		'sales_agreement_number',
		'sale_agreement_price',
		'buyer_gst',
		'buy_over_date',
		'body_price',
		'ets_transfer_value',
		'ets_paper_buyer',
		'dereg_date',
		'ap_receipt',
		'amount_buyer',
		'bank_buyer',
		'cheque_number_buyer',
		'cheque_date_buyer',
		'sell_to',
		'invoice_number2',
		'transaction_type_buyer',
		'Etransfer_out_date',
		'invoice_date',
		'selling_price',
		'gst_amount_buyer',
		'gst_decimal_adjustment_buyer',
		'gst_amountbefore_adjustment_buyer',
		'total_selling_price',
		'ets_paper_to',
		'coe_encashment',
		'coe_encashment1',
		'parf_encashment',
		'parf_encashment1',
		'ets_paper',
		'invoice_date2',
		'invoice_number3',
		'to_from_who',
		'buyer_remarks',
		'payment_mode',
		'ap_receipt1',
		'amount_buyer1',
		'bank_buyer1',
		'cheque_number_buyer1',
		'cheque_date_buyer1',
		'sell_to1',
		'invoice_number4',
		'to_from_who1',
		'buyer_remarks1',
		'payment_mode1',
		'total_receivable',
		'total_received',
		'ar_balance_buyer',
		'status',
		'Etransfer_out_by',
		'log_card',
    ];
}