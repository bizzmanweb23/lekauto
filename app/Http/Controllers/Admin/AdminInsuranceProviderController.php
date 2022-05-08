<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceProviderDetails;
use Illuminate\Http\Request;

class AdminInsuranceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['result']=InsuranceProviderDetails::get();
        return view('admin.insuranceprovider.index',$data);
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
      $provider_data = $request->validate([
			'insuranceProviderName'     => ['required','string', 'max:255'],
        ], [
		    'insuranceProviderName.required'    => 'Please Enter Insurance Provider Name',            
        ]);
		   $unique_id = InsuranceProviderDetails::orderBy('id', 'desc')->first();
           $number = str_replace('LAIP', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'LAIP0000001';
           } else {
            $number = "LAIP" . sprintf("%07d", (int)$number + 1);
           }
		   $provider_data['unique_id'] = $number;
		   $provider_data['status'] = 1;
		   $data=InsuranceProviderDetails::insert($provider_data);
		   echo json_encode(['status' => 'success', 'message' => 'Insurance Provider Detail Succesfully Submitted']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	public function get_provider_details()
	{
	  $data['result']=InsuranceProviderDetails::select('*')
                                ->where('id',$_GET['id'])
                                ->get();
		//echo '<pre>'; print_r($data);die;
        return view('admin.insuranceprovider.edit',$data);								
	}
	
	public function edit_provider_details(Request $request)
	{
	  $id=$request->id;
	  $provider_edit_data = $request->validate([
			'insuranceProviderName'     => ['required','string', 'max:255'],
        ], [
		    'insuranceProviderName.required'    => 'Please Enter Insurance Provider Name',            
        ]);
		$providerArr[]=array(
		'insuranceProviderName'     => $_POST['insuranceProviderName'],
		);
		
		//echo '<pre>';print_r($brokerArr);die;
		
		$data=InsuranceProviderDetails::where('id',$id)->update($providerArr[0]);
		echo json_encode(['status' => 'success', 'message' => 'Insurance Provider Details Edit Succesfully']);
	}
	
	public function delete_provider_details(Request $request)
	{
		$data=InsuranceProviderDetails::where('id', $_POST['id'])->delete();
        echo json_encode(['status' => 'success', 'message' => 'Insurance Provider Delete Successfully']);
	}
	
}