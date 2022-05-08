<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleDetails;
use App\Models\BuyerDetails;
use App\Models\RepairDetails;
use App\Models\SellerDetails;
use App\Models\PriceList;
use App\Models\MiscellaneousDetails;
use App\Models\BrokerDetails;
use App\Models\CostDetails;
use App\Models\GSTDetails;
use App\Models\CostTypeDetails;
use App\Models\InsuranceProviderDetails;
use App\Models\InsuranceTypeDetails;
use App\Models\InsuranceDetails;
use App\Models\VehicleManufacture;
use DB;
use Illuminate\Http\Request;

class AdminVehicleDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
	    $data['vehicle']=VehicleDetails::select('*')
		                     ->get();
		$data['gst']=GSTDetails::select('*')
		                     ->get();
		$data['costtype']=CostTypeDetails::select('*')
		                                 ->get();
		$data['vehicleName']=VehicleManufacture::select('*')
		                                       ->get();
		//echo '<pre>';print_r($data);die;
        return view('admin.details.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $vehicle_data = $request->validate([
			'system_id'             => ['required', 'string', 'max:255'],
            'vehicle_status'        => ['required', 'string', 'max:255'],
            'vehicle_number'        => ['required', 'string', 'max:255'],
            'vehicle_make'          => ['required', 'string', 'max:255'],
            'vehicle_year'          => ['required', 'numeric'],
            'body_type'             => ['required', 'string', 'max:255'],
            'price_list_make'       => ['required', 'string', 'max:255'],
            'price_list_model'      => ['required', 'string', 'max:255'],
            'pricelist_plus'        => ['required', 'string', 'max:255'],
            'accessory'             => ['required', 'string', 'max:255'],
            'chasis_number'         => ['required', 'string', 'max:255'],
            'engine_number'         => ['required', 'string','max:255'],
            'propellant'            => ['required', 'string','max:255'],
            'laden'                 => ['required', 'string', 'max:255'],
            'unladen'               => ['required', 'string','max:255'],
            'enginecap_ton'         => ['required', 'string','max:255'],
            'pax'                   => ['required', 'string','max:255'],
            'year_of_manufacture'   => ['required', 'numeric'],
            'original_reg_date'     => ['required', 'string', 'max:255'],
            'color'                 => ['required', 'string', 'max:255'],
            'number_of_tsf'         => ['required', 'numeric'],
            'location'              => ['required', 'string', 'max:255'],
            'incharge_by'           => ['required', 'string', 'max:255'],
            'entry_date'            => ['required', 'string', 'max:255'],
            'Created_by'            => ['required', 'string', 'max:255'],
            'last_modifiedBy'       => ['required', 'string', 'max:255'],
            'transfer_fee'          => ['required', 'numeric'],
            'road_tax'              => ['required', 'string', 'max:255'],
            'roadTax_expiry'        => ['required', 'string', 'max:255'],
            'road_tax_type'         => ['required', 'string', 'max:255'],
            'inspection_expiry'     => ['required', 'string', 'max:255'],
            'layUp_expiry'          => ['required', 'string', 'max:255'],
            'coe_logcard'           => ['required', 'string', 'max:255'],
            'coe_acc'               => ['required', 'string', 'max:255'],
            'coe_number'            => ['required', 'string', 'max:255'],
            'coe_expiryDate'        => ['required', 'string', 'max:255'],
            'coe_to_pay'            => ['required', 'string', 'max:255'],
            'omv'                   => ['required', 'string', 'max:255'],
            'parf_amount'           => ['required', 'string', 'max:255'],
            'registeration_fee'     => ['required', 'string', 'max:255'],
            'arf_amount'            => ['required', 'string', 'max:255'],
            'cves_surcharge'        => ['required', 'string', 'max:255'],
            'cevs_rebate'           => ['required', 'string', 'max:255'],
            'ets_paper_form'        => ['required', 'string', 'max:255'],
            'use_tcoe'              => ['required', 'string', 'max:255'],
        ], [
		    'vehicle_number.required'       => 'Please Enter Vehicle Number',
            'vehicle_make.required'         => 'Please Select Vehicle Company Name',
            'name_model.required'           => 'Please Select Vehicle Name',
            'vehicle_year.required'         => 'Please Select Vehicle Model',
            'vehicle_year.required'         => 'Please Select Vehicle Year',
            'body_type.required'            => 'Please Enter Body Type',
            'price_list_make.required'      => 'Please Select Vehicle For Price List',
            'chasis_number.required'        => 'Please Enter Chasis Number',
            'engine_number.required'        => 'Please Enter Engine Number',
            'original_reg_date.required'    => 'Please Enter Original Register Date',
            'inspection_expiry.required'    => 'Please Select Inspection Expiry Date',
            'coe_logcard.required'          => 'Please Enter COE Logcard',
        ]);
		   $unique_id = VehicleDetails::orderBy('id', 'desc')->first();
           $number = str_replace('GVU', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'GVU0000001';
           } else {
            $number = "GVU" . sprintf("%07d", (int)$number + 1);
           }
		   $vehicle_data['unique_id']=$number;
		   //echo '<pre>';print_r($vehicle_data);die;
		   $data=VehicleDetails::insert($vehicle_data);
		   echo json_encode(['status' => 'success', 'message' => 'Vehicle Details Succesfully Submitted']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showData()
    {
        $result=VehicleDetails::select('*')
		                    ->where('id',$_GET['id'])
							->get();
		//echo'<pre>';print_r($data);die;
		foreach($result as $data){
			$arr[]=array(
			'vehicle_number' => $data->vehicle_number,
	   'previous_vehicle_no' => $data->previous_vehicle_no,
	            'name_model' => $data->name_model,
			  'reg_road_tax' => $data->reg_road_tax,
			     'body_type' => $data->body_type,
				'chassis_no' => $data->chassis_no,
				 'engine_no' => $data->engine_no,
				'propellant' => $data->propellant,
		 'original_reg_date' => $data->original_reg_date,
		            'colour' => $data->colour,
			   'coe_logcard' => $data->coe_logcard,
			       'coe_pqp' => $data->coe_pqp,
				   'reg_fee' => $data->reg_fee,
				'arf_amount' => $data->arf_amount,
				       'omv' => $data->omv,
			   'cves_rebate' => $data->cves_rebate,
			'ets_paper_from' => $data->ets_paper_from,
			      'use_tcoe' => $data->use_tcoe
			);
		}
		 echo json_encode($data);
		}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	 public function save_buyer_details(Request $request)
	 {
		$vehicleID = $request->id;
		$buyer_data = $request->validate([
			'id_number'                => ['required', 'string', 'max:255'],
            'buyer_address'            => ['required', 'string', 'max:255'],
            'buyer_delivery_out_date'  => ['required', 'string', 'max:255'],
            'buyer_time_of_delivery'   => ['required', 'string', 'max:255'],
            'invoice_number'           => ['required', 'string', 'max:255'],
            'pl_date'                  => ['required', 'string', 'max:255'],
            'date_of_booking'          => ['required', 'string', 'max:255'],
            'sell_code'                => ['required', 'string', 'max:255'],
            'sale_agreement_number'    => ['required', 'string', 'max:255'],
            'sale_agreement_price'     => ['required', 'numeric'],
            'buyer_gst'                => ['required', 'string', 'max:255'],
            'outside_sale_comm'        => ['required', 'string', 'max:255'],
            'ets_paper_form'           => ['required', 'string', 'max:255'],
            'buy_over_date'            => ['required', 'string', 'max:255'],
            'ets_purchase_price'       => ['required', 'string', 'max:255'],
            'body_price'               => ['required', 'numeric'],
            'transfer_value'           => ['required', 'string', 'max:255'],
            'ets_pur_comm'             => ['required', 'string', 'max:255'],
            'ets_out_comm'             => ['required', 'string', 'max:255'],
            'ets_paper_buyer'          => ['required', 'string', 'max:255'],
            'dereg_date'               => ['required', 'string', 'max:255'],
            's_no'                     => ['required', 'string', 'max:255'],
            'ap_receipt'               => ['required', 'string', 'max:255'],
            'acc_desc'                 => ['required', 'string', 'max:255'],
            'amount'                   => ['required', 'numeric'],
            'bank'                     => ['required', 'string', 'max:255'],
            'cheque_number'            => ['required', 'string', 'max:255'],
            'cheque_date'              => ['required', 'string', 'max:255'],
            'sell_to'                  => ['required', 'string', 'max:255'],
            'invoice_number2'          => ['required', 'string', 'max:255'],
            'buyer_transaction_type'   => ['required', 'string', 'max:255'],
            'btransaction_date'        => ['required', 'string', 'max:255'],
        ], [
		    'id_number.required'                 => 'Please Enter ID Number',
            'buyer_address.required'             => 'Please Enter Address',
            'buyer_delivery_out_date.required'   => 'Please Select Delivery Date',
            'buyer_time_of_delivery.required'    => 'Please Select Delivery Time',
            'invoice_number.required'            => 'Please Enter Invoice Number',
            'pl_date.required'                   => 'Please Select P&L Date',
            'date_of_booking.required'           => 'Please Select Booking Date',
            'sell_code.required'                 => 'Please Enter Sell Code',
            'sale_agreement_number.required'     => 'Please Enter Sale Agreement Number',
            'sale_agreement_price.required'      => 'Please Enter Sale Agreement Price',
            'buyer_gst.required'                 => 'Please Select GST',
            'outside_sale_comm.required'         => 'Please Enter Outside Sale Comm',
            'ets_paper_form.required'            => 'Please Enter ETS Paper Form',
            'buy_over_date.required'             => 'Please Select Buy Over Date',
            'ets_purchase_price.required'        => 'Please Enter ETS Purchase Price',
            'body_price.required'                => 'Please Enter Body Price',
            'transfer_value.required'            => 'Please Enter Transfer Value',
            'ets_pur_comm.required'              => 'Please Enter ETS Pur Comm',
            'ets_out_comm.required'              => 'Please Enter ETS Out Comm',
            'ets_paper_buyer.required'           => 'Please Enter ETS Paper Buyer',
            'dereg_date.required'                => 'Please Select Dereg Date',
            's_no.required'                      => 'Please Enter S No.',
            'ap_receipt.required'                => 'Please Enter AP Recipt',
            'acc_desc.required'                  => 'Please Enter Acc Desc',
            'amount.required'                    => 'Please Enter Amount',
            'bank.required'                      => 'Please Enter Bank',
            'cheque_number.required'             => 'Please Enter Cheque Number',
            'cheque_date.required'               => 'Please Select Cheque Date',
            'sell_to.required'                   => 'Please Enter Sell To',
            'invoice_number2.required'           => 'Please Enter Invoice Number',
            'buyer_transaction_type.required'    => 'Please Select Buyer Transaction Type',
            'btransaction_date.required'         => 'Please Select Transaction Date',
        ]);
		   $unique_id = BuyerDetails::orderBy('id', 'desc')->first();
           $number = str_replace('LAB', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'LAB0000001';
           } else {
            $number = "LAB" . sprintf("%07d", (int)$number + 1);
           }
		   $buyer_data['unique_id']=$number;
		   $buyer_data['vehicle_id']=$vehicleID;
		  // echo '<pre>';print_r($buyer_data);die;
		   $data=BuyerDetails::insert($buyer_data);
		   echo json_encode(['status' => 'success', 'message' => 'Buyer Details Succesfully Submitted']); 
	 }
	 
	public function save_seller_details(Request $request)
	{
		//echo '<pre>';print_r($request->all());die;
		$vehicleSellerID = $request->id;
		$seller_data = $request->validate([
			'id_number'                => ['required', 'string', 'max:255'],
            'seller_address'           => ['required', 'string', 'max:255'],
            'purchase_date'            => ['required', 'string', 'max:255'],
            'estimate_delivery_date'   => ['required', 'string', 'max:255'],
            'seller_date_of_delivery'  => ['required', 'string', 'max:255'],
            'seller_time_of_delivery'  => ['required', 'string', 'max:255'],
            'purchase_price'           => ['required', 'string', 'max:255'],
            'seller_gst'               => ['required', 'string', 'max:255'],
            'total_purchase_price'     => ['required', 'string', 'max:255'],
            'outside_purchase_comm'    => ['required', 'numeric'],
            'agreement_number'         => ['required', 'string', 'max:255'],
            'seller_note'              => ['required', 'string', 'max:255'],
            's_no'                     => ['required', 'string', 'max:255'],
            'ap_payment'               => ['required', 'string', 'max:255'],
            'acc_desc'                 => ['required', 'string', 'max:255'],
            'amount'                   => ['required', 'numeric'],
            'bank'                     => ['required', 'string', 'max:255'],
            'cheque_number'            => ['required', 'string', 'max:255'],
            'cheque_date'              => ['required', 'string', 'max:255'],
            'to_from'                  => ['required', 'string', 'max:255'],
            'seller_remarks'           => ['required', 'string', 'max:255'],
            'transaction_type'         => ['required', 'string', 'max:255'],
            'transaction_date'         => ['required', 'string', 'max:255'],
        ], [
		    'id_number.required'                 => 'Please Enter ID Number',
            'seller_address.required'            => 'Please Enter Address',
            'purchase_date.required'             => 'Please Select Purchase Date',
            'estimate_delivery_date.required'    => 'Please Select Estimate Delivery Date',
            'seller_date_of_delivery.required'   => 'Please Select Date Of Delivery',
            'seller_time_of_delivery.required'   => 'Please Select Time Of Delivery',
            'purchase_price.required'            => 'Please Enter Purchase Price',
            'seller_gst.required'                => 'Please Select GST Type',
            'total_purchase_price.required'      => 'Please Enter Total Purchase Price',
            'outside_purchase_comm.required'     => 'Please Enter Outside Purchase Comm',
            'agreement_number.required'          => 'Please Enter Agreement Number',
            'seller_note.required'               => 'Please Enter Notes',
            's_no.required'                      => 'Please Enter S No.',
            'ap_payment.required'                => 'Please Enter AP Payment',
            'acc_desc.required'                  => 'Please Enter Acc Desc',
            'amount.required'                    => 'Please Enter Amount',
            'bank.required'                      => 'Please Enter Bank',
            'cheque_number.required'             => 'Please Enter Cheque Number',
            'cheque_date.required'               => 'Please Select Cheque Date',
            'to_from.required'                   => 'Please Enter To/From',
            'seller_remarks.required'            => 'Please Enter Remarks',
            'transaction_type.required'          => 'Please Select Transaction Type',
            'transaction_date.required'          => 'Please Select Transaction Date',
        ]);
		   $unique_id = SellerDetails::orderBy('id', 'desc')->first();
           $number = str_replace('LAS', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'LAS0000001';
           } else {
            $number = "LAS" . sprintf("%07d", (int)$number + 1);
           }
		   $seller_data['unique_id']=$number;
		   $seller_data['vehicle_id']=$vehicleSellerID;
		   $data=SellerDetails::insert($seller_data);
		   echo json_encode(['status' => 'success', 'message' => 'Vehicle Details Succesfully Submitted']);
	}
    
	public function edit($id)
    {
        //
    }
	
	
	Public function whole_vehicle_details()
	{
		$result['vehicle']=VehicleDetails::select('*')
							->where('vehicle_details.id',$_GET['id'])
							->get();
        $result['pricelist']=PriceList::select('*')
							->where('price_list.vehicle_id',$_GET['id'])
							->get(); 
	    $result['seller']=SellerDetails::select('*')
							->where('seller_details.vehicle_id',$_GET['id'])
							->get();
	    $result['buyer']=BuyerDetails::select('*')
							->where('buyer_details.vehicle_id',$_GET['id'])
							->get();
		$result['repair']=RepairDetails::select('*')
		                  ->where('repair_details.vehicle_id',$_GET['id'])
						  ->get();
		$result['miscellaneous']=MiscellaneousDetails::select('*')
		                         ->where('miscellaneous_details.vehicle_id',$_GET['id'])
								 ->get();
		$result['cost']=CostDetails::select('*')
		                         ->where('cost_details.vehicle_id',$_GET['id'])
								 ->get();
		$result['gst']=GSTDetails::select('*')
		                     ->get();
		$result['costtype']=CostTypeDetails::select('*')
		                                   ->get();
		$result['type']=InsuranceTypeDetails::get();
		$result['provider']=InsuranceProviderDetails::get();
		$result['vehicleName']=VehicleManufacture::select('*')
		                                       ->get();
		//echo '<pre>'; print_r($result);die;
		return view('admin.edit.index',$result);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	 public function get_vehicle_details()
	 {
		$output['vehicle']=VehicleDetails::select('*')
							->where('vehicle_details.id',$_GET['id'])
							->get();
        $output['pricelist']=PriceList::select('*')
							->where('price_list.id',$_GET['id'])
							->get();                    
		$output['seller']=SellerDetails::select('*')
							->where('seller_details.vehicle_id',$_GET['id'])
							->get();
	    $output['buyer']=BuyerDetails::select('*')
							->where('buyer_details.vehicle_id',$_GET['id'])
							->get();
	    $output['repair']=RepairDetails::select('*')
		                  ->where('repair_details.vehicle_id',$_GET['id'])
						  ->get();
		$output['miscellaneous']=MiscellaneousDetails::select('*')
		                         ->where('miscellaneous_details.vehicle_id',$_GET['id'])
								 ->get();
	    $output['cost']=CostDetails::select('*')
		                         ->where('cost_details.vehicle_id',$_GET['id'])
								 ->get();
		$output['costtype']=CostTypeDetails::select('*')
		                                   ->get();
		//echo '<pre>';print_r($output['miscellaneous']);die;
		return view('admin.view.index',$output);
	 }
	 
	 public function edit_vehicle_details(Request $request)
	 {
		 $id = $request->id;
		 //echo '<pre>'; print_r($request->all());die;
		$buyer_edit_data = $request->validate([
			'id_number'                => ['required', 'string', 'max:255'],
            'buyer_address'            => ['required', 'string', 'max:255'],
            'buyer_delivery_out_date'  => ['required', 'string', 'max:255'],
            'buyer_time_of_delivery'  => ['required', 'string', 'max:255'],
            'invoice_number'           => ['required', 'string', 'max:255'],
            'pl_date'                  => ['required', 'string', 'max:255'],
            'date_of_booking'          => ['required', 'string', 'max:255'],
            'sell_code'                => ['required', 'string', 'max:255'],
            'sale_agreement_number'    => ['required', 'string', 'max:255'],
            'sale_agreement_price'     => ['required', 'numeric'],
            'buyer_gst'                => ['required', 'string', 'max:255'],
            'outside_sale_comm'        => ['required', 'string', 'max:255'],
            'ets_paper_form'           => ['required', 'string', 'max:255'],
            'buy_over_date'            => ['required', 'string', 'max:255'],
            'ets_purchase_price'       => ['required', 'string', 'max:255'],
            'body_price'               => ['required', 'numeric'],
            'transfer_value'           => ['required', 'string', 'max:255'],
            'ets_pur_comm'             => ['required', 'string', 'max:255'],
            'ets_out_comm'             => ['required', 'string', 'max:255'],
            'ets_paper_buyer'          => ['required', 'string', 'max:255'],
            'dereg_date'               => ['required', 'string', 'max:255'],
            's_no'                     => ['required', 'string', 'max:255'],
            'ap_receipt'               => ['required', 'string', 'max:255'],
            'acc_desc'                 => ['required', 'string', 'max:255'],
            'amount'                   => ['required', 'numeric'],
            'bank'                     => ['required', 'string', 'max:255'],
            'cheque_number'            => ['required', 'string', 'max:255'],
            'cheque_date'              => ['required', 'string', 'max:255'],
            'sell_to'                  => ['required', 'string', 'max:255'],
            'invoice_number2'          => ['required', 'string', 'max:255'],
            'buyer_transaction_type'   => ['required', 'string', 'max:255'],
            'btransaction_date'        => ['required', 'string', 'max:255'],
			'id_number'                => ['required', 'string', 'max:255'],
            'seller_address'           => ['required', 'string', 'max:255'],
            'purchase_date'            => ['required', 'string', 'max:255'],
            'estimate_delivery_date'   => ['required', 'string', 'max:255'],
            'seller_date_of_delivery'  => ['required', 'string', 'max:255'],
            'seller_time_of_delivery'  => ['required', 'string', 'max:255'],
            'purchase_price'           => ['required', 'string', 'max:255'],
            'seller_gst'               => ['required', 'string', 'max:255'],
            'total_purchase_price'     => ['required', 'string', 'max:255'],
            'outside_purchase_comm'    => ['required', 'numeric'],
            'agreement_number'         => ['required', 'string', 'max:255'],
            'seller_note'              => ['required', 'string', 'max:255'],
            's_no'                     => ['required', 'string', 'max:255'],
            'ap_payment'               => ['required', 'string', 'max:255'],
            'acc_desc'                 => ['required', 'string', 'max:255'],
            'amount'                   => ['required', 'numeric'],
            'bank'                     => ['required', 'string', 'max:255'],
            'cheque_number'            => ['required', 'string', 'max:255'],
            'cheque_date'              => ['required', 'string', 'max:255'],
            'to_from'                  => ['required', 'string', 'max:255'],
            'seller_remarks'           => ['required', 'string', 'max:255'],
			'transaction_type'         => ['required', 'string', 'max:255'],
            'transaction_date'         => ['required', 'string', 'max:255'],
			'vehicle_number'        => ['required', 'string', 'max:255'],
            'previous_vehicle_no'   => ['required', 'string', 'max:255'],
            'name_model'            => ['required', 'string', 'max:255'],
            'reg_road_tax'          => ['required', 'numeric'],
            'body_type'             => ['required', 'string', 'max:255'],
            'chassis_no'            => ['required', 'string', 'max:255'],
            'engine_no'             => ['required', 'string', 'max:255'],
            'propellant'            => ['required', 'string', 'max:255'],
            'original_reg_date'     => ['required', 'string', 'max:255'],
            'colour'                => ['required', 'string', 'max:255'],
            'number_of_owner'       => ['required', 'numeric'],
            'coe_logcard'           => ['required', 'numeric'],
            'coe_pqp'               => ['required', 'string', 'max:255'],
            'reg_fee'               => ['required', 'numeric'],
            'arf_amount'            => ['required', 'numeric'],
            'omv'                   => ['required', 'numeric'],
            'cves_rebate'           => ['required', 'numeric'],
            'ets_paper_from'        => ['required', 'string', 'max:255'],
            'use_tcoe'              => ['required', 'string', 'max:255'],
			'vehicle_name'                  => ['required'],
            'vehicle_registration_number'   => ['required'],
            'vendor_name'                   => ['required'],
            'repair_cost'                   => ['required'],
			'vehicleName'                   => ['required'],
            'vehicleRegistrationNumber'     => ['required'],
            'vendorName'                    => ['required'],
            'miscellaneous_description'     => ['required'],
            'amount_spent'                  => ['required'],
            'gst_charges'                   => ['required'],
            'total_amount'                  => ['required'],
			'vehicleNameCost'               => ['required'],
            'costType'                    => ['required'],
         'vendorNameCost'                   => ['required'],
            'cost_description'              => ['required'],                                            
       'transaction_type'                   => ['required'],
            'totalAmount'                   => ['required'],
        ], [
		    'id_number.required'                 => 'Please Enter ID Number',
            'buyer_address.required'             => 'Please Enter Address',
            'buyer_delivery_out_date.required'   => 'Please Select Delivery Date',
            'buyer_time_of_delivery.required'    => 'Please Select Delivery Date',
            'invoice_number.required'            => 'Please Enter Invoice Number',
            'pl_date.required'                   => 'Please Select P&L Date',
            'date_of_booking.required'           => 'Please Select Booking Date',
            'sell_code.required'                 => 'Please Enter Sell Code',
            'sale_agreement_number.required'     => 'Please Enter Sale Agreement Number',
            'sale_agreement_price.required'      => 'Please Enter Sale Agreement Price',
            'buyer_gst.required'                 => 'Please Select GST',
            'outside_sale_comm.required'         => 'Please Enter Outside Sale Comm',
            'ets_paper_form.required'            => 'Please Enter ETS Paper Form',
            'buy_over_date.required'             => 'Please Select Buy Over Date',
            'ets_purchase_price.required'        => 'Please Enter ETS Purchase Price',
            'body_price.required'                => 'Please Enter Body Price',
            'transfer_value.required'            => 'Please Enter Transfer Value',
            'ets_pur_comm.required'              => 'Please Enter ETS Pur Comm',
            'ets_out_comm.required'              => 'Please Enter ETS Out Comm',
            'ets_paper_buyer.required'           => 'Please Enter ETS Paper Buyer',
            'dereg_date.required'                => 'Please Select Dereg Date',
            's_no.required'                      => 'Please Enter S No.',
            'ap_receipt.required'                => 'Please Enter AP Recipt',
            'acc_desc.required'                  => 'Please Enter Acc Desc',
            'amount.required'                    => 'Please Enter Amount',
            'bank.required'                      => 'Please Enter Bank',
            'cheque_number.required'             => 'Please Enter Cheque Number',
            'cheque_date.required'               => 'Please Select Cheque Date',
            'sell_to.required'                   => 'Please Enter Sell To',
            'invoice_number2.required'           => 'Please Enter Invoice Number',
            'buyer_transaction_type.required'    => 'Please Enter Invoice Number',
            'btransaction_date.required'         => 'Please Enter Invoice Number',
			'id_number.required'                 => 'Please Enter ID Number',
            'seller_address.required'            => 'Please Enter Address',
            'purchase_date.required'             => 'Please Select Purchase Date',
            'estimate_delivery_date.required'    => 'Please Select Estimate Delivery Date',
            'seller_date_of_delivery.required'   => 'Please Select Date Of Delivery',
            'purchase_price.required'            => 'Please Enter Purchase Price',
            'seller_gst.required'                => 'Please Select GST Type',
            'total_purchase_price.required'      => 'Please Enter Total Purchase Price',
            'outside_purchase_comm.required'     => 'Please Enter Outside Purchase Comm',
            'agreement_number.required'          => 'Please Enter Agreement Number',
            'seller_note.required'                      => 'Please Enter Notes',
            's_no.required'                      => 'Please Enter S No.',
            'ap_payment.required'                => 'Please Enter AP Payment',
            'acc_desc.required'                  => 'Please Enter Acc Desc',
            'amount.required'                    => 'Please Enter Amount',
            'bank.required'                      => 'Please Enter Bank',
            'cheque_number.required'             => 'Please Enter Cheque Number',
            'cheque_date.required'               => 'Please Select Cheque Date',
            'to_from.required'                   => 'Please Enter To/From',
            'seller_remarks.required'                   => 'Please Enter Remarks',
			'vehicle_number.required'         => 'Please Enter Vehile Number',
            'previous_vehicle_no.required'  => 'Please Enter Previous Vehicle Number',
            'name_model.required'           => 'Please Enter Name And Model',
            'reg_road_tax.required'         => 'Please Enter Reg Road Tax',
            'body_type.required'            => 'Please Enter Body Type',
            'chassis_no.required'           => 'Please Enter Chassis Number',
            'engine_no.required'            => 'Please Enter Engine Number',
            'propellant.required'           => 'Please Enter Propelant',
            'original_reg_date.required'    => 'Please Enter Original Reg Date',
            'colour.required'               => 'Please Enter Color',
            'number_of_owner.required'      => 'Please Enter Number Of Owner',
            'coe_logcard.required'          => 'Please Enter COE Logcard',
            'coe_pqp.required'              => 'Please Enter COE PQP',
            'reg_fee.required'              => 'Please Enter Registration Fee',
            'arf_amount.required'           => 'Please Enter ARF Amount',
            'omv.required'                  => 'Please Enter OMV',
            'cves_rebate.required'          => 'Please Enter CVES Rebate',
            'ets_paper_from.required'       => 'Please Enter ETS Paper From',
            'use_tcoe.required'             => 'Please Enter Use TCOE',
			'vehicle_name.required'         => 'Please Enter Vehicle Name',
    'vehicle_registration_number.required'  => 'Please Enter Vehicle Registration Number',
    'vendor_name.required'                  => 'Please Enter Vendor Name',
    'repair_cost.required'                  => 'Please Enter Repair Cost',
	'vehicleName.required'                  => 'Please Enter Vehicle Name',
    'vehicleRegistrationNumber.required'    => 'Please Enter Vehicle Registration Number',
            'vendorName.required'           => 'Please Enter Vendor Name',
    'miscellaneous_description.required'    => 'Please Enter Description',
            'amount_spent.required'         => 'Please Enter Spent Amount',
            'gst_charges.required'          => 'Please Enter GST Charges',
            'total_amount.required'         => 'Please Enter Total Amount',
			'vehicleName.required'          => 'Please Enter Vehicle Name',
            'costType.required'           => 'Please Select Cost Type',
            'vendorName.required'           => 'Please Enter Vendor Name',
    'miscellaneous_description.required'    => 'Please Enter Description',
       'transaction_type.required'          => 'Please Select Transaction Type',                                            
       'totalAmount.required'               => 'Please Enter Total Amount',
		]);
		    $buyerArr=array(
			'id_number'                => $_POST['id_number'],
            'buyer_address'            => $_POST['buyer_address'],
            'buyer_delivery_out_date'  => $_POST['buyer_delivery_out_date'],
            'buyer_time_of_delivery'   => $_POST['buyer_time_of_delivery'],
            'invoice_number'           => $_POST['invoice_number'],
            'pl_date'                  => $_POST['pl_date'],
            'date_of_booking'          => $_POST['date_of_booking'],
            'sell_code'                => $_POST['sell_code'],
            'sale_agreement_number'    => $_POST['sale_agreement_number'],
            'sale_agreement_price'     => $_POST['sale_agreement_price'],
            'buyer_gst'                => $_POST['buyer_gst'],
            'outside_sale_comm'        => $_POST['outside_sale_comm'],
            'ets_paper_form'           => $_POST['ets_paper_form'],
            'buy_over_date'            => $_POST['buy_over_date'],
            'ets_purchase_price'       => $_POST['ets_purchase_price'],
            'body_price'               => $_POST['body_price'],
            'transfer_value'           => $_POST['transfer_value'],
            'ets_pur_comm'             => $_POST['ets_pur_comm'],
            'ets_out_comm'             => $_POST['ets_out_comm'],
            'ets_paper_buyer'          => $_POST['ets_paper_buyer'],
            'dereg_date'               => $_POST['dereg_date'],
            's_no'                     => $_POST['s_no'],
            'ap_receipt'               => $_POST['ap_receipt'],
            'acc_desc'                 => $_POST['acc_desc'],
            'amount'                   => $_POST['amount'],
            'bank'                     => $_POST['bank'],
            'cheque_number'            => $_POST['cheque_number'],
            'cheque_date'              => $_POST['cheque_date'],
            'sell_to'                  => $_POST['sell_to'],
            'invoice_number2'          => $_POST['invoice_number2'],
            'buyer_transaction_type'   => $_POST['buyer_transaction_type'],
            'btransaction_date'        => $_POST['btransaction_date'],
			);
			
			$sellerArr=array(
			'id_number'                => $_POST['id_number'],
            'seller_address'           => $_POST['seller_address'],
            'purchase_date'            => $_POST['purchase_date'],
            'estimate_delivery_date'   => $_POST['estimate_delivery_date'],
            'seller_date_of_delivery'  => $_POST['seller_date_of_delivery'],
            'seller_time_of_delivery'  => $_POST['seller_time_of_delivery'],
            'purchase_price'           => $_POST['purchase_price'],
            'seller_gst'               => $_POST['seller_gst'],
            'total_purchase_price'     => $_POST['total_purchase_price'],
            'outside_purchase_comm'    => $_POST['outside_purchase_comm'],
            'agreement_number'         => $_POST['agreement_number'],
            'seller_note'              => $_POST['seller_note'],
            's_no'                     => $_POST['s_no'],
            'ap_payment'               => $_POST['ap_payment'],
            'acc_desc'                 => $_POST['acc_desc'],
            'amount'                   => $_POST['amount'],
            'bank'                     => $_POST['bank'],
            'cheque_number'            => $_POST['cheque_number'],
            'cheque_date'              => $_POST['cheque_date'],
            'to_from'                  => $_POST['to_from'],
            'seller_remarks'           => $_POST['seller_remarks'],
			'transaction_type'         => $_POST['transaction_type'],
			'transaction_date'         => $_POST['transaction_date'],
			);
			
			$vehicleArr=array(
			'vehicle_number'        => $_POST['vehicle_number'],
            'previous_vehicle_no'   => $_POST['previous_vehicle_no'],
            'name_model'            => $_POST['name_model'],
            'reg_road_tax'          => $_POST['reg_road_tax'],
            'body_type'             => $_POST['body_type'],
            'chassis_no'            => $_POST['chassis_no'],
            'engine_no'             => $_POST['engine_no'],
            'propellant'            => $_POST['propellant'],
            'original_reg_date'     => $_POST['original_reg_date'],
            'colour'                => $_POST['colour'],
            'number_of_owner'       => $_POST['number_of_owner'],
            'coe_logcard'           => $_POST['coe_logcard'],
            'coe_pqp'               => $_POST['coe_pqp'],
            'reg_fee'               => $_POST['reg_fee'],
            'arf_amount'            => $_POST['arf_amount'],
            'omv'                   => $_POST['omv'],
            'cves_rebate'           => $_POST['cves_rebate'],
            'ets_paper_from'        => $_POST['ets_paper_from'],
            'use_tcoe'              => $_POST['use_tcoe']
			);
						
			for($i=0;$i<count($_POST['vehicle_name']);$i++)
			{
				$repairArr=array(
				'vehicle_name'=>$_POST['vehicle_name'][$i],
				'vehicle_registration_number'=>$_POST['vehicle_registration_number'][$i],
				'vendor_name'=>$_POST['vendor_name'][$i],
				'repair_cost'=>$_POST['repair_cost'][$i],
				);
				//echo '<pre>';print_r($repairArr);die;
				$data=RepairDetails::where('vehicle_id',$id)->where('id',$_POST['repairEditID'][$i])->update($repairArr);
			}
			
			for($i=0;$i<count($_POST['vehicleName']);$i++)
			{
		    $miscellenousArr= array(
			'vehicleName'                   => $_POST['vehicleName'][$i],
            'vehicleRegistrationNumber'     => $_POST['vehicleRegistrationNumber'][$i],
            'vendorName'                    => $_POST['vendorName'][$i],
            'miscellaneous_description'     => $_POST['miscellaneous_description'][$i],
            'amount_spent'                  => $_POST['amount_spent'][$i],
            'gst_charges'                   => $_POST['gst_charges'][$i],
            'total_amount'                  => $_POST['total_amount'][$i],
			);
			$data=MiscellaneousDetails::where('vehicle_id',$id)->where('id',$_POST['miscellaneousEditID'][$i])->update($miscellenousArr);
			}
			
			for($i=0;$i<count($_POST['vehicleNameCost']);$i++){
			   $costArr=array(
			   'vehicleNameCost'=>$_POST['vehicleNameCost'][$i],
               'costType'     =>$_POST['costType'][$i],
               'vendorNameCost' =>$_POST['vendorNameCost'][$i],
			   'cost_description'=>$_POST['cost_description'][$i],
			   'transaction_type'=>$_POST['transaction_type'][$i],			   
			   'totalAmount'=>$_POST['totalAmount'][$i]
			);
			$data=CostDetails::where('vehicle_id',$id)->where('id',$_POST['costEditID'][$i])->update($costArr);
		   }
			//echo '<pre>';print_r($_POST);die;
		   $data=VehicleDetails::where('id',$id)->update($vehicleArr);
		   $data=SellerDetails::where('vehicle_id',$id)->update($sellerArr);
		   $data=BuyerDetails::where('vehicle_id',$id)->update($buyerArr);
		   
		   echo json_encode(['status' => 'success', 'message' => 'Vehicle Cost Details Updated Successfully']);
	 }
	 
	public function save_repair_details(Request $request)
	{
		$repairId= $request->id;
		$repair_data = $request->validate([
			                                'vehicle_name'                  => ['required'],
                                            'vehicle_registration_number'   => ['required'],
                                            'vendor_name'                   => ['required'],
                                            'repair_cost'                   => ['required'],
                                        ], 
										[
		                                    'vehicle_name.required'                 => 'Please Enter Vehicle Name',
                                            'vehicle_registration_number.required'  => 'Please Enter Vehicle Registration Number',
                                            'vendor_name.required'                  => 'Please Enter Vendor Name',
                                            'repair_cost.required'                  => 'Please Enter Repair Cost',
                                        ]);
		   $unique_id = RepairDetails::orderBy('id', 'desc')->first();
           $number = str_replace('LAR', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'LAR0000001';
           } else {
            $number = "LAR" . sprintf("%07d", (int)$number + 1);
           }
		   $repair_data['unique_id']=$number;
		   $repair_data['vehicle_id']=$repairId;
		   //echo '<pre>';print_r($repair_data);die;
		   for($i=0;$i<count($repair_data['vehicle_name']);$i++){
			   $arr=array(
			   'unique_id'=>$number,
			   'vehicle_id'=>$repairId,
			   'vehicle_name'=>$repair_data['vehicle_name'][$i],
               'vehicle_registration_number'=>$repair_data['vehicle_registration_number'][$i],
               'vendor_name'=>$repair_data['vendor_name'][$i],
			    'repair_cost'=>$repair_data['repair_cost'][$i]
			);
			$data=RepairDetails::insert($arr);
		   }
		   
		   echo json_encode(['status' => 'success', 'message' => 'Repair Details Succesfully Submitted']);
		
	}
	
	public function save_miscellaneous_details(Request $request)
	{
	    $miscellaneousId= $request->id;
		$miscellaneous_data = $request->validate([
			                                'vehicleName'                  => ['required'],
                                            'vehicleRegistrationNumber'   => ['required'],
                                            'vendorName'                   => ['required'],
                                            'miscellaneous_description'      => ['required'],
                                            'amount_spent'                   => ['required'],
                                            'gst_charges'                   => ['required'],
                                            'total_amount'                   => ['required'],
                                        ], 
										[
		                                    'vehicleName.required'                 => 'Please Enter Vehicle Name',
                                            'vehicleRegistrationNumber.required'  => 'Please Enter Vehicle Registration Number',
                                            'vendorName.required'                  => 'Please Enter Vendor Name',
                                            'miscellaneous_description.required'    => 'Please Enter Description',
                                            'amount_spent.required'                  => 'Please Enter Spent Amount',
                                            'gst_charges.required'                  => 'Please Enter GST Charges',
                                            'total_amount.required'                  => 'Please Enter Total Amount',
                                        ]);
		   $unique_id = MiscellaneousDetails::orderBy('id', 'desc')->first();
           $number = str_replace('LAM', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'LAM0000001';
           } else {
            $number = "LAM" . sprintf("%07d", (int)$number + 1);
           }
		   for($i=0;$i<count($miscellaneous_data['vehicleName']);$i++){
			   $miscellaneousArr[]=array(
			   'unique_id'=>$number,
			   'vehicle_id'=>$miscellaneousId,
			   'vehicleName'=>$miscellaneous_data['vehicleName'][$i],
               'vehicleRegistrationNumber'=>$miscellaneous_data['vehicleRegistrationNumber'][$i],
               'vendorName'=>$miscellaneous_data['vendorName'][$i],
			   'miscellaneous_description'=>$miscellaneous_data['miscellaneous_description'][$i],
			   'amount_spent'=>$miscellaneous_data['amount_spent'][$i],
			   'gst_charges'=>$miscellaneous_data['gst_charges'][$i],
			   'total_amount'=>$miscellaneous_data['total_amount'][$i]
			);
		   }
		   $data=MiscellaneousDetails::insert($miscellaneousArr);
		   
		   echo json_encode(['status' => 'success', 'message' => 'Miscellaneous Details Succesfully Submitted']);	
	}
	
	public function save_cost_details(Request $request)
	{
		$costId= $request->id;
		$cost_data = $request->validate([
			                                'vehicleNameCost'                  => ['required'],
                                            'costType'                       => ['required'],
                                            'vendorNameCost'                   => ['required'],
                                            'cost_description'                 => ['required'],                                            
                                            'transaction_type'                 => ['required'],
                                            'totalAmount'                      => ['required'],
                                            'floor_interest'                   => ['required']
                                        ], 
										[
		                                    'vehicleName.required'                 => 'Please Enter Vehicle Name',
                                            'vehicleRegistrationNumber.required'  => 'Please Enter Vehicle Registration Number',
                                            'vendorName.required'                  => 'Please Enter Vendor Name',
                                            'miscellaneous_description.required'    => 'Please Enter Description',
                                            'transaction_type.required'             => 'Please Select Transaction Type',                                            
                                            'totalAmount.required'                  => 'Please Enter Total Amount',
                                            'floor_interest.required'               => 'Please Enter Floor Interest'
                                        ]);
		   $unique_id = CostDetails::orderBy('id', 'desc')->first();
           $number = str_replace('LAM', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'LAC0000001';
           } else {
            $number = "LAC" . sprintf("%07d", (int)$number + 1);
           }
		   for($i=0;$i<count($cost_data['vehicleNameCost']);$i++){
			   $costArr[]=array(
			   'unique_id'=>$number,
			   'vehicle_id'=>$costId,
			   'vehicleNameCost'=>$cost_data['vehicleNameCost'][$i],
               'costType'=>$cost_data['costType'][$i],
               'vendorNameCost'=>$cost_data['vendorNameCost'][$i],
			   'cost_description'=>$cost_data['cost_description'][$i],
			   'transaction_type'=>$cost_data['transaction_type'][$i],			   
			   'totalAmount'=>$cost_data['totalAmount'][$i],
			   'floor_interest'=>$cost_data['floor_interest'][$i]
			);
		   }
            $data=CostDetails::insert($costArr);		   
		   echo json_encode(['status' => 'success', 'message' => 'Cost Details Succesfully Submitted']);
	}
	
	public function get_repair_details()
	{
		$data['result']= VehicleDetails::select('vehicle_number','vehicle_make','vehicle_year')
		                               ->where('id',$_GET['id'])
									   ->get();
		//echo '<pre>'; print_r($data);die;
		return view('admin.details.repairdetails',$data);
	}
	
	public function get_miscellenous_details()
	{
		$data['result']=VehicleDetails::select('vehicle_number','vehicle_make','vehicle_year')
		                               ->where('id',$_GET['id'])
									   ->get();
		//echo '<pre>'; print_r($data);die;
		return view('admin.details.miscellenousdetails',$data);
	}
	
	public function get_vehicleinsurance_details()
	{
		$data['result']=InsuranceDetails::select('*')
		                                ->where('insuranceRegistrationNumber',$_GET['id'])
										->get();
		$data['type']=InsuranceTypeDetails::get();
		$data['provider']=InsuranceProviderDetails::get();
		//echo '<pre>'; print_r($data);die;
		return view('admin.edit.insurancedetails',$data);
	}
	
	public function view_vehicleinsurance_details()
	{
		$data['result']=InsuranceDetails::select('*')
		                                ->where('insuranceRegistrationNumber',$_GET['id'])
										->get();
		//echo '<pre>';print_r($data);die;
		return view('admin.view.viewInsuranceDetails',$data);
	}
	 
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}