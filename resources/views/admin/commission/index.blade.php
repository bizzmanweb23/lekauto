@extends('admin.layout.main')

@section('content') 
<div class="container-xl">
	<div class="table-responsive" id="vehicle_data">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Commission <b>Management</b></h2>
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
						                        <th>Status</th>
						                        <th>Propellant</th>
						                        <th>Color</th>
						                        <th>Actions</th>
					          </tr>
				            </thead>
				                <tbody>
				                    <?php
									  foreach($result as $data)
									  {
									?>
									<tr>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->vehicle_make.$data->vehicle_year;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->vehicle_number;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->vehicle_status;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->propellant;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->color;?></td>
									<td style="border: 1px solid #dee2e6;">
									    <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" rel="<?php echo $data->id;?>" id="commission_details_button" title="Edit"><i class="las la-edit"></i></a>								
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
<!-- Edit Broker Modal -->
<div id="edit_Commission_Modal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" id="show_commission_details">
             <form method="post" id="commission_edit_form">
			    <div class="card">
                <div class="card-body">
				@csrf
                <div class="row">
                    <div class="col-md-4">
					    <label>Vehicle Name:</label>
                        <input type="text" class="form-control form-control-user" id="vehicle_name"
                               placeholder="Vehicle Name" name="vehicle_name">
						<span id="vehicle_name_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Registration Number:</label>
                        <input type="text" class="form-control form-control-user" id="registration_number"
                               placeholder="Registration Number" name="registration_number">
						<span id="registration_number_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
						<label>Repair Cost:</label>
                        <input type="text" class="form-control form-control-user" id="repair_cost"
                               placeholder="Repair Cost" name="repair_cost">
						<span id="repair_cost_error" style="color: red"></span>
                    </div>					
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Miscellenous Cost:</label>
                        <input type="text" class="form-control form-control-user" id="miscellenous_cost"
                               placeholder="Miscellenous Cost" name="miscellenous_cost">
						<span id="city_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Cost Center Amount:</label>
                        <input type="text" class="form-control form-control-user" id="cost_center_amount"
                               placeholder="Cost Center Amount" name="cost_center_amount">
					    <span id="cost_center_amount_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
					    <label>Total Cost*:</label>
                        <input type="text" class="form-control form-control-user" id="total_cost"
                               placeholder="Total Cost" name="total_cost">
						<span id="total_cost_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Broker Name:</label>
                        <select class="form-control form-control-user" name="broker_type" id="broker_type">
						    <option value="0">--Select--</option>
                            <option value="1">Senior Broker</option>
                            <option value="2">Broker</option>
                            <option value="3">Assistant Broker Jab</option>
                            <option value="4">Junior Broker</option>                                          
                        </select>
					    <span id="broker_name_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Select Broker Type*:</label>
                        <select class="form-control form-control-user" name="broker_type" id="broker_type">
						    <option value="0">--Select--</option>
                            <option value="1">Senior Broker</option>
                            <option value="2">Broker</option>
                            <option value="3">Assistant Broker Jab</option>
                            <option value="4">Junior Broker</option>                                          
                        </select>
						<span id="brokerType_error" style="color: red"></span>
                    </div>
					<div class="col-md-3">
					    <label>Commission:</label>
                        <input type="text" class="form-control form-control-user" id="commission"
                               placeholder="Commission" name="commission">
					    <span id="commission_error" style="color: red"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				        <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important;" id="commission_button" type="button">Save</button>
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
@include('admin.js.commission')
@endsection
@endsection
