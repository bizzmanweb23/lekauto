@extends('admin.layout.main')

@section('content') 
<div class="container-xl">
	<div class="table-responsive" id="vehicle_data">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Insurance <b>Management</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addInsuranceModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Insurance</span></a>
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
						                        <th>Vehicle Name</th>
						                        <th>Registration Number</th>
						                        <th>Insurance Start Date</th>
						                        <th>Insurance End Date</th>
						                        <th>Insurance Type</th>						                        
						                        <th>Actions</th>
					          </tr>
				            </thead>
				                <tbody>
				                    <?php
									  foreach($result as $data)
									  {
									?>
									<tr>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->insuranceVehicleName;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->insuranceRegistrationNumber;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->insuranceStartDate;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->insuranceEndDate;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->insuranceType;?></td>
									<td style="border: 1px solid #dee2e6;">
									    <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" rel="<?php echo $data->id;?>" id="edit_insurance_details" title="Edit"><i class="las la-edit"></i></a> 
									    <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" rel="<?php echo $data->id;?>" id="delete_gst_details" title="Delete"><i class="far fa-trash-alt"></i></i></a> 
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
<div id="addInsuranceModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		    <div class="p-1">
		    <div class="text-left">
                <h1 class="h4 text-gray-900 mb-4">Fill Insurance's Details</h1>
            </div>
			</div>
		    <form method="post" id="insurance_details_form">
			    <div class="card">
                <div class="card-body">
				@csrf
                <div class="row">
                    <div class="col-md-4">
					    <label>Vehicle Name*:</label>
                        <input type="text" class="form-control form-control-user" id="insuranceVehicleName"
                               placeholder="Vehicle Name" name="insuranceVehicleName">
						<span id="insuranceVehicleName_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Vehicle Number*:</label>
                        <input type="text" class="form-control form-control-user" id="insuranceRegistrationNumber"
                               placeholder="Vehicle Number" name="insuranceRegistrationNumber">
						<span id="insuranceRegistrationNumber_error" style="color: red"></span>
                    </div>
					 <div class="col-md-4">
						<label>Select Insurance Type*:</label>
                        <select name="insuranceType" id="insuranceType" class="form-control form-control-user">
						    <option value="0">--Select--</option>
							<?php
							foreach($type as $data)
							{
							?>
                            <option value="<?php echo $data->insuranceType;?>"><?php echo $data->insuranceType;?></option>
                            <?php
							}
							?>                                                                     
                        </select>                        
						<span id="insuranceType_error" style="color: red"></span>
                    </div>
						
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Insurance Provider*:</label>                        
                        <select name="insuranceProvider" id="insuranceProvider" class="form-control form-control-user">
						    <option value="0">--Select--</option>
							<?php 
							foreach($provider as $data)
							{
						    ?>
                            <option value="<?php echo $data->insuranceProviderName;?>"><?php echo $data->insuranceProviderName;?></option>
                            <?php
							}
							?>                                                                    
                        </select>
						<span id="insuranceProvider_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
						<label>Insurance Validity*:</label>
                        <select name="insuranceValidity" id="insuranceValidity" class="form-control form-control-user">
						    <option value="0">--Select--</option>							                                                                   
						    <option value="3">Three Months</option>							                                                                   
						    <option value="6">Six Months</option>							                                                                   
						    <option value="9">Nine Months</option>							                                                                   
						    <option value="1">One Year</option>							                                                                   
						    <option value="2">Two Years</option>							                                                                   
                        </select>
						<span id="insuranceValidity_error" style="color: red"></span>
                    </div>
				    <div class="col-md-4">
						<label>Insurance Start Date*:</label>
                        <input type="date" class="form-control form-control-user" id="insuranceStartDate"
                               name="insuranceStartDate">
						<span id="insuranceStartDate_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Insurance End Date*:</label>
                        <input type="date" class="form-control form-control-user" id="insuranceEndDate"
                               name="insuranceEndDate">
					    <span id="insuranceEndDate_error" style="color: red"></span>
                    </div>                   
				</div>
				<div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				        <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important;" id="insurancedetails_button" type="button">Save</button>
					</div>
				</div>
                </div>
                </div>				
            </form>
		</div>
	</div>
</div>
<!-- Add Boker -->
<!-- Edit Broker Modal -->
<div id="edit_insurance_Modal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" id="show_insurance_details">
            <form method="post" id="insurance_edit_form">
			    <div class="card">
                <div class="card-body">
				@csrf
                <div class="row">
                    <div class="col-md-4">
					    <label>Vehicle Name*:</label>
                        <input type="text" class="form-control form-control-user" id="insuranceVehicleName"
                               placeholder="Vehicle Name" name="insuranceVehicleName">
						<span id="insuranceVehicleName_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Registration Number*:</label>
                        <input type="text" class="form-control form-control-user" id="insuranceRegistrationNumber"
                               placeholder="Registration Number" name="insuranceRegistrationNumber">
						<span id="insuranceRegistrationNumber_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
						<label>Insurance Start Date*:</label>
                        <input type="date" class="form-control form-control-user" id="insuranceStartDate"
                               name="insuranceStartDate">
						<span id="insuranceStartDate_error" style="color: red"></span>
                    </div>					
                </div>
				<div class="row mt-2">				   
                    <div class="col-md-4">
						<label>Insurance End Date*:</label>
                        <input type="date" class="form-control form-control-user" id="insuranceEndDate"
                               name="insuranceEndDate">
					    <span id="insuranceEndDate_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
						<label>Select Insurance Type*:</label>
                        <select name="insuranceType" id="insuranceType" class="form-control form-control-user">
						    <option value="0">--Select--</option>
                            <option value="Third Party">Third Party</option>
                            <option value="Full Insurance">Full Insurance</option>                                                                     
                        </select>                        
						<span id="insuranceType_error" style="color: red"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				        <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important;" id="insuranceedit_button" type="button">Save</button>
					</div>
				</div>
                </div>
                </div>				
            </form>
        </div>
	</div>
</div>
<!-- Delete Insurance Modal -->
<div id="deleteInsuranceModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
			    <input type="hidden" id="deleteInsuranceID">
				<div class="modal-header">						
					<h4 class="modal-title">Delete Insurance Record</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Record?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="button" class="btn btn-danger" value="Delete" id="deleteInsuranceRecord">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Insurance Modal -->
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Insurance Record</h4>
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
@include('admin.js.insurance')
@endsection
@endsection
