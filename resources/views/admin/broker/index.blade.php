@extends('admin.layout.main')

@section('content') 
<div class="container-xl">
	<div class="table-responsive" id="vehicle_data">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Broker <b>Management</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addBrokerModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Broker</span></a>
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
						                        <th>Broker Name</th>
						                        <th>Broker Type</th>
						                        <th>Country</th>
						                        <th>City</th>
						                        <th>Contact Number</th>
						                        <th>Email Address</th>
						                        <th>Actions</th>
					          </tr>
				            </thead>
				                <tbody>
				                    <?php
									  foreach($result as $data)
									  {
									?>
									<tr>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->first_name.$data->last_name;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->broker_type;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->country;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->city;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->mobile_number;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->email_address;?></td>
									<td style="border: 1px solid #dee2e6;">
									    <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" rel="<?php echo $data->id;?>" id="broker_view" title="View"><i class="las la-eye"></i></a> 
									    <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" rel="<?php echo $data->id;?>" id="edit_broker_details" title="Edit"><i class="las la-edit"></i></a>
                                        <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" rel="<?php echo $data->id;?>" id="delete_broker_details" title="Delete"><i class="far fa-trash-alt"></i></i></a>										
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
<div id="addBrokerModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		    <div class="p-1">
		    <div class="text-left">
                <h1 class="h4 text-gray-900 mb-4">Fill Broker's Details</h1>
            </div>
			</div>
		    <form method="post" id="broker_details_form">
			    <div class="card">
                <div class="card-body">
				@csrf
                <div class="row">
                    <div class="col-md-4">
					    <label>First Name*:</label>
                        <input type="text" class="form-control form-control-user" id="first_name"
                               placeholder="First Name" name="first_name">
						<span id="first_name_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Last Name*:</label>
                        <input type="text" class="form-control form-control-user" id="first_name"
                               placeholder="Last Name" name="last_name">
						<span id="first_name_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
						<label>Address*:</label>
                        <input type="text" class="form-control form-control-user" id="address"
                               placeholder="Enter Your Address" name="address">
						<span id="address_error" style="color: red"></span>
                    </div>					
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>City*:</label>
                        <input type="text" class="form-control form-control-user" id="city"
                               placeholder="Enter Your City" value="Singapore" name="city">
						<span id="city_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Country*:</label>
                        <input type="text" class="form-control form-control-user" id="country"
                               placeholder="Enter Your Country" value="Singapore" name="country">
					    <span id="country_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
					    <label>Mobile Number*:</label>
                        <input type="text" class="form-control form-control-user" id="mobile_number"
                               placeholder="Enter your Mobile Number" name="mobile_number">
						<span id="mobile_number_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
					    <label>Landline Number*:</label>
                        <input type="text" class="form-control form-control-user" id="landline_number"
                               placeholder="Enter your Landline Number" name="landline_number">
						<span id="landline_number_error" style="color: red"></span>
                    </div>
				    <div class="col-md-4">
						<label>Email Address*:</label>
                        <input type="text" class="form-control form-control-user" id="email"
                               placeholder="Enter your Email Address" name="email_address">
					    <span id="email_address_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Select Broker Type*:</label>
                        <select name="broker_type" id="brokerType" class="form-control form-control-user">
						    <option value="0">--Select--</option>
                            <option class="broker_type" value="Senior Broker">Senior Broker</option>
                            <option class="broker_type" value="Broker">Broker</option>
                            <option class="broker_type" value="Junior Broker">Junior Broker</option>                                          
                        </select>
						<span id="brokerType_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-3">
				   <div class="col-md-4">
					    <label>Select Broker Percentage*:</label>
						<input type="text" class="form-control form-control-user" id="brokerCommision"
                               placeholder="Enter Broker Commission" name="broker_commision">
						<span id="brokerCommision_error" style="color: red"></span>
                    </div>
				</div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				        <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important;" id="brokerdetails_button" type="button">Save</button>
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
<div id="viewBrokerModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" id="show_details">
		     <form method="get" id="broker_details_form">
			    <div class="card">
                <div class="card-body">
			    <input type="hidden" id="broker_id">
				@csrf
                <div class="row">
                    <div class="col-md-4">
					    <label>First Name*:</label>
                        <input type="text" class="form-control form-control-user" id="first_name"
                               placeholder="First Name" name="first_name">
						<span id="first_name_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Last Name*:</label>
                        <input type="text" class="form-control form-control-user" id="last_name"
                               placeholder="Last Name" name="last_name">
						<span id="first_name_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
						<label>Address*:</label>
                        <input type="text" class="form-control form-control-user" id="address"
                               placeholder="Enter Your Address" name="address">
						<span id="address_error" style="color: red"></span>
                    </div>					
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>City*:</label>
                        <input type="text" class="form-control form-control-user" id="city"
                               placeholder="Enter Your City" value="<?php echo $data->city;?>" name="city">
						<span id="city_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Country*:</label>
                        <input type="text" class="form-control form-control-user" id="country"
                               placeholder="Enter Your Country" name="country">
					    <span id="country_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
					    <label>Mobile Number*:</label>
                        <input type="text" class="form-control form-control-user" id="mobile_number"
                               placeholder="Enter your Mobile Number" name="mobile_number">
						<span id="mobile_number_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Email Address*:</label>
                        <input type="text" class="form-control form-control-user" id="email_address"
                               placeholder="Enter your Email Address" name="email_address">
					    <span id="email_address_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Select Broker Type*:</label>
                        <select name="broker_type" id="broker_type">
						    <option value="0">--Select--</option>
                            <option value="Senior Broker">Senior Broker</option>
                            <option value="Broker">Broker</option>
                            <option value="Assistant Broker Jab">Assistant Broker Jab</option>
                            <option value="Junior Broker">Junior Broker</option>                                          
                        </select>
						<span id="brokerType_error" style="color: red"></span>
                    </div>
					<div class="col-md-3">
					    <label>Select Broker Percentage*:</label>
                        <select name="broker_commision" id="broker_commision">
						    <option value="0">--Select Percentage--</option>
                            <option value="60%">60%</option>
                            <option value="50%">50%</option>
                            <option value="40%">40%</option>
                            <option value="30%">30%</option>                                          
                        </select>
						<span id="brokerCommision_error" style="color: red"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				        <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important;" type="button">Back</button>
					</div>
				</div>
                </div>
                </div>				
            </form>
		</div>
	</div>
</div>
<!-- Edit Broker Modal -->
<div id="edit_Broker_Modal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" id="show_edit_details">
             <form method="post" id="broker_edit_form">
			    <div class="card">
                <div class="card-body">
				@csrf
                <div class="row">
                    <div class="col-md-4">
					    <label>First Name*:</label>
                        <input type="text" class="form-control form-control-user" id="first_name"
                               placeholder="First Name" name="first_name">
						<span id="first_name_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Last Name*:</label>
                        <input type="text" class="form-control form-control-user" id="first_name"
                               placeholder="Last Name" name="last_name">
						<span id="first_name_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
						<label>Address*:</label>
                        <input type="text" class="form-control form-control-user" id="address"
                               placeholder="Enter Your Address" name="address">
						<span id="address_error" style="color: red"></span>
                    </div>					
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>City*:</label>
                        <input type="text" class="form-control form-control-user" id="city"
                               placeholder="Enter Your City" name="city">
						<span id="city_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Country*:</label>
                        <input type="text" class="form-control form-control-user" id="country"
                               placeholder="Enter Your Country" name="country">
					    <span id="country_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
					    <label>Mobile Number*:</label>
                        <input type="text" class="form-control form-control-user" id="mobile_number"
                               placeholder="Enter your Mobile Number" name="mobile_number">
						<span id="mobile_number_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Email Address*:</label>
                        <input type="text" class="form-control form-control-user" id="email_address"
                               placeholder="Enter your Email Address" name="email_address">
					    <span id="email_address_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Select Broker Type*:</label>
                        <select name="broker_type" id="broker_type">
						    <option value="0">--Select--</option>
                            <option value="1">Senior Broker</option>
                            <option value="2">Broker</option>
                            <option value="3">Assistant Broker Jab</option>
                            <option value="4">Junior Broker</option>                                          
                        </select>
						<span id="brokerType_error" style="color: red"></span>
                    </div>
					<div class="col-md-3">
					    <label>Select Broker Percentage*:</label>
                        <select name="broker_commision" id="broker_commision">
						    <option value="0">--Select Percentage--</option>
                            <option value="1">60%</option>
                            <option value="2">50%</option>
                            <option value="3">40%</option>
                            <option value="4">30%</option>                                          
                        </select>
						<span id="brokerCommision_error" style="color: red"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				        <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important;" id="brokeredit_button" type="button">Save</button>
					</div>
				</div>
                </div>
                </div>				
            </form>
        </div>
	</div>
</div>
<!-- Delete Broker Modal -->
<div id="deleteBrokerModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
			    <input type="hidden" id="deleteID">
				<div class="modal-header">						
					<h4 class="modal-title">Delete Broker Record</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Record?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="button" class="btn btn-danger" value="Delete" id="deleteBrokerButton">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Broker Modal -->
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Vehicle Record</h4>
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
@include('admin.js.broker')
@endsection
@endsection
