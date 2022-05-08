<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceTypeDetails;
use Illuminate\Http\Request;

class AdminInsuranceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['result']=InsuranceTypeDetails::get();
        return view('admin.insurancetype.index',$data);
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
      $type_data = $request->validate([
			'insuranceType'     => ['required','string', 'max:255'],
        ], [
		    'insuranceType.required'    => 'Please Enter Insurance Type',            
        ]);
		   $unique_id = InsuranceTypeDetails::orderBy('id', 'desc')->first();
           $number = str_replace('LAIT', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'LAIT0000001';
           } else {
            $number = "LAIT" . sprintf("%07d", (int)$number + 1);
           }
		   $provider_data['unique_id'] = $number;
		   $provider_data['status'] = 1;
		   $data=InsuranceTypeDetails::insert($type_data);
		   echo json_encode(['status' => 'success', 'message' => 'Insurance Type Detail Succesfully Submitted']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	public function get_type_details()
	{
	  $data['result']=InsuranceTypeDetails::select('*')
                                ->where('id',$_GET['id'])
                                ->get();
		//echo '<pre>'; print_r($data);die;
        return view('admin.insurancetype.edit',$data);								
	}
	
	public function edit_type_details(Request $request)
	{
	  $id=$request->id;
	  $type_edit_data = $request->validate([
			'insuranceType'     => ['required','string', 'max:255'],
        ], [
		    'insuranceType.required'    => 'Please Enter Insurance Type',            
        ]);
		$typeArr[]=array(
		'insuranceType'     => $_POST['insuranceType'],
		);
		
		//echo '<pre>';print_r($brokerArr);die;
		
		$data=InsuranceTypeDetails::where('id',$id)->update($typeArr[0]);
		echo json_encode(['status' => 'success', 'message' => 'Insurance Type Detail Edit Succesfully']);
	}
	
	public function delete_type_details(Request $request)
	{
		$data=InsuranceTypeDetails::where('id', $_POST['id'])->delete();
        echo json_encode(['status' => 'success', 'message' => 'Insurance Type Delete Successfully']);
	}
	
}