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
<form method="post" enctype="multipart/form-data" id ="edit_vehicle_details_form">
    <input type="hidden" id="edit_Vehicle_id" value="<?php echo $vehicle[0]->id;?>">
    @csrf
    <div class="card">
                    <div class="card-body">
                        <div class="branch-name bg-light px-3 py-3" style="color:#fff;background: #a36626 !important;">
                            <h4 style="color:#fff;">MASTER</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <!-- this is system id -->
                            <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="system_id" class="mt-2">System ID</label>
                                </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-2 form-control-user" value="<?php echo $vehicle[0]->system_id;?>" name="system_id" id="system_id">
                             <span id="system_id_error" style="color:red;"></span> 
                            </div>
                            </div>
                                

                             <!-- this is vechicle status -->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="vehicle_status" class="mt-2">Vehicle Status</label>
                                </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select name="vehicle_status" id="vehicle_status" class="form-control mt-2 form-control-user">
                             <option value="">--Select Status--</option>       
                             <option <?php if($vehicle[0]->vehicle_status == 'Ordered'){ echo 'selected';} ?> value="Ordered">Ordered</option>
                             <option <?php if($vehicle[0]->vehicle_status == 'NotOrdered'){ echo 'selected';} ?>value="NotOrdered">Not Ordered</option>     
                                </select>
                                <span id="vehicle_status_error" style="color:red;"></span>
                                </div>
                              </div>
                                <div class="branch-name bg-light px-2 py-2 mt-2" style="color:#fff;background: #a36626 !important;">
                                    <h6 style="color:#fff;">Stock Entry</h6>
                                </div>


                             <!-- this is the start make -->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-2">Make:</label>
                                </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select name="vehicle_make" id="vehicle_make" class="form-control mt-2 form-control-user">
					                <option value="">--Select--</option>
						            <?php
								    foreach($vehicleName as $data)
								        {
							        ?>
                                    <option <?php if($vehicle[0]->vehicle_make == $data->vehicleManufactureName){ echo 'selected';}?> value="<?php echo $data->vehicleManufactureName;?>"><?php echo $data->vehicleManufactureName;?></option>
                                <?php
								}
								?>
					            </select>
					            <span id="vehicle_make_error" style="color:red;"></span>
                            </div>
                            </div>
                            

                             <!-- this is the start model -->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="" class="mt-2">Model</label>
                                </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-2 form-control-user" value="<?php echo $vehicle[0]->vehicle_year;?>" id="ddlYears1">
                            <span id="ddlYears1_error" style="color:red"></span> 
                            </div>
                            </div>   
                            <div class="col-md-4 mt-3">
                                    <a  href="{{ route('admin.pricelist.index' ,['vehicle_id' => $vehicle[0]->id])}}" class="bg-light px-1 py-2" style="text-decoration: none;">Price List Make Modal</a>
                            </div>       
                             <div class="clearfix"></div>

                             <!-- this is the body type -->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="body_type" class="mt-2">Body Type</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-2 form-control-user" value="<?php echo $vehicle[0]->body_type;?>" name="body_type" id="body_type">
                            <span id="body_type_error" style="color:red;"></span>
                            </div>
                            </div>


                            <!-- this is the price list -->
                            <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="" class="mt-3">Price List(Make/Modal)</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <div class="row">
                            <div class="col-md-6">
                                <select name="price_list_make" id="price_list_make" class="form-control mt-3 form-control-user">
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
								<span id="price_list_make_error" style="color:red;"></span>
                            </div>							
                            <div class="col-md-6">
                                <input type="text" class="form-control mt-3 form-control-user" name="price_list_model" id="price_list_model">
                            </div>
                            </div>
                            </div>
                            </div>

                            <!-- this is the price list -->
                            <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="priceList_plus" class="mt-3"> Price List(plus)</label>
                                 </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-2 form-control-user" value="<?php echo $vehicle[0]->pricelist_plus;?>" name="pricelist_plus" id="pricelist_plus"> </select>
                       
                               <span id="priceList_plus_error" style="color:red"></span>
                              </div>
                            </div>

                             <!-- this is the Accessory -->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="accessory" class="mt-3"> Accessory</label>
                                 </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <textarea type="text" class="form-control mt-2 form-control-user" name="accessory" id="accessory"><?php echo $vehicle[0]->accessory;?></textarea></textarea>
                             <span id="accessory_error" style="color:red;"></span>
                           </div>
                            </div>


                             <!-- this is the Chasis no-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="chasis_no" class="mt-3"> Chasis No</label>
                                </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-2 form-control-user" name="chasis_number" value="<?php echo $vehicle[0]->chasis_number;?>" id="chasis_number">
                             <span id="chasis_number_error" style="color:red;"></span>
                             </div>
                            </div>


                            <!-- this is the Engine no-->
                            <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="engine_no" class="mt-3"> Engine No.</label>
                                </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" name="engine_number" class="form-control mt-2 form-control-user" value="<?php echo $vehicle[0]->engine_number;?>" id="engine_number">
                             <span id="engine_number_error" style="color:red"></span>
                             </div>
                            </div>
                        
                             <!-- this is the Proplant-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="proplant" class="mt-3">Proplant</label>
                                </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select class="form-control mt-2 form-control-user" name="propellant" id="propellant">
                            <option value="">-- select --</option>
                            <option <?php if($vehicle[0]->propellant == 'Petrol'){ echo 'selected';}?> value="Petrol">Petrol</option>
						    <option <?php if($vehicle[0]->propellant == 'Diesel'){ echo 'selected';}?> value="Diesel">Diesel</option>
						    <option <?php if($vehicle[0]->propellant == 'Natural Gas'){ echo 'selected';}?> value="Natural Gas">Natural Gas</option>
                            </select>
                           <span id="propellant_error" style="color:red;"></span>
                             </div>
                            </div>

                           <!-- this is the Laden-->
                           <div class="row">
                                <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-3">Laden:</label>
                                      </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-2 form-control-user"  value="<?php echo $vehicle[0]->laden;?>" name="laden" id="laden">
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the Unladen-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-3">Unladen:</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-2 form-control-user" value="<?php echo $vehicle[0]->unladen;?>" name="unladen" id="unladen">
                             </div>
                            </div>
                            </div>
                            </div>
                      
                           <!-- this is the Engine gap/ton-->
                           <div class="row">
                                <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-3">Engine Cap\Ton:</label> 
                                      </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->enginecap_ton;?>" name="enginecap_ton" id="enginecap_ton">
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the PAX-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-3">PAX:</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->pax;?>" name="pax" id="pax">
                             </div>
                            </div>
                            </div>
                            </div>
                      

                         <!-- this is the year of manufacture-->
                         <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="year_of_manufacture" class="mt-3">Year Of Manufacture</label>
                                      </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->year_of_manufacture;?>" name="year_of_manufacture" id="year_of_manufacture">
					        <span id="year_of_manufacture_error" style="color:red;"></span>
                             </div>
                            </div>


                        <!-- this is the year of original registraion date-->
                        <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="original_reg_date" class="mt-3">Original Registration Date</label>
                                      </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="date" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->original_reg_date;?>" name="original_reg_date" id="original_reg_date">
                             <span id="original_reg_date_error" style="color:red;"></span>
                             </div>
                            </div>
    

                        <!-- this is the year of Colour-->
                        <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="" class="mt-3">Colour</label>
                                      </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                        <select class="form-control form-control-user" id="color" name="color">
                            <option value="">--select--</option>
                            <option <?php if($vehicle[0]->color == 'Black'){ echo 'selected';}?> value="Black">Black</option>
							<option <?php if($vehicle[0]->color == 'Red'){ echo 'selected';}?> value="Red">Red</option>
							<option <?php if($vehicle[0]->color == 'Grey'){ echo 'selected';}?> value="Grey">Grey</option>
							<option <?php if($vehicle[0]->color == 'White'){ echo 'selected';}?> value="White">White</option>
                            </select>
                             </div>
                            </div>


                            <!-- this is the no of TSF-->
                        <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-2">Number Of TSF:</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-2 form-control-user" value="<?php echo $vehicle[0]->number_of_tsf;?>" name="number_of_tsf" id="number_of_tsf">
					         <span id="number_of_tsf_error" style="color:red;"></span>
                             </div>
                            </div>
    
                        <!-- this is the Location-->
                        <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-2">Location:</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-2 form-control-user" value="<?php echo $vehicle[0]->location;?>" name="location" id="location">
                             <span id="location_error" style="color:red;"></span>
                             </div>
                            </div>
    
                         <!-- this is the Incharge by-->
                         <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-3">Incharge By:</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-2 form-control-user" value="<?php echo $vehicle[0]->incharge_by;?>" name="incharge_by" id="incharge_by">
					         <span id="incharge_by_error" style="color:red;"></span>
                             </div>
                            </div>
          
     </div>   

                        
                    <!-- this is another column -->
                    <div class="col-md-6">
                        <div class="branch-name bg-light px-2 py-2 mt-2" style="color:#fff;background: #a36626 !important;">
                        <h6 style="color:#fff;">Record Section</h6>
                    </div>
                    <!-- this is the Entry date-->
                    <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="entry_date" class="mt-4">Entry Date</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="date" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->entry_date;?>" name="entry_date" id="entry_date">
                             <span id="entry_date_error" style="color:red;"></span>
                             </div>
                            </div>
                       
                            
                    <!-- this is the Created By-->
                    <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="Created_by" class="mt-4">Created By</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->Created_by;?>" name="Created_by" id="created_by">
                             <span id="Created_by_error" style="color:red;"></span>
                             </div>
                            </div>

                    <!-- this is the Last modified By-->
                    <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="last_modifiedBy" class="mt-4">Last Modified By</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->last_modifiedBy;?>" name="last_modifiedBy" id="last_modifiedBy">
                             <span id="last_modifiedBy_error" style="color:red;"></span>
                             </div>
                            </div>
    
                    <hr>


                    <!-- this is the Transfer fee-->
                    <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="transfer_fee" class="mt-4">Transfer Fee</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->transfer_fee;?>" name="transfer_fee" id="transfer_fee">
				             <span id="transfer_fee_error" style="color:red;"></span>
                             </div>
                            </div>
                    

                    <!-- this is the Road Tax-->
                    <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="road_tax" class="mt-4">Road Tax</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->road_tax;?>" name="road_tax" id="road_tax">
                             <span id="road_tax_error" style="color:red;"></span>
                            </div>
                            </div>
     
                    <!-- this is the Road Tax expiry date-->
                    <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="roadTax_expiry" class="mt-4">Road Tax Expiry Date:</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="date" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->roadTax_expiry;?>" name="roadTax_expiry" id="roadTax_expiry">
					         <span id="roadTax_expiry_error" style="color:red;"></span>
                             </div>
                            </div>
                    
                             <!-- this is the Road Tax type-->
                              <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="road_tax_type" class="mt-4">Road Tax Type:</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select class="form-control mt-3 form-control-user" name="road_tax_type" id="road_tax_type">
                        <option value="">--select--</option>
                        <option <?php if($vehicle[0]->road_tax_type == '6 months'){ echo 'selected';}?> value="6 months">6 Months</option>
						    <option <?php if($vehicle[0]->road_tax_type == '12 months'){ echo 'selected';}?> value="12 months">12 months</option>
                        </select>
                        <span id="road_tax_type_error" style="color:red;"></span>
                             </div>
                            </div>


                     <!-- this is the Inspection expiry date-->
                    <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="inspection_expiry" class="mt-4">Inspection Expiry Date:</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="date" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->inspection_expiry;?>" name="inspection_expiry" id="inspection_expiry">
					        <span id="inspection_expiry_error" style="color:red;"></span>
                             </div>
                            </div>
                         
                      <!-- this is the Layuo expiry date-->
                    <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="layUp_expiry" class="mt-4">Layup Exp Date</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="date" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->layUp_expiry;?>" name="layUp_expiry" id="layUp_expiry">
                             <span id="layUp_expiry_error" style="color:red;"></span>
                             </div>
                            </div>
                       
                            
                     <!-- this is the COE log guard-->
                     <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="coe_logcard" class="mt-4">COE log guard</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->coe_logcard;?>" name="coe_logcard" id="coe_logcard">
                             <span id="coe_logcard_error" style="color:red;"></span>
                             </div>
                            </div>
                     
                            
                             <!-- this is the COE(Acc)/DPQP-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="coe_acc" class="mt-4">COE(ACC)/ DPQP</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->coe_acc;?>" name="coe_acc" id="coe_acc">
                             <span id="coe_acc_error" style="color:red;"></span>
                             </div>
                            </div>


                    <!-- this is the COE Number-->
                    <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="coe_number" class="mt-4">COE Number</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->coe_number;?>" name="coe_number" id="coe_number">
                             <span id="coe_number_error" style="color:red;"></span>
                             </div>
                            </div>
                       
                    <!-- this is the COE Expiry date-->
                    <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="coe_expiryDate" class="mt-4">COE Expiry Date</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="date" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->coe_expiryDate;?>" name="coe_expiryDate" id="coe_expiryDate">
                             <span id="coe_expiryDate_error" style="color:red;"></span>
                             </div>
                            </div>
                        
                    <!-- this is the COE to Pay-->
                    <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="coe_to_pay" class="mt-4">COE To Pay</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select class="form-control mt-3 form-control-user" name="coe_to_pay" id="coe_to_pay">
                        <option value="">--select--</option>
                        <option <?php if($vehicle[0]->coe_to_pay == 'Paid'){ echo 'selected';}?> value="Paid">Paid</option>
						<option <?php if($vehicle[0]->coe_to_pay == 'Not Paid'){ echo 'selected';}?> value="Not Paid">Not Paid</option>
                       </select>
                    <span id="coe_to_pay_error" style="color:red;"></span>
                             </div>
                            </div>
                            

                     <!-- this is the Open Market Value-->
                     <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="omv" class="mt-4">Open Market Value</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->omv;?>" name="omv" id="omv">
                            <span id="omv_error" style="color:red;"></span>
                             </div>
                            </div>
                           
                     <!-- this is the Parf amount-->
                     <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="parf_amount" class="mt-4">Parf Amount</label>
                              </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->parf_amount;?>" name="parf_amount" id="parf_amount">
                           <span id="parf_amount_error" style="color:red;"></span>
                             </div>
                            </div>

                     <!-- this is the Registration fee-->
                     <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="registeration_fee" class="mt-4">Registeration Fee(RF)</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->registeration_fee;?>" name="registeration_fee" id="registeration_fee">
                            <span id="registeration_fee_error" style="color:red;"></span>
                             </div>
                            </div>

                     <!-- this is the ARF Amount-->
                     <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="arf_amount" class="mt-4">ARF Amount</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->arf_amount;?>" name="arf_amount" id="arf_amount">
                              <span id="arf_amount_error" style="color:red;"></span>
                             </div>
                            </div>
                         
                            <!-- this is the CEVS-->
                     <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="cves_surcharge" class="mt-4">CEVS Surcharge</label>
                                </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->cves_surcharge;?>" name="cves_surcharge" id="cves_surcharge">
                             <span id="cves_surcharge_error" style="color:red;"></span>
                             </div>
                            </div>

                     <!-- this is the CEVS Rebate-->
                     <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="cevs_rebate" class="mt-4">CEVS Rebate</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->cevs_rebate;?>" name="cevs_rebate" id="cevs_rebate">
                             <span id="cevs_rebate_error" style="color:red;"></span>
                             </div>
                            </div>

                     <!-- this is the ETS paper form-->
                     <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="ets_paper_form" class="mt-4">ETS Paper From</label>
                                 </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" value="<?php echo $vehicle[0]->ets_paper_form;?>" name="ets_paper_form" id="ets_paper_form">
                            <span id="ets_paper_form_error" style="color:red;"></span>
                             </div>
                            </div>
                      <!-- this is the use tcoe-->
                      <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="use_tcoe" class="mt-4">Use TCOE:</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select class="form-control mt-3 form-control-user" name="use_tcoe" id="use_tcoe">
						<option value="">--select--</option>
                        <option <?php if($vehicle[0]->use_tcoe == 'Yes'){ echo 'selected';}?> value="Yes">Yes</option>
						 <option <?php if($vehicle[0]->use_tcoe == 'No'){ echo 'selected';}?> value="No">No</option>
						 </select>
					      <span id="use_tcoe_error" style="color:red;"></span>
                    
                             </div>
                     </div>
                          
                    </div>
           
                   </div>						
       	            </div>
	            </div>
                
                        <div class="card">
                    <div class="card-body">
                        <div class="branch-name bg-light px-3 py-3" style="color:#fff;background: #a36626 !important;">
                            <h5 style="color:#fff;">Seller Details</h5>
                        </div>
                        <input type="hidden" id="SellerVehicleId" value="<?php echo $vehicle[0]->id;?>">
            <!--div class="card">
                <div class="card-body"-->
					<?php if(count($seller)<1)
					    { 
					?>
				    <div class="row">
					    <div class="col-md-8"></div>
					    <div class="col-md-4">
							<a href="{{route ('admin.seller.index',['vehicle_id' => $vehicle[0]->id])}}" class="btn btn-primary text-light px-3 mb-0" style="color:#fff; float:right;background:#a36626 !important;">Add Seller</a>
						</div>
					</div>
					<?php
						}
					?>
                    

                    <input type="hidden" id="Vehicle_Unique_id_Seller" />
               

                        <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="id_number" class="mt-3">ID Number</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-2 form-control-user" name="id_number" id="id_number" value="<?php if(count($seller)>0){ echo $seller[0]->id_number;}?>">
                            <span id="id_number_error" style="color:red;"></span>                                        
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="purchase_date" class="mt-2">Purchase Date</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="date" class="form-control mt-2 form-control-user" name="purchase_date" id="purchase_date" value="<?php if(count($seller)>0){ echo $seller[0]->purchase_date;}?>">
                            <span id="purchase_date_error" style="color:red;"></span>                                       
                            </div>
                        </div>


                        <div class="row">
                        <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="estimate_delivery" class="mt-3">Estimate Delivery In Date</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="date" class="form-control mt-3 form-control-user" name="estimate_delivery" id="estimate_delivery" value="<?php if(count($seller)>0){ echo $seller[0]->estimate_delivery;}?>">
                            <span id="estimate_delivery_error" style="color:red;"></span>    
                            </div>
                        </div>



                      <div class="row">
                      <div class="col-md-3">
                      <!-- this is the label -->
                      <label for="delivery_in_date" class="mt-3">Delivery In Date & Time</label>
                     </div>
                     <div class="col-md-9">
                     <!-- this is box -->
                     <div class="row">
                                    <div class="col-md-7">	
                                    <input type="date" class="form-control mt-2 form-control-user" name="delivery_in_date" id="delivery_in_date" value="<?php if(count($seller)>0){ echo $seller[0]->delivery_in_date;}?>">
                                    <span id="delivery_in_date_error" style="color:red;"></span>							
                                    </div>
									<div class="col-md-5">
                                    <input type="time" class="form-control mt-2 form-control-user" name="time" id="time" value="<?php if(count($seller)>0){ echo $seller[0]->time;}?>">
                                    <span id="time_error" style="color:red;"></span>
									</div>
                    
                    </div>
                    </div>
					</div>
                    
                    </div>           
                    <br>
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="agreement_number" class="mt-3">Agreement Number</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="agreement_number" id="agreement_number" value="<?php if(count($seller)>0){ echo $seller[0]->agreement_number;}?>">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="settlement_number" class="mt-3">Settlement Number</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="settlement_number" id="settlement_number" value="<?php if(count($seller)>0){ echo $seller[0]->settlement_number;}?>">          
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="note" class="mt-3">Note</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <textarea type="text" class="form-control mt-3 form-control-user" name="note" id="note"><?php if(count($seller)>0){ echo $seller[0]->note;}?></textarea>
                            </div>
                            </div>
                        </div>

                            <div class="row">
                            <div class="col-md-6">

                             <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="DN_CN_Number" class="mt-3">DN/CN Number</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 from-control-user" name="DN_CN_Number" id="DN_CN_Number" value="<?php if(count($seller)>0){ echo $seller[0]->DN_CN_Number;}?>">
                            </div>
                            </div>
                            </div>   

                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="DN_CN_Amount" class="mt-3">DN/CN Amount</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 from-control-user" name="DN_CN_Amount" id="DN_CN_Amount">
                            </div>
                            </div>
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
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="purchase_price" class="mt-3">Purchase Price($)</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="purchase_price" id="purchase_price">
                            </div>
                                </div>
                                </div>
                                    <div class="col-md-4">  
                                    <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="gst" class="mt-4">GST</label>                                        
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <select name="gst" class="form-control mt-3" id="gst">
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
                            </div>
                        </div>                                        
                            <div class="col-md-3">     
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="amount">GST Amount</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 from-control-user" name="amount" id="amount" value="<?php if(count($seller)>0){ echo $seller[0]->amount;}?>">
                            </div>
                        </div>
                             </div>
                                </div> 
                                <br>


                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="GST_Decimal_Adjustment" class="mt-3">GST Decimal Adjustment</label>                              
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="GST_Decimal_Adjustment" id="GST_Decimal_Adjustment" value="<?php if(count($seller)>0){ echo $seller[0]->amount;}?>">
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="GST_Amount_Before_Adjustment" class="mt-3">GST Amount Before Adjustment</label>                              
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="GST_Amount_Before_Adjustment" id="GST_Amount_Before_Adjustment" value="<?php if(count($seller)>0){ echo $seller[0]->amount;}?>">   
                            </div>
                            </div>
                            </div>                                            
                            </div>     
                            
                            
                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="total_purchase_price" class="mt-3">Total Purchase Price</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" id="total_purchase_price" name="total_purchase_price" value="<?php if(count($seller)>0){ echo $seller[0]->amount;}?>">
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="ap_payment" class="mt-4">AP Payment</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <select name="ap_payment" class="form-control mt-3 form-control-user" id="ap_payment" value="<?php if(count($seller)>0){ echo $seller[0]->amount;}?>">
                                        <option value="">--Select--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                            </select>   
                            </div>
                            </div>
                            </div>                                            
                            </div>    
                            
                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="amount" class="mt-4">Amount</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="amount" id="amount" value="<?php if(count($seller)>0){ echo $seller[0]->amount;}?>">
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="bank" class="mt-4">Bank</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <select name="bank" class="form-control mt-3 form-control-user" id="bank" >
                                        <option value="">--Select--</option>
                                        <option <?php if(count($seller)>0){ if($seller[0]->bank == 'HDFC') { echo 'selected';} }?> value="HDFC">HDFC</option>
                                        <option <?php if(count($seller)>0){ if($seller[0]->bank == 'AXIS') { echo 'selected';} }?> value="AXIS">AXIS</option>
                                        <option <?php if(count($seller)>0){ if($seller[0]->bank == 'SBI') { echo 'selected';} }?> value="SBI">SBI</option>
                                        <option <?php if(count($seller)>0){ if($seller[0]->bank == 'INDIAN BANK') { echo 'selected';} }?> value="INDIAN BANK">INDIAN BANK</option>
                                        <option <?php if(count($seller)>0){ if($seller[0]->bank == 'OVERSEAS BANK') { echo 'selected';} }?> value="OVERSEAS BANK">OVERSEAS BANK</option>
                                        <option <?php if(count($seller)>0){ if($seller[0]->bank == 'CANARA BANK') { echo 'selected';} }?> value="CANARA BANK">CANARA BANK</option>
                                        </select>
                            </div>
                            </div>
                            </div>                                            
                            </div>
                           

                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="cheque_number" class="mt-3">Cheque Number</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="cheque_number" id="cheque_number" value="<?php if(count($seller)>0){ echo $seller[0]->cheque_number;}?>">
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="cheque_date" class="mt-4">Cheque Date</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="date" class="form-control mt-3 form-control-user" name="cheque_date" id="cheque_date" value="<?php if(count($seller)>0){ echo $seller[0]->cheque_date;}?>">
                            </div>
                            </div>
                            </div>                                            
                            </div>


                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="to_from" class="mt-3">To/From Who</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="to_from" id="to_from" value="<?php if(count($seller)>0){ echo $seller[0]->to_from;}?>">
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="remarks" class="mt-4">Remarks</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <textarea type="text" class="form-control mt-3 form-control-user" name="remarks" id="remarks">value="<?php if(count($seller)>0){ echo $seller[0]->remarks;}?>"</textarea>
                            </div>
                            </div>
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
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-4" for="AP_Balance">AP Balance</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="AP_Balance" id="AP_Balance" value="<?php if(count($seller)>0){ echo $seller[0]->amount;}?>">
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="transaction_type" class="mt-3">Transaction Type</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <select name="transaction_type" class="form-control mt-3 form-control-user" id="transaction_type" >
                                        <option value="">--select--</option>
                                        <option <?php if(count($seller)>0){ if($seller[0]->transaction_type == 'offline') { echo 'selected';} }?> value="offline">Offline</option>
                                        <option <?php if(count($seller)>0){ if($seller[0]->transaction_type == 'ONline') { echo 'selected';} }?> value="online">Online</option>
                                         </select>        
                            </div>
                            </div>
                            </div>                                            
                            </div>


                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="p_settlement_remark">P Settlement Remark</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="p_settlement_remark" id="p_settlement_remark" value="<?php if(count($seller)>0){ echo $seller[0]->p_settlement_remark;}?>">
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="E_Transfer_In_Date" class="mt-3">E-Transfer In Date</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="date" class="form-control mt-3 form-control-user" name="E_Transfer_In_Date" id="E_Transfer_In_Date" value="<?php if(count($seller)>0){ echo $seller[0]->E_Transfer_In_Date;}?>">
                            </div>
                            </div>
                            </div>                                            
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="Asking_Price">Asking Price($)</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="Asking_Price" id="Asking_Price" value="<?php if(count($seller)>0){ echo $seller[0]->Asking_Price;}?>">
                            <span id="asking_price_error" style="color:red"></span>
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="E_Transfer_By" class="mt-4">E_Transfer By</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <select name="E_Transfer_By" class="form-control mt-3 form-control-user" id="E_Transfer_By" >
                                        <option value="">--select--</option>
                                        <option <?php if(count($seller)>0){ if($seller[0]->E_Transfer_By == 'offline') { echo 'selected';} }?> value="offline">Test</option>
                                        <option <?php if(count($seller)>0){ if($seller[0]->E_Transfer_By == 'ONline') { echo 'selected';} }?> value="online">Test1</option>
                                        
                                       </select>
                            </div>
                            </div>
                            </div>                                            
                            </div>
    
                            <div class="row">
                                        <div class="col-md-2">
                                        <!-- this is the label -->
                                        <label for="Log_card" class="mt-4">Log Card<br>(Transfer In)</label>
                                        </div>
                                        <div class="col-md-4">
                                        <!-- this is box -->
                                        <input type="text" class="form-control mt-4 form-control-user" name="Log_card" id="Log_card" value="<?php if(count($seller)>0){ echo $seller[0]->amount;}?>">
                                     </div>
                                    </div>


                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="Alternate_price" class="mt-3">Alternate Price($)</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="Alternate_price" id="Alternate_price" value="<?php if(count($seller)>0){ echo $seller[0]->Alternate_price;}?>">                                            
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="Alternate" class="mt-4">Alternate</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="Alternate" id="Alternate" value="<?php if(count($seller)>0){ echo $seller[0]->Alternate;}?>">
                            </div>
                            </div>
                            </div>                                            
                            </div>


                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="Buy_Code" class="mt-4">Buy Code</label>
                            </div>
                            <div class="col-md-6">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="Buy_Code" id="Buy_Code" value="<?php if(count($seller)>0){ echo $seller[0]->Buy_Code;}?>">                                            
                            </div>
                            </div>
                            </div>


                           

                            <div class="row">
                            <div class="col-md-9">
                            <div class="row">
                            <div class="col-md-2">
                            <!-- this is the label -->
                            <label for="Trade_In_Buy" class="mt-3">Trade In By</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 ontrol-user" name="Trade_In_Buy" id="Trade_In_Buy" value="<?php if(count($seller)>0){ echo $seller[0]->Trade_In_Buy;}?>">
                            </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-9">
                            <div class="row">
                            <div class="col-md-2">
                            <!-- this is the label -->
                            <label for="Broker1" class="mt-3">Broker1</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <select name="Broker1" class="form-control mt-3 form-control-user" id="Broker">
                                        <option value="">--select--</option>
                                        <option <?php if(count($seller)>0){ if($seller[0]->Broker1 == 'Broker1') { echo 'selected';} }?> value="Broker1">Broker1</option>
                                            <option <?php if(count($seller)>0){ if($seller[0]->Broker1 == 'Broker2') { echo 'selected';} }?> value="Broker2">Broker2</option>               
                            </select>
                            </div>
                            </div>
                            </div>
                            </div>


                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="Com_Rtn" class="mt-4">Com.Rtn.</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="Com_Rtn" id="Com_Rtn" value="<?php if(count($seller)>0){ echo $seller[0]->Com_Rtn;}?>">
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="Return_Date" class="mt-4">Return Date</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="date" class="form-control mt-3 form-control-user" name="Return_Date" id="Return_Date" value="<?php if(count($seller)>0){ echo $seller[0]->Return_Date;}?>">
                            </div>
                            </div>
                            </div>                                            
                            </div>
                            <br>
                             

                            <div class="row">
                            <div class="col-md-9">
                            <div class="row">
                            <div class="col-md-2">
                            <!-- this is the label -->
                            <label for="Broker2" class="mt-3">Broker2</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <select name="Broker2" class="form-control mt-3 form-control-user" id="Broker2" >

                            <option value="">--Select--</option>
                                            <option <?php if(count($seller)>0){ if($seller[0]->broker2 == 'Broker1') { echo 'selected';} }?> value="Broker1">Broker1</option>
                                            <option <?php if(count($seller)>0){ if($seller[0]->broker2 == 'Broker1') { echo 'selected';} }?> value="Broker2">Broker2</option>               
                                           
                            </select>        
                            </div>
                            </div>
                            </div>
                            </div>
                            <br>

                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="Com_Rtn1" class="mt-4">Com.Rtn.</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="Com_Rtn1" id="Com_Rtn1" value="<?php if(count($seller)>0){ echo $seller[0]->Com_Rtn1;}?>">
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="Return_Date2" class="mt-4">Return Date</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="date" class="form-control mt-3 form-control-user" name="Return_Date2" id="Return_Date2" value="<?php if(count($seller)>0){ echo $seller[0]->Return_Date2;}?>">
                            </div>
                            </div>
                            </div>                                            
                            </div>
                            <br>
                            </div>
                                </div>
                            </div>             
                        </div>						
                    </div>
                </div>
            </form>



                   		<hr>
	    <!--/div>            
    </div>
</form-->
<!-- End Buyer Modal -->

<div class="card">
        <div class="card-body">
            <div class="branch-name bg-light px-3 py-3" style="color:#fff;background: #a36626 !important;">
                <h5 style="color:#fff;">Buyer Details</h5>
            </div>

            <input type="hidden" id="buyerVehicleId" value="<?php echo $vehicle[0]->id;?>">
                    <!--div class="card">
                        <div class="card-body"-->
						    <?php if(count($buyer)<1)
						        { 
					        ?>
					        <div class="row">
							    <div class="col-md-8"></div>
							    <div class="col-md-4">
							        <a href="{{route ('admin.buyer.index',['vehicle_id' => $vehicle[0]->id])}}" class="btn btn-primary text-light px-3 mb-0" style="color:#fff; float:right;background:#a36626 !important;">Add Buyer</a>
								</div>
						    </div>
							<?php
								}
							?>


            <div class="row">
                <div class="col-md-6">

                <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label for="id_number_buyer" class="mt-4">ID Number</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" name="id_number_buyer" id="id_number_buyer" value="<?php if(count($buyer)>0){ echo $buyer[0]->id_number_buyer;}?>">
                                <span id="id_number_error" style="color:red;"></span>                               
                                </div>
                            </div>

                             <!-- this is the delivery date-->
                     <div class="row">
                                <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="delivery_out_date" class="mt-3">Delivery Out Date</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="date" class="form-control mt-3 form-control-user" name="delivery_out_date" id="delivery_out_date" value="<?php if(count($buyer)>0){ echo $buyer[0]->delivery_out_date;}?>">
                             <span id="delivery_in_date_error" style="color:red;"></span>
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="delivery_time" class="mt-3">Time</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="time" class="form-control mt-3 form-control-user" name="delivery_time" id="delivery_time" value="<?php if(count($buyer)>0){ echo $buyer[0]->delivery_time;}?>">
                             <span id="delivery_time_error" style="color:red;"></span>
                             </div>
                            </div>
                            </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="invoice_number" class="mt-3">Invoice Number</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 from-control-user" name="invoice_number" id="invoice_number" value="<?php if(count($buyer)>0){ echo $buyer[0]->invoice_number;}?>">
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="invoice_date" class="mt-3">Invoice Date</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 from-control-user" name="invoice_date" id="invoice_date" value="<?php if(count($buyer)>0){ echo $buyer[0]->invoice_date;}?>">
                             </div>
                            </div>
                            </div>
                            </div>
                    
                    <div class="clearfix"></div>
                    <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label for="pl_date" class="mt-4">P&L Date</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                </div>
                            </div>
                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label for="booking_date" class="mt-4">Booking Date</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="date" class="form-control mt-3 form-control-user" id="booking_date" name="booking_date" value="<?php if(count($buyer)>0){ echo $buyer[0]->booking_date;}?>">
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label for="sell_code" class="mt-4">Sell Code</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" id="sell_code" name="sell_code" value="<?php if(count($buyer)>0){ echo $buyer[0]->sell_code;}?>">
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label for="sales_aggreement_number" class="mt-4">Sales Agreement Number</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" id="sales_aggreement_number" name="sales_aggreement_number" value="<?php if(count($buyer)>0){ echo $buyer[0]->sales_aggreement_number;}?>">
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label for="sale_aggreement_price" class="mt-4">Sale Aggreement Price($)</label>
                            </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" id="sale_aggreement_price" name="sale_aggreement_price" value="<?php if(count($buyer)>0){ echo $buyer[0]->sale_aggreement_price;}?>">
                                </div>
                            </div>
                               
                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label for="selling_price" class="mt-4">Selling Price($)</label>
                            </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" name="selling_price" id="selling_price" value="<?php if(count($buyer)>0){ echo $buyer[0]->selling_price;}?>">                        
                                </div>
                            </div>

                         
                            <div class="row">
                                <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="buyer_gst" class="mt-4">GST</label>                                        
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select name="buyer_gst" class="form-control mt-3" id="buyer_gst">
                                <option value="">--Select GST--</option>
                                <?php
                                                        foreach($gst as $data)
                                                        {
                                                    ?>
                                                    <option <?php if(count($buyer)>0){ if($buyer[0]->buyer_gst == $data->gst_name) { echo 'selected';} }?> value="<?php echo $data->gst_name;?>"><?php echo $data->gst_name;?></option>
                                                    <?php
                                                        }
                                                    ?>
                                
                            </select>
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="gst_amount_buyer" style="margin-top: 16px;" class="mt-3">GST Amount</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 from-control-user" name="gst_amount_buyer" id="gst_amount_buyer" value="<?php if(count($buyer)>0){ echo $buyer[0]->gst_amount_buyer;}?>">
                             </div>
                            </div>
                            </div>
                            </div>


                     
                    <br>

                        <div class="row">
                                <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="gst_decimal_adjustment_buyer" class="mt-3">GST Decimal Adjustment</label>                              
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="gst_decimal_adjustment_buyer" id="gst_decimal_adjustment_buyer" value="<?php if(count($buyer)>0){ echo $buyer[0]->gst_decimal_adjustment_buyer;}?>">
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="gst_amountbefore_adjustment_buyer" class="mt-3">GST Amount Before Adjustment</label>                              
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="gst_amountbefore_adjustment_buyer" id="gst_amountbefore_adjustment_buyer" value="<?php if(count($buyer)>0){ echo $buyer[0]->gst_amountbefore_adjustment_buyer;}?>">   
                             </div>
                            </div>
                            </div>
                            </div>

                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label for="total_selling_price" class="mt-4">Total Selling Price</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" id="total_selling_price" name="total_selling_price" value="<?php if(count($buyer)>0){ echo $buyer[0]->total_selling_price;}?>">
                                </div>
                            </div>
                          </div>

                    <div class="col-md-6">
                        <br>
                        <div class="branch-name bg-light px-2 py-2 mt-2">
                        <h5 style="color:#fff;background: #a36626 !important;" class="py-2 px-2">ETS Transaction Details</h5>
				        </div>  
                        
                        <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label class="mt-4" for="buy_over_date">Buy Over Date</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="date" class="form-control mt-3 form-control-user" name="buy_over_date" id="buy_over_date" value="<?php if(count($buyer)>0){ echo $buyer[0]->buy_over_date;}?>">
                                </div>
                            </div>
                        <label class="mt-3" for="fight_pl">Fight PL</label><input type="checkbox">


                        <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label class="mt-4" for="ets_paper_to">ETS Paper To</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" name="ets_paper_to" id="ets_paper_to" value="<?php if(count($buyer)>0){ echo $buyer[0]->ets_paper_to;}?>">
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label class="mt-4" for="body_price">Body Price</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" name="body_price" id="body_price" value="<?php if(count($buyer)>0){ echo $buyer[0]->body_price;}?>">                      
                                </div>
                            </div>    

                        <br>

                        <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label class="mt-4" for="dereg_date">Dereg Date</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="date" class="form-control mt-3 form-control-user" name="dereg_date" id="dereg_date" value="<?php if(count($buyer)>0){ echo $buyer[0]->dereg_date;}?>">
                                </div>
                            </div>


                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label class="mt-4" for="coe_encashment">COE Encashment</label>
                                </div>
                               <div class="col-md-4">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" name="coe_encashment" id="coe_encashment" value="<?php if(count($buyer)>0){ echo $buyer[0]->coe_encashment;}?>">
                                </div>
                                <div class="col-md-4">
                                <input type="text" class="form-control mt-3 form-control-user" style="margin-top: 20px;" name="coe_encashment1" id="coe_encashment1" value="<?php if(count($buyer)>0){ echo $buyer[0]->coe_encashment1;}?>">
                                </div>
                            </div>


                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label class="mt-4" for="parf_encashment">Parf Encashment</label>
                                </div>
                               <div class="col-md-4">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" name="parf_encashment" id="parf_encashment" value="<?php if(count($buyer)>0){ echo $buyer[0]->parf_encashment;}?>">
                                </div>
                                <div class="col-md-4">
                                <input type="text" class="form-control mt-3 form-control-user" style="margin-top: 20px;" name="parf_encashment1" id="parf_encashment1" value="<?php if(count($buyer)>0){ echo $buyer[0]->parf_encashment1;}?>">
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label class="mt-4" for="ets_transfer_value">ETS Transfer Value</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="date" class="form-control mt-3 form-control-user" name="ets_transfer_value" id="ets_transfer_value" value="<?php if(count($buyer)>0){ echo $buyer[0]->ets_transfer_value;}?>">
                                </div>
                            </div>


                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label class="mt-4" for="ets_paper">ETS Paper(External)</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="date" class="form-control mt-3 form-control-user" name="ets_paper" id="ets_paper" value="<?php if(count($buyer)>0){ echo $buyer[0]->ets_paper;}?>">                  
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="invoice_number2" class="mt-3">Invoice Number 2</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="invoice_number2" id="invoice_number2" value="<?php if(count($buyer)>0){ echo $buyer[0]->invoice_number2;}?>">                 
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="invoice_date2" class="mt-3">Invoice Date 2</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="invoice_date2" id="invoice_date2" value="<?php if(count($buyer)>0){ echo $buyer[0]->invoice_date2;}?>">          
                             </div>
                            </div>
                            </div>
                            </div>


                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label class="mt-4" for="ets_paper_buyer">ETS Paper Buyer</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" name="ets_paper_buyer" id="ets_paper_buyer" value="<?php if(count($buyer)>0){ echo $buyer[0]->ets_paper_buyer;}?>">            
                                </div>
                            </div>
                                </div>

                        
                       
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="branch-name bg-light px-2 py-2 mt-2">
                            <h5 style="color:black; background-color:green;broder:1px solid;" class="py-3 px-3">Sales/Forfeited/Refund Deposit</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                                <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="ap_receipt" class="mt-3">AP Receipt</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select name="ap_receipt" class="form-control form-control-user" id="ap_receipt">
                            <option value="">--Select--</option>
                            <option <?php if(count($buyer)>0){ if($buyer[0]->ap_receipt == 'Yes') { echo 'selected';} }?> value="Yes">Yes</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->ap_receipt == 'No') { echo 'selected';} }?> value="No">No</option>
                            
                            </select>
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="amount_buyer" class="mt-3">Amount</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control form-control-user" name="amount_buyer" id="amount_buyer" value="<?php if(count($buyer)>0){ echo $buyer[0]->amount_buyer;}?>">
                             </div>
                            </div>
                            </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="bank_buyer" class="mt-3">Bank</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                            <select name="bank_buyer1" class="form-control mt-3 form-control-user" id="bank_buyer">
                            <option value="">--Select--</option>

                             <option <?php if(count($seller)>0){ if($buyer[0]->bank_buyer1 == 'HDFC') { echo 'selected';} }?> value="HDFC">HDFC</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->bank_buyer == 'AXIS') { echo 'selected';} }?> value="AXIS">AXIS</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->bank_buyer == 'SBI') { echo 'selected';} }?> value="SBI">SBI</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->bank_buyer == 'INDIAN BANK') { echo 'selected';} }?> value="INDIAN BANK">INDIAN BANK</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->bank_buyer == 'OVERSEAS BANK') { echo 'selected';} }?> value="OVERSEAS BANK">OVERSEAS BANK</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->bank_buyer == 'CANARA BANK') { echo 'selected';} }?> value="CANARA BANK">CANARA BANK</option>
                             </select>           
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="cheque_number_buyer" class="mt-3">Cheque Number</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="cheque_number_buyer" id="cheque_number_buyer" value="<?php if(count($buyer)>0){ echo $buyer[0]->cheque_number_buyer;}?>">
                             </div>
                            </div>
                            </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="cheque_date_buyer" class="mt-3">Cheque Date</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="date" class="form-control mt-3 form-control-user" name="cheque_date_buyer" id="cheque_date_buyer" value="<?php if(count($buyer)>0){ echo $buyer[0]->cheque_date_buyer;}?>">
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="sell_to" class="mt-3">Sell To</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select name="sell_to" class="form-control mt-3 form-control-user" id="sell_to">
                                 <option value="">--Select--</option>

                            
                             <option <?php if(count($buyer)>0){ if($buyer[0]->sell_to == 'Seller1') { echo 'selected';} }?> value="Seller1">Seller1</option>
                            <option <?php if(count($buyer)>0){ if($buyer[0]->sell_to == 'Seller2') { echo 'selected';} }?> value="Seller2">Seller2</option>
                            <option <?php if(count($buyer)>0){ if($buyer[0]->sell_to == 'Seller3') { echo 'selected';} }?> value="Seller3">Seller3</option>
                            
                               </select>         
                             </div>
                            </div>
                            </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="invoice_number3" class="mt-3">Invoice Number</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="invoice_number3" id="invoice_number3" value="<?php if(count($buyer)>0){ echo $buyer[0]->invoice_number3;}?>">
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="to_from_who" class="mt-3">To/From Who</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="to_from_who" id="to_from_who" value="<?php if(count($buyer)>0){ echo $buyer[0]->to_from_who;}?>">
                             </div>
                            </div>
                            </div>
                            </div>
                             
                            <div class="row">
                                <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="buyer_remarks" class="mt-3">Remarks</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <textarea type="text" class="form-control mt-3 form-control-user" name="buyer_remarks" id="buyer_remarks"><?php if(count($buyer)>0){ echo $buyer[0]->buyer_remarks;}?>>
                           </textarea>
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="payment_mode" class="mt-3">Payment Mode</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                            <select class="form-control mt-3 form-control-user" name="payment_mode" id="payment_mode">
                            <option value="">--select--</option>
                            <option <?php if(count($buyer)>0){ if($buyer[0]->payment_mode == 'Credit') { echo 'selected';} }?> value="Credit">Credit</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->payment_mode == 'Debit') { echo 'selected';} }?> value="Debit">Debit</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->payment_mode == 'Cheque') { echo 'selected';} }?> value="Cheque">Cheque</option>
                            </select>
                            </div>
                            </div>
                            </div>
                            </div>
    
                <br>
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
                           <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="ap_receipt1" class="mt-4">AP Receipt</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select name="ap_receipt1" class="form-control mt-3 form-control-user" id="ap_receipt1">
                            <option value="">--Select--</option>
                            <option <?php if(count($buyer)>0){ if($buyer[0]->ap_receipt1 == 'Yes') { echo 'selected';} }?> value="Yes">Yes</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->ap_receipt1 == 'No') { echo 'selected';} }?> value="No">No</option>
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="amount_buyer1" class="mt-4">Amount</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="amount_buyer1" id="amount_buyer1" value="<?php if(count($buyer)>0){ echo $buyer[0]->amount_buyer1;}?>">
                             </div>
                            </div>
                            </div>
                            </div>

                            <div class="row">
                           <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="bank_buyer1" class="mt-4">Bank</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select name="bank_buyer1" class="form-control mt-3 form-control-user" id="bank_buyer1">
                            <option value="">--Select--</option>
                            <option <?php if(count($seller)>0){ if($buyer[0]->bank_buyer1 == 'HDFC') { echo 'selected';} }?> value="HDFC">HDFC</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->bank_buyer1 == 'AXIS') { echo 'selected';} }?> value="AXIS">AXIS</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->bank_buyer1 == 'SBI') { echo 'selected';} }?> value="SBI">SBI</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->bank_buyer1 == 'INDIAN BANK') { echo 'selected';} }?> value="INDIAN BANK">INDIAN BANK</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->bank_buyer1 == 'OVERSEAS BANK') { echo 'selected';} }?> value="OVERSEAS BANK">OVERSEAS BANK</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->bank_buyer1 == 'CANARA BANK') { echo 'selected';} }?> value="CANARA BANK">CANARA BANK</option>
                                        </select>
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="cheque_number_buyer1" class="mt-4">Cheque Number</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="cheque_number_buyer1" id="cheque_number_buyer1" value="<?php if(count($buyer)>0){ echo $buyer[0]->cheque_number_buyer1;}?>">       
                             </div>
                            </div>
                            </div>
                            </div>


                           <div class="row">
                           <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="cheque_date_buyer1" class="mt-4">Cheque Date</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="date" class="form-control mt-3 form-control-user" name="cheque_date_buyer1" id="cheque_date_buyer1" value="<?php if(count($buyer)>0){ echo $buyer[0]->cheque_date_buyer1;}?>">
                             
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="sell_to1" class="mt-4">Sell To</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select name="sell_to1" class="form-control mt-3 form-control-user" id="sell_to1">
                            <option value="">--select--</option>
                            <option <?php if(count($buyer)>0){ if($buyer[0]->sell_to1 == 'Seller1') { echo 'selected';} }?> value="Seller1">Seller1</option>
                            <option <?php if(count($buyer)>0){ if($buyer[0]->sell_to1 == 'Seller2') { echo 'selected';} }?> value="Seller2">Seller2</option>
                            <option <?php if(count($buyer)>0){ if($buyer[0]->sell_to1 == 'Seller3') { echo 'selected';} }?> value="Seller3">Seller3</option>
                            </select>
                             </div>
                            </div>
                            </div>
                            </div>


                            <div class="row">
                           <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="invoice_number4" class="mt-3">Invoice Number</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="invoice_number4" id="invoice_number4" value="<?php if(count($buyer)>0){ echo $buyer[0]->invoice_number4;}?>">          
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="to_from_who1" class="mt-4">To/From Who</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="to_from_who1" id="to_from_who1" value="<?php if(count($buyer)>0){ echo $buyer[0]->to_from_who1;}?>">
                             </div>
                            </div>
                            </div>
                            </div>

                            <div class="row">
                           <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="buyer_remarks1" class="mt-3">Remarks</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <textarea type="text" class="form-control mt-3 form-control-user" name="buyer_remarks1" id="buyer_remarks1"></textarea>
                             </div>
                            </div>
                            </div>
                            

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="payment_mode1" class="mt-3">Payment Mode</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select class="form-control mt-3 form-control-user" name="payment_mode1" id="payment_mode1">
                            <option value="">--select--</option>
                             <option <?php if(count($buyer)>0){ if($buyer[0]->payment_mode1 == 'Credit') { echo 'selected';} }?> value="Credit">Credit</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->payment_mode1 == 'Debit') { echo 'selected';} }?> value="Debit">Debit</option>
                                        <option <?php if(count($buyer)>0){ if($buyer[0]->payment_mode1 == 'Cheque') { echo 'selected';} }?> value="Cheque">Cheque</option>
                           
                            </select>
                             </div>
                            </div>
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
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-3" for="total_recievable">Total Receivable</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="total_recievable" id="total_recievable" value="<?php if(count($buyer)>0){ echo $buyer[0]->total_recievable;}?>">
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-3" for="total_received">Total Received</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="total_received" id="total_received" value="<?php if(count($buyer)>0){ echo $buyer[0]->total_received;}?>">
                             </div>
                            </div>
                            </div>
                            </div>

                            <div class="row">
                           <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-3" for="ar_balance_buyer">AR balance</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="ar_balance_buyer" id="ar_balance_buyer" value="<?php if(count($buyer)>0){ echo $buyer[0]->ar_balance_buyer;}?>">
                             <span id="ar_balance_buyer_error" style="color:red"></span>                                    
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="status" class="mt-3">Status</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select class="form-control mt-3 form-control-user" name="status" id="status"><p>(N/Y/S)</p>
                            <option value="">--select--</option>
                            <option value="N">N-open</option>
                            <option value="Y">Y-open</option>                                  
                            <option value="S">N-open</option>
                            </select>
                             </div>
                            </div>
                            </div>
                            </div>


                            <div class="row">
                           <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-3" for="transaction_type_buyer">Transaction Type</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select name="buyer_transaction_type" class="form-control" id="buyer_transaction_type" >
                                            <option value="">--Select--</option>
                                            <option <?php if(count($buyer)>0){ if($buyer[0]->buyer_transaction_type == 'New Vehicle') { echo 'selected';} }?> value="New Vehicle">New Vehicle</option>
                                            <option <?php if(count($buyer)>0){ if($buyer[0]->buyer_transaction_type == 'Local') { echo 'selected';} }?> value="Local">Local</option>
                                            <option <?php if(count($buyer)>0){ if($buyer[0]->buyer_transaction_type == 'Scrap') { echo 'selected';} }?> value="Scrap">Scrap</option>
                                            <option <?php if(count($buyer)>0){ if($buyer[0]->buyer_transaction_type == 'ETS') { echo 'selected';} }?> value="ETS">ETS</option>                                                                                                   
                                        </select>
                                        
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-3" for="Etransfer_out_date">E-Transfer Out Date</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="date" class="form-control mt-3 form-control-user" name="Etransfer_out_date" id="Etransfer_out_date" value="<?php if(count($buyer)>0){ echo $buyer[0]->Etransfer_out_date;}?>">
                             </div>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                   <br>
                                   <label class="mt-3">LTA Transfer</label>
                                   <input type="checkbox">
                               </div>
                              
                               <div class="row">
                           <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="Etransfer_out_by" class="mt-3">E-Transfer Out By</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select name="Etransfer_out_by" class="form-control mt-3 form-control-user" id="Etransfer_out_by">
                                <option value="">--select--</option>
                                <option <?php if(count($buyer)>0){ if($buyer[0]->Etransfer_out_by == 'Broker1') { echo 'selected';} }?> value="Broker1">Broker1</option>
                                <option <?php if(count($buyer)>0){ if($buyer[0]->Etransfer_out_by == 'Broker2') { echo 'selected';} }?> value="Broker2">Broker2</option>
                                 </select>
                             </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="log_card" class="mt-3">Log Card(Transfer Out)</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="log_card" id="log_card" value="<?php if(count($buyer)>0){ echo $buyer[0]->log_card;}?>">
                             </div>
                            </div>
                            </div>
                            </div>

    





               			<hr>
	    <!--/div>            
    </div>
</form-->
<!-- End Buyer Modal -->

            </form>
             </div>
                </div>
            </div>
        </div>
        
    </div>
	<div id="user_loder" style="display: none">
        @include('admin.loder.index')
    </div>

<!-- Start Repair Modal -->
                <div class="row mt-2">
			        <div class="col-md-12">
				        <h5 style="color:#fff;background: #a36626 !important;" class="py-2 px-2">Repair Detail</h5>
				    </div>
                </div>
				<input type="hidden" id="repairVehicleId" value="<?php echo $vehicle[0]->id;?>">
                <!-- div class="card"-->
			    <div class="row mt-3">
				    <div class="col-md-4">
                        <button class="btn btn-primary text-light px-3 mb-0 getVehicleDetailsRepair" style="color:#fff;float:right;background:#a36626 !important;margin-right:-660px;" id="addRepairDetails" rel="<?php echo $vehicle[0]->id;?>" type="button">Add Repair</button>
					</div>
                </div>
				<?php
				    if(count($repair)>0)
				        {
				    foreach($repair as $data)
				        {
				?>
				<input type="hidden" name="repairEditID[]" value="<?php echo $data->id;?>">

                           <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="vehicle_name">Vehicle Name And Model:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3" id="vehicle_name" name="vehicle_name[]" value="<?php echo $data->vehicle_name;?>" placeholder="Vehicle Name">
						    <span id="vehicle_name_error" style="color: red"></span>                     
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="vehicle_registration_number">Registration Number:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3" id="vehicle_registration_number" name="vehicle_registration_number[]" value="<?php echo $data->vehicle_registration_number;?>" placeholder="Vehicle Registration Number">
						    <span id="vehicle_registration_number_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>                                            
                            </div>


                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-4" for="vendor_name">Vendor Name:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3" id="vendor_name" name="vendor_name[]" value="<?php echo $data->vendor_name;?>" placeholder="Enter Vendor Name">
						    <span id="vendor_name_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-4" for="repair_cost">Cost Of Repair:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3" id="repair_cost" name="repair_cost[]" value="<?php echo $data->repair_cost;?>" placeholder="Enter Repair Cost">
					        <span id="repair_cost_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>                                            
                            </div>

			    
				<?php
				    }
				    }
				    else
				    {
				?>
				<div class="row mt-3">                    				
				    <div class="col-md-3">					    	
                        <div class="form-group">
                            <label for="vehicle_name">Vehicle Name And Model:</label>
                            <input type="text" class="form-control" id="vehicle_name" name="vehicle_name[]" value="<?php if(isset($data)){ echo $data->vehicle_name;}?>" placeholder="Vehicle Name">
						    <span id="vehicle_name_error" style="color: red"></span>                     
                        </div>
					</div>
			        <div class="col-md-3">
                        <div class="form-group">
                            <label for="vehicle_registration_number">Registration Number:</label>
                            <input type="text" class="form-control" id="vehicle_registration_number" name="vehicle_registration_number[]" value="<?php if(isset($data)){ echo $data->vehicle_registration_number;}?>" placeholder="Vehicle Registration Number">
						    <span id="vehicle_registration_number_error" style="color: red"></span>
                        </div>
                    </div>
				    <div class="col-md-3">
                        <div class="form-group">
                            <label for="vendor_name">Vendor Name:</label>
                            <input type="text" class="form-control" id="vendor_name" name="vendor_name[]" value="<?php if(isset($data)){ echo $data->vendor_name;}?>" placeholder="Enter Vendor Name">
						    <span id="vendor_name_error" style="color: red"></span>
                        </div>
                        </div>
				        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_cost">Cost Of Repair:</label>
                                <input type="text" class="form-control" id="repair_cost" name="repair_cost[]" value="<?php if(isset($data)){ echo $data->repair_cost;}?>" placeholder="Enter Repair Cost">
					            <span id="repair_cost_error" style="color: red"></span>
                            </div>
                        </div>
                    </div>
				    <?php
				        }
				    ?>
		        </div>
				<hr>
		<!--/div>
	</div>
</form-->
<!-- End Repair Modal -->
<!-- Start Miscellaneous Modal -->
                <div class="row mt-2">
			        <div class="col-md-12">
				        <h5 style="color:#fff;background: #a36626 !important;" class="py-2 px-2">Miscellenous Detail</h5>
				    </div>
                </div>
				<input type="hidden" id="miscellenousVehicleId" value="<?php echo $vehicle[0]->id;?>">
			    <div class="row mt-3">
				    <div class="col-md-4">
                        <button class="btn btn-primary text-light px-3 mb-0 vehicleDetailsMiscellenous" style="color:#fff;float:right;background:#a36626 !important;margin-right:-695px;;" rel="<?php echo $vehicle[0]->id;?>" id="addMiscellaneousDetails" type="button">Add Miscellaneous</button>
					</div>
					
                </div>
				<?php
				    if(count($miscellaneous)>0)
				    {
				    foreach($miscellaneous as $data)
				    {
				?>
				<input type="hidden" name="miscellaneousEditID[]" value="<?php echo $data->id;?>">

                <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="vehicleName">Vehicle Name And Model:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3" id="vehicleName" name="vehicleName[]" value="<?php echo $data->vehicleName;?>" placeholder="Vehicle Name">
						    <span id="vehicleName_error" style="color: red"></span>                     
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="vehicle_registration_number">Registration Number:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3" id="vehicleRegistrationNumber" name="vehicleRegistrationNumber[]" value="<?php echo $data->vehicleRegistrationNumber;?>" placeholder="Vehicle Registration Number">
						    <span id="vehicleRegistrationNumber_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>                                            
                            </div>


                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="vendor_name">Vendor Name:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3" id="vendorName" name="vendorName[]" value="<?php echo $data->vendorName;?>" placeholder="Enter Vendor Name">
						    <span id="vendorName_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="miscellaneous_description">Description:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <textarea class="form-control mt-3" id="miscellaneous_description" name="miscellaneous_description[]" placeholder="Enter Description"><?php echo $data->miscellaneous_description;?></textarea>
					        <span id="description_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>                                            
                            </div>


                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-4" for="amount_spent1">Amount Spent:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 amount_spent1" id="amount_spent" name="amount_spent[]" value="<?php echo $data->amount_spent;?>" placeholder="Enter Amount Spent">
					        <span id="amount_spent_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-4" for="gst_charges1">GST Charges:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 gst_charges1" id="gst_charges" name="gst_charges[]" value="<?php echo $data->gst_charges;?>" placeholder="Enter GST Charges">
					        <span id="gst_charges_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>                                            
                            </div>


                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-4" for="total_amount1">Total Spent Amount:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 total_amount1" id="total_amount" name="total_amount[]" value="<?php echo $data->total_amount;?>" placeholder="Total Spent Amount">
					        <span id="total_amount_error" style="color: red"></span>
                            </div>
                            </div>
                            </div> 
                            </div>   
                           
				<?php
				    }
				    }
				    else
			        {
				?>								
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
				<?php
				    }
				?>
				<hr>
        <!--/div>
	</div>
</form-->
			<!-- End Mis -->
			<!-- start Cost Center -->
			<div class="row mt-2">
			    <div class="col-md-12">
				    <h5 style="color:#fff;background: #a36626 !important;" class="py-2 px-2">Cost Center Details</h5>
				</div>
            </div>
		    <input type="hidden" id="miscellenousVehicleId" value="<?php echo $vehicle[0]->id;?>">		    
			<?php
				if(count($cost)>0)
				{
			?>
			<div class="row mt-3">
				<div class="col-md-4">
                    <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff;float:right;background:#a36626 !important;margin-right:-694px;" id="addCostDetails" type="button">Add Cost</button>
				</div>
            </div>
		    <?php
				foreach($cost as $data)
				{
			?>
			<input type="hidden" name="costEditID[]" value="<?php echo $data->id;?>">

            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="costType_M">Cost Type:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <select name="costType_M[]" class="form-control mt-3" id="costType_M">
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
						    <span id="costType_M_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="vehicleNameCost">Vehicle Name And Model:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3" id="vehicleCost" name="vehicleNameCost[]" value="" placeholder="Vehicle Name">
						    <span id="vehicleNameCost_error" style="color: red"></span>                     
                            </div>
                            </div>
                            </div>                                            
                            </div>


                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="vendor_name">Vendor Name:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3" id="vendorNameCost" name="vendorNameCost[]" value="" placeholder="Enter Vendor Name">
					    	<span id="vendorNameCost_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="miscellaneous_description">Description:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <textarea class="form-control mt-3" id="cost_description" name="cost_description[]" value="" placeholder="Enter Description"></textarea>
					        <span id="cost_description_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>                                            
                            </div>



                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="total_amount">Total Spent Amount:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3" id="totalAmount" name="totalAmount[]" value="" placeholder="Total Spent Amount">
				     	    <span id="totalAmount_error" style="color: red"></span>
                         </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="transaction_type">Transaction Type:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <select name="transaction_type[]" class="form-control mt-3" id="transaction_type" >
                            <option value="">--Select--</option>
                            <option value="1">Credit</option>
                            <option value="2">Debit</option>                                                                                                                                                            
                            </select>
					        <span id="transaction_type_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>                                            
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="floor_interest">Floor Interest:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3" id="floor_interest" name="floor_interest[]" value="" placeholder="Enter Floor Interest">
					        <span id="floor_interest_error" style="color: red"></span>
                            </div>
                            </div>
                            </div> 
                            </div>				
			<?php
				}
				}
				else{
			?>
			<div class="row mt-3">
				<div class="col-md-4">
                    <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff;float:right;background:#a36626 !important;margin-right:-694px;" id="addCostDetails" type="button">Add Cost</button>
			    </div>
            </div>

            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="costType_M">Cost Type:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <select name="costType_M[]" class="form-control" id="costType_M">
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
						    <span id="costType_M_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="vehicleNameCost">Vehicle Name And Model:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3" id="vehicleCost" name="vehicleNameCost[]" value="" placeholder="Vehicle Name">
						    <span id="vehicleNameCost_error" style="color: red"></span>                     
                            </div>
                            </div>
                            </div>                                            
                            </div>


                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="vendor_name">Vendor Name:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3" id="vendorNameCost" name="vendorNameCost[]" value="" placeholder="Enter Vendor Name">
					    	<span id="vendorNameCost_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="miscellaneous_description">Description:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <textarea class="form-control mt-3" id="cost_description" name="cost_description[]" value="" placeholder="Enter Description"></textarea>
					        <span id="cost_description_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>                                            
                            </div>



                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="total_amount">Total Spent Amount:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3" id="totalAmount" name="totalAmount[]" value="" placeholder="Total Spent Amount">
				     	    <span id="totalAmount_error" style="color: red"></span>
                         </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="transaction_type">Transaction Type:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <select name="transaction_type[]" class="form-control mt-3" id="transaction_type" >
                            <option value="">--Select--</option>
                            <option value="1">Credit</option>
                            <option value="2">Debit</option>                                                                                                                                                            
                            </select>
					        <span id="transaction_type_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>                                            
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3" for="floor_interest">Floor Interest:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3" id="floor_interest" name="floor_interest[]" value="" placeholder="Enter Floor Interest">
					        <span id="floor_interest_error" style="color: red"></span>
                            </div>
                            </div>
                            </div> 
                            </div>
				
			
			<?php
				}
			?>
			<hr>
		<!--/div>
    </div>
</form -->
			<!-- End Cost -->
			<div class="row mt-2">
			    <div class="col-md-12">
				    <h5 style="color:#fff;background: #a36626 !important;" class="py-2 px-2">Insurance Details</h5>
				</div>
            </div>
			<input type="hidden" id="miscellenousVehicleId" value="<?php echo $vehicle[0]->id;?>">
			    <div id="showInsuranceDetails">

                <div class="row">
                <input type="hidden" id="insuranceVehicleId" value="<?php echo $vehicle[0]->vehicle_number;?>">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-4">Vehicle Name*:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" id="insuranceVehicleName"
                               placeholder="Vehicle Name" name="insuranceVehicleName" readonly>
						    <span id="insuranceVehicleName_error" style="color: red"></span>               
                            </div>
                            </div>
                            </div>  
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3">Vehicle Number*:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" id="insuranceRegistrationNumber"
                               placeholder="Vehicle Number" name="insuranceRegistrationNumber" readonly>
						    <span id="insuranceRegistrationNumber_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>                                              
                            </div>


                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-2">Select Insurance Type*:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <select name="insuranceType" id="insuranceType" class="form-control mt-3 form-control-user" readonly>
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
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3">Insurance Provider*:</label>                        
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <select name="insuranceProvider" id="insuranceProvider" class="form-control mt-3 form-control-user" readonly>
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
                            </div>
                            </div>                                            
                            </div>


                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3">Insurance Validity*:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <select name="insuranceValidity" id="insuranceValidity" class="form-control mt-3 form-control-user" readonly>
						    <option value="0">--Select--</option>							                                                                   
						    <option value="3">Three Months</option>							                                                                   
						    <option value="6">Six Months</option>							                                                                   
						    <option value="9">Nine Months</option>							                                                                   
						    <option value="1">One Year</option>							                                                                   
						    <option value="2">Two Years</option>							                                                                   
                            </select>
						    <span id="insuranceValidity_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3">Insurance Start Date*:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="date" class="form-control mt-3 form-control-user" id="insuranceStartDate"
                               name="insuranceStartDate" readonly>
						    <span id="insuranceStartDate_error" style="color: red"></span>
                            </div>
                            </div>
                            </div>                                            
                            </div>


                            <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-3">Insurance End Date*:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="date" class="form-control mt-3 form-control-user" id="insuranceEndDate"
                               name="insuranceEndDate" readonly>
					        <span id="insuranceEndDate_error" style="color: red"></span>
                            </div>
                            </div>
                            </div> 
                            </div>   
                            
            <div class="ms-auto text-end mt-3">
                <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff;float:right;background:#a36626 !important;margin-top: -13px;" id="edit_Vehicle_Details" type="button">Save</button>
                <a class="btn btn-danger text-light px-3 mb-0" style="color:#fff;float:right;background:#a36626 !important;margin-top:-13px;" id="back"
                   href="{{ route('admin.vehicledetails.index') }}">Back</a>
            </div>
		</div>			
	</div>	
</form>
 