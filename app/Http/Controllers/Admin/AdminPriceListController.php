<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceList;
use App\Models\BrokerDetails;
use App\Models\GSTDetails;
use App\Models\VehicleManufacture;
use App\Models\VehicleDetails;
use App\Models\CostTypeDetails;
use DB;
use Illuminate\Http\Request;

class AdminPriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['gst']=GSTDetails::select('*')
        ->get();
        $data['costtype']=CostTypeDetails::select('*')
                    ->get();
        $data['vehicleName']=VehicleManufacture::select('*')
                          ->get();
        $data['vehicleId']=$request->get('vehicle_id');

		return view('admin.pricelist.index',$data);
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
         
      //print_r($request->all());exit();  
      $pricelist_data = $request->validate([
            'vehicle_id' => ['required', 'string', 'max:255'],
            'broker'     => ['required','string', 'max:255'],	
			'veh_no'     => ['required','string', 'max:255'],
			'gst'     => ['required','string', 'max:255'],
			'reg_date'     => ['required','string', 'max:255'],
			'make'     => ['required','string', 'max:255'],
			'model'     => ['required','string', 'max:255'],
			'col'     => ['required','string', 'max:255'],
			'omv_e_tsf'     => ['required','string', 'max:255'],
			'ul_parf'     => ['required','string', 'max:255'],
			'propellant'     => ['required','string', 'max:255'],
			'o'     => ['required','string', 'max:255'],
			'coe'     => ['required','string', 'max:255'],
			'coe_exp'     => ['required','string', 'max:255'],
			'r_tax_exp'     => ['required','string', 'max:255'],
			'price'     => ['required','string', 'max:255'],
			'loc'     => ['required','string', 'max:255'],

        ]);
		   $unique_id = PriceList::orderBy('id', 'desc')->first();
           $number = str_replace('LACT', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'LPL0000001';
           } else {
            $number = "LPL" . sprintf("%07d", (int)$number + 1);
           }
		    $pricelist_data['unique_id'] = $number;
		    $data=PriceList::insert($pricelist_data);
            echo json_encode(['status' => 'success', 'message' => 'Price List Added Succesfully']);
        }

//       $pricelist_data['vehicle_id']=$pricelistId;
//       //echo '<pre>';print_r($repair_data);die;
//        $data=PriceList::array_push($pricelist_data);die;
// 		   foreach($pricelist_data as $pricelist){
// 			   $arr[]=array(
          
//           'broker'   => $pricelist['broker'][0],
//           'veh_no'   => $pricelist['veh_no'][0],
//           'gst'      => $pricelist['gst'][0],
//           'reg_date' => $pricelist['reg_date'][0],
//           'make'     => $pricelist['make'][0],
//           'model'    => $pricelist['model'][0],
//           'col'      => $pricelist['col'][0],
//           'omv_e_tsf'=> $pricelist['omv_e_tsf'][0],
//           'ul_parf'  => $pricelist['ul_parf'][0],
//           'propellant' => $pricelist['propellant'][0],
//           'o'          => $pricelist['o'][0],
//           'coe'        => $pricelist['coe'][0],
//           'coe_exp'    => $pricelist['coe_exp'][0],
//           'r_tax_exp'  => $pricelist['r_tax_exp'][0],
//           'price'      => $pricelist['price'][0],
//           'loc'        => $pricelist['loc'][0]
    
			   
// );

//       $data=PriceList::insert($arr);
// 		  $data=PriceList::array_push($pricelist);
// 		   }
//        echo json_encode(['status' => 'success', 'message' => 'Price List Added Succesfully']);

		  
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