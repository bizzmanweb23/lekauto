@extends('admin.layout.main')

@section('content') 
<div class="container-xl">
	<div class="table-responsive" id="vehicle_data">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Insurance Type<b>Management</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addInsuranceTypeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Insurance Type</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>
			    <div class="tab-content bg-white" id="myTabContent">
                    <div class="tab-pane fade show active" id="vehicle">
                        <table class="table table-striped table-hover" id="table" data-toggle="table" data-height="460" data-pagination="true"
                               data-show-pagination-switch="true"  data-search="true">                
				            <thead>
					            <tr>						         
						                        <th style="width: 280px;">Insurance Type</th>						                        
						                        <th style="width: 280px;">Actions</th>
					          </tr>
				            </thead>
				                <tbody>
				                    <?php
									  foreach($result as $data)
									  {
									?>
									<tr>
									<td style="border: 1px solid #dee2e6;width: 420px;"><?php echo $data->insuranceType;?></td>								
									<td style="border: 1px solid #dee2e6;width: 420px;">									    
									    <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" rel="<?php echo $data->id;?>" id="edit_type_details" title="Edit"><i class="las la-edit"></i></a> 
									    <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" rel="<?php echo $data->id;?>" id="delete_type_details" title="Delete"><i class="far fa-trash-alt"></i></i></a> 
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
<div id="addInsuranceTypeModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		    <div class="p-1">
		    <div class="text-left">
                <h1 class="h4 text-gray-900 mb-4">Fill Insurance Type Detail</h1>
            </div>
			</div>
		    <form method="post" id="type_details_form">
			    <div class="card">
                <div class="card-body">
				@csrf
                <div class="row">
                    <div class="col-md-4">
					    <label>Insurance Type Name*:</label>
                        <input type="text" class="form-control form-control-user" id="insuranceType"
                               placeholder="Insurance Type Name" name="insuranceType">
						<span id="insuranceType_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4 mt-4">
				        <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; margin-top: 7px; background: #a36626 !important;" id="saveTypeButton" type="button">Save</button>
					</div>									
                </div>
                </div>
                </div>				
            </form>
		</div>
	</div>
</div>
<!-- Add GST -->
<!-- Edit Broker Modal -->
<div id="edit_type_Modal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" id="show_type_details">
             <form method="post" id="type_edit_form">
			    <div class="card">
                <div class="card-body">
				@csrf
               <div class="row">
                    <div class="col-md-4">
					    <label>Insurance Type Name*:</label>
                        <input type="text" class="form-control form-control-user" id="insuranceType"
                               placeholder="Insurance Type Name" name="insuranceType">
						<span id="insuranceType_error" style="color: red"></span>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				        <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important;" id="EditTypeButton" type="button">Save</button>
					</div>									
                </div>				
                </div>
                </div>				
            </form>
        </div>
	</div>
</div>
<!-- Delete GST MOdal -->
<div id="deleteTypeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
			    <input type="hidden" id="deletetypeId">
				<div class="modal-header">						
					<h4 class="modal-title">Delete Insurance Type Record</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete this Record?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="button" class="btn btn-danger" value="Delete" id="delete_type_button">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Whole Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete GST Record</h4>
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
@include('admin.js.insurancetype')
@endsection
@endsection
