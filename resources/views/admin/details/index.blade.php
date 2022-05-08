@extends('admin.layout.main')

@section('content') 
<div class="container-xl">
	<div class="table-responsive" id="vehicle_data">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Admin <b>Master</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{route ('admin.vehicle.index')}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add Vehicle</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>
			    <div class="tab-content bg-white" id="myTabContent">
                    <div class="tab-pane fade show active" id="vehicle" role="tabpanel" aria-labelledby="vehicle-tab">
                        <table class="table table-striped table-hover" id="table" data-toggle="table" data-height="460" data-pagination="true"
                               data-show-pagination-switch="true"  data-search="true">               
				            <thead>
					            <tr>						         
						            <th>Vehicle Status</th>            
                                    <th>Vehicle Number</th>
						            <th>Name And Model</th>
						            <th>Body Type</th>
						            <th>Propellant</th>
						            <th>Color</th>
						            <th>Actions</th>
					          </tr>
				            </thead>
				                <tbody>
				                    <?php
									  foreach($vehicle as $data)
									  {
									?>
									<tr>
                                    <td style="border: 1px solid #dee2e6;"><?php echo $data->vehicle_status;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->vehicle_number;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->vehicle_make.$data->vehicle_year;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->body_type;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->propellant;?></td>
									<td style="border: 1px solid #dee2e6;"><?php echo $data->color;?></td>
									<td style="border: 1px solid #dee2e6;">
									   <!-- <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" rel="<?php echo $data->id;?>" id="vehicle_view" title="View"><i class="las la-eye"></i></a> -->
									    <a class="btn btn-soft-info  btn-icon btn-circle btn-sm edit_vehicle_details" href="javascript:void(0)" rel="<?php echo $data->id;?>"  title="Edit"><i class="las la-edit"></i></a> 
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
	<div id="showView"></div>
<!-- Add Modal HTML -->
<div id="addVehicleModal" class="modal fade">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
		    <form method="post" enctype="multipart/form-data" id ="vehicle_details_form">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="branch-name bg-light px-3 py-3" style="color:#fff;background: #a36626 !important;">
                            <h4 style="color:#fff;">MASTER</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="system_id" class="mt-3">System ID</label>
                                <input type="text" class="form-control form-control-user" name="system_id" id="system_id">
                                <span id="system_id_error" style="color:red;"></span>                                
                                <label for="vehicle_status" class="mt-3">Vehicle Status</label>
                                <br>
                                <select name="vehicle_status" id="vehicle_status" class="form-control form-control-user">
                                    <option value="">--Select Status--</option>
                                    <option value="Ordered">Ordered</option>
                                    <option value="NotOrdered">Not Ordered</option>
                                </select>
                                <span id="vehicle_status_error" style="color:red;"></span>
                                <br>
                                <div class="branch-name bg-light px-2 py-2 mt-2" style="color:#fff;background: #a36626 !important;">
                                    <h6 style="color:#fff;">Stock Entry</h6>
                                </div>
                                <label for="vehicle_number" class="mt-3">Vehicle Number</label>
                                <input type="text" class="form-control form-control-user" name="vehicle_number" id="vehicle_number">
					            <span id="vehicle_number_error" style="color:red;"></span>
                                <label>Make:</label>
					            <select name="vehicle_make" id="vehicle_make" class="form-control form-control-user">
					                <option value="">--Select--</option>
						            <?php
								    foreach($vehicleName as $data)
								        {
							        ?>
                                    <option value="<?php echo $data->vehicleManufactureName;?>"><?php echo $data->vehicleManufactureName;?></option>
                                    <?php
								        }
								    ?>
					            </select>
					            <span id="vehicle_make_error" style="color:red;"></span>
                                <label for="" class="mt-3">Model</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <select name="vehicle_year" class="form-control form-control-user" id="ddlYears">
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <a href="#" class="bg-light px-1 py-2" style="text-decoration: none;">Price List Make Modal</a>
                                    </div>
                                    <span id="ddlYears_error" style="color:red"></span>
                                </div>
                                <input type="checkbox">
                                <label class="form-check-label mt-3" for="flexCheckDefault"> Not show to pricelist</label>
                            <div class="clearfix"></div>
                            <label for="body_type" class="mt-3">Body Type</label>
                            <br>
                            <input type="text" class="form-control form-control-user" name="body_type" id="body_type">
                            <span id="body_type_error" style="color:red;"></span>
                            <label for="" class="mt-3">Price List(Make/Modal)</label>
                            <div class="row">
                            <div class="col-md-6">
                                <select name="price_list_make" id="price_list_make" class="form-control form-control-user">
                                    <option value="">--Select--</option>
                                    <?php
                                        foreach($vehicleName as $data)
                                        {
                                    ?>
                                    <option value="<?php echo $data->vehicleManufactureName;?>"><?php echo $data->vehicleManufactureName;?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-user" name="price_list_model" id="price_list_model">
                                <span id="price_list_model_error" style="color:red;"></span>
                            </div>
                        </div>
                        <label for="priceList_plus" class="mt-3"> Price List(plus)</label>
                        <input type="text" class="form-control form-control-user" name="pricelist_plus" id="pricelist_plus">
                        <span id="priceList_plus_error" style="color:red"></span>
                        <label for="accessory" class="mt-3"> Accessory</label>
                        <textarea type="text" class="form-control form-control-user" name="accessory" id="accessory"></textarea>
                        <span id="accessory_error" style="color:red;"></span>
                        <label for="chasis_no" class="mt-3"> Chasis No</label>
                        <input type="text" class="form-control form-control-user" name="chasis_number" id="chasis_number">
                        <span id="chasis_number_error" style="color:red;"></span>
                        <label for="engine_no" class="mt-3"> Engine No.</label>
                        <input type="text" name="engine_number" class="form-control form-control-user" id="engine_number">
                        <span id="engine_number_error" style="color:red"></span>
                        <label for="proplant" class="mt-3">Proplant</label>
                        <br>
                        <select class="form-control form-control-user" name="propellant" id="propellant">
                            <option value="">-- select --</option>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Natural Gas">Natural Gas</option>
                        </select>
                        <span id="propellant_error" style="color:red;"></span>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Laden:</label>
                                <input type="text" class="form-control form-control-user" name="laden" id="laden">
                            </div>
                            <div class="col-md-6">
                                <label>Unladen:</label>
                                <input type="text" class="form-control form-control-user" name="unladen" id="unladen">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Engine Cap\Ton:</label>
                                <input type="text" class="form-control form-control-user" name="enginecap_ton" id="enginecap_ton">
                            </div>
                            <div class="col-md-6">
                                <label>PAX:</label>
                                <input type="text" class="form-control form-control-user" name="pax" id="pax">
                            </div>
                        </div>  
                        <label for="year_of_manufacture" class="mt-3">Year Of Manufacture</label>
                        <input type="text" class="form-control form-control-user" name="year_of_manufacture" id="year_of_manufacture">
					    <span id="year_of_manufacture_error" style="color:red;"></span>
                        <label for="original_reg_date" class="mt-3">Original Registration Date</label>
                        <input type="date" class="form-control form-control-user" name="original_reg_date" id="original_reg_date">
                        <span id="original_reg_date_error" style="color:red;"></span>
                        <label for="" class="mt-3">Colour</label>
                        <br>
                        <select class="form-control form-control-user" id="color" name="color">
                            <option value="">--select--</option>
                            <option value="Black">Black</option>
                            <option value="Red">Red</option>
                            <option value="Grey">Grey</option>
                            <option value="White">White</option>
                        </select>
                        <label>Number Of TSF:</label>
					    <input type="text" class="form-control form-control-user" name="number_of_tsf" id="number_of_tsf">
					    <span id="number_of_tsf_error" style="color:red;"></span>
                        <label>Location:</label>
                        <input type="text" class="form-control form-control-user" name="location" id="location">
                        <span id="location_error" style="color:red;"></span>
                        <label>Incharge By:</label>
					    <input type="text" class="form-control form-control-user" name="incharge_by" id="incharge_by">
					    <span id="incharge_by_error" style="color:red;"></span>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <div class="branch-name bg-light px-2 py-2 mt-2" style="color:#fff;background: #a36626 !important;">
                        <h6 style="color:#fff;">Record Section</h6>
                    </div>
                    <label for="entry_date" class="mt-3">Entry Date</label>
                    <input type="date" class="form-control form-control-user" name="entry_date" id="entry_date">
                    <span id="entry_date_error" style="color:red;"></span>
                    <label for="Created_by" class="mt-3">Created By</label>
                    <input type="text" class="form-control form-control-user" name="Created_by" id="created_by">
                    <span id="Created_by_error" style="color:red;"></span>
                    <label for="last_modifiedBy" class="mt-3">Last Modified By</label>
                    <input type="text" class="form-control form-control-user" name="last_modifiedBy" id="last_modifiedBy">
                    <span id="last_modifiedBy_error" style="color:red;"></span>
                    <hr>
                    <label for="transfer_fee" class="mt-3">Transfer Fee</label>
                    <input type="text" class="form-control form-control-user" name="transfer_fee" id="transfer_fee">
					<span id="transfer_fee_error" style="color:red;"></span>
                    <label for="road_tax" class="mt-3">Road Tax</label>
                    <input type="text" class="form-control form-control-user" name="road_tax" id="road_tax">
                    <span id="road_tax_error" style="color:red;"></span>
                    <label for="roadTax_expiry" class="mt-3">Road Tax Expiry Date:</label>
				    <input type="date" class="form-control form-control-user" name="roadTax_expiry" id="roadTax_expiry">
					<span id="roadTax_expiry_error" style="color:red;"></span>
                    <label for="road_tax_type" class="mt-3">Road Tax Type:</label>
                    <select class="form-control form-control-user" name="road_tax_type" id="road_tax_type">
                        <option value="">--select--</option>
                        <option value="6 months">6 Months</option>
                        <option value="12 months">12 months</option>
                    </select>
                    <span id="road_tax_type_error" style="color:red;"></span>
                    <label for="inspection_expiry" class="mt-3">Inspection Expiry Date:</label>
					<input type="date" class="form-control form-control-user" name="inspection_expiry" id="inspection_expiry">
					<span id="inspection_expiry_error" style="color:red;"></span>
                    <label for="layUp_expiry" class="mt-3">Layup Exp Date</label>
                    <input type="date" class="form-control form-control-user" name="layUp_expiry" id="layUp_expiry">
                    <span id="layUp_expiry_error" style="color:red;"></span>
                    <label for="coe_logcard" class="mt-3">COE log guard</label>
                    <input type="text" class="form-control form-control-user" name="coe_logcard" id="coe_logcard">
                    <span id="coe_logcard_error" style="color:red;"></span>
                    <label for="coe_acc" class="mt-3">COE(ACC)/ DPQP</label>
                    <input type="text" class="form-control form-control-user" name="coe_acc" id="coe_acc">
                    <span id="coe_acc_error" style="color:red;"></span>
                    <label for="coe_number" class="mt-3">COE Number</label>
                    <input type="text" class="form-control form-control-user" name="coe_number" id="coe_number">
                    <span id="coe_number_error" style="color:red;"></span>
                    <label for="coe_expiryDate" class="mt-3">COE Expiry Date</label>
                    <input type="date" class="form-control form-control-user" name="coe_expiryDate" id="coe_expiryDate">
                    <span id="coe_expiryDate_error" style="color:red;"></span>
                    <label for="coe_to_pay" class="mt-3">COE To Pay</label>
                    <br>
                    <select class="form-control form-control-user" name="coe_to_pay" id="coe_to_pay">
                        <option value="">--select--</option>
                        <option value="Paid">Paid</option>
                        <option value="Not Paid">Not Paid</option>
                    </select>
                    <span id="coe_to_pay_error" style="color:red;"></span>
                    <label for="omv" class="mt-3">Open Market Value</label>
                    <input type="text" class="form-control form-control-user" name="omv" id="omv">
                    <span id="omv_error" style="color:red;"></span>
                    <label for="parf_amount" class="mt-3">Parf Amount</label>
                    <input type="text" class="form-control form-control-user" name="parf_amount" id="parf_amount">
                    <span id="parf_amount_error" style="color:red;"></span>
                    <label for="registeration_fee" class="mt-3">Registeration Fee(RF)</label>
                    <input type="text" class="form-control form-control-user" name="registeration_fee" id="registeration_fee">
                    <span id="registeration_fee_error" style="color:red;"></span>
                    <label for="arf_amount" class="mt-3">ARF Amount</label>
                    <input type="text" class="form-control form-control-user" name="arf_amount" id="arf_amount">
                    <span id="arf_amount_error" style="color:red;"></span>
                    <label for="cves_surcharge" class="mt-3">CEVS Surcharge</label>
                    <input type="text" class="form-control form-control-user" name="cves_surcharge" id="cves_surcharge">
                    <span id="cves_surcharge_error" style="color:red;"></span>
                    <label for="cevs_rebate" class="mt-3">CEVS Rebate</label>
                    <input type="text" class="form-control form-control-user" name="cevs_rebate" id="cevs_rebate">
                    <span id="cevs_rebate_error" style="color:red;"></span>
                    <label for="ets_paper_form" class="mt-3">ETS Paper From</label>
                    <input type="text" class="form-control form-control-user" name="ets_paper_form" id="ets_paper_form">
                    <span id="ets_paper_form_error" style="color:red;"></span>
                    <label for="use_tcoe" class="mt-3">Use TCOE:</label>
					<select class="form-control form-control-user" name="use_tcoe" id="use_tcoe">
						<option value="">--select--</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
					<span id="use_tcoe_error" style="color:red;"></span>
                    <br>
                    <button class="btn btn-primary btn-block w-100 mt-4" style="color:#fff;background: #a36626 !important;" id="saveVehicle_Details" type="button">SUBMIT</button>
                    <button class="btn btn-primary btn-block w-100 mt-4" style="color:#fff;background: #a36626 !important;" id="back"
                    href="{{ route('admin.dashboard.index') }}">Back</button>
            </div>
           
        </div>						
       	            </div>
	            </div>
            </form>
		</div>
	</div>
</div>
<!-- Add Vehicle -->
<!-- Add Buyer Modal -->
<div id="addBuyerModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		    <form method="post" enctype="multipart/form-data" id ="buyer_details_form">
                @csrf
				<input type="hidden" id="Vehicle_Unique_id_buyer">
                <div class="card">
                    <div class="card-body">
                        <div class="branch-name bg-light px-3 py-3" style="color:#fff;background: #a36626 !important;">
                            <h5 style="color:#fff;">Buyer Details</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="id_number_buyer" class="mt-3">ID Number</label>
                                <input type="text" class="form-control form-control-user" name="id_number_buyer" id="id_number_buyer">
                                <span id="id_number_error" style="color:red;"></span>                               
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="delivery_out_date" class="mt-3">Delivery Out Date</label>
                                        <input type="date" class="form-control form-control-user" name="delivery_out_date" id="delivery_out_date">
                                        <span id="delivery_in_date_error" style="color:red;"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="delivery_time" class="mt-3">Time</label>
                                        <input type="time" class="form-control form-control-user" name="delivery_time" id="delivery_time">
                                        <span id="delivery_time_error" style="color:red;"></span>
                                    </div>                                    
                                </div>                                    
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="invoice_number" class="mt-3">Invoice Number</label>
                                        <input type="text" class="form-control from-control-user" name="invoice_number" id="invoice_number">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="invoice_date" class="mt-3">Invoice Date</label>
                                        <input type="text" class="form-control from-control-user" name="invoice_date" id="invoice_date">
                                    </div>                                            
                                </div>                            
                                <div class="clearfix"></div>
                                <label for="pl_date" class="mt-3">P&L Date</label>
                                <input type="date" class="form-control form-control-user" id="pl_date" name="pl_date">
                                <label for="booking_date" class="mt-3">Booking Date</label>
                                <input type="date" class="form-control form-control-user" id="booking_date" name="booking_date">
                                <label for="sell_code" class="mt-3">Sell Code</label>
                                <input type="text" class="form-control form-control-user" id="sell_code" name="sell_code">
                                <label for="sales_aggreement_number" class="mt-3">Sales Agreement Number</label>
                                <input type="text" class="form-control form-control-user" id="sales_aggreement_number" name="sales_aggreement_number">
                                <label for="sale_aggreement_price" class="mt-3">Sale Aggreement Price($)</label>
                                <input type="text" class="form-control form-control-user" id="sale_aggreement_price" name="sale_aggreement_price">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="selling_price" class="mt-3">Selling Price($)</label>
                                        <input type="text" class="form-control form-control-user" name="selling_price" id="selling_price">
                                    </div>
                                    <div class="col-md-4">                                    
                                        <label for="buyer_gst" class="mt-3">GST</label>                                        
                                        <select name="buyer_gst" class="form-control" id="buyer_gst">
                                            <option value="">--Select GST--</option>
                                            <?php
                                                foreach($gst as $data)
                                                {
                                            ?>
                                            <option value="<?php echo $data->gst_name;?>"><?php echo $data->gst_name;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>                                                                                   
                                    </div>                                    
                                    <div class="col-md-3">                               
                                        <label for="gst_amount_buyer" style="margin-top: 16px;">GST Amount</label>
                                        <input type="text" class="form-control from-control-user" name="gst_amount_buyer" id="gst_amount_buyer">
                                    </div>
                                </div> 
                                <label class="mt-3" style="color:red;">(Purchase Price is GST Inclusive FOr New & GMS, GST Exclusive For Others)</label> 
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="gst_decimal_adjustment_buyer" class="mt-3">GST Decimal Adjustment</label>                              
                                        <input type="text" class="form-control form-control-user" name="gst_decimal_adjustment_buyer" id="gst_decimal_adjustment_buyer">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gst_amountbefore_adjustment_buyer" class="mt-3">GST Amount Before Adjustment</label>                              
                                        <input type="text" class="form-control form-control-user" name="gst_amountbefore_adjustment_buyer" id="gst_amountbefore_adjustment_buyer">   
                                    </div>
                                </div>
                                <label for="total_selling_price">Total Selling Price</label>
                                <input type="text" class="form-control form-control-user" id="total_selling_price" name="total_selling_price">
                            </div>
                                <div class="col-md-6">
                                    <br>
                                    <div class="branch-name bg-light px-2 py-2 mt-2">
                                        <h5>ETS Transaction</h5>
                                    </div>                                    
                                    <label class="mt-3" for="buy_over_date">Buy Over Date</label>
                                    <input type="date" class="form-control form-control-user" name="buy_over_date" id="buy_over_date">
                                    <label class="mt-3" for="fight_pl">Fight PL</label><input type="checkbox">
                                    <label class="mt-3" for="ets_paper_to">ETS Paper To</label>
                                    <input type="text" class="form-control form-control-user" name="ets_paper_to" id="ets_paper_to">
                                    <label class="mt-3" for="body_price">Body Price</label>
                                    <input type="text" class="form-control form-control-user" name="body_price" id="body_price">
                                    <label class="mt-3" style="color:red;">(Body Price Is GST Inclusive)</label>
                                    <br>
                                    <label class="mt-3" for="dereg_date">Dereg Date</label>
                                    <input type="date" class="form-control form-control-user" name="dereg_date" id="dereg_date">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mt-3" for="coe_encashment">COE Encashment</label>
                                            <input type="text" class="form-control form-control-user" name="coe_encashment" id="coe_encashment">
                                        </div>
                                        <div class="col-md-6">
                                            <label></label>
                                            <br>
                                            <input type="text" class="form-control form-control-user" style="margin-top: 20px;" name="coe_encashment1" id="coe_encashment1">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mt-3" for="parf_encashment">Parf Encashment</label>
                                            <input type="text" class="form-control form-control-user" name="parf_encashment" id="parf_encashment">
                                        </div>
                                        <div class="col-md-6">
                                            <label></label>
                                            <br>
                                            <input type="text" class="form-control form-control-user" style="margin-top: 20px;" name="parf_encashment" id="parf_encashment">
                                        </div>
                                    </div>
                                    <label class="mt-3" for="ets_transfer_value">ETS Transfer Value</label>
                                    <input type="date" class="form-control form-control-user" name="ets_transfer_value" id="ets_transfer_value">
                                    <label class="mt-3" for="ets_paper">ETS Paper(External)</label>
                                    <input type="date" class="form-control form-control-user" name="ets_paper" id="ets_paper">
                                    <div class="row">
                                        <div class="col-md-6">
                                             <label for="invoice_number2" class="mt-3">Invoice Number 2</label>
                                             <input type="text" class="form-control form-control-user" name="invoice_number2" id="invoice_number2">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="invoice_date2" class="mt-3">Invoice Date 2</label>
                                            <input type="text" class="form-control form-control-user" name="invoice_date2" id="invoice_date2">
                                       </div>
                                    </div>
                                    <label class="mt-3" for="ets_paper_buyer">ETS Paper Buyer</label>
                                    <input type="text" class="form-control form-control-user" name="ets_paper_buyer" id="ets_paper_buyer">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="branch-name bg-light px-2 py-2 mt-2">
                                        <h5>Sales/Forfeited/Refund Deposit</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="ap_payment_buyer" class="mt-3">AR Receipt</label>
                                    <select name="ap_payment_buyer" class="form-control form-control-user" id="ap_payment_buyer">
                                        <option value="">--Select--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="amount_buyer" class="mt-3">Amount</label>
                                    <input type="text" class="form-control form-control-user" name="amount_buyer" id="amount_buyer">
                                </div>
                                <div class="col-md-3">
                                    <label for="bank_buyer" class="mt-3">Bank</label>
                                    <select name="bank_buyer" class="form-control form-control-user" id="bank_buyer">
                                        <option value="">--Select--</option>
                                        <option value="HDFC">HDFC</option>
                                        <option value="AXIS">AXIS</option>
                                        <option value="SBI">SBI</option>
                                        <option value="Indian Bank">Indian Bank</option>
                                        <option value="Overseas Bank">Overseas Bank</option>
                                        <option value="Canara Bank">Canara Bank</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="cheque_number_buyer" class="mt-3">Cheque Number</label>
                                    <input type="text" class="form-control form-control-user" name="cheque_number_buyer" id="cheque_number_buyer">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="cheque_date_buyer" class="mt-3">Cheque Date</label>
                                    <input type="date" class="form-control form-control-user" name="cheque_date_buyer" id="cheque_date_buyer">
                                </div>
                                <div class="col-md-3">
                                    <label for="sell_to" class="mt-3">Sell To</label>
                                    <select name="sell_to" class="form-control form-control-user" id="sell_to">
                                        <option value="">--select--</option>
                                        <option value="Seller1">Seller1</option>
                                        <option value="Seller2">Seller2</option>
                                        <option value="Seller3">Seller3</option>

                                    </select>
                                </div>
                                {{-- <div class="col-md-3">
                                    <br><br><br>
                                    <a href="#" name="new_payee" id="new_payee" style="color:red;">Create New Payee Card</a>
                                </div>                                 --}}
                                <div class="col-md-3">                                    
                                    <label for="invoice_number" class="mt-3">Invoice Number</label>
                                    <input type="text" class="form-control form-control-user" name="invoice_number" id="invoice_number">
                                </div>
                                <div class="col-md-3">                                    
                                    <label for="to_from_buyer" class="mt-3">To/From Who</label>
                                    <input type="text" class="form-control form-control-user" name="to_from_buyer" id="to_from_buyer">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="buyer_remarks" class="mt-3">Remarks</label>
                                    <textarea type="text" class="form-control form-control-user" name="buyer_remarks" id="buyer_remarks"></textarea>
                                </div>
                                <div class="col-md-3">                                    
                                    <label for="payment_mode" class="mt-3">Payment Mode</label>
                                    <select class="form-control form-control-user" name="payment_mode" id="payment_mode">
                                        <option value="">--select--</option>
                                        <option value="Credit">Credit</option>
                                        <option value="Debit">Debit</option>
                                        <option value="Cheque">Cheque</option>
                                    </select>
                                </div>                                
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-block w-100 mt-4" style="color:white;background-color:black;">Update Deposit</button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <table style="width:100%;broder:1px solid;">
                                        <thead style="color:black; background-color:green;broder:1px solid;">
                                            <th>SNO.</th>
                                            <th>AR Receipt</th>                                            
                                            <th>Amount</th>
                                            <th>Bank</th>
                                            <th>Cheque Number</th>
                                            <th>Cheque Date</th>
                                            <th>Sell To</th>
                                            <th>Invoice Number</th>
                                            <th>To/From Who</th>
                                            <th>Remarks</th>
                                            <th>Pay Mode</th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="branch-name bg-light px-2 py-2 mt-2">
                                        <h5>Other Payments</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="ap_payment_buyer1" class="mt-3">AR Receipt</label>
                                    <select name="ap_payment_buyer1" class="form-control form-control-user" id="ap_payment_buyer1">
                                        <option value="">--Select--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="amount_buyer1" class="mt-3">Amount</label>
                                    <input type="text" class="form-control form-control-user" name="amount_buyer1" id="amount_buyer1">
                                </div>
                                <div class="col-md-3">
                                    <label for="bank_buyer1" class="mt-3">Bank</label>
                                    <select name="bank_buyer1" class="form-control form-control-user" id="bank_buyer1">
                                        <option value="">--Select--</option>
                                        <option value="HDFC">HDFC</option>
                                        <option value="AXIS">AXIS</option>
                                        <option value="SBI">SBI</option>
                                        <option value="Indian Bank">Indian Bank</option>
                                        <option value="Overseas Bank">Overseas Bank</option>
                                        <option value="Canara Bank">Canara Bank</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="cheque_number_buyer1" class="mt-3">Cheque Number</label>
                                    <input type="text" class="form-control form-control-user" name="cheque_number_buyer1" id="cheque_number_buyer1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="cheque_date_buyer1" class="mt-3">Cheque Date</label>
                                    <input type="date" class="form-control form-control-user" name="cheque_date_buyer1" id="cheque_date_buyer1">
                                </div>
                                <div class="col-md-3">
                                    <label for="sell_to1" class="mt-3">Sell To</label>
                                    <select name="sell_to1" class="form-control form-control-user" id="sell_to1">
                                        <option value="">--select--</option>
                                        <option value="Seller1">Seller1</option>
                                        <option value="Seller2">Seller2</option>
                                        <option value="Seller3">Seller3</option>

                                    </select>
                                </div>
                                {{-- <div class="col-md-3">
                                    <br><br><br>
                                    <a href="#" name="new_payee" id="new_payee" style="color:red;">Create New Payee Card</a>
                                </div>                                 --}}
                                <div class="col-md-3">                                    
                                    <label for="invoice_number1" class="mt-3">Invoice Number</label>
                                    <input type="text" class="form-control form-control-user" name="invoice_number1" id="invoice_number1">
                                </div>
                                <div class="col-md-3">                                    
                                    <label for="to_from_buyer1" class="mt-3">To/From Who</label>
                                    <input type="text" class="form-control form-control-user" name="to_from_buyer1" id="to_from_buyer1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="buyer_remarks1" class="mt-3">Remarks</label>
                                    <textarea type="text" class="form-control form-control-user" name="buyer_remarks1" id="buyer_remarks1"></textarea>
                                </div>
                                <div class="col-md-3">                                    
                                    <label for="payment_mode1" class="mt-3">Payment Mode</label>
                                    <select class="form-control form-control-user" name="payment_mode1" id="payment_mode1">
                                        <option value="">--select--</option>
                                        <option value="Credit">Credit</option>
                                        <option value="Debit">Debit</option>
                                        <option value="Cheque">Cheque</option>
                                    </select>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-block w-100 mt-4" style="color:white;background-color:black;">Update Sales</button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <table style="width:100%;broder:1px solid;">
                                        <thead style="color:black; background-color:green;broder:1px solid;">
                                            <th>SNO.</th>
                                            <th>AR Receipt</th>                                            
                                            <th>Amount</th>
                                            <th>Bank</th>
                                            <th>Cheque Number</th>
                                            <th>Entry Date</th>
                                            <th>Cheque Date</th>
                                            <th>Sell To</th>
                                            <th>Invoice Number</th>
                                            <th>To/From Who</th>
                                            <th>Remarks</th>
                                            <th>Pay Mode</th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mt-3" for="total_recievable">Total Receivable</label>
                                    <input type="text" class="form-control form-control-user" name="total_recievable" id="total_recievable">
                                    <label class="mt-3" for="total_received">Total Received</label>
                                    <input type="text" class="form-control form-control-user" name="total_received" id="total_received">
                                    <label class="mt-3" for="ar_balance_buyer">AR balance</label>
                                    <input type="text" class="form-control form-control-user" name="ar_balance_buyer" id="ar_balance_buyer">
                                    <span id="ar_balance_buyer_error" style="color:red"></span>                                    
                                    <label for="status" class="mt-3">Status</label>
                                    <select class="form-control form-control-user" name="status" id="status"><p>(N/Y/S)</p>
                                        <option value="">--select--</option>
                                        <option value="N">N-open</option>
                                        <option value="Y">Y-open</option>                                  
                                        <option value="S">N-open</option>
                                    </select>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <label for="transaction_type_buyer">Transaction Type</label>
                                        <select class="form-control form-control-user" name="transaction_type_buyer" id="transaction_type_buyer">
                                            <option value="">--select--</option>
                                            <option value="Debit">Debit</option>
                                            <option value="Credit">Credit</option>                             
                                        </select>
                                        <br>
                                       <div class="row">
                                           <div class="col-md-6">
                                                <label for="Etransfer_out_date">E-Transfer Out Date</label>
                                                <input type="date" class="form-control form-control-user" name="Etransfer_out_date" id="Etransfer_out_date">
                                           </div>
                                           <div class="col-md-6">
                                               <br>
                                               <label class="mt-3">LTA Transfer</label>
                                               <input type="checkbox">
                                           </div>
                                       </div>
                                       <label for="Etransfer_out_by" class="mt-3">E-Transfer Out By</label>
                                       <select name="Etransfer_out_by" class="form-control form-control-user" id="Etransfer_out_by">
                                            <option value="">--select--</option>
                                            <option value="Broker1">Broker1</option>
                                            <option value="Broker2">Broker2</option>
                                        </select>
                                        <br>
                                        <label for="log_card" class="mt-3">Log Card(Transfer Out)</label>
                                        <input type="text" class="form-control form-control-user" name="log_card" id="log_card">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-primary btn-block w-100 mt-4" style="color:#fff;background: #a36626 !important;" id="saveVehicle_Details" type="button">SUBMIT</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary btn-block w-100 mt-4" style="color:#fff;background: #a36626 !important;" id="back"
                                            href="{{ route('admin.dashboard.index') }}">Back</button>
                                </div>
                            </div>             
                        </div>
				    </div>
				</div>
            </form>
		</div>
	</div>
</div>
<!-- Add Seller Modal -->
<div id="addSellerModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
            <form method="post" enctype="multipart/form-data" id ="seller_details_form">
                @csrf
				<input type="hidden" id="Vehicle_Unique_id_Seller" />
                <div class="card">
                    <div class="card-body">
                        <div class="branch-name bg-light px-3 py-3" style="color:#fff;background: #a36626 !important;">
                            <h5 style="color:#fff;">Seller Details</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="id_number" class="mt-3">ID Number</label>
                                <input type="text" class="form-control form-control-user" name="id_number" id="id_number">
                                <span id="id_number_error" style="color:red;"></span>                                
                                <label for="purchase_date" class="mt-3">Purchase Date</label>
                                <input type="date" class="form-control form-control-user" name="purchase_date" id="purchase_date">
                                <span id="purchase_date_error" style="color:red;"></span>                                    
                                <label for="estimate_delivery" class="mt-3">Estimate Delivery In Date</label>
                                <input type="date" class="form-control form-control-user" name="estimate_delivery" id="estimate_delivery">
                                <span id="estimate_delivery_error" style="color:red;"></span>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="delivery_in_date" class="mt-3">Delivery In Date</label>
                                        <input type="date" class="form-control form-control-user" name="delivery_in_date" id="delivery_in_date">
                                        <span id="delivery_in_date_error" style="color:red;"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="time" class="mt-3">Time</label>
                                        <input type="time" class="form-control form-control-user" name="time" id="time">
                                        <span id="time_error" style="color:red;"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox">
                                        <label class="form-check-label mt-3" for="flexCheckDefault">No Delivery Date</label>
                                    </div>
                                </div>                                    
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="dn_cn_no" class="mt-3">DN/CN Number</label>
                                        <input type="text" class="form-control from-control-user" name="dn_cn_no" id="dn_cn_no">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dn_cn_amount" class="mt-3">DN/CN Amount</label>
                                        <input type="text" class="form-control from-control-user" name="dn_cn_amount" id="dn_cn_amount">
                                    </div>                                            
                                </div>                            
                                <div class="clearfix"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="checkbox">
                                        <label for="body_type" class="mt-3">Exclude COE</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="checkbox">
                                        <label for="body_type" class="mt-3">Exclude Registration Fee And ARF</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="checkbox">
                                        <label for="body_type" class="mt-3">Exclude Road Tax</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="checkbox">
                                        <label for="body_type" class="mt-3">Tick If The Purchase Price Is Zero</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="purchase_price" class="mt-3">Purchase Price($)</label>
                                        <input type="text" class="form-control form-control-user" name="purchase_price" id="purchase_price">
                                    </div>
                                    <div class="col-md-4">                                    
                                        <label for="seller_gst" class="mt-3">GST</label>                                        
                                        <select name="seller_gst" class="form-control" id="seller_gst">
                                            <option value="">--Select GST--</option>
                                            <?php
                                                foreach($gst as $data)
                                                {
                                            ?>
                                            <option value="<?php echo $data->gst_name;?>"><?php echo $data->gst_name;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>                                                                                   
                                    </div>                                    
                                    <div class="col-md-3">                                
                                        <label for="gst_amount">GST Amount</label>
                                        <input type="text" class="form-control from-control-user" name="gst_amount" id="gst_amount">
                                    </div>
                                </div> 
                                <label class="mt-3" style="color:red;">(Purchase Price is GST Inclusive FOr New & GMS, GST Exclusive For Others)</label> 
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="gst_decimal_adjustment" class="mt-3">GST Decimal Adjustment</label>                              
                                        <input type="text" class="form-control form-control-user" name="gst_decimal_adjustment" id="gst_decimal_adjustment">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gst_amountbefore_adjustment" class="mt-3">GST Amount Before Adjustment</label>                              
                                        <input type="text" class="form-control form-control-user" name="gst_amountbefore_adjustment" id="gst_amountbefore_adjustment">   
                                    </div>
                                </div>
                                <label for="total_purchase_price">Total Purchase Price</label>
                                <input type="text" class="form-control form-control-user" id="total_purchase_price" name="total_purchase_price">
                            </div>
                            <br>
                            <div class="col-md-6">
                                <label for="agreement_number" class="mt-3">Agreement Number</label>
                                <input type="text" class="form-control form-control-user" name="agreement_number" id="agreement_number">
                                <label for="settlement_number" class="mt-3">Settlement Number</label>
                                <input type="text" class="form-control form-control-user" name="settlement_number" id="settlement_number">
                                <label for="note" class="mt-3">Note</label>
                                <textarea type="text" class="form-control form-control-user" name="note" id="note"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="ap_payment" class="mt-3">AP Payment</label>
                                    <select name="ap_payment" class="form-control form-control-user" id="ap_payment">
                                        <option value="">--Select--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="amount" class="mt-3">Amount</label>
                                    <input type="text" class="form-control form-control-user" name="amount" id="amount">
                                </div>
                                <div class="col-md-3">
                                    <label for="bank" class="mt-3">Bank</label>
                                    <select name="bank" class="form-control form-control-user" id="bank">
                                        <option value="">--Select--</option>
                                        <option value="HDFC">HDFC</option>
                                        <option value="AXIS">AXIS</option>
                                        <option value="SBI">SBI</option>
                                        <option value="Indian Bank">Indian Bank</option>
                                        <option value="Overseas Bank">Overseas Bank</option>
                                        <option value="Canara Bank">Canara Bank</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="cheque_number" class="mt-3">Cheque Number</label>
                                    <input type="text" class="form-control form-control-user" name="cheque_number" id="cheque_number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="cheque_date" class="mt-3">Cheque Date</label>
                                    <input type="date" class="form-control form-control-user" name="cheque_date" id="cheque_date">
                                </div>
                                <div class="col-md-4">
                                    <label for="to_from" class="mt-3">To/From Who</label>
                                    <input type="text" class="form-control form-control-user" name="to_from" id="to_from">
                                    <a href="#" name="new_payee" id="new_payee" style="color:red;">Create New Payee Card</a>
                                </div>
                                {{-- <div class="col-md-3">
                                    <br><br><br>
                                    <a href="#" name="new_payee" id="new_payee" style="color:red;">Create New Payee Card</a>
                                </div>                                 --}}
                                <div class="col-md-4">                                    
                                    <label for="remarks" class="mt-3">Remarks</label>
                                    <textarea type="text" class="form-control form-control-user" name="remarks" id="remarks"></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <br><br>
                                    <table style="width:100%;broder:1px solid;">
                                        <thead style="color:black; background-color:green;broder:1px solid;">
                                            <th>SNO.</th>
                                            <th>AP Payment</th>
                                            <th>Acc. Desc</th>
                                            <th>Amount</th>
                                            <th>Bank</th>
                                            <th>Cheque Number</th>
                                            <th>Cheque Date</th>
                                            <th>To/From Who</th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mt-3" for="ap_balance">AP Balance</label>
                                    <input type="text" class="form-control form-control-user" name="ap_balance" id="ap_balance">
                                    <label class="mt-3" for="settlement_remarks">P Settlement Remark</label>
                                    <input type="text" class="form-control form-control-user" name="settlement_remarks" id="settlement_remarks">
                                    <label class="mt-3" for="asking_price">Asking Price($)</label>
                                    <input type="text" class="form-control form-control-user" name="asking_price" id="asking_price">
                                    <span id="asking_price_error" style="color:red"></span>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-primary btn-block w-100 mt-4" style="background-color: black;color:white;">Last Action</button>                                            
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-primary btn-block w-100 mt-4" style="background-color: black;color:white;">Asking Price</button>
                                        </div>
                                    </div>
                                    <label for="alternate_price" class="mt-3">Alternate Price($)</label>
                                    <input type="text" class="form-control form-control-user" name="alternate_price" id="alternate_price">                                            
                                    <a href="#" style="color:red;" id="price_list">2nd Line In Price List</a>
                                    <br>
                                    <label for="alternate" class="mt-3">Alternate</label>
                                    <input type="text" class="form-control form-control-user" name="alternate" id="alternate">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label for="buy_code" class="mt-3">Buy Code</label>
                                            <input type="text" class="form-control form-control-user" id="buy_code" name="buy_code">
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <button type="button" class="btn btn-primary btn-block w-100 mt-4" style="background-color:gray;color:black;" id="broker">Broker</button>
                                        </div>
                                    </div>
                                    <input type="checkbox">
                                    <label class="mt-3" style="color:red;">(Click The Broker Deal Button To Tick)</label>
                                    <label for="trade_in_buy" class="mt-3">Trade In By</label>
                                    <input type="text" class="form-control form-control-user" name="trade_in_buy" id="trade_in_buy">
                                    <label for="broker1" class="mt-3">Broker1</label>
                                    <select name="broker1" class="form-control form-control-user" id="broker">
                                        <option value="">--select--</option>
                                        <option value="Broker1">Broker1</option>
                                        <option value="Broker2">Broker2</option>
                                    </select>
                                    <br>
                                    <div class="row">
                                       <div class="col-md-6">
                                           <label for="com_Retn">Com.Rtn.</label>
                                           <input type="text" class="form-control form-control-user" name="com_Retn" id="com_Retn">
                                       </div>
                                       <div class="col-md-6">
                                            <label for="return_date">Return Date</label>
                                            <input type="date" class="form-control form-control-user" name="return_date" id="return_date">
                                       </div>
                                    </div>
                                    <label for="broker2" class="mt-3">Broker2</label>
                                    <select name="broker2" class="form-control form-control-user" id="broker2">
                                        <option value="">--select--</option>
                                        <option value="Broker1">Broker1</option>
                                        <option value="Broker2">Broker2</option>
                                    </select>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="com_Retn1">Com.Rtn.</label>
                                            <input type="text" class="form-control form-control-user" name="com_Retn1" id="com_Retn1">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="return_date1">Return Date</label>
                                            <input type="date" class="form-control form-control-user" name="return_date1" id="return_date1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">                                    
                                    <label for="transaction_type" class="mt-3">Transaction Type</label>
                                    <select name="transaction_type" class="form-control form-control-user" id="transaction_type">
                                        <option value="">--select--</option>
                                        <option value="offline">Offline</option>
                                        <option value="online">Online</option>
                                    </select>
                                    <br>
                                    <label for="transfer_date" class="mt-3">E-Transfer In Date</label>
                                    <input type="date" class="form-control form-control-user" name="transfer_date" id="transfer_date">
                                    <label for="transfer_by" class="mt-3">E-Transfer By</label>
                                    <select name="transfer_by" class="form-control form-control-user" id="transfer_by">
                                        <option value="">--select--</option>
                                        <option value="offline">Test</option>
                                        <option value="online">Test1</option>
                                    </select>
                                    <br>
                                    <label for="log_card" class="mt-3">Log Card(Transfer In)</label>
                                    <input type="text" class="form-control form-control-user" name="log_card" id="log_card">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-primary btn-block w-100 mt-4" style="color:#fff;background: #a36626 !important;" id="saveVehicle_Details" type="button">SUBMIT</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary btn-block w-100 mt-4" style="color:#fff;background: #a36626 !important;" id="back"
                                            href="{{ route('admin.dashboard.index') }}">Back</button>
                                </div>
                            </div>             
                        </div>						
                    </div>
                </div>
            </form>
        </div>
	</div>
</div>
<!-- Repair Modal HTML -->
<div id="addRepairModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
            <form method="post" enctype="multipart/form-data" id ="repair_details_form">
			    <input type="hidden" id="repair_id">
                @csrf				
        <div class="card">
            <div class="card-body">
                <div class="ms-auto text-end">
                    <button class="btn btn-link text-dark px-3 mb-0" id="save_repair_details" type="button"><i class="fas fa-save text-dark me-2"
                            aria-hidden="true"></i>Save</button>
                        <a class="btn btn-link text-dark px-3 mb-0" id="back"
                           href="{{ route('admin.vehicledetails.index') }}"><i class="fas fa-arrow-left text-dark me-2"
                           aria-hidden="true"></i>Back</a>
                </div>
				<div id="showVehicleDetails">
				<div class="row mt-3">                
				    <div class="col-md-3">
                        <div class="form-group">
                            <label for="vehicle_name">Vehicle Name And Model:</label>
                            <input type="text" class="form-control" id="vehicle_name" name="vehicle_name[]" value="" placeholder="Vehicle Name">
						    <span id="vehicle_name_error" style="color: red"></span>                     
                        </div>
					</div>
			        <div class="col-md-3">
                        <div class="form-group">
                            <label for="vehicle_registration_number">Registration Number:</label>
                            <input type="text" class="form-control" id="vehicle_registration_number" name="vehicle_registration_number[]" value="" placeholder="Vehicle Registration Number">
						    <span id="vehicle_registration_number_error" style="color: red"></span>
                        </div>
                    </div>
				    <div class="col-md-3">
                        <div class="form-group">
                            <label for="vendor_name">Vendor Name:</label>
                            <input type="text" class="form-control" id="vendor_name" name="vendor_name[]" value="" placeholder="Enter Vendor Name">
						    <span id="vendor_name_error" style="color: red"></span>
                        </div>
                    </div>
				    <div class="col-md-3">
                        <div class="form-group">
                            <label for="repair_cost">Cost Of Repair:</label>
                            <input type="text" class="form-control" id="repair_cost" name="repair_cost[]" value="" placeholder="Enter Repair Cost">
					        <span id="repair_cost_error" style="color: red"></span>
                        </div>
                    </div>
                </div>
				</div>
				<div class="ms-auto text-end">
                    <button class="btn btn-success" type="button"  onclick="repair_fields();">Add More Record</button>
                </div>
                <div id="repair_fields"></div>
                <div class="clear"></div>  
            </div>
		</div>	
	</form>
        </div>
	</div>
</div>
<!-- Miscellaneous Modal HTML -->
<div id="addMiscellaneousModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
            <form method="post" enctype="multipart/form-data" id ="miscellaneous_details_form">
			    <input type="hidden" id="miscellaneous_id">
                @csrf
                <div class="card">
            <div class="card-body">
                <div class="ms-auto text-end">
                    <button class="btn btn-link text-dark px-3 mb-0" id="save_miscellaneous_details" type="button"><i class="fas fa-save text-dark me-2"
                            aria-hidden="true"></i>Save</button>
                        <a class="btn btn-link text-dark px-3 mb-0" id="back"
                           href="{{ route('admin.vehicledetails.index') }}"><i class="fas fa-arrow-left text-dark me-2"
                           aria-hidden="true"></i>Back</a>
                </div>
				<div id="Miscel">
				<div class="row mt-3">                
				    <div class="col-md-4">
                        <div class="form-group">
                            <label for="vehicleName">Vehicle Name And Model:</label>
                            <input type="text" class="form-control" id="vehicleName" name="vehicleName[]" value="" placeholder="Vehicle Name">
						    <span id="vehicleName_error" style="color: red"></span>                     
                        </div>
					</div>
			        <div class="col-md-4">
                        <div class="form-group">
                            <label for="vehicle_registration_number">Registration Number:</label>
                            <input type="text" class="form-control" id="vehicleRegistrationNumber" name="vehicleRegistrationNumber[]" value="" placeholder="Vehicle Registration Number">
						    <span id="vehicleRegistrationNumber_error" style="color: red"></span>
                        </div>
                    </div>
				    <div class="col-md-4">
                        <div class="form-group">
                            <label for="vendor_name">Vendor Name:</label>
                            <input type="text" class="form-control" id="vendorName" name="vendorName[]" value="" placeholder="Enter Vendor Name">
						    <span id="vendorName_error" style="color: red"></span>
                        </div>
                    </div>
                </div>
				<div class="row mt-3">
				    <div class="col-md-4">
                        <div class="form-group">
                            <label for="miscellaneous_description">Description:</label>
                            <textarea class="form-control" id="miscellaneous_description" name="miscellaneous_description[]" value="" placeholder="Enter Description"></textarea>
					        <span id="description_error" style="color: red"></span>
                        </div>
                    </div>
					<div class="col-md-4">
                        <div class="form-group">
                            <label for="amount_spent1">Amount Spent:</label>
                            <input type="text" class="form-control amount_spent1" id="amount_spent" name="amount_spent[]" value="" placeholder="Enter Amount Spent">
					        <span id="amount_spent_error" style="color: red"></span>
                        </div>
                    </div>
					<div class="col-md-4">
                        <div class="form-group">
                            <label for="gst_charges1">GST Charges:</label>
                            <input type="text" class="form-control gst_charges1" id="gst_charges" name="gst_charges[]" value="" placeholder="Enter GST Charges">
					        <span id="gst_charges_error" style="color: red"></span>
                        </div>
                    </div>
				</div>
				<div class="row mt-3">
				    <div class="col-md-4">
				    <div class="form-group">
                        <label for="total_amount1">Total Spent Amount:</label>
                        <input type="text" class="form-control total_amount1" id="total_amount" name="total_amount[]" value="" placeholder="Total Spent Amount">
					    <span id="total_amount_error" style="color: red"></span>
                    </div>
					</div>
				</div>
				</div>
				<div class="ms-auto text-end">
                    <button class="btn btn-success" type="button"  onclick="miscellaneous_fields();">Add More Record</button>
                </div>
                <div id="miscellaneous_fields"></div>
                <div class="clear"></div>  
            </div>
		</div>	
	</form>
        </div>
	</div>
</div>
<!-- Cost Center Modal -->
<div id="addCostModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
            <form method="post" enctype="multipart/form-data" id ="cost_details_form">
			    <input type="hidden" id="cost_vehicle_id">
				<input type="hidden" id="getVehicleIDCost">
            @csrf
        <div class="card">
            <div class="card-body newDiv">
                <div class="ms-auto text-end">
                    <button class="btn btn-link text-dark px-3 mb-0" id="save_cost_details" type="button"><i class="fas fa-save text-dark me-2"
                            aria-hidden="true"></i>Save</button>
                        <a class="btn btn-link text-dark px-3 mb-0" id="back"
                           href="{{ route('admin.vehicledetails.index') }}"><i class="fas fa-arrow-left text-dark me-2"
                           aria-hidden="true"></i>Back</a>
                </div>
				<div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="costType">Cost Type:</label>
                            <select name="costType[]" class= "form-control" id="costType">
							    <option value="">-- select --</option>
								<?php
								foreach($costtype as $data)
								{
								?>
								<option value="<?php echo $data->costType;?>"><?php echo $data->costType;?></option>
								<?php
								}
								?>
							</select>
						    <span id="costType_error" style="color: red"></span>                     
                        </div>
					</div>                
				    <div class="col-md-4">
                        <div class="form-group">
                            <label for="vehicleNameCost">Vehicle Name And Model:</label>
                            <input type="text" class="form-control" id="vehicleNameCost" name="vehicleNameCost[]" value="" placeholder="Vehicle Name">
						    <span id="vehicleNameCost_error" style="color: red"></span>                     
                        </div>
					</div>			       
				    <div class="col-md-4">
                        <div class="form-group">
                            <label for="vendor_name">Vendor Name:</label>
                            <input type="text" class="form-control" id="vendorNameCost" name="vendorNameCost[]" value="" placeholder="Enter Vendor Name">
						    <span id="vendorNameCost_error" style="color: red"></span>
                        </div>
                    </div>
                </div>
				<div class="row mt-3">
				    <div class="col-md-4">
                        <div class="form-group">
                            <label for="miscellaneous_description">Description:</label>
                            <textarea class="form-control" id="cost_description" name="cost_description[]" value="" placeholder="Enter Description"></textarea>
					        <span id="cost_description_error" style="color: red"></span>
                        </div>
                    </div>
					<div class="col-md-4">
				    <div class="form-group">
                        <label for="total_amount">Total Spent Amount:</label>
                        <input type="text" class="form-control" id="totalAmount" name="totalAmount[]" value="" placeholder="Total Spent Amount">
					    <span id="totalAmount_error" style="color: red"></span>
                    </div>
					</div>
					<div class="col-md-4">
				        <div class="form-group">
                            <label for="transaction_type">Transaction Type:</label>
                            <select name="transaction_type[]" class="form-control" id="transaction_type" >
                                <option value="">--Select--</option>
                                <option value="credit">Credit</option>
                                <option value="debit">Debit</option>                                                                                                                                                            
                            </select>
					        <span id="transaction_type_error" style="color: red"></span>
                        </div>
					</div>					
				</div>	
				<div class="row mt-3">
				    <div class="col-md-4">
				        <div class="form-group">
                            <label for="floor_interest">Floor Interest:</label>
                            <input type="text" class="form-control" id="floor_interest" name="floor_interest[]" value="" placeholder="Enter Floor Interest">
					        <span id="floor_interest_error" style="color: red"></span>
                    </div>
					</div>
				</div>
				<div class="ms-auto text-end">
                    <button class="btn btn-success" type="button"  onclick="cost_fields();">Add More Record</button>
                </div>
                <div id="cost_fields"></div>
                <div class="clear"></div>  
            </div>
		</div>	
	</form>
        </div>
	</div>
</div>
<!-- End Price Transaction Modal -->
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
@include('admin.js.vehicle')
@endsection
@endsection
