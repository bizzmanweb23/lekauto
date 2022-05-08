<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GSTDetails;
use Illuminate\Http\Request;

class AdminGSTDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['result']=GSTDetails::get();
        return view('admin.gst.index',$data);
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
      $gst_data = $request->validate([
			'gst_name'     => ['required','string', 'max:255'],
            'gst_charges'  => ['required','numeric', 'max:255'],
        ], [
		    'gst_name.required'       => 'Please Enter GST Name',
            'gst_charges.required'    => 'Please Enter GST Charges',
        ]);
		   $unique_id = GSTDetails::orderBy('id', 'desc')->first();
           $number = str_replace('LAG', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'LAG0000001';
           } else {
            $number = "LAG" . sprintf("%07d", (int)$number + 1);
           }
		   $gst_data['unique_id'] = $number;
		   $gst_data['status'] = 1;
		   $data=GSTDetails::insert($gst_data);
		   echo json_encode(['status' => 'success', 'message' => 'GST Details Succesfully Submitted']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	public function get_gst_details()
	{
	  $data['result']=GSTDetails::select('*')
                                ->where('id',$_GET['id'])
                                ->get();
		//echo '<pre>'; print_r($data);die;
        return view('admin.gst.edit',$data);								
	}
	
	public function edit_gst_details(Request $request)
	{
	  $id=$request->id;
	  $gst_edit_data = $request->validate([
			'gst_name'     => ['required','string', 'max:255'],
            'gst_charges'  => ['required','numeric', 'max:255']            
        ], [
		    'gst_name.required'       => 'Please Enter GST Name',
            'gst_charges.required'    => 'Please Enter GST Charges',
        ]);
		$gstArr[]=array(
		'gst_name'     => $_POST['gst_name'],
        'gst_charges'  => $_POST['gst_charges'],
		);
		
		//echo '<pre>';print_r($brokerArr);die;
		
		$data=GSTDetails::where('id',$id)->update($gstArr[0]);
		echo json_encode(['status' => 'success', 'message' => 'GST Details Edit Succesfully']);
	}
	
	public function delete_gst_details(Request $request)
	{
		$data=GSTDetails::where('id', $_POST['id'])->delete();
        echo json_encode(['status' => 'success', 'message' => 'GST Delete Successfully']);
	}
	
}