<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SellerDetails;
use App\Models\BuyerDetails;
use App\Models\RepairDetails;
use App\Models\MiscellaneousDetails;
use App\Models\BrokerDetails;
use App\Models\CostDetails;
use App\Models\GSTDetails;
use App\Models\CostTypeDetails;
use App\Models\InsuranceProviderDetails;
use App\Models\InsuranceTypeDetails;
use App\Models\InsuranceDetails;
use App\Models\VehicleManufacture;
use App\Models\VehicleDetails;
use DB;
use Illuminate\Http\Request;

class AdminSellerInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
       
       $data['gst']=GSTDetails::select('*')
		                     ->get();
		$data['costtype']=CostTypeDetails::select('*')
		                                 ->get();
		$data['vehicleName']=VehicleManufacture::select('*')
		                                       ->get();
        $data['vehicleId']=$request->get('vehicle_id');
     
        
        return view('admin.seller.index',$data);
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
      $seller_data = $request->validate([
           'vehicle_id'                 => ['required', 'string', 'max:255'],
			'id_number'                => ['required', 'string', 'max:255'],
            'purchase_date'            => ['required', 'string', 'max:255'],
            'estimate_delivery'        => ['required', 'string', 'max:255'],
            'delivery_in_date'         => ['required', 'string', 'max:255'],
            'time'                     => ['required', 'string', 'max:255'],
            'purchase_price'           => ['required', 'string', 'max:255'],
            'gst'                      => ['required', 'string', 'max:255'],
            'total_purchase_price'     => ['required', 'string', 'max:255'],
            'agreement_number'         => ['required', 'string', 'max:255'],
            'settlement_number'         => ['required', 'string', 'max:255'],
            'note'                     => ['required', 'string', 'max:255'],
            'ap_payment'               => ['required', 'string', 'max:255'],
            'amount'                   => ['required', 'numeric'],
            'bank'                     => ['required', 'string', 'max:255'],
            'cheque_number'            => ['required', 'string', 'max:255'],
            'cheque_date'              => ['required', 'string', 'max:255'],
            'to_from'                  => ['required', 'string', 'max:255'],
            'remarks'                  => ['required', 'string', 'max:255'],
            'transaction_type'         => ['required', 'string', 'max:255'],
            'DN/CN_Number'             => ['required', 'string', 'max:255'],
            'DN/CN_Amount'             => ['required', 'string', 'max:255'],
            'GST_Amount'               => ['required', 'string', 'max:255'],
            'GST_Decimal_Adjustment'   => ['required', 'string', 'max:255'],
            'GST_Amount_Before_Adjustment' => ['required', 'string', 'max:255'],
            'AP_Balance'               => ['required', 'string', 'max:255'],
            'P_settlement_Remark'      => ['required', 'string', 'max:255'],
            'E-Transfer_In_Date'       => ['required', 'string', 'max:255'],
            'Asking_Price'             => ['required', 'string', 'max:255'],
            'E-Transfer_By'            => ['required', 'string', 'max:255'],
            'Alternate_price'          => ['required', 'string', 'max:255'],
            'Log_card'                 => ['required', 'string', 'max:255'],
            'Alternate'                => ['required', 'string', 'max:255'],
            'Buy_Code'                 => ['required', 'string', 'max:255'],
            'Trade_In_By'              => ['required', 'string', 'max:255'],
            'Broker1'                  => ['required', 'string', 'max:255'],
            'Com_Rtn'                  => ['required', 'string', 'max:255'],
            'Return_Date'              => ['required', 'string', 'max:255'],
            'Broker2'                  => ['required', 'string', 'max:255'],
            'Com_Rtn2'                  => ['required', 'string', 'max:255'],
            'Return_Date2'              => ['required', 'string', 'max:255'],
        
        ]);
           $unique_id = SellerDetails::orderBy('id', 'desc')->first();
           $number = str_replace('LAS', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'LAS0000001';
           } else {
            $number = "LAS" . sprintf("%07d", (int)$number + 1);
           }
		   $seller_data['unique_id']=$number;
		   $data=SellerDetails::insert($seller_data);
           echo json_encode(['status' => 'success', 'message' => 'Vehicle Details Succesfully Submitted']);
}

	// 	   $data=SellerDetails::insert($seller_data);
	// 	   echo json_encode(['status' => 'success', 'message' => 'Vehicle Details Succesfully Submitted']);
    // }

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