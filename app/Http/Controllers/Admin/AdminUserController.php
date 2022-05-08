<?php

namespace App\Http\Controllers\Admin;
use Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;; 

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['result']=User::get();
        return view('admin.user.index',$data);
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
      $empImage=0;
      $emp_Id=0;
      $user_data = $request->validate([
			'emp_name'            => ['required','string', 'max:255'],
            'emp_image'           => ['required'],
            'job_position'        => ['required'],
            'country_code_m'      => ['required'],
            'work_mobile'         => ['required','numeric'],
            'department'          => ['required'],
            'country_code_p'      => ['required'],
            'work_phone'          => ['required','numeric'],
            'work_email'          => ['required' ,'string', 'email', 'max:255', 'unique:user'],
			'contact_address'     => ['required'],
			'country'             => ['required'],
			'contact_email'       => ['required' ,'string', 'email', 'max:255', 'unique:user'],
			'identification_no'   => ['required'],
			'country_code_cp'     => ['required'],
			'contact_phone'       => ['required','numeric'],
			'passport_no'         => ['required'],
			'bank_accnt_no'       => ['required'],
			'gender'              => ['required'],
			'home_work_distance'  => ['required'],
			'dob'                 => ['required'],
			'place_of_birth'      => ['required'],
			'country_of_birth'    => ['required'],
			'marital_status'      => ['required'],
			'other_id_name'       => ['required'],
			'other_id_no'         => ['required'],
			'other_id_file'       => ['required'],
		'edu_certificate_level'   => ['required'],
			'field_of_study'      => ['required'],
			'school'              => ['required'],
			'website'             => ['required']
        ], [
		    'emp_name.required'         => 'Please Enter Employee Name',
            'job_position.required'     => 'Please Select Job Position',
            'emp_image.required'        => 'Please Upload An Employee Image',
            'country_code_m.required'   => 'Please Select Country Code',
            'work_mobile.required'      => 'Please Enter Your Work Mobile Number',
            'department.required'       => 'Please Select Department',
            'country_code_p.required'   => 'Please Select Country Code',
            'work_phone.required'         => 'Please Enter Work Phone Number',
            'work_email.required'       => 'Please Enter Work Email Address',
            'contact_address.required'  => 'Please Enter Contact Address',
            'country.required'          => 'Please Enter Country',
            'contact_email.required'    => 'Please Enter Contact Email Address',
           'identification_no.required' => 'Please Enter Identification Number',
            'country_code_cp.required'  => 'Please Select Country Code',
            'contact_phone.required'    => 'Please Enter Contact Phone Number',
            'passport_no.required'      => 'Please Enter Passport Number',
            'bank_accnt_no.required'    => 'Please Enter Bank Account Number',
            'gender.required'           => 'Please Select Gender',
           'home_work_distance.required'=> 'Please Enter Work Distance',
            'dob.required'              => 'Please Enter Date Of Birth',
            'place_of_birth.required'   => 'Please Enter Place Of Birth',
            'country_of_birth.required' => 'Please Enter Country Of Birth',
            'marital_status.required'   => 'Please Select Marital Status',
            'other_id_name.required'    => 'Please Enter ID Name',
            'other_id_file.required'    => 'Please Upload Id Image',
       'edu_certificate_level.required' => 'Please Select An Education Level',
            'field_of_study.required'   => 'Please Enter Field Of Study',
            'school.required'           => 'Please Enter School Details',
            'website.required'          => 'Please Select The Access Right'
        ]);
		   $unique_id = User::orderBy('id', 'desc')->first();
           $number = str_replace('GBU', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'GMU0000001';
           } else {
            $number = "GMU" . sprintf("%07d", (int)$number + 1);
           }
		   $user_data['unique_id'] = $number;
		   $user_data['status'] = 1;
		   $empImage = Helper::unqNum(). $request->file('emp_image')->getClientOriginalName();
		   $request->file('emp_image')->move(public_path('asset/empImage'),$empImage);
		   $emp_Id = Helper::unqNum(). $request->file('other_id_file')->getClientOriginalName();
		   $request->file('other_id_file')->move(public_path('asset/empIdImage'),$emp_Id);
		   $user_data['emp_image'] = $empImage;
		   $user_data['other_id_file'] = $emp_Id;
		   $data=User::insert($user_data);
		   echo json_encode(['status' => 'success', 'message' => 'Employee Details Succesfully Submitted']);
    }
    
	public function get_employee_details()
	{
        $result['data']=User::select('*')
                           ->where('id',$_GET['id'])
                           ->get();
        //echo '<pre>';print_r($result);die;
        return view('admin.user.view',$result);
	}
	
	public function edit_employee_details()
	{
		$result['data']=User::select('*')
                           ->where('id',$_GET['id'])
                           ->get();
        //echo '<pre>';print_r($result);die;
        return view('admin.user.edit',$result);
	}
	
	public function update_employee_details(Request $request)
	{
	  $empImage1=0;
	  $empImage2=0;
	  $id=$request->id;
	  $employee_data = $request->validate([
			'emp_name'            => ['required','string', 'max:255'],
            'job_position'        => ['required'],
            'country_code_m'      => ['required'],
            'work_mobile'         => ['required','numeric'],
            'department'          => ['required'],
            'country_code_p'      => ['required'],
            'work_phone'          => ['required','numeric'],
            'work_email'          => ['required' ,'string', 'email', 'max:255', 'unique:user'],
			'contact_address'     => ['required'],
			'country'             => ['required'],
			'contact_email'       => ['required' ,'string', 'email', 'max:255', 'unique:user'],
			'identification_no'   => ['required'],
			'country_code_cp'     => ['required'],
			'contact_phone'       => ['required','numeric'],
			'passport_no'         => ['required'],
			'bank_accnt_no'       => ['required'],
			'gender'              => ['required'],
			'home_work_distance'  => ['required'],
			'dob'                 => ['required'],
			'place_of_birth'      => ['required'],
			'country_of_birth'    => ['required'],
			'marital_status'      => ['required'],
			'other_id_name'       => ['required'],
			'other_id_no'         => ['required'],
		'edu_certificate_level'   => ['required'],
			'field_of_study'      => ['required'],
			'school'              => ['required'],
			'website'             => ['required']
        ], [
		    'emp_name.required'         => 'Please Enter Employee Name',
            'job_position.required'     => 'Please Select Job Position',
            'country_code_m.required'   => 'Please Select Country Code',
            'work_mobile.required'      => 'Please Enter Your Work Mobile Number',
            'department.required'       => 'Please Select Department',
            'country_code_p.required'   => 'Please Select Country Code',
            'work_phone.required'         => 'Please Enter Work Phone Number',
            'work_email.required'       => 'Please Enter Work Email Address',
            'contact_address.required'  => 'Please Enter Contact Address',
            'country.required'          => 'Please Enter Country',
            'contact_email.required'    => 'Please Enter Contact Email Address',
           'identification_no.required' => 'Please Enter Identification Number',
            'country_code_cp.required'  => 'Please Select Country Code',
            'contact_phone.required'    => 'Please Enter Contact Phone Number',
            'passport_no.required'      => 'Please Enter Passport Number',
            'bank_accnt_no.required'    => 'Please Enter Bank Account Number',
            'gender.required'           => 'Please Select Gender',
           'home_work_distance.required'=> 'Please Enter Work Distance',
            'dob.required'              => 'Please Enter Date Of Birth',
            'place_of_birth.required'   => 'Please Enter Place Of Birth',
            'country_of_birth.required' => 'Please Enter Country Of Birth',
            'marital_status.required'   => 'Please Select Marital Status',
            'other_id_name.required'    => 'Please Enter ID Name',
       'edu_certificate_level.required' => 'Please Select An Education Level',
            'field_of_study.required'   => 'Please Enter Field Of Study',
            'school.required'           => 'Please Enter School Details',
			'website.required'          => 'Please Select The Access Right'
        ]);
		   if(isset($_FILES['other_id_file']) && $_FILES['other_id_file'] != '')
		   {
			   //echo public_path('asset/empImage');die;
			  // echo 'sdfd';die;
			 $image_path2 = public_path().'admin/asset/empIdImage/'.$_POST['oldIdFile'];
			 File::delete($image_path2);
			 $empImage1 = Helper::unqNum().'.'.$request->other_id_file->getClientOriginalExtension();
		     $request->other_id_file->move(public_path('admin/asset/empIdImage'),$empImage1);
             $employee_data['other_id_file']=$empImage1;
             //unlink($image_path);			 
		   }		   
           //echo '<pre>'; print_r($employee_data);die;		   
		   $data=User::where('id',$id)->update($employee_data);
		   echo json_encode(['status' => 'success', 'message' => 'Employee Details updated Succesfully']);
	}
}