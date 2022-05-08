<form method="post" id="employeeEditForm" enctype="multipart/form-data" action="{{ route('admin.update_employee_details')}}">
			    <input type="hidden" id="editEmployeeIdupdate" value="<?php echo $data[0]->id;?>">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="emp_name">Name:</label>
                                    <input type="text" class="form-control" id="emp_name" name="emp_name" value="<?php echo $data[0]->emp_name;?>"  placeholder="Employee's Name" >
                                    <span id="emp_name_error" style="color: red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="job_position">Job Position:</label>
                                    <input type="text" class="form-control" id="job_position" name="job_position"
                                           value="<?php echo $data[0]->job_position;?>" placeholder="Job Position">
                                    <span id="job_position_error" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2">
                                <div class="upload">
								    <input type="hidden" name="oldImage" value="<?php echo $data[0]->emp_image;?>">
                                    <img src="asset/empImage/<?php echo $data[0]->emp_image;?>" alt="Employee Image"
                                         style="height: 100px; width:100px" />
                                    <label for="emp_image" class="edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        <input id="emp_image" type="file" style="display: none" name="emp_image" value="{{ asset('asset/image/<?php echo $data[0]->emp_image;?>') }}">
                                        <span id="emp_image_error" style="color: red"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="work_mobile">Work Mobile</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select name="country_code_m" class="form-control" id="country_code_m" >
                                                <option value="">--Select--</option>
                                                <option <?php if($data[0]->country_code_m == '+65'){ echo 'selected';}?> value="+65" >+65(Singapore)</option>
                                                <option <?php if($data[0]->country_code_m == '+86'){ echo 'selected';}?> value="+86" >+86(China)</option>
                                                <option <?php if($data[0]->country_code_m == '+60'){ echo 'selected';}?> value="+60" >+60(Malaysia)</option>
                                                <option <?php if($data[0]->country_code_m == '+91'){ echo 'selected';}?> value="+91" >+91(India)</option>
                                            </select>
                                            <span id="country_code_m_error" style="color: red"></span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="work_mobile" name="work_mobile" value="<?php echo $data[0]->work_mobile;?>" placeholder="Mobile" >
                                            <span id="work_mobile_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group company" id="gst">
                                    <label for="department">Department</label>
                                    <select name="department" id="department" class="form-control" >
                                        <option value=""> --Select-- </option>
                                        <option <?php if($data[0]->department == 'Management'){ echo 'selected';}?> value="Management" >Management</option>
                                        <option <?php if($data[0]->department == 'Administration'){ echo 'selected';}?> value="Administration" >Administration</option>
                                        <option <?php if($data[0]->department == 'Sales'){ echo 'selected';}?> value="Sales" >Sales</option>
                                        <option <?php if($data[0]->department == 'Professional Services'){ echo 'selected';}?> value="Professional Services" >Professional Services</option>
                                        <option <?php if($data[0]->department == 'Research and Devlopment'){ echo 'selected';}?> value="Research and Devlopment" >Research and Devlopment</option>
                                    </select>
                                    <span id="department_error" style="color: red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="work_phone">Work Phone</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select name="country_code_p" class="form-control" id="country_code_p" >
                                                <option value="">--Select--</option>
                                                <option <?php if($data[0]->country_code_p == '+65'){ echo 'selected';}?> value="+65" >+65(Singapore)</option>
                                                <option <?php if($data[0]->country_code_p == '+86'){ echo 'selected';}?> value="+86" >+86(China)</option>
                                                <option <?php if($data[0]->country_code_p == '+60'){ echo 'selected';}?> value="+60" >+60(Malaysia)</option>
                                                <option <?php if($data[0]->country_code_p == '+91'){ echo 'selected';}?> value="+91" >+91(India)</option>
                                            </select>
                                            <span id="country_code_p_error" style="color: red"></span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="work_phone" name="work_phone" value="<?php echo $data[0]->work_phone;?>" placeholder="Phone" >
                                            <span id="work_phone_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
			                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="work_email">Work Email:</label>
                                    <input type="email" class="form-control" id="work_email" name="work_email" value="<?php echo $data[0]->work_email;?>" placeholder="Employee's Email" >
                                    <span id="work_email_error" style="color: red"></span>
                                </div>
				            </div>
                        </div>            
                        <ul class="nav nav-tabs mt-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#private_info">Private Information</a>
                            </li>
                        </ul>
                        <div class="tab-content mb-3">
                            <div id="contact_address" class="container tab-pane active"><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Private Contact</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Citizenship</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_address">Address:</label>
                                            <input type="text" class="form-control" id="contact_address" name="contact_address" value="<?php echo $data[0]->contact_address;?>" placeholder="" >
                                            <span id="contact_address_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country:</label>
                                            <input type="text" class="form-control" id="country" name="country" value="<?php echo $data[0]->country;?>" placeholder="" >
                                            <span id="country_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_email">Email:</label>
                                            <input type="text" class="form-control" id="contact_email" name="contact_email" value="<?php echo $data[0]->contact_email;?>" placeholder="" >
                                            <span id="contact_email_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="identification_no">Identification No:</label>
                                            <input type="text" class="form-control" id="identification_no" name="identification_no" value="<?php echo $data[0]->identification_no;?>" placeholder="" >
                                            <span id="identification_no_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_phone">Phone:</label>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <select name="country_code_cp" class="form-control" id="country_code_cp" >
                                                        <option value="">--Select--</option>
                                                        <option <?php if($data[0]->country_code_cp == '+65'){ echo 'selected';}?> value="+65">+65(Singapore)</option>
                                                        <option <?php if($data[0]->country_code_cp == '+86'){ echo 'selected';}?> value="+86">+86(China)</option>
                                                        <option <?php if($data[0]->country_code_cp == '+60'){ echo 'selected';}?> value="+60">+60(Malaysia)</option>
                                                        <option <?php if($data[0]->country_code_cp == '+91'){ echo 'selected';}?> value="+91">+91(India)</option>
                                                    </select>
                                                    <span id="country_code_cp_error" style="color: red"></span>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="<?php echo $data[0]->contact_phone;?>" placeholder="" >
                                                    <span id="contact_phone_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="passport_no">Passport No:</label>
                                            <input type="text" class="form-control" id="passport_no" name="passport_no" value="<?php echo $data[0]->passport_no;?>" placeholder="" >
                                            <span id="passport_no_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bank_accnt_no">Bank account:</label>
                                            <input type="text" class="form-control" id="bank_accnt_no" name="bank_accnt_no" value="<?php echo $data[0]->bank_accnt_no;?>" placeholder="" >
                                            <span id="bank_accnt_no_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender:</label>
                                            <select class="form-control" id="gender" name="gender" >
                                                <option value="">--select--</option>
                                                <option <?php if($data[0]->gender == 'Male'){ echo 'selected';}?> value="Male">Male</option>
                                                <option <?php if($data[0]->gender == 'Female'){ echo 'selected';}?> value="Female">Female</option>
                                                <option <?php if($data[0]->gender == 'Other'){ echo 'selected';}?> value="Other">Other</option>
                                            </select>
                                            <span id="gender_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label for="home_work_distance">Home Work Distance:</label>
                                                    <input type="text" class="form-control" id="home_work_distance" name="home_work_distance" value="<?php echo $data[0]->home_work_distance;?>" placeholder="" >
                                                    <span id="home_work_distance_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-4 pt-2">
                                                <p>KM</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dob">Date of Birth:</label>
                                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $data[0]->dob;?>" placeholder="" >
                                            <span id="dob_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="place_of_birth">Place of Birth:</label>
                                            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="<?php echo $data[0]->place_of_birth;?>" placeholder="" >
                                            <span id="place_of_birth_error" style="color: red"></span>
                                        </div>
                                    </div>
						            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country_of_birth">Country of Birth:</label>
                                            <input type="text" class="form-control" id="country_of_birth" name="country_of_birth" value="<?php echo $data[0]->country_of_birth;?>" placeholder="" >
                                            <span id="country_of_birth_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <h5>Marital Status</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Other Details</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marital_status">Marital Status:</label>
                                            <select class="form-control" id="marital_status" name="marital_status" >
                                                <option value="">--select--</option>
                                                <option <?php if($data[0]->marital_status == 'Single'){ echo 'selected';}?> value="Single">Single</option>
                                                <option <?php if($data[0]->marital_status == 'Married'){ echo 'selected';}?> value="Married">Married</option>
                                                <option <?php if($data[0]->marital_status == 'Legal Cohabitant'){ echo 'selected';}?> value="Legal Cohabitant">Legal Cohabitant</option>
                                                <option <?php if($data[0]->marital_status == 'widower'){ echo 'selected';}?> value="widower">widower</option>
                                                <option <?php if($data[0]->marital_status == 'Divorced'){ echo 'selected';}?> value="Divorced">Divorced</option>
                                            </select>
                                            <span id="marital_status_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="other_id_name">ID Name:</label>
                                            <input type="text" class="form-control" id="other_id_name" name="other_id_name" value="<?php echo $data[0]->other_id_name;?>" placeholder="" >
                                            <span id="other_id_name_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="other_id_no">ID No:</label>
                                            <input type="text" class="form-control" id="other_id_no" name="other_id_no" value="<?php echo $data[0]->other_id_no;?>" placeholder="" >
                                            <span id="other_id_no_error" style="color: red"></span>
                                        </div>
                                    </div>
						            <div class="col-md-6">
                                        <div class="form-group">
										    <input type="hidden" value="<?php echo $data[0]->other_id_file;?>" name="oldIdFile">
                                            <label for="other_id_file">ID File:</label>
                                            <input type="file" class="form-control" id="other_id_file" name="other_id_file" value="<?php echo $data[0]->other_id_file;?>" placeholder="" >
                                            <span id="other_id_file_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>                    
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <h5>Education</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="edu_certificate_level">Certificate Level:</label>
                                            <select class="form-control" id="edu_certificate_level" name="edu_certificate_level" >
                                                <option value="">--select--</option>
                                                <option <?php if($data[0]->edu_certificate_level == 'Graduate'){ echo 'selected';}?> value="Graduate">Graduate</option>
                                                <option <?php if($data[0]->edu_certificate_level == 'Bachelor'){ echo 'selected';}?> value="Bachelor">Bachelor</option>
                                                <option <?php if($data[0]->edu_certificate_level == 'Master'){ echo 'selected';}?> value="Master">Master</option>
                                                <option <?php if($data[0]->edu_certificate_level == 'Doctor'){ echo 'selected';}?> value="Doctor">Doctor</option>
                                                <option <?php if($data[0]->edu_certificate_level == 'Other'){ echo 'selected';}?> value="Other">Other</option>
                                            </select>
                                            <span id="edu_certificate_level_error" style="color: red"></span>
                                        </div>
                                    </div>
						            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field_of_study">Field of Study:</label>
                                            <input type="text" class="form-control" id="field_of_study" name="field_of_study" value="<?php echo $data[0]->field_of_study;?>" placeholder="" >
                                            <span id="field_of_study_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="school">School:</label>
                                            <input type="text" class="form-control" id="school" name="school" value="<?php echo $data[0]->school;?>" placeholder="" >
                                            <span id="school_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>								
                            </div>
							<ul class="nav nav-tabs mt-4" role="tablist">                          
							    <li class="nav-item">
							        <a class="nav-link active" data-bs-toggle="tab" href="#access_rights">Access Rights</a>
							    </li>
                            </ul>
							<div id="access_rights" class="container tab-pane active"><br>
                                <div class="row mt-2 customer">
                                    <div class="col-md-6">
                                        <h5>Website</h5>
                                        <div class="row mt-1">
                                            <div class="col-md-12">
                                                <label for="website">Website</label>
                                                <select name="website" id="website" class="form-control">
                                                    <option value="">--Select--</option>
                                                    <option <?php if($data[0]->website == 'All'){ echo 'selected';}?> value="All">All</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				                    <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important;" type="button">Back</button>
					            </div>
				            </div>
                        </div>
                    </div>
                </div>
            </form>