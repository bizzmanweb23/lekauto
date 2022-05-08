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
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Vehicle Number*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->vehicle_number;?>" id="vehicle_number"
                               placeholder="Vehicle No" name="vehicle_number" readonly>
					    <span id="vehicle_number_error" style="color: red"></span>
                    </div>
                    <div class="form-group">
                        <label>Previous Vehicle Number*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->previous_vehicle_no;?>" id="previous_vehicle_no"
                               placeholder="Previous Vehicle No" name="previous_vehicle_no" readonly>
					    <span id="previous_vehicle_no_error" style="color: red"></span>
                    </div>
                </div>
            </div>				
            <div class="row">                
				 <div class="col-md-6">
                    <div class="form-group">
                        <label>Make & Model*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->name_model;?>" id="name_model"
                               placeholder="Make & Model" name="name_model" readonly>
					    <span id="name_model_error" style="color: red"></span>                       
                    </div>
                </div>
			    <div class="col-md-6">
                    <div class="form-group">
                        <label>Reg Road Tax(In Dollors)*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->reg_road_tax;?>" id="reg_road_tax"
                               placeholder="Reg Road Tax" name="reg_road_tax" readonly>
						<span id="reg_road_tax_error" style="color: red"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
				        <label>Body Type*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->body_type;?>" id="body_type"
                               placeholder="Body Type" name="body_type" readonly>
						<span id="body_type_error" style="color: red"></span>                      
                    </div>
				</div>
			   <div class="col-md-6">
                    <div class="form-group">
					    <label>Chassis No*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->chassis_no;?>" id="chassis_no"
                               placeholder="Chassis No" name="chassis_no" readonly>
						<span id="chassis_no_error" style="color: red"></span>                      
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
				        <label>Engine No*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->engine_no;?>" id="engine_no"
                               placeholder="Engine No" name="engine_no" readonly>
					    <span id="engine_no_error" style="color: red"></span>                        
                    </div>
				</div>
			    <div class="col-md-6">
                    <div class="form-group">
					    <label>Propellant*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->propellant;?>" id="propellant"
                               placeholder="Propellant" name="propellant" readonly>
						<span id="propellant_error" style="color: red"></span>                 
                    </div>                        	
				</div>
            </div> 
			<div class="row">                
		        <div class="col-md-6">
                    <div class="form-group">
                        <label>Original Reg.Date*:</label>
                        <input type="date" class="form-control form-control-user" value="<?php echo $vehicle[0]->original_reg_date;?>" id="original_reg_date" name="original_reg_date" readonly>
						<span id="original_reg_date_error" style="color: red"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
					    <label>Colour*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->colour;?>" id="colour"
                               placeholder="Colour" name="colour" readonly>
					    <span id="colour_error" style="color: red"></span>                  
                    </div>                        	
				</div>						
            </div>
			<div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Number Of Owner*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->number_of_owner;?>" id="number_of_owner"
                               placeholder="Number Of Owner" name="number_of_owner" readonly>
						<span id="number_of_owner_error" style="color: red"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>COE Logcard(In Dollors)*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->coe_logcard;?>" id="coe_logcard"
                               placeholder="COE Logcard" name="coe_logcard" readonly>
						<span id="coe_logcard_error" style="color: red"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>COE /PQP*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->coe_pqp;?>" value="<?php echo $vehicle[0]->coe_pqp;?>" id="coe_pqp"
                               placeholder="COE /PQP" name="coe_pqp" readonly>
					    <span id="coe_pqp_error" style="color: red"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Reg Fee(In Dollors)*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->reg_fee;?>" id="reg_fee"
                               placeholder="Reg Fee" name="reg_fee" readonly>
					    <span id="reg_fee_error" style="color: red"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Arf Amount(In Dollors)*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->arf_amount;?>" id="arf_amount"
                               placeholder="Arf Amount" name="arf_amount" readonly>
						<span id="arf_amount_error" style="color: red"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>OMV(In Dollors)*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->omv;?>" id="omv"
                               placeholder="OMV" name="omv" readonly>
						<span id="omv_error" style="color: red"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Cves Rebate(In Dollors)*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->cves_rebate;?>" id="cves_rebate"
                               placeholder="Cves Rebate" name="cves_rebate" readonly>
					    <span id="cves_rebate_error" style="color: red"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ETS Paper From*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->ets_paper_from;?>" id="ets_paper_from"
                               placeholder="ETS Paper From" name="ets_paper_from" readonly>
					    <span id="ets_paper_from_error" style="color: red"></span>
                    </div>
                </div>
            </div>
            <div class="row">
			    <div class="col-md-6">
                    <div class="form-group">
                        <label>Use TCOE*:</label>
                        <input type="text" class="form-control form-control-user" value="<?php echo $vehicle[0]->use_tcoe;?>" id="use_tcoe"
                               placeholder="Use TCOE" name="use_tcoe" readonly>
					    <span id="use_tcoe_error" style="color: red"></span>
                    </div>                       
                </div>
            </div>								
            <ul class="nav nav-tabs mt-4" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#contact_address">Seller Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#sales">Buyer Details</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#repair">Repair Details</a>
                </li>
            </ul>
            <div class="tab-content mb-3">
                <div id="contact_address" class="container tab-pane active"><br>
                    <form method="post" enctype="multipart/form-data" id ="seller_details_form">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="id_number">ID Number:</label>
                                            <input type="text" class="form-control" id="id_number" value="<?php echo $seller[0]->id_number;?>" name="id_number"
                                                   placeholder="ID Number" readonly>
                                            <span id="id_Number_error" style="color: red"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="seller_address">Address:</label>
                                            <textarea class="form-control" value="<?php echo $seller[0]->seller_address;?>" id="seller_address" name="seller_address" placeholder="Enter Seller's Address" readonly></textarea>
                                            <span id="Address_error" style="color: red"></span>
                                        </div>
                                    </div>
						        </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="purchase_date">Purchase Date:</label>
                                            <input type="date" class="form-control" value="<?php echo $seller[0]->purchase_date;?>" id="purchase_date" name="purchase_date" readonly>
                                            <span id="purchase_date_error" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="estimate_delivery_date">Estimate Delivery Date:</label>
                                            <input type="date" class="form-control" value="<?php echo $seller[0]->estimate_delivery_date;?>" id="estimate_delivery_date" name="estimate_delivery_date" readonly>
                                            <span id="estimate_delivery_date_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                
				                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="seller_date_of_delivery">Date And Time Of Delivery:</label>                                               
                                            <input type="datetime-local" class="form-control" value="<?php echo $seller[0]->seller_date_of_delivery;?>" id="seller_date_of_delivery" name="seller_date_of_delivery"
                                                   placeholder="Date Of Delivery" readonly>
                                            <span id="date_of_delivery_error" style="color: red"></span>
                                        </div>
                                    </div>
			                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="purchase_price">Purchase Price:</label>
                                            <div class="row">                            
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="<?php echo $seller[0]->purchase_price;?>" id="purchase_price" name="purchase_price"
                                                           placeholder="Purchase Price" readonly>
                                                    <span id="purchase_price_error" style="color: red"></span>
                                                </div>						            
							                    <div class="col-md-3">							    
                                                    <select name="seller_gst" class="form-control" id="seller_gst" value="<?php echo $seller[0]->seller_gst;?>" readonly>
                                                        <option value="">--Select GST--</option>
                                                        <option value="1">GMS</option>
                                                        <option value="2">DRS</option>
                                                        <option value="3">NEW</option>
                                                        <option value="4">EXE</option>
                                                        <option value="5">GST</option>
                                                    </select>
                                                    <span id="gst_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
				                            <label for="total_purchase_price">Total Purchase Price:</label>
                                            <input type="text" class="form-control" value="<?php echo $seller[0]->total_purchase_price;?>" id="total_purchase_price" placeholder="Total Purchase Price" name="total_purchase_price" readonly>
                                            <span id="total_purchase_price_error" style="color: red"></span>                        
                                        </div>
				                    </div>
			                        <div class="col-md-6">
                                        <div class="form-group">
					                        <label for="outside_purchase_comm">Outside Purchase Comm(In Dollors):</label>
                                            <input type="text" class="form-control" value="<?php echo $seller[0]->outside_purchase_comm;?>" id="outside_purchase_comm" name="outside_purchase_comm"
                                                   placeholder="Outside Purchase Comm" readonly>
                                            <span id="outside_purchase_comm_error" style="color: red"></span>                       
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
				                            <label for="agreement_number">Agreement Number:</label>
                                            <input type="text" class="form-control" value="<?php echo $seller[0]->agreement_number;?>" id="agreement_number" name="agreement_number" readonly>
                                            <span id="agreement_number_error" style="color: red"></span>                        
                                        </div>
				                    </div>
			                        <div class="col-md-6">
                                        <div class="form-group">
					                        <label for="seller_note">Note:</label>
                                            <textarea class="form-control" value="<?php echo $seller[0]->seller_note;?>" id="seller_note" name="seller_note" placeholder="Enter Notes" readonly></textarea>
                                            <span id="note_error" style="color: red"></span>                       
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="s_no">S.No.:</label>
                                                    <input type="text" class="form-control" value="<?php echo $seller[0]->s_no;?>" id="s_no" name="s_no"
                                                           placeholder="S.No" readonly>
                                                    <span id="s_no_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ap_payment">AP Payment:</label>
                                                    <input type="text" class="form-control" value="<?php echo $seller[0]->ap_payment;?>" id="ap_payment" name="ap_payment"
                                                           placeholder="AP Payment" readonly>
                                                    <span id="ap_payment_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="acc_desc">Acc. Desc:</label>
                                                    <input type="text" class="form-control" value="<?php echo $seller[0]->acc_desc;?>" id="acc_desc" name="acc_desc"
                                                           placeholder="Acc. Desc" readonly>
                                                    <span id="acc_desc_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="amount">Amount:</label>
                                                    <input type="text" class="form-control" value="<?php echo $seller[0]->amount;?>" id="amount" name="amount"
                                                           placeholder="Amount" readonly>
                                                    <span id="amount_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bank">Bank:</label>
                                                    <input type="text" class="form-control" value="<?php echo $seller[0]->bank;?>" id="bank" name="bank" placeholder="Bank" readonly>
                                                    <span id="bank_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cheque_number">Cheque Number:</label>
                                                    <input type="text" class="form-control" value="<?php echo $seller[0]->cheque_number;?>" id="cheque_number" name="cheque_number"
                                                           placeholder="Cheque Number" readonly>
                                                    <span id="cheque_number_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cheque_date">Cheque Date:</label>
                                                    <input type="date" class="form-control" value="<?php echo $seller[0]->cheque_date;?>" id="cheque_date" name="cheque_date" readonly>
                                                    <span id="cheque_date_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="to_from">To/From Who:</label>
                                                    <input type="text" class="form-control" value="<?php echo $seller[0]->to_from;?>" id="to_from" name="to_from"
                                                           placeholder="To Or From Or Who" readonly>
                                                    <span id="to_from_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
					                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="seller_remarks">Remarks:</label>
                                                    <textarea class="form-control" value="<?php echo $seller[0]->seller_remarks;?>" id="seller_remarks" name="seller_remarks"
                                                              placeholder="Enter Remarks" readonly></textarea>
                                                    <span id="remarks_error" style="color: red"></span>
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
                                                    <label for="seller_transaction_type">Tranaction Type:</label>
                                                        <select name="seller_transaction_type" class="form-control" id="seller_transaction_type" value="<?php echo $seller[0]->seller_transaction_type;?>" readonly>
                                                            <option value="">--Select--</option>
                                                            <option value="1">New Vehicle</option>
                                                            <option value="2">Local</option>
                                                            <option value="3">Scrap</option>
                                                            <option value="4">ETS</option>                                                                                                    
                                                        </select>
                                                        <span id="transaction_type_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="transaction_date">E-Transfer Date:</label>
                                                    <input type="date" class="form-control" id="transaction_date" name="transaction_date" value="<?php echo $seller[0]->transaction_date;?>" readonly>
                                                    <span id="transaction_date_error" style="color: red"></span>
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
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="id_number">ID Number:</label>
                                            <input type="text" class="form-control" value="<?php echo $buyer[0]->id_number;?>" id="id_number" name="id_number"
                                                   placeholder="ID Number" readonly>
                                            <span id="id_number_error" style="color: red"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="buyer_address">Address:</label>
                                            <textarea class="form-control" id="buyer_address" name="buyer_address" placeholder="Enter Buyer's Address" value="<?php echo $buyer[0]->buyer_address;?>" readonly></textarea>
                                            <span id="address_error" style="color: red"></span>
                                        </div>
                                    </div>
                                </div>							
                                <div class="row">                
				                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="buyer_delivery_out_date">Delivery Out Date And Time:</label>                                                
                                            <input type="datetime-local" class="form-control" value="<?php echo $buyer[0]->buyer_delivery_out_date;?>" id="buyer_delivery_out_date" name="buyer_delivery_out_date" readonly>
                                            <span id="delivery_out_date_error" style="color: red"></span>                        
                                        </div>
                                    </div>
			                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="invoice_number">Invoice Number:</label>
                                            <div class="row">                            
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="<?php echo $buyer[0]->invoice_number;?>" id="invoice_number" name="invoice_number"
                                                           placeholder="Enter Invoice Number" readonly>
                                                    <span id="invoice_number_error" style="color: red"></span>
                                                </div>			            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pl_date">P&L Date:</label>
                                            <input type="date" class="form-control" id="pl_date" name="pl_date" value="<?php echo $buyer[0]->pl_date;?>" readonly>
                                            <span id="pl_date_error" style="color: red"></span>                        
                                        </div>
                                    </div>
			                        <div class="col-md-6">
                                        <div class="form-group">
					                        <label for="date_of_booking">Date Of Booking:</label>
                                            <input type="date" class="form-control" value="<?php echo $buyer[0]->date_of_booking;?>" id="date_of_booking" name="date_of_booking" readonly>
                                            <span id="date_of_booking_error" style="color: red"></span>                       
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
				                            <label for="sell_code">Sell Code:</label>
                                            <input type="text" class="form-control" value="<?php echo $buyer[0]->sell_code;?>" id="sell_code" name="sell_code" placeholder="Sell Code" readonly>
                                            <span id="sell_code_error" style="color: red"></span>                        
                                        </div>
				                    </div>
			                        <div class="col-md-6">
                                        <div class="form-group">
					                        <label for="sale_agreement_number">Sale Agreement Number:</label>
                                            <input type="text" class="form-control" value="<?php echo $buyer[0]->sale_agreement_number;?>" id="sale_agreement_number" name="sale_agreement_number" placeholder="Enter Sale Agreement Number" readonly>
                                            <span id="sale_agreement_number_error" style="color: red"></span>                       
                                        </div>                        	
				                    </div>
                                </div> 
				                <div class="row">                
				                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sale_agreement_price">Sale Agreement Price:</label>
                                            <div class="row">                            
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="<?php echo $buyer[0]->sale_agreement_price;?>" id="sale_agreement_price" name="sale_agreement_price"
                                                           placeholder="Sale Agreement Price" readonly>
                                                    <span id="sale_agreement_price_error" style="color: red"></span>
                                                </div>						            
							                    <div class="col-md-3">							    
                                                    <select name="buyer_gst" class="form-control" id="buyer_gst" value="<?php echo $buyer[0]->buyer_gst;?>" readonly>
                                                        <option value="">--Select GST--</option>
                                                        <option value="1">GMS</option>
                                                        <option value="2">DRS</option>
                                                        <option value="3">NEW</option>
                                                        <option value="4">EXE</option>
                                                        <option value="5">GST</option>
                                                    </select>
                                                    <span id="gst_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
					                        <label for="outside_sale_comm">Outside Sale Comm($):</label>
                                            <input type="text" class="form-control" value="<?php echo $buyer[0]->outside_sale_comm;?>" id="outside_sale_comm" name="outside_sale_comm" placeholder="Enter Ouside Sale Comm" readonly>
                                            <span id="outside_sale_comm_error" style="color: red"></span>                       
                                        </div>                        	
				                    </div>						
                                </div>
			                    <ul class="nav nav-tabs mt-4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#private_info">ETS Transaction Details</a>
                                    </li>
                                </ul>
                                <div class="tab-content mb-3">
                                    <div id="s_no" class="container tab-pane active"><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ets_paper_form">ETS Paper From:</label>
                                                    <input type="text" class="form-control" value="<?php echo $buyer[0]->ets_paper_form;?>" id="ets_paper_form" name="ets_paper_form"
                                                           placeholder="ETS Paper From" readonly>
                                                    <span id="ets_paper_form_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="buy_over_date">Buy Over Date:</label>
                                                    <input type="date" class="form-control" value="<?php echo $buyer[0]->buy_over_date;?>" id="buy_over_date" name="buy_over_date" readonly>
                                                    <span id="buy_over_date_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ets_purchase_price">Ets Paper Purchase Price:</label>
                                                    <input type="text" class="form-control" value="<?php echo $buyer[0]->ets_purchase_price;?>" id="ets_purchase_price" name="ets_purchase_price"
                                                           placeholder="Ets Paper Purchase Price" readonly>
                                                    <span id="ets_purchase_price_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="body_price">Body Price($):</label>
                                                <input type="text" class="form-control" value="<?php echo $buyer[0]->body_price;?>" id="body_price" name="body_price"
                                                       placeholder="Body Price" readonly>
                                                <span id="body_price_error" style="color: red"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="transfer_value">ETS Transfer Value:</label>
                                                    <input type="text" class="form-control" value="<?php echo $buyer[0]->transfer_value;?>" id="transfer_value" name="transfer_value" placeholder="ETS Transfer Value" readonly>
                                                    <span id="transfer_value_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ets_pur_comm">ETS Pur Comm:</label>
                                                    <input type="text" class="form-control" value="<?php echo $buyer[0]->ets_pur_comm;?>" id="ets_pur_comm" name="ets_pur_comm"
                                                           placeholder="ETS Pur Comm" readonly>
                                                    <span id="ets_pur_comm_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ets_out_comm">ETS Out Comm:</label>
                                                    <input type="text" class="form-control" value="<?php echo $buyer[0]->ets_out_comm;?>" id="ets_out_comm" name="ets_out_comm" placeholder="ETS Out Comm" readonly>
                                                    <span id="ets_out_comm_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ets_paper_buyer">ETS Paper Buyer:</label>
                                                    <input type="text" class="form-control" value="<?php echo $buyer[0]->ets_paper_buyer;?>" id="ets_paper_buyer" name="ets_paper_buyer"
                                                           placeholder="ETS Paper Buyer" readonly>
                                                    <span id="ets_paper_buyer_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
					                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dereg_date">Dereg Date:</label>
                                                    <input type="date" class="form-control" value="<?php echo $buyer[0]->dereg_date;?>" id="dereg_date" name="dereg_date"
                                                           placeholder="Dereg Date" readonly>
                                                    <span id="dereg_date_error" style="color: red"></span>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="s_no">S.No.:</label>
                                                    <input type="text" class="form-control" value="<?php echo $buyer[0]->s_no;?>" id="s_no" name="s_no"
                                                           placeholder="S.No" readonly>
                                                    <span id="s_no_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ap_receipt">AR Receipt:</label>
                                                    <input type="text" class="form-control" value="<?php echo $buyer[0]->ap_receipt;?>" id="ap_receipt" name="ap_receipt"
                                                           placeholder="AR Receipt" readonly>
                                                    <span id="ap_receipt_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="acc_desc">Acc. Desc:</label>
                                                    <input type="text" class="form-control" value="<?php echo $buyer[0]->acc_desc;?>" id="acc_desc" name="acc_desc"
                                                           placeholder="Acc. Desc" readonly>
                                                    <span id="acc_desc_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="amount">Amount:</label>
                                                    <input type="text" class="form-control" value="<?php echo $buyer[0]->amount;?>" id="amount" name="amount"
                                                           placeholder="Amount" readonly>
                                                    <span id="amount_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bank">Bank:</label>
                                                    <input type="text" class="form-control" value="<?php echo $buyer[0]->bank;?>" id="bank" name="bank" placeholder="Bank" readonly>
                                                    <span id="bank_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cheque_number">Cheque Number:</label>
                                                    <input type="text" class="form-control" value="<?php echo $buyer[0]->cheque_number;?>" id="cheque_number" name="cheque_number"
                                                           placeholder="Cheque Number" readonly>
                                                    <span id="cheque_number_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cheque_date">Cheque Date:</label>
                                                    <input type="date" class="form-control" value="<?php echo $buyer[0]->cheque_date;?>" id="cheque_date" name="cheque_date" readonly>
                                                    <span id="cheque_date_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sell_to">Sell To:</label>
                                                    <input type="text" class="form-control" value="<?php echo $buyer[0]->sell_to;?>" id="sell_to" name="sell_to"
                                                           placeholder="Sell To" readonly>
                                                    <span id="sell_to_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
					                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="invoice_number">Invoice Number:</label>
                                                    <input class="form-control" value="<?php echo $buyer[0]->invoice_number2;?>" id="invoice_number" name="invoice_number2"
                                                           placeholder="Invoice Number" readonly>
                                                    <span id="invoice_number_error" style="color: red"></span>
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
                                                    <label for="buyer_transaction_type">Tranaction Type:</label>
                                                    <select name="buyer_transaction_type" class="form-control" value="<?php echo $buyer[0]->buyer_transaction_type;?>" id="buyer_transaction_type" readonly>
                                                        <option value="">--Select--</option>
                                                        <option value="1">New Vehicle</option>
                                                        <option value="2">Local</option>
                                                        <option value="3">Scrap</option>
                                                        <option value="4">ETS</option>                                                                                                    
                                                    </select>
                                                    <span id="transaction_type_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="buyer_transaction_date">E-Transfer Out Date:</label>
                                                    <input type="date" class="form-control" value="<?php echo $buyer[0]->buyer_transaction_date;?>" id="buyer_transaction_date" name="buyer_transaction_date" readonly>
                                                    <span id="transaction_date_error" style="color: red"></span>
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
				foreach($repair as $data)
				{
				?>
				<div class="row mt-3">                
				    <div class="col-md-3">
                        <div class="form-group">
                            <label for="vehicle_name">Vehicle Name And Model:</label>
                            <input type="text" class="form-control" id="vehicle_name" name="vehicle_name[]" value="<?php echo $data->vehicle_name;?>" placeholder="Vehicle Name" readonly>
						    <span id="vehicle_name_error" style="color: red"></span>                     
                        </div>
					</div>
			        <div class="col-md-3">
                        <div class="form-group">
                            <label for="vehicle_registration_number">Registration Number:</label>
                            <input type="text" class="form-control" id="vehicle_registration_number" name="vehicle_registration_number[]" value="<?php echo $data->vehicle_registration_number;?>" placeholder="Vehicle Registration Number" readonly>
						    <span id="vehicle_registration_number_error" style="color: red"></span>
                        </div>
                    </div>
				    <div class="col-md-3">
                        <div class="form-group">
                            <label for="vendor_name">Vendor Name:</label>
                            <input type="text" class="form-control" id="vendor_name" name="vendor_name[]" value="<?php echo $data->vendor_name;?>" placeholder="Enter Vendor Name" readonly>
						    <span id="vendor_name_error" style="color: red"></span>
                        </div>
                    </div>
				    <div class="col-md-3">
                        <div class="form-group">
                            <label for="repair_cost">Cost Of Repair:</label>
                            <input type="text" class="form-control" id="repair_cost" name="repair_cost[]" value="<?php echo $data->repair_cost;?>" placeholder="Enter Repair Cost" readonly>
					        <span id="repair_cost_error" style="color: red"></span>
                        </div>
                    </div>
                </div>
				<?php
				}
				?>
		</div>	
	</form>
                </div>
		    </div>
            <div class="ms-auto text-end mt-3">
                <a class="btn btn-danger text-light px-3 mb-0" style="color:#fff;" id="back"
                   href="{{ route('admin.vehicledetails.index') }}">Back</a>
            </div>			
        </form>
    </div>

 
 