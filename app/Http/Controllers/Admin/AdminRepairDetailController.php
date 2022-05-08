<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleDetails;
use App\Models\RepairDetails;
use Illuminate\Http\Request;

class AdminRepairDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.repair.index');
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
      $repair_data = $request->validate([
			'vehicle_name'                  => ['required'],
            'vehicle_registration_number'   => ['required'],
            'vendor_name'                   => ['required'],
            'repair_cost'                   => ['required'],
        ], [
		    'vehicle_name.required'                 => 'Please Enter Vehicle Name',
            'vehicle_registration_number.required'  => 'Please Enter Vehicle Registration Number',
            'vendor_name.required'                  => 'Please Enter Vendor Name',
            'repair_cost.required'                  => 'Please Enter Repair Cost',
        ]);
		   $unique_id = RepairDetails::orderBy('id', 'desc')->first();
           $number = str_replace('LAR', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'LAB0000001';
           } else {
            $number = "LAB" . sprintf("%07d", (int)$number + 1);
           }
		   $repair_data['unique_id']=$number;
		   $data=RepairDetails::array_push($repair_data);die;
		   foreach($repair_data as $repair){
			   $arr[]=array(
			   'vehicle_name'=>$repair['vehicle_name'][0],
'vehicle_registration_number'=>$repair['vehicle_registration_number'][0],
                'vendor_name'=>$repair['vendor_name'][0],
				'repair_cost'=>$repair['repair_cost'][0]
				
);
		  $data=RepairDetails::array_push($repair);
		   }
		   echo '<pre>';print_r($arr);die;
		   echo json_encode(['status' => 'success', 'message' => 'Repair Details Succesfully Submitted']);
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