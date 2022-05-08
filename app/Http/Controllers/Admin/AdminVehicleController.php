<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleDetails;
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

class AdminVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['gst']=GSTDetails::select('*')
		                     ->get();
		$data['costtype']=CostTypeDetails::select('*')
		                                 ->get();
		$data['vehicleName']=VehicleManufacture::select('*')
		                                       ->get();
        return view('admin.vehicle.index',$data);
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