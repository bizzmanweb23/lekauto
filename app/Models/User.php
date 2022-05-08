<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	
    use HasFactory;
	protected $table='user';
    protected $fillable = [
	    'unique_id',
        'emp_name',
        'job_position',
        'emp_image',
		'country_code_m',
		'work_mobile',
		'department',
		'country_code_p',
		'work_phone',
		'work_email',
		'contact_address',
		'country',
		'contact_email',
		'identification_no',
		'country_code_cp',
		'contact_phone',
		'passport_no',
		'bank_accnt_no',
		'gender',
		'home_work_distance',
		'dob',
		'place_of_birth',
		'country_of_birth',
		'marital_status',
		'other_id_name',
		'other_id_no',
		'other_id_file',
		'edu_certificate_level',
		'field_of_study',
		'school',
		'website',
		'status',
    ];
}