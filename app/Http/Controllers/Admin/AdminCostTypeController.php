<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CostTypeDetails;
use Illuminate\Http\Request;

class AdminCostTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['result']=CostTypeDetails::get();
        return view('admin.costtype.index',$data);
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
      $costtype_data = $request->validate([
			'costType'     => ['required','string', 'max:255'],
        ], [
		    'costType.required'    => 'Please Enter Cost Type',            
        ]);
		   $unique_id = CostTypeDetails::orderBy('id', 'desc')->first();
           $number = str_replace('LACT', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'LACT0000001';
           } else {
            $number = "LACT" . sprintf("%07d", (int)$number + 1);
           }
		   $costtype_data['unique_id'] = $number;
		   $costtype_data['status'] = 1;
		   $data=CostTypeDetails::insert($costtype_data);
		   echo json_encode(['status' => 'success', 'message' => 'Cost Type Detail Succesfully Submitted']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	public function get_costtype_details()
	{
	  $data['result']=CostTypeDetails::select('*')
                                ->where('id',$_GET['id'])
                                ->get();
		//echo '<pre>'; print_r($data);die;
        return view('admin.costtype.edit',$data);								
	}
	
	public function edit_costtype_details(Request $request)
	{
	  $id=$request->id;
	  $costtype_edit_data = $request->validate([
			'costType'     => ['required','string', 'max:255'],
        ], [
		    'costType.required'    => 'Please Enter Cost Type',            
        ]);
		$costtypeArr[]=array(
		'costType'     => $_POST['costType'],
		);
		
		//echo '<pre>';print_r($brokerArr);die;
		
		$data=CostTypeDetails::where('id',$id)->update($costtypeArr[0]);
		echo json_encode(['status' => 'success', 'message' => 'Cost Type Detail Edit Succesfully']);
	}
	
	public function delete_costtype_details(Request $request)
	{
		$data=CostTypeDetails::where('id', $_POST['id'])->delete();
        echo json_encode(['status' => 'success', 'message' => 'Cost Type Delete Successfully']);
	}
	
}