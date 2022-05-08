<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleDetails;
use App\Models\BuyerDetails;
use App\Models\SellerDetails;
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

class AdminBuyerInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      //  print_r(called);exit();
      $data['gst']=GSTDetails::select('*')
      ->get();
      $data['costtype']=CostTypeDetails::select('*')
                  ->get();
      $data['vehicleName']=VehicleManufacture::select('*')
                        ->get();
      $data['vehicleId']=$request->get('vehicle_id');


      return view('admin.buyer.index',$data);
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
        //print_r($request->all());exit();
      $buyer_data = $request->validate([
            'vehicle_id'                 => ['required', 'string', 'max:255'],
			'id_number'                => ['required', 'string', 'max:255'],
            'delivery_out_date'        => ['required', 'string', 'max:255'],
            'delivery_time'            => ['required', 'string', 'max:255'],
            
            'invoice_number'           => ['required', 'string', 'max:255'],
            'pl_date'                  => ['required', 'string', 'max:255'],
            'booking_date'             => ['required', 'string', 'max:255'],
            'sell_code'                => ['required', 'string', 'max:255'],
            'sales_agreement_number'   => ['required', 'string', 'max:255'],
            'sale_agreement_price'     => ['required', 'string'],
            'buyer_gst'                => ['required', 'string', 'max:255'],
            'buy_over_date'            => ['required', 'string', 'max:255'],
            'body_price'               => ['required', 'string'],
            'ets_transfer_value'       => ['required', 'string', 'max:255'],
            'ets_paper_buyer'          => ['required', 'string', 'max:255'],
            'dereg_date'               => ['required', 'string', 'max:255'],
            'ap_receipt'               => ['required', 'string', 'max:255'],
            'amount_buyer'             => ['required', 'string'],
            'bank_buyer'               => ['required', 'string', 'max:255'],
            'cheque_number_buyer'      => ['required', 'string', 'max:255'],
            'cheque_date_buyer'        => ['required', 'string', 'max:255'],
            'sell_to'                  => ['required', 'string', 'max:255'],
            'invoice_number2'          => ['required', 'string', 'max:255'],
            'transaction_type_buyer'   => ['required', 'string', 'max:255'],
            'Etransfer_out_date'       => ['required', 'string', 'max:255'],
            'invoice_date'             => ['required', 'string', 'max:255'],
            'selling_price'            => ['required', 'string', 'max:255'],
            'gst_amount_buyer'          => ['required', 'string', 'max:255'],
            'gst_decimal_adjustment_buyer'      => ['required', 'string', 'max:255'],
            'gst_amountbefore_adjustment_buyer' => ['required', 'string', 'max:255'],
            'total_selling_price'              => ['required', 'string', 'max:255'],
            'ets_paper_to'              => ['required', 'string', 'max:255'],
            'coe_encashment'           => ['required', 'string', 'max:255'],
            'coe_encashment1'          => ['required', 'string', 'max:255'],
            'parf_encashment'          => ['required', 'string', 'max:255'],
            'parf_encashment1'         => ['required', 'string', 'max:255'],
            'ets_paper'                => ['required', 'string', 'max:255'],
            'invoice_date2'            => ['required', 'string', 'max:255'],
            'invoice_number3'           => ['required', 'string', 'max:255'],
            'to_from_who'               => ['required', 'string', 'max:255'],
            'buyer_remarks'             => ['required', 'string', 'max:255'],
            'payment_mode'              => ['required', 'string', 'max:255'],
            'ap_receipt1'               => ['required', 'string', 'max:255'],
            'amount_buyer1'             => ['required', 'string'],
            'bank_buyer1'               => ['required', 'string', 'max:255'],
            'cheque_number_buyer1'      => ['required', 'string', 'max:255'],
            'cheque_date_buyer1'        => ['required', 'string', 'max:255'],
            'sell_to1'                  => ['required', 'string', 'max:255'],
            'buyer_remarks1'            => ['required', 'string', 'max:255'],
            'payment_mode1'             => ['required', 'string', 'max:255'],
            'invoice_number4'           => ['required', 'string', 'max:255'],
            'to_from_who1'              => ['required', 'string', 'max:255'],
            'total_receivable'          => ['required', 'string', 'max:255'],
            'total_received'            => ['required', 'string', 'max:255'],
            'ar_balance_buyer'          => ['required', 'string', 'max:255'],
            'status'                    => ['required', 'string', 'max:255'],
            'Etransfer_out_by'          => ['required', 'string', 'max:255'],
            'log_card'                  => ['required', 'string', 'max:255'],



        ]);
		   $unique_id = BuyerDetails::orderBy('id', 'desc')->first();
           $number = str_replace('LAB', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'LAB0000001';
           } else {
            $number = "LAB" . sprintf("%07d", (int)$number + 1);
           }
		   $buyer_data['unique_id']=$number;
		   //$buyer_data['vehicle_id']=$_POST['id'];
          // print_r($buyer_data);exit();
		   $data=BuyerDetails::insert($buyer_data);
		   echo json_encode(['status' => 'success', 'message' => 'Buyer Details Succesfully Submitted']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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