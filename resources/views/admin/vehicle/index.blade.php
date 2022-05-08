@extends('admin.layout.main')

@section('content') 

<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                           <form method="post" enctype="multipart/form-data" id ="vehicle_details_form">
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
                                     <label for="system_id" class="mt-3">System ID</label>
                                </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="system_id" id="system_id">
                                </div>
                            </div>
                                

                             <!-- this is vechicle status -->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="vehicle_status" class="mt-3">Vehicle Status</label>
                                </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <select name="vehicle_status" id="vehicle_status" class="form-control mt-3 form-control-user">
                                    <option value="">--Select Status--</option>
                                    <option value="Ordered">Ordered</option>
                                    <option value="NotOrdered">Not Ordered</option>
                                </select>
                                <span id="vehicle_status_error" style="color:red;"></span>
                                </div>
                              </div>
                                <div class="branch-name bg-light px-2 py-2 mt-2" style="color:#fff;background: #a36626 !important;">
                                    <h6 style="color:#fff;">Stock Entry</h6>
                                </div>


                                <!-- this is the vechicle number -->
                                <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="vehicle_number" class="mt-3">Vehicle Number</label>
                                </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="vehicle_number" id="vehicle_number">
                             <span id="vehicle_number_error" style="color:red;"></span>   
                            </div>
                            </div>

                             <!-- this is the start make -->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label>Make:</label>
                                </div>
                                <div class="col-md-9">
                             <!-- this is box -->
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
                            </div>
                            </div>
                            

                             <!-- this is the start model -->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="" class="mt-3">Model</label>
                                </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-2 form-control-user" name="vehicle_year" id="vehicle_year"> 
                            </div>
                            </div>
                                     
					           
                                <div class="row">
                                    <div class="col-md-8">
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <a href="#" class="bg-light px-1 py-2" style="text-decoration: none;">Price List Make Modal</a>
                                    </div>
                                    <span id="vehicle_year_error" style="color:red"></span>
                                </div>
                                <input type="checkbox">
                                <label class="form-check-label mt-3" for="flexCheckDefault"> Not show to pricelist</label>
                            <div class="clearfix"></div>

                             <!-- this is the body type -->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="body_type" class="mt-3">Body Type</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-2 form-control-user" name="body_type" id="body_type">
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
                             <input type="text" class="form-control mt-2 form-control-user" name="pricelist_plus" id="pricelist_plus">
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
                             <textarea type="text" class="form-control mt-2 form-control-user" name="accessory" id="accessory"></textarea>
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
                             <input type="text" class="form-control mt-2 form-control-user" name="chasis_number" id="chasis_number">
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
                             <input type="text" name="engine_number" class="form-control mt-2 form-control-user" id="engine_number">
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
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Natural Gas">Natural Gas</option>
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
                             <input type="text" class="form-control mt-2 form-control-user" name="laden" id="laden">
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
                             <input type="text" class="form-control mt-2 form-control-user" name="unladen" id="unladen">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="enginecap_ton" id="enginecap_ton">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="pax" id="pax">
                             </div>
                            </div>
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
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Natural Gas">Natural Gas</option>
                           </select>
                           <span id="propellant_error" style="color:red;"></span>
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
                             <input type="text" class="form-control mt-3 form-control-user" name="year_of_manufacture" id="year_of_manufacture">
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
                             <input type="date" class="form-control mt-3 form-control-user" name="original_reg_date" id="original_reg_date">
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
                            <option value="Black">Black</option>
                            <option value="Red">Red</option>
                            <option value="Grey">Grey</option>
                            <option value="White">White</option>
                        </select>
                             </div>
                            </div>


                            <!-- this is the no of TSF-->
                        <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-3">Number Of TSF:</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-2 form-control-user" name="number_of_tsf" id="number_of_tsf">
					         <span id="number_of_tsf_error" style="color:red;"></span>
                             </div>
                            </div>
    
                        <!-- this is the Location-->
                        <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-3">Location:</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-2 form-control-user" name="location" id="location">
                             <span id="location_error" style="color:red;"></span>
                             </div>
                            </div>
    
                        <!-- this is the Number of tsf-->
                        <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-3">Number Of TSF:</label>
                                     </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-2 form-control-user" name="number_of_tsf" id="number_of_tsf">
					         <span id="number_of_tsf_error" style="color:red;"></span>
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
                             <input type="text" class="form-control mt-2 form-control-user" name="incharge_by" id="incharge_by">
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
                             <input type="date" class="form-control mt-3 form-control-user" name="entry_date" id="entry_date">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="Created_by" id="created_by">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="last_modifiedBy" id="last_modifiedBy">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="transfer_fee" id="transfer_fee">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="road_tax" id="road_tax">
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
                             <input type="date" class="form-control mt-3 form-control-user" name="roadTax_expiry" id="roadTax_expiry">
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
                        <option value="6 months">6 Months</option>
                        <option value="12 months">12 months</option>
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
                             <input type="date" class="form-control mt-3 form-control-user" name="inspection_expiry" id="inspection_expiry">
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
                             <input type="date" class="form-control mt-3 form-control-user" name="layUp_expiry" id="layUp_expiry">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="coe_logcard" id="coe_logcard">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="coe_acc" id="coe_acc">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="coe_number" id="coe_number">
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
                             <input type="date" class="form-control mt-3 form-control-user" name="coe_expiryDate" id="coe_expiryDate">
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
                        <option value="Paid">Paid</option>
                        <option value="Not Paid">Not Paid</option>
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
                             <input type="text" class="form-control mt-3 form-control-user" name="omv" id="omv">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="parf_amount" id="parf_amount">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="registeration_fee" id="registeration_fee">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="arf_amount" id="arf_amount">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="cves_surcharge" id="cves_surcharge">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="cevs_rebate" id="cevs_rebate">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="ets_paper_form" id="ets_paper_form">
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
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					     </select>
					      <span id="use_tcoe_error" style="color:red;"></span>
                    
                             </div>
                            </div>
                    
                   
                    <button class="btn btn-primary btn-block w-100 mt-4" style="color:#fff;background: #a36626 !important;" id="saveVehicle_Details" type="button">SUBMIT</button>
                    <button class="btn btn-primary btn-block w-100 mt-4" style="color:#fff;background: #a36626 !important;" id="back"
                    href="{{ route('admin.vehicledetails.index') }}">Back</button>
            </div>
           
        </div>						
       	            </div>
	            </div>
            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
	<div id="user_loder" style="display: none">
        @include('admin.loder.index')
    </div>
@section('javascript')
 <script>
   $('body').on('click','#saveVehicle_Details',function() {
	   //alert ('hello');
        var form = $('#vehicle_details_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.vehicledetails.store') }}",
			headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json',
            beforeSend: function() {
                $('#user_loder').show()
            },
            success: function(data) {
				 if (data.status == 'success') {
                    const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        })
                        $('#addVehicleModal').modal("hide");
				        window.location.href="{{ route('admin.vehicledetails.index') }}";
                        $('#user_loder').hide()
                }
				else{
					toastr.error();
				}
			},
            error: function(error) {
                $('#user_loder').hide()
                var err = error.responseJSON.errors;
                if (error.status == 422) {
                    toastr.error("Error");
                    $('#vehicle_number_error').html(err.vehicle_number)
                    $('#vehicle_make_error').html(err.vehicle_make)
                    $('#vehicle_year').html(err.vehicle_year)
                    $('#body_type_error').html(err.body_type)
                    $('#price_list_make_error').html(err.price_list_make)
                    $('#chasis_number_error').html(err.chasis_number)
                    $('#engine_number_error').html(err.engine_number)
                    $('#original_reg_date_error').html(err.original_reg_date)
                    $('#inspection_expiry_error').html(err.inspection_expiry)
                    $('#coe_logcard_error').html(err.coe_logcard)
                    $('#coe_expiryDate_error').html(err.coe_expiryDate)
                    if (err.vehicle_make) {
                        toastr.error(err.vehicle_make);
                    }
					if (err.vehicle_number) {
                        toastr.error(err.vehicle_number);
                    }
					if (err.vehicle_year) {
                        toastr.error(err.vehicle_year);
                    }
					if (err.body_type) {
                        toastr.error(err.body_type);
                    }
					if (err.price_list_make) {
                        toastr.error(err.price_list_make);
                    }
					if (err.chasis_number) {
                        toastr.error(err.chasis_number);
                    }
					if (err.engine_number) {
                        toastr.error(err.engine_number);
                    }
					if (err.inspection_expiry) {
                        toastr.error(err.inspection_expiry);
                    }
					if (err.original_reg_date) {
                        toastr.error(err.original_reg_date);
                    }
					if (err.coe_logcard) {
                        toastr.error(err.coe_logcard);
                    }
					if (err.coe_expiryDate) {
                        toastr.error(err.coe_expiryDate);
                    }
                }
                console.log(error)
            }
        })
    });
	
	$('#vehicle_details_form :input').click(function() {
        $('#vehicle_make_error').html('')
        $('#vehicle_number_error').html('')
        $('#ddlYears_error').html('')
        $('#reg_road_tax_error').html('')
        $('#body_type_error').html('')
        $('#price_list_make_error').html('')
        $('#chasis_number_error').html('')
        $('#engine_number_error').html('')
        $('#original_reg_date_error').html('')
        $('#inspection_expiry_error').html('')
        $('#coe_logcard_error').html('')
        $('#coe_expiryDate_error').html('')
    })
</script>
	
 @endsection
 @endsection
 
 
 