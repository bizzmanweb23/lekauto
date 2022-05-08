<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrokerDetails;
use Illuminate\Http\Request;

class AdminBrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['result']=BrokerDetails::get();
        return view('admin.broker.index',$data);
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
      $broker_data = $request->validate([
			'first_name'     => ['required','string', 'max:255'],
            'last_name'      => ['required','string', 'max:255'],
            'address'        => ['required','string', 'max:255'],
            'city'           => ['required','string', 'max:255'],
            'country'        => ['required','string', 'max:255'],
            'landline_number'=> ['required','numeric'],
            'mobile_number'  => ['required', 'numeric'],
            'email_address'  => ['required' ,'string', 'email', 'max:255', 'unique:broker_details'],
			'broker_type'    => ['required'],
		'broker_commision'   => ['required'],
        ], [
		    'first_name.required'       => 'Please Enter First Name',
            'last_name.required'        => 'Please Enter Last Name',
            'address.required'          => 'Please Enter Address',
            'city.required'             => 'Please Enter City',
            'country.required'          => 'Please Enter Country',
            'landline_number.required'  => 'Please Enter Landline Number',
            'mobile_number.required'    => 'Please Enter Mobile Number',
            'email_address.required'    => 'Please Enter Email Address',
            'broker_type.required'      => 'Please Select Broker Type',
			'broker_commision.required' => 'Please Select Broker Percentage'
        ]);
		   $unique_id = BrokerDetails::orderBy('id', 'desc')->first();
           $number = str_replace('GBU', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'GBU0000001';
           } else {
            $number = "GBU" . sprintf("%07d", (int)$number + 1);
           }
		   $broker_data['unique_id'] = $number;
		   $broker_data['status'] = 1;
		   $data=BrokerDetails::insert($broker_data);
		   echo json_encode(['status' => 'success', 'message' => 'Broker Details Succesfully Submitted']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function get_broker_details()
	{
	  $result['data']=BrokerDetails::select('*')
                           ->where('id',$_GET['id'])
                           ->get();
      //echo '<pre>';print_r($result);die;
        return view('admin.broker.view',$result);		
	}
	
	public function edit_broker_details()
	{
		$result['data']=BrokerDetails::select('*')
                           ->where('id',$_GET['id'])
                           ->get();
      //echo '<pre>';print_r($result);die;
        return view('admin.broker.edit',$result);
	}
	
	public function update_broker_details(Request $request)
	{
	  $id=$request->id;
	  $broker_edit_data = $request->validate([
			'first_name'     => ['required','string', 'max:255'],
            'last_name'      => ['required','string', 'max:255'],
            'address'        => ['required','string', 'max:255'],
            'city'           => ['required','string', 'max:255'],
            'country'        => ['required','string', 'max:255'],
            'landline_number'=> ['required','numeric'],
            'mobile_number'  => ['required', 'numeric'],
            'email_address'  => ['required' ,'string', 'email', 'max:255'],
			'broker_type'    => ['required'],
		'broker_commision'   => ['required'],
        ], [
		    'first_name.required'       => 'Please Enter First Name',
            'last_name.required'        => 'Please Enter Last Name',
            'address.required'          => 'Please Enter Address',
            'city.required'             => 'Please Enter City',
            'country.required'          => 'Please Enter Country',
            'landline_number.required'  => 'Please Enter Landline Number',
            'mobile_number.required'    => 'Please Enter Mobile Number',
            'email_address.required'    => 'Please Enter Email Address',
            'broker_type.required'      => 'Please Select Broker Type',
			'broker_commision.required' => 'Please Select Broker Percentage'
        ]);
		$brokerArr[]=array(
		'first_name'     => $_POST['first_name'],
        'last_name'      => $_POST['last_name'],
        'address'        => $_POST['address'],
        'city'           => $_POST['city'],
        'country'        => $_POST['country'],
        'landline_number'=> $_POST['landline_number'],
        'mobile_number'  => $_POST['mobile_number'],
        'email_address'  => $_POST['email_address'],
	    'broker_type'    => $_POST['broker_type'],
	'broker_commision'   => $_POST['broker_commision']
		);
		
		//echo '<pre>';print_r($brokerArr);die;
		
		$data=BrokerDetails::where('id',$id)->update($brokerArr[0]);
		echo json_encode($data);
	}
	
	public function delete_broker_details(Request $request)
	{
		$data=BrokerDetails::where('id', $_POST['id'])->delete();
        echo json_encode(['status' => 'success', 'message' => 'Broker Delete Successfully']);
	}
	
}