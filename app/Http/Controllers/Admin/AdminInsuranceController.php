<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceDetails;
use App\Models\InsuranceProviderDetails;
use App\Models\InsuranceTypeDetails;
use App\Models\GSTDetails;
use Illuminate\Http\Request;

class AdminInsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['result']=InsuranceDetails::orderBy('insuranceEndDate', 'asc')->get();
		$data['type']=InsuranceTypeDetails::get();
		$data['provider']=InsuranceProviderDetails::get();
        return view('admin.insurance.index',$data);
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
      $insurance_data = $request->validate([
			'insuranceVehicleName'         => ['required','string', 'max:255'],
            'insuranceRegistrationNumber'  => ['required','string', 'max:255'],
            'insuranceStartDate'           => ['required'],
            'insuranceEndDate'             => ['required'],
            'insuranceProvider'             => ['required'],
            'insuranceValidity'             => ['required'],
            'insuranceEndDate'             => ['required'],
            'insuranceType'                => ['required','string', 'max:255']
        ], [
		    'insuranceVehicleName.required'        => 'Please Enter Vehicle Name',
            'insuranceRegistrationNumber.required' => 'Please Enter Registration Number',
            'insuranceStartDate.required'          => 'Please Select Insurance Start Date',
            'insuranceEndDate.required'            => 'Please Select Insurance End Date',
            'insuranceProvider.required'            => 'Please Select Insurance Provider',
            'insuranceValidity.required'            => 'Please Select Insurance Validity',
            'insuranceType.required'               => 'Please Select Insurance Type'
        ]);
		   $unique_id = InsuranceDetails::orderBy('id', 'desc')->first();
           $number = str_replace('LAI', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'LAI0000001';
           } else {
            $number = "LAI" . sprintf("%07d", (int)$number + 1);
           }
		   $SKU_Code = InsuranceDetails::orderBy('id', 'desc')->first();
           $number1 = str_replace('SKUCODE', '', $SKU_Code ? $SKU_Code->SKU_Code : 0);
           if ($number1 == 0) {
           $number1 = 'SKUCODE0000001';
           } else {
            $number1 = "SKUCODE" . sprintf("%07d", (int)$number + 1);
           }
		   $insurance_data['SKU_Code'] = $number1;
		   $insurance_data['unique_id'] = $number;		   
		   $data=InsuranceDetails::insert($insurance_data);
		   echo json_encode(['status' => 'success', 'message' => 'Insurance Details Succesfully Submitted']);
    }
	
	public function get_insurance_details()
	{
		$data['result']=InsuranceDetails::select('*')->where('id',$_GET['id'])->get();
		$data['provider']=InsuranceProviderDetails::get();
		//echo '<pre>'; print_r($data);die;
		return view('admin.insurance.edit',$data);
	}
	
	public function edit_insurance_details(Request $request)
	{
		$id=$request->id;
	  $insurance_edit_data = $request->validate([
			'insuranceVehicleName'         => ['required','string', 'max:255'],
            'insuranceRegistrationNumber'  => ['required','string', 'max:255'],
            'insuranceStartDate'           => ['required'],
            'insuranceEndDate'             => ['required'],
            'insuranceProvider'            => ['required'],
            'insuranceValidity'            => ['required'],
            'insuranceEndDate'             => ['required'],
            'insuranceType'                => ['required','string', 'max:255'],
            'SKU_Code'                     => ['required','string', 'max:255']
        ], [
		    'insuranceVehicleName.required'        => 'Please Enter Vehicle Name',
            'insuranceRegistrationNumber.required' => 'Please Enter Registration Number',
            'insuranceStartDate.required'          => 'Please Select Insurance Start Date',
            'insuranceEndDate.required'            => 'Please Select Insurance End Date',
            'insuranceProvider.required'           => 'Please Select Insurance Provider',
            'insuranceValidity.required'           => 'Please Select Insurance Validity',
            'insuranceType.required'               => 'Please Select Insurance Type',
            'SKU_Code.required'                    => 'Please Enter SKU Code'
        ]);
		$insurnaceArr[]=array(
		'insuranceVehicleName'          => $_POST['insuranceVehicleName'],
        'insuranceRegistrationNumber'   => $_POST['insuranceRegistrationNumber'],
        'insuranceStartDate'            => $_POST['insuranceStartDate'],
        'insuranceEndDate'              => $_POST['insuranceEndDate'],
        'insuranceProvider'             => $_POST['insuranceProvider'],
        'insuranceValidity'             => $_POST['insuranceValidity'],
        'insuranceType'                 => $_POST['insuranceType'],
        'SKU_Code'                      => $_POST['SKU_Code']
		);		
		$data=InsuranceDetails::where('id',$id)->update($insurnaceArr[0]);
		echo json_encode(['status' => 'success', 'message' => 'Insurance Details Has Been Edit Succesfully']);
	}
	
	public function delete_insurance_details(Request $request)
	{
		$data=InsuranceDetails::where('id', $_POST['id'])->delete();
        echo json_encode(['status' => 'success', 'message' => 'Insurance Record Delete Successfully']);
	}
	
}