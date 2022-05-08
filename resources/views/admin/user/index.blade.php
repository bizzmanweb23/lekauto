@extends('admin.layout.main')

@section('content') 
<div class="container-xl">
	<div class="table-responsive" id="vehicle_data">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Employee <b>Management</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Employee</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>
			    <div class="tab-content bg-white" id="myTabContent">
                    <div class="tab-pane fade show active" id="vehicle" role="tabpanel" aria-labelledby="vehicle-tab">
                        <table class="table table-striped table-hover" id="table" data-toggle="table" data-height="460" data-pagination="true"
                               data-show-pagination-switch="true" data-search="true">                
				            <thead>
					            <tr>						         
						                        <th>Employee Name</th>
						                        <th>Job Position</th>
						                        <th>Department</th>
						                        <th>Contact Number</th>
						                        <th>Country</th>
						                        <th>Email Address</th>
						                        <th>Gender</th>
						                        <th>Actions</th>
					          </tr>
				            </thead>
				                <tbody>
				                    <?php
									  foreach($result as $data)
									  {
									?>
									<tr>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->emp_name;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->job_position;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->department;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->country_code_p.$data->work_phone;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->country;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->contact_email;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->gender;?></td>
									<td style="border: 1px solid #dee2e6;">
									    <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" rel="<?php echo $data->id;?>" id="employee_view" title="View"><i class="las la-eye"></i></a> 
									    <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" rel="<?php echo $data->id;?>" id="edit_Employee_details" title="Edit"><i class="las la-edit"></i></a> 
									</td>
									</tr>
									<?php
									  }
									?>
				                </tbody>
			            </table>
		            </div>
	            </div>        
        </div>
	</div>
</div>
	<div id="showView"></div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		    <div class="p-1">
		    <div class="text-left">
                <h1 class="h4 text-gray-900 mb-4">Fill Employee's Details</h1>
            </div>
			</div>
		    <form method="post" enctype="multipart/form-data" id ="user_details_form">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="emp_name">Name:</label>
                                    <input type="text" class="form-control" id="emp_name" name="emp_name"
                                           placeholder="Employee's Name" >
                                    <span id="emp_name_error" style="color: red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="job_position">Job Position:</label>
                                    <input type="text" class="form-control" id="job_position" name="job_position"
                                           placeholder="Job Position">
                                    <span id="job_position_error" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-2">
                                <div class="upload">
                                    <img src="{{ asset('asset/image/imageicon.png') }}" alt="Product"
                                         style="height: 100px; width:100px">
                                    <label for="emp_image" class="edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        <input id="emp_image" type="file" style="display: none" name="emp_image">
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
                                            <select name="country_code_m" class="form-control" id="country_code_m">
                                                <option value="">--Select--</option>
                                                <option value="+65">+65(Singapore)</option>
                                                <option value="+86">+86(China)</option>
                                                <option value="+60">+60(Malaysia)</option>
                                                <option value="+91">+91(India)</option>
                                            </select>
                                            <span id="country_code_m_error" style="color: red"></span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="work_mobile" name="work_mobile"
                                                   placeholder="Mobile">
                                            <span id="work_mobile_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group company" id="gst">
                                    <label for="department">Department</label>
                                    <select name="department" id="department" class="form-control">
                                        <option value=""> --Select-- </option>
                                        <option value="Management">Management</option>
                                        <option value="Administration">Administration</option>
                                        <option value="Sales">Sales</option>
                                        <option value="Professional Services">Professional Services</option>
                                        <option value="Research and Devlopment">Research and Devlopment</option>
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
                                            <select name="country_code_p" class="form-control" id="country_code_p">
                                                <option value="">--Select--</option>
                                                <option value="+65">+65(Singapore)</option>
                                                <option value="+86">+86(China)</option>
                                                <option value="+60">+60(Malaysia)</option>
                                                <option value="+91">+91(India)</option>
                                            </select>
                                            <span id="country_code_p_error" style="color: red"></span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="work_phone" name="work_phone"
                                                   placeholder="Phone">
                                            <span id="work_phone_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
			                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="work_email">Work Email:</label>
                                    <input type="email" class="form-control" id="work_email" name="work_email"
                                           placeholder="Employee's Email">
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
                                            <input type="text" class="form-control" id="contact_address" name="contact_address"
                                                   placeholder="">
                                            <span id="contact_address_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country:</label>
                                            <input type="text" class="form-control" id="country" name="country"
                                                   placeholder="">
                                            <span id="country_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_email">Email:</label>
                                            <input type="text" class="form-control" id="contact_email" name="contact_email"
                                                   placeholder="">
                                            <span id="contact_email_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="identification_no">Identification No:</label>
                                            <input type="text" class="form-control" id="identification_no" name="identification_no"
                                                   placeholder="">
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
                                                    <select name="country_code_cp" class="form-control" id="country_code_cp">
                                                        <option value="">--Select--</option>
                                                        <option value="+65">+65(Singapore)</option>
                                                        <option value="+86">+86(China)</option>
                                                        <option value="+60">+60(Malaysia)</option>
                                                        <option value="+91">+91(India)</option>
                                                    </select>
                                                    <span id="country_code_cp_error" style="color: red"></span>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="contact_phone" name="contact_phone"
                                                           placeholder="">
                                                    <span id="contact_phone_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="passport_no">Passport No:</label>
                                            <input type="text" class="form-control" id="passport_no" name="passport_no"
                                                   placeholder="">
                                            <span id="passport_no_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bank_accnt_no">Bank account:</label>
                                            <input type="text" class="form-control" id="bank_accnt_no" name="bank_accnt_no"
                                                   placeholder="">
                                            <span id="bank_accnt_no_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender:</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="">--select--</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
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
                                                    <input type="text" class="form-control" id="home_work_distance" name="home_work_distance"
                                                           placeholder="">
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
                                            <input type="date" class="form-control" id="dob" name="dob"
                                                   placeholder="">
                                            <span id="dob_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="place_of_birth">Place of Birth:</label>
                                            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth"
                                                   placeholder="">
                                            <span id="place_of_birth_error" style="color: red"></span>
                                        </div>
                                    </div>
						            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country_of_birth">Country of Birth:</label>
                                            <input type="text" class="form-control" id="country_of_birth" name="country_of_birth"
                                                   placeholder="">
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
                                            <select class="form-control" id="marital_status" name="marital_status">
                                                <option value="">--select--</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Legal Cohabitant">Legal Cohabitant</option>
                                                <option value="widower">widower</option>
                                                <option value="Divorced">Divorced</option>
                                            </select>
                                            <span id="marital_status_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="other_id_name">ID Name:</label>
                                            <input type="text" class="form-control" id="other_id_name" name="other_id_name"
                                                   placeholder="">
                                            <span id="other_id_name_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="other_id_no">ID No:</label>
                                            <input type="text" class="form-control" id="other_id_no" name="other_id_no"
                                                   placeholder="">
                                            <span id="other_id_no_error" style="color: red"></span>
                                        </div>
                                    </div>
						            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="other_id_file">ID File:</label>
                                            <input type="file" class="form-control" id="other_id_file" name="other_id_file"
                                                   placeholder="">
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
                                            <select class="form-control" id="edu_certificate_level" name="edu_certificate_level">
                                                <option value="">--select--</option>
                                                <option value="Graduate">Graduate</option>
                                                <option value="Bachelor">Bachelor</option>
                                                <option value="Master">Master</option>
                                                <option value="Doctor">Doctor</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <span id="edu_certificate_level_error" style="color: red"></span>
                                        </div>
                                    </div>
						            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field_of_study">Field of Study:</label>
                                            <input type="text" class="form-control" id="field_of_study" name="field_of_study"
                                                   placeholder="">
                                            <span id="field_of_study_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="school">School:</label>
                                            <input type="text" class="form-control" id="school" name="school"
                                                   placeholder="">
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
                                                    <option value="All">All</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				                        <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important;" id="saveEmployee" type="button">Save</button>
					                </div>
				            </div>
                        </div>
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>
<!-- Add Boker -->
<!-- View Broker Modal -->
<div id="viewEmployeeModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" id="show_details">
		    <form method="post" enctype="multipart/form-data" id ="user_details_form">
			    <input type="hidden" id="viewEmployeeId">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="emp_name">Name:</label>
                                    <input type="text" class="form-control" id="emp_name" name="emp_name"
                                           placeholder="Employee's Name" >
                                    <span id="emp_name_error" style="color: red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="job_position">Job Position:</label>
                                    <input type="text" class="form-control" id="job_position" name="job_position"
                                           placeholder="Job Position">
                                    <span id="job_position_error" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-2">
                                <div class="upload">
                                    <img src="{{ asset('asset/image/imageicon.png') }}" alt="Product"
                                         style="height: 100px; width:100px">
                                    <label for="emp_image" class="edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        <input id="emp_image" type="file" style="display: none" name="emp_image">
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
                                            <select name="country_code_m" class="form-control" id="country_code_m">
                                                <option value="">--Select--</option>
                                                <option value="+65">+65(Singapore)</option>
                                                <option value="+86">+86(China)</option>
                                                <option value="+60">+60(Malaysia)</option>
                                                <option value="+91">+91(India)</option>
                                            </select>
                                            <span id="country_code_m_error" style="color: red"></span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="work_mobile" name="work_mobile"
                                                   placeholder="Mobile">
                                            <span id="work_mobile_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group company" id="gst">
                                    <label for="department">Department</label>
                                    <select name="department" id="department" class="form-control">
                                        <option value=""> --Select-- </option>
                                        <option value="1">Management</option>
                                        <option value="2">Administration</option>
                                        <option value="3">Sales</option>
                                        <option value="4">Professional Services</option>
                                        <option value="5">Research and Devlopment</option>
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
                                            <select name="country_code_p" class="form-control" id="country_code_p">
                                                <option value="">--Select--</option>
                                                <option value="+65">+65(Singapore)</option>
                                                <option value="+86">+86(China)</option>
                                                <option value="+60">+60(Malaysia)</option>
                                                <option value="+91">+91(India)</option>
                                            </select>
                                            <span id="country_code_p_error" style="color: red"></span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="work_phone" name="work_phone"
                                                   placeholder="Phone">
                                            <span id="work_phone_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
			                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="work_email">Work Email:</label>
                                    <input type="email" class="form-control" id="work_email" name="work_email"
                                           placeholder="Employee's Email">
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
                                            <input type="text" class="form-control" id="contact_address" name="contact_address"
                                                   placeholder="">
                                            <span id="contact_address_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country:</label>
                                            <input type="text" class="form-control" id="country" name="country"
                                                   placeholder="">
                                            <span id="country_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_email">Email:</label>
                                            <input type="text" class="form-control" id="contact_email" name="contact_email"
                                                   placeholder="">
                                            <span id="contact_email_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="identification_no">Identification No:</label>
                                            <input type="text" class="form-control" id="identification_no" name="identification_no"
                                                   placeholder="">
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
                                                    <select name="country_code_cp" class="form-control" id="country_code_cp">
                                                        <option value="">--Select--</option>
                                                        <option value="+65">+65(Singapore)</option>
                                                        <option value="+86">+86(China)</option>
                                                        <option value="+60">+60(Malaysia)</option>
                                                        <option value="+91">+91(India)</option>
                                                    </select>
                                                    <span id="country_code_cp_error" style="color: red"></span>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="contact_phone" name="contact_phone"
                                                           placeholder="">
                                                    <span id="contact_phone_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="passport_no">Passport No:</label>
                                            <input type="text" class="form-control" id="passport_no" name="passport_no"
                                                   placeholder="">
                                            <span id="passport_no_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bank_accnt_no">Bank account:</label>
                                            <input type="text" class="form-control" id="bank_accnt_no" name="bank_accnt_no"
                                                   placeholder="">
                                            <span id="bank_accnt_no_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender:</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="">--select--</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
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
                                                    <input type="text" class="form-control" id="home_work_distance" name="home_work_distance"
                                                           placeholder="">
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
                                            <input type="date" class="form-control" id="dob" name="dob"
                                                   placeholder="">
                                            <span id="dob_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="place_of_birth">Place of Birth:</label>
                                            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth"
                                                   placeholder="">
                                            <span id="place_of_birth_error" style="color: red"></span>
                                        </div>
                                    </div>
						            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country_of_birth">Country of Birth:</label>
                                            <input type="text" class="form-control" id="country_of_birth" name="country_of_birth"
                                                   placeholder="">
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
                                            <select class="form-control" id="marital_status" name="marital_status">
                                                <option value="">--select--</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Legal Cohabitant">Legal Cohabitant</option>
                                                <option value="widower">widower</option>
                                                <option value="Divorced">Divorced</option>
                                            </select>
                                            <span id="marital_status_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="other_id_name">ID Name:</label>
                                            <input type="text" class="form-control" id="other_id_name" name="other_id_name"
                                                   placeholder="">
                                            <span id="other_id_name_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="other_id_no">ID No:</label>
                                            <input type="text" class="form-control" id="other_id_no" name="other_id_no"
                                                   placeholder="">
                                            <span id="other_id_no_error" style="color: red"></span>
                                        </div>
                                    </div>
						            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="other_id_file">ID File:</label>
                                            <input type="file" class="form-control" id="other_id_file" name="other_id_file"
                                                   placeholder="">
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
                                            <select class="form-control" id="edu_certificate_level" name="edu_certificate_level">
                                                <option value="">--select--</option>
                                                <option value="Graduate">Graduate</option>
                                                <option value="Bachelor">Bachelor</option>
                                                <option value="Master">Master</option>
                                                <option value="Doctor">Doctor</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <span id="edu_certificate_level_error" style="color: red"></span>
                                        </div>
                                    </div>
						            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field_of_study">Field of Study:</label>
                                            <input type="text" class="form-control" id="field_of_study" name="field_of_study"
                                                   placeholder="">
                                            <span id="field_of_study_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="school">School:</label>
                                            <input type="text" class="form-control" id="school" name="school"
                                                   placeholder="">
                                            <span id="school_error" style="color: red"></span>
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
                </div>
            </form>
		</div>
	</div>
</div>
<!-- Edit Broker Modal -->
<div id="edit_Employee_Modal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" id="show_edit_details">
            <form method="post" enctype="multipart/form-data" id ="user_details_form">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="emp_name">Name:</label>
                                    <input type="text" class="form-control" id="emp_name" name="emp_name"
                                           placeholder="Employee's Name" >
                                    <span id="emp_name_error" style="color: red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="job_position">Job Position:</label>
                                    <input type="text" class="form-control" id="job_position" name="job_position"
                                           placeholder="Job Position">
                                    <span id="job_position_error" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-2">
                                <div class="upload">
                                    <img src="{{ asset('asset/image/imageicon.png') }}" alt="Product"
                                         style="height: 100px; width:100px">
                                    <label for="emp_image" class="edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        <input id="emp_image" type="file" style="display: none" name="emp_image">
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
                                            <select name="country_code_m" class="form-control" id="country_code_m">
                                                <option value="">--Select--</option>
                                                <option value="+65">+65(Singapore)</option>
                                                <option value="+86">+86(China)</option>
                                                <option value="+60">+60(Malaysia)</option>
                                                <option value="+91">+91(India)</option>
                                            </select>
                                            <span id="country_code_m_error" style="color: red"></span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="work_mobile" name="work_mobile"
                                                   placeholder="Mobile">
                                            <span id="work_mobile_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group company" id="gst">
                                    <label for="department">Department</label>
                                    <select name="department" id="department" class="form-control">
                                        <option value=""> --Select-- </option>
                                        <option value="Management">Management</option>
                                        <option value="Administration">Administration</option>
                                        <option value="Sales">Sales</option>
                                        <option value="Professional Services">Professional Services</option>
                                        <option value="Research and Devlopment">Research and Devlopment</option>
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
                                            <select name="country_code_p" class="form-control" id="country_code_p">
                                                <option value="">--Select--</option>
                                                <option value="+65">+65(Singapore)</option>
                                                <option value="+86">+86(China)</option>
                                                <option value="+60">+60(Malaysia)</option>
                                                <option value="+91">+91(India)</option>
                                            </select>
                                            <span id="country_code_p_error" style="color: red"></span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="work_phone" name="work_phone"
                                                   placeholder="Phone">
                                            <span id="work_phone_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
			                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="work_email">Work Email:</label>
                                    <input type="email" class="form-control" id="work_email" name="work_email"
                                           placeholder="Employee's Email">
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
                                            <input type="text" class="form-control" id="contact_address" name="contact_address"
                                                   placeholder="">
                                            <span id="contact_address_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country:</label>
                                            <input type="text" class="form-control" id="country" name="country"
                                                   placeholder="">
                                            <span id="country_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_email">Email:</label>
                                            <input type="text" class="form-control" id="contact_email" name="contact_email"
                                                   placeholder="">
                                            <span id="contact_email_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="identification_no">Identification No:</label>
                                            <input type="text" class="form-control" id="identification_no" name="identification_no"
                                                   placeholder="">
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
                                                    <select name="country_code_cp" class="form-control" id="country_code_cp">
                                                        <option value="">--Select--</option>
                                                        <option value="+65">+65(Singapore)</option>
                                                        <option value="+86">+86(China)</option>
                                                        <option value="+60">+60(Malaysia)</option>
                                                        <option value="+91">+91(India)</option>
                                                    </select>
                                                    <span id="country_code_cp_error" style="color: red"></span>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="contact_phone" name="contact_phone"
                                                           placeholder="">
                                                    <span id="contact_phone_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="passport_no">Passport No:</label>
                                            <input type="text" class="form-control" id="passport_no" name="passport_no"
                                                   placeholder="">
                                            <span id="passport_no_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bank_accnt_no">Bank account:</label>
                                            <input type="text" class="form-control" id="bank_accnt_no" name="bank_accnt_no"
                                                   placeholder="">
                                            <span id="bank_accnt_no_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender:</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="">--select--</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
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
                                                    <input type="text" class="form-control" id="home_work_distance" name="home_work_distance"
                                                           placeholder="">
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
                                            <input type="date" class="form-control" id="dob" name="dob"
                                                   placeholder="">
                                            <span id="dob_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="place_of_birth">Place of Birth:</label>
                                            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth"
                                                   placeholder="">
                                            <span id="place_of_birth_error" style="color: red"></span>
                                        </div>
                                    </div>
						            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country_of_birth">Country of Birth:</label>
                                            <input type="text" class="form-control" id="country_of_birth" name="country_of_birth"
                                                   placeholder="">
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
                                            <select class="form-control" id="marital_status" name="marital_status">
                                                <option value="">--select--</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Legal Cohabitant">Legal Cohabitant</option>
                                                <option value="widower">widower</option>
                                                <option value="Divorced">Divorced</option>
                                            </select>
                                            <span id="marital_status_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="other_id_name">ID Name:</label>
                                            <input type="text" class="form-control" id="other_id_name" name="other_id_name"
                                                   placeholder="">
                                            <span id="other_id_name_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="other_id_no">ID No:</label>
                                            <input type="text" class="form-control" id="other_id_no" name="other_id_no"
                                                   placeholder="">
                                            <span id="other_id_no_error" style="color: red"></span>
                                        </div>
                                    </div>
						            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="other_id_file">ID File:</label>
                                            <input type="file" class="form-control" id="other_id_file" name="other_id_file"
                                                   placeholder="">
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
                                            <select class="form-control" id="edu_certificate_level" name="edu_certificate_level">
                                                <option value="">--select--</option>
                                                <option value="Graduate">Graduate</option>
                                                <option value="Bachelor">Bachelor</option>
                                                <option value="Master">Master</option>
                                                <option value="Doctor">Doctor</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <span id="edu_certificate_level_error" style="color: red"></span>
                                        </div>
                                    </div>
						            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field_of_study">Field of Study:</label>
                                            <input type="text" class="form-control" id="field_of_study" name="field_of_study"
                                                   placeholder="">
                                            <span id="field_of_study_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="school">School:</label>
                                            <input type="text" class="form-control" id="school" name="school"
                                                   placeholder="">
                                            <span id="school_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				                        <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important;" id="saveEditEmployee" type="button">Save</button>
					                </div>
				                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee Record</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<div id="user_loder" style="display: none">
        @include('admin.loder.index')
    </div>
@section('javascript')
@include('admin.js.employee')
@endsection
@endsection
