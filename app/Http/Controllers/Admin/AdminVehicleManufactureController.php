<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleManufacture;
use Illuminate\Http\Request;

class AdminVehicleManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['result']=VehicleManufacture::get();
        return view('admin.vehiclemanufacture.index',$data);
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
      $manufacture_data = $request->validate([
			'vehicleManufactureName'     => ['required','string', 'max:255'],
        ], [
		    'vehicleManufactureName.required'    => 'Please Enter Vehicle Manufacture Name',            
        ]);
		   $unique_id = VehicleManufacture::orderBy('id', 'desc')->first();
           $number = str_replace('LAVM', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'LAVM0000001';
           } else {
            $number = "LAVM" . sprintf("%07d", (int)$number + 1);
           }
		   $manufacture_data['unique_id'] = $number;
		   $manufacture_data['status'] = 1;
		   $data=VehicleManufacture::insert($manufacture_data);
		   echo json_encode(['status' => 'success', 'message' => 'Vehicle Manufacture Detail Succesfully Submitted']);
    }

    public function get_manufacture_details()
	{
	  $data['result']=VehicleManufacture::select('*')
                                ->where('id',$_GET['id'])
                                ->get();
		//echo '<pre>'; print_r($data);die;
        return view('admin.vehiclemanufacture.edit',$data);								
	}
	
	public function edit_manufacture_details(Request $request)
	{
	  $id=$request->id;
	  $manufacture_edit_data = $request->validate([
			'vehicleManufactureName'     => ['required','string', 'max:255'],
        ], [
		    'vehicleManufactureName.required'    => 'Please Enter Vehicle Manufacture Name',            
        ]);
		$manufactureArr[]=array(
		'vehicleManufactureName'     => $_POST['vehicleManufactureName'],
		);
		
		//echo '<pre>';print_r($brokerArr);die;
		
		$data=VehicleManufacture::where('id',$id)->update($manufactureArr[0]);
		echo json_encode(['status' => 'success', 'message' => 'Vehicle Manufacture Details Edit Succesfully']);
	}
	
	public function delete_manufacture_details(Request $request)
	{
		$data=VehicleManufacture::where('id', $_POST['id'])->delete();
        echo json_encode(['status' => 'success', 'message' => 'Vehicle Manufacture Detail Deleted Successfully']);
	}
}