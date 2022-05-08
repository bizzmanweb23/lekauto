<div class="container-fluid py-4">
            <style>
    .upload {
        height: 100px;
        width: 100px;
        position: relative;
    }

    .upload:hover>.edit {
        display: block;
    }

    .edit {
        display: none;
        position: absolute;
        top: 1px;
        right: 1px;
        cursor: pointer;
    }

</style>
<form method="post" enctype="multipart/form-data" id ="vehicle_details_form">
    @csrf
   <div class="card">
        <div class="card-body">
            <div class="row">
			    <div class="col-md-4">
                    <div class="form-group">
                        <label><h6>Vehicle Number:</h6> <br>
						        <?php if(isset($vehicle)){ echo $vehicle[0]->vehicle_number;}?>
						</label>
                                       
                    </div>
                </div>
			    <div class="col-md-4">
                    <div class="form-group">
                        <label><h6>Previous Vehicle Number:</h6> <br> 
						    <?php if(isset($vehicle)){ echo $vehicle[0]->previous_vehicle_no;}?>
					    </label>                       
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="form-group">
                        <label><h6>Make & Model:</h6> <br> 
						    <?php if(isset($vehicle)){ echo $vehicle[0]->name_model;}?>
						</label>						                                      
                    </div>
                </div>
            </div>
            <hr>			
            <div class="row">                
			    <div class="col-md-4">
                    <div class="form-group">
                        <label><h6>Reg Road Tax(In Dollors):</h6> <br> 
						    <?php if(isset($vehicle)){ echo $vehicle[0]->reg_road_tax;}?>
						</label>                       
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="form-group">
                        <label><h6>Body Type:</h6> <br> 
						    <?php if(isset($vehicle)){ echo $vehicle[0]->body_type;}?>
						</label>                       
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="form-group">
                        <label><h6>Chassis No:</h6> <br> 
						    <?php if(isset($vehicle)){ echo $vehicle[0]->chassis_no;}?>
						</label>                       
                    </div>
                </div>
            </div>
			<hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
				        <label><h6>Engine No:</h6> <br>
						    <?php if(isset($vehicle)){ echo $vehicle[0]->engine_no;}?>
						</label>                       
                    </div>
				</div>
			    <div class="col-md-4">
                    <div class="form-group">
					    <label><h6>Propellant:</h6> <br>
						    <?php if(isset($vehicle)){ echo $vehicle[0]->propellant;}?>
						</label>                
                    </div>                        	
				</div>
				<div class="col-md-4">
                    <div class="form-group">
					    <label><h6>Original Reg.Date:</h6> <br>
						    <?php if(isset($vehicle)){ echo $vehicle[0]->original_reg_date;}?>
						</label>                
                    </div>                        	
				</div>
            </div> 
			<hr>
			<div class="row">                
                <div class="col-md-4">
                    <div class="form-group">
					    <label><h6>Colour:</h6> <br>
						    <?php if(isset($vehicle)){ echo $vehicle[0]->colour;}?>
						</label>                                        
                    </div>                        	
				</div>
                 <div class="col-md-4">
                    <div class="form-group">
					    <label><h6>Number Of Owner:</h6> <br>
						    <?php if(isset($vehicle)){ echo $vehicle[0]->number_of_owner;}?>
						</label>                                        
                    </div>                        	
				</div>
                 <div class="col-md-4">
                    <div class="form-group">
					    <label><h6>COE Logcard(In Dollors):</h6> <br>
						    <?php if(isset($vehicle)){ echo $vehicle[0]->coe_logcard;}?>
						</label>                                        
                    </div>                        	
				</div>				
            </div>
			<hr>
            <div class="row">
			    <div class="col-md-4">
                    <div class="form-group">
					    <label><h6>COE /PQP:</h6> <br>
						    <?php if(isset($vehicle)){ echo $vehicle[0]->coe_pqp;}?>
						</label>                                        
                    </div>                        	
				</div>
				<div class="col-md-4">
                    <div class="form-group">
					    <label><h6>Reg Fee(In Dollors):</h6> <br>
						    <?php if(isset($vehicle)){ echo $vehicle[0]->reg_fee;}?>
						</label>                                        
                    </div>                        	
				</div>
				<div class="col-md-4">
                    <div class="form-group">
					    <label><h6>Reg Fee(In Dollors):</h6> <br>
						    <?php if(isset($vehicle)){ echo $vehicle[0]->reg_fee;}?>
						</label>                                        
                    </div>                        	
				</div>				
            </div>
			<hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
					    <label><h6>OMV(In Dollors):</h6> <br>
						    <?php if(isset($vehicle)){ echo $vehicle[0]->omv;}?>
						</label>                                        
                    </div>                        	
				</div>
				<div class="col-md-4">
                    <div class="form-group">
					    <label><h6>Cves Rebate(In Dollors):</h6> <br>
						    <?php if(isset($vehicle)){ echo $vehicle[0]->cves_rebate;}?>
						</label>                                        
                    </div>                        	
				</div>
                <div class="col-md-4">
                    <div class="form-group">
					    <label><h6>ETS Paper From:</h6> <br>
						    <?php if(isset($vehicle)){ echo $vehicle[0]->ets_paper_from;}?>
						</label>                                        
                    </div>                        	
				</div>                
            </div>
			<hr>
            <div class="row">
			    <div class="col-md-4">
                    <div class="form-group">
					    <label><h6>Arf Amount(In Dollors):</h6> <br>
						    <?php if(isset($vehicle)){ echo $vehicle[0]->arf_amount;}?>
						</label>                                        
                    </div>                        	
				</div>
			    <div class="col-md-4">
                    <div class="form-group">
                        <label><h6>Use TCOE:</h6> <br>
						    <?php if(isset($vehicle)){ echo $vehicle[0]->use_tcoe;}?>
						</label>                        
                    </div>                       
                </div>
            </div>								
            <ul class="nav nav-tabs mt-4" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" style="color:#a36626;" href="#contact_address">Seller Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" style="color:#a36626;" href="#sales">Buyer Details</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" style="color:#a36626;" href="#repair">Repair Details</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" style="color:#a36626;" href="#miscellaneous">Miscellaneous Details</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" style="color:#a36626;" href="#cost">Cost Details</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" style="color:#a36626;" id="insurance_view_details" href="#insuranceView">Insurance Details</a>
                </li>
            </ul>
            <div class="tab-content mb-3">
                <div id="contact_address" class="container tab-pane active"><br>
                    <form method="post" enctype="multipart/form-data" id ="seller_details_form">
                        @csrf
                        <div class="card">
                            <div class="card-body">
							    <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
					                        <label><h6>ID Number:</h6> <br>
						                        <?php if(count($seller)>0){ echo $seller[0]->id_number;}?>
						                    </label>                                        
                                        </div>                        	
				                    </div>
				                    <div class="col-md-4">
                                        <div class="form-group">
					                        <label><h6>Address:</h6> <br>
						                        <?php if(count($seller)>0){ echo $seller[0]->seller_address;}?>
						                    </label>                                        
                                        </div>                        	
				                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
					                        <label><h6>Purchase Date:</h6> <br>
						                        <?php if(count($seller)>0){ echo $seller[0]->seller_address;}?>
						                    </label>                                        
                                        </div>                        	
				                    </div>                
                                </div>
			                    <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
					                        <label><h6>Estimate Delivery Date:</h6> <br>
						                        <?php if(count($seller)>0){ echo $seller[0]->estimate_delivery_date;}?>
						                    </label>                                        
                                        </div>                        	
				                    </div>
									<div class="col-md-4">
                                        <div class="form-group">
					                        <label><h6>Date And Time Of Delivery:</h6> <br>
						                        <?php if(count($seller)>0){ echo $seller[0]->seller_date_of_delivery;}?>
												<?php if(count($seller)>0){ echo $seller[0]->seller_time_of_delivery;}?>
						                    </label>                                        
                                        </div>                        	
				                    </div>
									<div class="col-md-4">
                                        <div class="form-group">
					                        <label><h6>Purchase Price:</h6> <br>
						                        <?php if(count($seller)>0){ echo $seller[0]->purchase_price;}?>
						                    </label>                                        
                                        </div>                        	
				                    </div>
                                </div>
								<hr>
                                <div class="row">                
				                    <div class="col-md-4">
                                        <div class="form-group">
					                        <label><h6>GST:</h6> <br>
						                        <?php if(count($seller)>0){ echo $seller[0]->seller_gst;}?>
						                    </label>                                        
                                        </div>                        	
				                    </div>
									<div class="col-md-4">
                                        <div class="form-group">
					                        <label><h6>Total Purchase Price:</h6> <br>
						                        <?php if(count($seller)>0){ echo $seller[0]->total_purchase_price;}?>
						                    </label>                                        
                                        </div>                        	
				                    </div>
									<div class="col-md-4">
                                        <div class="form-group">
					                        <label><h6>Outside Purchase Comm(In Dollors):</h6> <br>
						                        <?php if(count($seller)>0){ echo $seller[0]->outside_purchase_comm;}?>
						                    </label>                                        
                                        </div>                        	
				                    </div>
                                </div>
								<hr>
                                <div class="row">
								    <div class="col-md-4">
                                        <div class="form-group">
					                        <label><h6>Agreement Number:</h6> <br>
						                        <?php if(count($seller)>0){ echo $seller[0]->agreement_number;}?>
						                    </label>                                        
                                        </div>                        	
				                    </div>
									<div class="col-md-4">
                                        <div class="form-group">
					                        <label><h6>Note:</h6> <br>
						                        <?php if(count($seller)>0){ echo $seller[0]->seller_note;}?>
						                    </label>                                        
                                        </div>                        	
				                    </div>                                   
			                    </div>								
                   		        <ul class="nav nav-tabs mt-4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#private_info">Payment Detail</a>
                                    </li>
                                </ul>
                                <div class="tab-content mb-3">
                                    <div id="s_no" class="container tab-pane active"><br>
                                        <div class="row">
										    <div class="col-md-4">
                                                <div class="form-group">
					                                <label><h6>S.No.:</h6> <br>
						                                <?php if(count($seller)>0){ echo $seller[0]->s_no;}?>
						                            </label>                                        
                                                </div>                        	
				                            </div>
											<div class="col-md-4">
                                                <div class="form-group">
					                                <label><h6>AP Payment:</h6> <br>
						                                <?php if(count($seller)>0){ echo $seller[0]->ap_payment;}?>
						                            </label>                                        
                                                </div>                        	
				                            </div>
											<div class="col-md-4">
                                                <div class="form-group">
					                                <label><h6>Acc. Desc:</h6> <br>
						                                <?php if(count($seller)>0){ echo $seller[0]->acc_desc;}?>
						                            </label>                                        
                                                </div>                        	
				                            </div>
                                        </div>
										<hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
					                                <label><h6>Amount:</h6> <br>
						                                <?php if(count($seller)>0){ echo $seller[0]->amount;}?>
						                            </label>                                        
                                                </div>                        	
				                            </div>
											<div class="col-md-4">
                                                <div class="form-group">
					                                <label><h6>Bank:</h6> <br>
						                                <?php if(count($seller)>0){ echo $seller[0]->bank;}?>
						                            </label>                                        
                                                </div>                        	
				                            </div>
											<div class="col-md-4">
                                                <div class="form-group">
					                                <label><h6>Cheque Number:</h6> <br>
						                                <?php if(count($seller)>0){ echo $seller[0]->cheque_number;}?>
						                            </label>                                        
                                                </div>                        	
				                            </div>                                            
                                        </div>
										<hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="cheque_date"><h6>Cheque Date:<h6> <br>
													    <?php if(count($seller)>0){ echo $seller[0]->cheque_date;}?>
													</label>                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="to_from"><h6>To/From Who:</h6> <br>
													    <?php if(count($seller)>0){ echo $seller[0]->to_from;}?>
													</label>                                                    
                                                </div>
                                            </div>
											<div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="to_from"><h6>Remarks:</h6> <br>
													    <?php if(count($seller)>0){ echo $seller[0]->seller_remarks;}?>
													</label>                                                    
                                                </div>
                                            </div>
                                        </div>								
                                    </div>
                                </div>
                                <ul class="nav nav-tabs mt-4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#private_info">Transaction Detail</a>
                                    </li>
                                </ul>
                                <div class="tab-content mb-3">
                                    <div id="s_no" class="container tab-pane active"><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="transaction_type"><h6>Transaction Type:</h6>
													    <?php if(count($seller)>0){ echo $seller[0]->transaction_type;}?>
													</label>                                               
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="transaction_date"><h6>E-Transfer Date:</h6>
													    <?php if(count($seller)>0){ echo $seller[0]->transaction_date;}?>
													</label>                                                    
                                                </div>
                                            </div>
                                        </div>
								    </div>
                                </div>								
					        </div>
				        </div>
                    </form>
                </div>
                <div id="sales" class="container tab-pane fade"><br>
                    <form method="post" enctype="multipart/form-data" id ="buyer_details_form">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="id_number"><h6>ID Number:</h6> <br>
											    <?php if(count($buyer)>0){ echo $buyer[0]->id_number;}?>
											</label>                                            
                                        </div>
									</div>
                                    <div class="col-md-4">									
                                        <div class="form-group">
                                            <label for="buyer_address"><h6>Address:</h6>
												<?php if(count($buyer)>0){ echo $buyer[0]->buyer_address;}?>
											</label>
                                        </div>
                                    </div>
									<div class="col-md-4">									
                                        <div class="form-group">
                                            <label><h6>Delivery Out Date And Time:</h6>
												<?php if(count($buyer)>0){ echo $buyer[0]->buyer_delivery_out_date;}?>
											</label>
                                        </div>
                                    </div>
                                </div>	
                                <hr>								
                                <div class="row">                
				                    <div class="col-md-4">									
                                        <div class="form-group">
                                            <label><h6>Invoice Number:</h6>
												<?php if(count($buyer)>0){ echo $buyer[0]->invoice_number;}?>
											</label>
                                        </div>
                                    </div>
									<div class="col-md-4">									
                                        <div class="form-group">
                                            <label><h6>Delivery Out Date And Time:</h6>
												<?php if(count($buyer)>0){ echo $buyer[0]->buyer_delivery_out_date;}?>
											</label>
                                        </div>
                                    </div>
									<div class="col-md-4">									
                                        <div class="form-group">
                                            <label><h6>P&L Date:</h6>
												<?php if(count($buyer)>0){ echo $buyer[0]->pl_date;}?>
											</label>
                                        </div>
                                    </div>
                                </div>
								<hr>
                                <div class="row">
                                    <div class="col-md-4">									
                                        <div class="form-group">
                                            <label><h6>Date Of Booking:</h6>
												<?php if(count($buyer)>0){ echo $buyer[0]->date_of_booking;}?>
											</label>
                                        </div>
                                    </div>
									<div class="col-md-4">									
                                        <div class="form-group">
                                            <label><h6>Sell Code:</h6>
												<?php if(count($buyer)>0){ echo $buyer[0]->sell_code;}?>
											</label>
                                        </div>
                                    </div>
									<div class="col-md-4">									
                                        <div class="form-group">
                                            <label><h6>Sale Agreement Number:</h6>
												<?php if(count($buyer)>0){ echo $buyer[0]->sale_agreement_number;}?>
											</label>
                                        </div>
                                    </div>
                                </div> 
                                <hr>
				                <div class="row"> 
                                    <div class="col-md-4">									
                                        <div class="form-group">
                                            <label><h6>Sale Agreement Price:</h6>
												<?php if(count($buyer)>0){ echo $buyer[0]->sale_agreement_price;}?>
											</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">									
                                        <div class="form-group">
                                            <label><h6>GST:</h6>
												<?php if(count($buyer)>0){ echo $buyer[0]->buyer_gst;}?>
											</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">									
                                        <div class="form-group">
                                            <label><h6>Outside Sale Comm($):</h6>
												<?php if(count($buyer)>0){ echo $buyer[0]->outside_sale_comm;}?>
											</label>
                                        </div>
                                    </div>														
                                </div>
								<hr>
			                    <ul class="nav nav-tabs mt-4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#private_info">ETS Transaction Details</a>
                                    </li>
                                </ul>
                                <div class="tab-content mb-3">
                                    <div id="s_no" class="container tab-pane active"><br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>ETS Paper From:</h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->ets_paper_form;}?>
													</label>                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>Buy Over Date:</h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->buy_over_date;}?>
													</label>                                                    
                                                </div>
                                            </div>
											<div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>Ets Paper Purchase Price:</h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->ets_purchase_price;}?>
													</label>                                                    
                                                </div>
                                            </div>
                                        </div>
										<hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>Body Price($):</h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->body_price;}?>
													</label>                                                    
                                                </div>
                                            </div>
											<div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>ETS Transfer Value:</h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->transfer_value;}?>
													</label>                                                    
                                                </div>
                                            </div>
											<div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>ETS Pur Comm:</h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->ets_pur_comm;}?>
													</label>                                                    
                                                </div>
                                            </div>
                                        </div>
										<hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>ETS Out Comm:</h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->ets_out_comm;}?>
													</label>                                   
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>ETS Paper Buyer:</h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->ets_paper_buyer;}?>
													</label>                                                    
                                                </div>
                                            </div>
											<div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>Dereg Date:</h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->dereg_date;}?>
													</label>                                                    
                                                </div>
                                            </div>
                                        </div>                                        								
                                    </div>
                                </div>
                   		        <ul class="nav nav-tabs mt-4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#private_info">Payment Detail</a>
                                    </li>
                                </ul>
                                <div class="tab-content mb-3">
                                    <div id="s_no" class="container tab-pane active"><br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>S.No.:</h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->s_no;}?>
													</label>                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>AR Receipt:<h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->ap_receipt;}?>
													</label>                                                    
                                                </div>
                                            </div>
											<div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>Acc. Desc:<h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->acc_desc;}?>
													</label>                                                    
                                                </div>
                                            </div>
                                        </div>
										<hr>
                                        <div class="row">                                        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>Amount:</h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->amount;}?>
													</label>                                                    
                                                </div>
                                            </div>
											<div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>Bank:</h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->bank;}?>
													</label>                                                    
                                                </div>
                                            </div>
											<div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>Cheque Number:</h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->cheque_number;}?>
													</label>                                                    
                                                </div>
                                            </div>
                                        </div>
										<hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>Cheque Date:</h6>
													    <?php if(count($buyer)>0){ echo $buyer[0]->cheque_date;}?>
													</label>                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>Sell To:</h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->sell_to;}?>
													</label>                                                    
                                                </div>
                                            </div>
											<div class="col-md-4">
                                                <div class="form-group">
                                                    <label><h6>Invoice Number:</h6> <br>
													    <?php if(count($buyer)>0){ echo $buyer[0]->invoice_number2;}?>
													</label>                                                    
                                                </div>
                                            </div>
                                        </div>                                        								
                                    </div>
                                </div>	                            
				            </div>
						</div>
                    </form>
                </div>
				<div id="repair" class="container tab-pane fade"><br>
                    <form method="get" enctype="multipart/form-data" id ="repair_details_form">
			            <input type="hidden" id="repair_id">
                        @csrf
                        <div class="card">
                            <div class="card-body">
				                <?php
				                    if(count($repair)>0)
				                    {
				                        foreach($repair as $data)
				                        {
				                ?>
				                <div class="row mt-3">                
				                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="vehicle_name"><h6>Vehicle Name And Model:</h6> <br>
											    <?php if(isset($data)){ echo $data->vehicle_name;}?>
											</label>                                                             
                                        </div>
					                </div>
			                        <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="vehicle_registration_number"><h6>Registration Number:</h6> <br>
											    <?php if(isset($data)){ echo $data->vehicle_registration_number;}?>
											</label>                                            
                                        </div>
                                    </div>
				                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="vendor_name"><h6>Vendor Name:</h6> <br>
											    <?php if(isset($data)){ echo $data->vendor_name;}?>
											</label>                                            
                                        </div>
                                    </div>
				                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="repair_cost"><h6>Cost Of Repair:</h6> <br>
											    <?php if(isset($data)){ echo $data->repair_cost;}?>
											</label>                                            
                                        </div>
                                    </div>
                                </div>
								<hr>
				                <?php
				                   }
				                   }
				                   else
								   {
				                ?>
				                <div class="row mt-3">                
				                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="vehicle_name"><h6>Vehicle Name And Model:</h6> <br>
											    
											</label>                                                             
                                        </div>
					                </div>
			                        <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="vehicle_registration_number"><h6>Registration Number:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
				                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="vendor_name"><h6>Vendor Name:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
				                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="repair_cost"><h6>Cost Of Repair:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
                                </div>								
				                <?php
				                   }
				                ?>
		                    </div>
                        </div>							
	                </form>
                </div>
				<div id="miscellaneous" class="container tab-pane fade"><br>
                    <form method="get" enctype="multipart/form-data" id ="miscellaneous_details_form">
			            <input type="hidden" id="miscellaneous_id">
                        @csrf
                        <div class="card">
                            <div class="card-body">
				                <?php
				                    if(count($miscellaneous)>0)
				                    {
				                        foreach($miscellaneous as $data)
				                        {
				                ?>
				                <div class="row mt-3">                
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vehicleName"><h6>Vehicle Name And Model:</h6> <br>
											    <?php echo $data->vehicleName;?>
											</label>                                                                
                                        </div>
					                </div>
			                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vehicle_registration_number"><h6>Registration Number:</h6> <br>
											    <?php echo $data->vehicleRegistrationNumber;?>
											</label>                                            
                                        </div>
                                    </div>
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vendor_name"><h6>Vendor Name:</h6> <br>
											    <?php echo $data->vendorName;?>
											</label>                                            
                                        </div>
                                    </div>
                                </div>
								<hr>
								<div class="row mt-3">
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="miscellaneous_description"><h6>Description:</h6> <br>
											    <?php echo $data->miscellaneous_description;?>
											</label>                                            
                                        </div>
                                    </div>
					                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="amount_spent1"><h6>Amount Spent:</h6> <br>
											    <?php echo $data->amount_spent;?>
											</label>                                            
                                        </div>
                                    </div>
					                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gst_charges1"><h6>GST Charges:</h6> <br>
											    <?php echo $data->gst_charges;?>
											</label>                                            
                                        </div>
                                    </div>
				                </div>
								<hr>
								<div class="row mt-3">
				                    <div class="col-md-4">
				                        <div class="form-group">
                                            <label for="total_amount1"><h6>Total Spent Amount:</h6> <br>
											    <?php echo $data->total_amount;?>
											</label>                                            
                                        </div>
					                </div>
				                </div>
								<hr>
				                <?php
				                   }
				                   }
				                   else
								   {
				                ?>
				                <div class="row mt-3">                
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vehicleName"><h6>Vehicle Name And Model:</h6> <br>
											   
											</label>                                                                
                                        </div>
					                </div>
			                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vehicle_registration_number"><h6>Registration Number:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vendor_name"><h6>Vendor Name:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
                                </div>
								<hr>
								<div class="row mt-3">
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="miscellaneous_description"><h6>Description:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
					                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="amount_spent1"><h6>Amount Spent:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
					                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gst_charges1"><h6>GST Charges:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
				                </div>
								<hr>
								<div class="row mt-3">
				                    <div class="col-md-4">
				                        <div class="form-group">
                                            <label for="total_amount1"><h6>Total Spent Amount:</h6> <br>
											    
											</label>                                            
                                        </div>
					                </div>
				                </div>
				                <?php
				                   }
				                ?>
		                    </div>
                        </div>							
	                </form>
                </div>
				<div id="cost" class="container tab-pane fade"><br>
                    <form method="get" enctype="multipart/form-data" id ="cost_details_form">
			            <input type="hidden" id="cost_id">
                        @csrf
                        <div class="card">
                            <div class="card-body">
				                <?php
				                    if(count($cost)>0)
				                    {
				                        foreach($cost as $data)
				                        {
				                ?>
				                <div class="row mt-3">                
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vehicleNameCost"><h6>Vehicle Name And Model:</h6> <br>
											    <?php echo $data->vehicleNameCost;?>
											</label>                                                                
                                        </div>
					                </div>
			                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="floor_interest"><h6>Floor Interest:</h6> <br>
											    <?php echo $data->floor_interest;?>
											</label>                                            
                                        </div>
                                    </div>
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vendor_name"><h6>Vendor NameCost:</h6> <br>
											    <?php echo $data->vendorNameCost;?>
											</label>                                            
                                        </div>
                                    </div>
                                </div>
								<hr>
								<div class="row mt-3">
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cost_description"><h6>Description:</h6> <br>
											    <?php echo $data->cost_description;?>
											</label>                                            
                                        </div>
                                    </div>
					                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="totalAmount"><h6>Total Amount Spent:</h6> <br>
											    <?php echo $data->totalAmount;?>
											</label>                                            
                                        </div>
                                    </div>
					                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="transaction_type"><h6>Transaction Type:</h6> <br>
											    <?php echo $data->transaction_type;?>
											</label>                                            
                                        </div>
                                    </div>
				                </div>
								<hr>
				                <?php
				                   }
				                   }
				                   else
								   {
				                ?>
				                <div class="row mt-3">                
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vehicleName"><h6>Vehicle Name And Model:</h6> <br>
											   
											</label>                                                                
                                        </div>
					                </div>
			                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="floor_interest"><h6>Floor Interest:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vendor_name"><h6>Vendor Name:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
                                </div>
								<hr>
								<div class="row mt-3">
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="miscellaneous_description"><h6>Description:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
					                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="amount_spent1"><h6>Total Spent Amount:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
					                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="transaction_type"><h6>Transaction Type:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
				                </div>
								<hr>
				                <?php
				                   }
				                ?>
		                    </div>
                        </div>							
	                </form>
                </div>
				<div id="insuranceView" class="container tab-pane fade"><br>
				    <div id="viewInsurance_details">
                    <form method="get" enctype="multipart/form-data" id ="insurance_details_form">
			            <input type="hidden" id="insurance_details_view" value="<?php if(isset($vehicle)){ echo $vehicle[0]->vehicle_number;}?>">
                        @csrf
                        <div class="card">
                            <div class="card-body">
				                <div class="row mt-3">                
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vehicleName"><h6>Vehicle Name:</h6> <br>
											    
											</label>                                                                
                                        </div>
					                </div>
			                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vehicleNumber"><h6>Vehicle Number:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insuranceType"><h6>Select Insurance Type:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
                                </div>
								<hr>
								<div class="row mt-3">
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insuranceProvider"><h6>Insurance Provider:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
					                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insuranceValidity"><h6>Insurance Validity:</h6> <br>
											   
											</label>                                            
                                        </div>
                                    </div>
					                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurance_startDate"><h6>Insurance Start Date:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
				                </div>
								<hr>
								<div class="row mt-3">
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurance_endDate"><h6>Insurance End Date:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>					                
				                </div>
								<hr>				                
		                    </div>
                        </div>							
	                </form>
					</div>
                </div>
		    </div>
            <div class="ms-auto text-end mt-3">
                <a class="btn btn-danger text-light px-3 mb-0" style="color:#fff;" id="back"
                   href="{{ route('admin.vehicledetails.index') }}">Back</a>
            </div>			
        </form>
    </div>

 
 