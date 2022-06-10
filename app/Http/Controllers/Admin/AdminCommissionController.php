<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrokerDetails;
use App\Models\VehicleDetails;
use App\Models\BuyerDetails;
use App\Models\RepairDetails;
use App\Models\SellerDetails;
use App\Models\PriceList;
use App\Models\MiscellaneousDetails;
use App\Models\CostDetails;
use App\Models\GSTDetails;
use App\Models\CostTypeDetails;
use App\Models\InsuranceProviderDetails;
use App\Models\InsuranceTypeDetails;
use App\Models\InsuranceDetails;
use App\Models\VehicleManufacture;
use DB;
use Illuminate\Http\Request;

class AdminCommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['result']=VehicleDetails::get();
		//$data['result']=SellerDetails::get();
		//$data['result']=BuyerDetails::get();
		//echo '<pre>'; print_r($data);die;		
        return view('admin.commission.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	public function get_vehicleCommission_details()
	{
		$data['vehicle']= VehicleDetails::select('*')
									   ->where('vehicle_details.id',$_GET['id'])
									   ->get();
									   //echo '<pre>'; print_r($data);die;
		$data['repair']= RepairDetails::where('repair_details.vehicle_id',$_GET['id'])
		                               ->sum(DB::raw('repair_cost'));
		$data['miscellaneous']= MiscellaneousDetails::where('miscellaneous_details.vehicle_id',$_GET['id'])
									   ->sum(DB::raw('total_amount'));
									   //echo '<pre>'; print_r($data);die;
		$data['cost']= CostDetails::where('cost_details.vehicle_id',$_GET['id'])
									   ->sum(DB::raw('totalAmount'));
	    $data['broker']= BrokerDetails::get();
		$data['seller']=SellerDetails::select('*')
									   ->where('seller_details.vehicle_id',$_GET['id'])
									   ->get();
		if(isset($data['seller'])){
			$data['seller'] = $data['seller'][0]->total_purchase_price;
		}
		else
		{
			$data['seller'][0]->total_purchase_price = 0;
		}
		//echo '<pre>'; print_r($data);die;
	   return view('admin.commission.edit',$data);
	}
    
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
      //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	
	
}