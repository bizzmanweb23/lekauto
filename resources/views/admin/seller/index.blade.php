@extends('admin.layout.main')

@section('content') 

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

<form method="post" enctype="multipart/form-data" id ="seller_details_form">
                @csrf
				<input type="hidden" id="Vehicle_Unique_id_Seller" />
                <div class="card">
                    <div class="card-body">
                        <div class="branch-name bg-light px-3 py-3" style="color:#fff;background: #a36626 !important;">
                            <h5 style="color:#fff;">Seller Details</h5>
                        </div>
                       
                        
                        <input type="hidden" class="form-control mt-2 form-control-user" name="vehicle_id"  id="vehicle_id" value= "<?php echo $vehicleId; ?>" >
                        <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="id_number" class="mt-3">ID Number</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-2 form-control-user" name="id_number" id="id_number">
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
                            <input type="date" class="form-control mt-2 form-control-user" name="purchase_date" id="purchase_date">
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
                            <input type="date" class="form-control mt-3 form-control-user" name="estimate_delivery" id="estimate_delivery">
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
                                    <input type="date" class="form-control mt-2 form-control-user" name="delivery_in_date" id="delivery_in_date">
                                    <span id="delivery_in_date_error" style="color:red;"></span>							
                                    </div>
									<div class="col-md-5">
                                    <input type="time" class="form-control mt-2 form-control-user" name="time" id="time">
                                    <span id="time_error" style="color:red;"></span>
									</div>
                    
                    </div>
                    </div>
					</div>
                    <input class="mt-2" type="checkbox">
                    <label class="form-check-label mt-2" for="flexCheckDefault">No Delivery Date</label>
                    <div class="clearfix"></div>
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
                            <input type="text" class="form-control mt-3 form-control-user" name="agreement_number" id="agreement_number">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="settlement_number" class="mt-3">Settlement Number</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="settlement_number" id="settlement_number">          
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="note" class="mt-3">Note</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <textarea type="text" class="form-control mt-3 form-control-user" name="note" id="note"></textarea>
                            </div>
                            </div>
                        </div>

                            <div class="row">
                            <div class="col-md-6">

                             <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="DN/CN_Number" class="mt-3">DN/CN Number</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 from-control-user" name="DN/CN_Number" id="DN/CN_Number">
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="DN/CN_Amount" class="mt-3">DN/CN Amount</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 from-control-user" name="DN/CN_Amount" id="DN/CN_Amount">
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
                            <label class="mt-3" for="GST_Amount">GST Amount</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 from-control-user" name="GST_Amount" id="GST_Amount">
                            </div>
                        </div>
                             </div>
                                </div> 
                                <label class="mt-3" style="color:red;">(Purchase Price is GST Inclusive FOr New & GMS, GST Exclusive For Others)</label> 
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
                            <input type="text" class="form-control mt-3 form-control-user" name="GST_Decimal_Adjustment" id="GST_Decimal_Adjustment">
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
                            <input type="text" class="form-control mt-3 form-control-user" name="GST_Amount_Before_Adjustment" id="GST_Amount_Before_Adjustment">   
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
                            <input type="text" class="form-control mt-3 form-control-user" id="total_purchase_price" name="total_purchase_price">
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
                            <select name="ap_payment" class="form-control mt-3 form-control-user" id="ap_payment">
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
                            <input type="text" class="form-control mt-3 form-control-user" name="amount" id="amount">
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
                            <select name="bank" class="form-control mt-3 form-control-user" id="bank">
                                        <option value="">--Select--</option>
                                        <option value="HDFC">HDFC</option>
                                        <option value="AXIS">AXIS</option>
                                        <option value="SBI">SBI</option>
                                        <option value="Indian Bank">Indian Bank</option>
                                        <option value="Overseas Bank">Overseas Bank</option>
                                        <option value="Canara Bank">Canara Bank</option>
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
                            <input type="text" class="form-control mt-3 form-control-user" name="cheque_number" id="cheque_number">
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
                            <input type="date" class="form-control mt-3 form-control-user" name="cheque_date" id="cheque_date">
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
                            <input type="text" class="form-control mt-3 form-control-user" name="to_from" id="to_from">
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
                            <textarea type="text" class="form-control mt-3 form-control-user" name="remarks" id="remarks"></textarea>
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
                            <input type="text" class="form-control mt-3 form-control-user" name="AP_Balance" id="AP_Balance">
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
                            <select name="transaction_type" class="form-control mt-3 form-control-user" id="transaction_type">
                                        <option value="">--select--</option>
                                        <option value="offline">Offline</option>
                                        <option value="online">Online</option>
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
                            <label class="mt-3" for="P_settlement_Remark">P Settlement Remark</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="P_settlement_Remark" id="P_settlement_Remark">
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="E-Transfer_In_Date" class="mt-3">E-Transfer In Date</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="date" class="form-control mt-3 form-control-user" name="E-Transfer_In_Date" id="E-Transfer_In_Date">
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
                            <input type="text" class="form-control mt-3 form-control-user" name="Asking_Price" id="Asking_Price">
                            <span id="Asking_Price_error" style="color:red"></span>
                            </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="E-Transfer_By" class="mt-4">E-Transfer By</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <select name="E-Transfer_By" class="form-control mt-3 form-control-user" id="E-Transfer_By">
                                        <option value="">--select--</option>
                                        <option value="offline">Test</option>
                                        <option value="online">Test1</option>
                            </select>
                            </div>
                            </div>
                            </div>                                            
                            </div>
    
                            <div class="row">
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-primary btn-block w-100 mt-4" style="background-color: black;color:white;">Last Action</button>                                            
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-primary btn-block w-100 mt-4" style="background-color: black;color:white;">Asking Price</button>
                                        </div>
                                        <div class="col-md-2">
                                        <!-- this is the label -->
                                        <label for="Log_card" class="mt-4">Log Card<br>(Transfer In)</label>
                                        </div>
                                        <div class="col-md-4">
                                        <!-- this is box -->
                                        <input type="text" class="form-control mt-4 form-control-user" name="Log_card" id="Log_card">
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
                            <input type="text" class="form-control mt-3 form-control-user" name="Alternate_price" id="Alternate_price">                                            
                            <a href="#" style="color:red;" id="price_list">2nd Line In Price List</a>
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
                            <input type="text" class="form-control mt-3 form-control-user" name="Alternate" id="Alternate">
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
                            <input type="text" class="form-control mt-3 form-control-user" name="Buy_Code" id="Buy_code">                                            
                            </div>
                            <div class="col-md-3">
                            <button type="button" class="btn btn-primary btn-block w-100 mt-3" style="background-color:gray;color:black;" id="broker">Broker</button>
                            </div>
                            </div>
                            </div>


                            <div class="clearfix"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="mt-2" type="checkbox">
                                        <label for="body_type" class="mt-3" style="color:red;">(Click The Broker Deal Button To Tick)</label>
                                    </div>
                            </div>  


                            <div class="row">
                            <div class="col-md-9">
                            <div class="row">
                            <div class="col-md-2">
                            <!-- this is the label -->
                            <label for="Trade_In_By" class="mt-3">Trade In By</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 ontrol-user" name="Trade_In_By" id="Trade_In_By">
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
                                        <option value="Broker1">Broker1</option>
                                        <option value="Broker2">Broker2</option>
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
                            <label for="Com.Rtn" class="mt-4">Com.Rtn</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="Com.Rtn" id="Com.Rtn">
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
                            <input type="date" class="form-control mt-3 form-control-user" name="Return_Date" id="Return_Date">
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
                            <select name="Broker2" class="form-control mt-3 form-control-user" id="Broker2">
                                        <option value="">--select--</option>
                                        <option value="Broker1">Broker1</option>
                                        <option value="Broker2">Broker2</option>
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
                            <label for="Com.Rtn2" class="mt-4">Com.Rtn2</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
                            <input type="text" class="form-control mt-3 form-control-user" name="Com.Rtn2" id="Com.Rtn2">
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
                            <input type="date" class="form-control mt-3 form-control-user" name="Return_Date2" id="Return_Date2">
                            </div>
                            </div>
                            </div>                                            
                            </div>
                            <br>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-primary btn-block w-100 mt-4" style="color:#fff;background: #a36626 !important;" id="saveVehicle_Details" type="button">SUBMIT</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary btn-block w-100 mt-4" style="color:#fff;background: #a36626 !important;" id="back"
                                            href="{{ route('admin.vehicledetails.index') }}">Back</button>
                                </div>
                            </div>             
                        </div>						
                    </div>
                </div>
            </form>
</div>
	<div id="user_loder" style="display: none">
        @include('admin.loder.index')
    </div>
@section('javascript')
 <script>
    // alert('klkkl')
    $('#saveVehicle_Details').click(function() {
	  
        var form = $('#seller_details_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.seller.store') }}",
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
                    toastr.success(data.message);
                }
				else{
					toastr.error();
				}
				
                $('#seller_details_form').trigger("reset");
                $('#user_loder').hide()
            },
            error: function(error) {
                $('#user_loder').hide()
                var err = error.responseJSON.errors;
                if (error.status == 422) {
                    toastr.error("Error");
                    $('#id_number_error').html(err.id_number)
                    $('#address_error').html(err.address)
                    $('#purchase_date_error').html(err.purchase_date)
                    $('#estimate_delivery_date_error').html(err.estimate_delivery_date)
                    $('#date_of_delivery_error').html(err.date_of_delivery)
                    $('#purchase_price_error').html(err.purchase_price)
                    $('#gst_error').html(err.gst)
                    $('#total_purchase_price_error').html(err.total_purchase_price)
                    $('#agreement_number_error').html(err.agreement_number)
                    $('#settlement_number_error').html(err.settlement_number)
                    $('#note_error').html(err.note)
                    $('#ap_payment_error').html(err.ap_payment)
                    $('#amount_error').html(err.amount)
                    $('#bank_error').html(err.bank)
                    $('#cheque_number_error').html(err.cheque_number)
                    $('#cheque_date_error').html(err.cheque_date)
                    $('#to_from_error').html(err.to_from)
                    $('#remarks_error').html(err.remarks)
                    $('#transaction_type_error').html(err.transaction_type)
                    $('#DN/CN_Number').html(err.DN/CN_Number)
                    $('#DN/CN_Amount').html(err.DN/CN_Amount)
                    $('#GST_Amount').html(err.GST_Amount)
                    $('#GST_Decimal_Adjustment').html(err.GST_Decimal_Adjustment)
                    $('#GST_Amount_Before_Adjustment').html(err.GST_Amount_Before_Adjustment)
                    $('#AP_Balance').html(err.AP_Balance)
                    $('#P_settlement_Remark').html(err.P_settlement_Remark)
                    $('#E-Transfer_In_Date').html(err.E-Transfer_In_Date)
                    $('#Alternate_price').html(err.Alternate_price)
                    $('#Log_card').html(err.Log_card)
                    $('#Alternate').html(err.Alternate)
                    $('#Buy_Code').html(err.Buy_Code)
                    $('#Trade_In_By').html(err.Trade_In_By)
                    $('#Broker1').html(err.Broker1)
                    $('#Com.Rtn').html(err.Com.Rtn)
                    $('#Return_Date').html(err.Return_Date)
                    $('#Broker2').html(err.Broker2)
                    $('#Com.Rtn2').html(err.Com.Rtn2)
                    $('#Return_Date2').html(err.Return_Date2)
                   
                    if (err.id_number) {
                        toastr.error(err.id_number);
                    }
					if (err.address) {
                        toastr.error(err.address);
                    }
					if (err.purchase_date) {
                        toastr.error(err.purchase_date);
                    }
					if (err.estimate_delivery_date) {
                        toastr.error(err.estimate_delivery_date);
                    }
					if (err.date_of_delivery) {
                        toastr.error(err.date_of_delivery);
                    }
					if (err.purchase_price) {
                        toastr.error(err.purchase_price);
                    }
					if (err.gst) {
                        toastr.error(err.gst);
                    }
					if (err.total_purchase_price) {
                        toastr.error(err.total_purchase_price);
                    }
						if (err.agreement_number) {
                        toastr.error(err.agreement_number);
                    }
                    if (err.settlement_number)
                     {

                        toastr.error(err.settlement_number);
                    }
					if (err.note) {
                        toastr.error(err.note);
                    }
					if (err.ap_payment) {
                        toastr.error(err.ap_payment);
                    }
					if (err.amount) {
                        toastr.error(err.amount);
                    }
					if (err.bank) {
                        toastr.error(err.bank);
                    }
					if (err.cheque_number) {
                        toastr.error(err.cheque_number);
                    }
					if (err.cheque_date) {
                        toastr.error(err.cheque_date);
                    }
					if (err.to_from) {
                        toastr.error(err.to_from);
                    }
                    if (err.remarks) {
                        toastr.error(err.remarks);
                    }
                    if (err.transaction_type) {
                        toastr.error(err.transaction_type);
                    }
                    if (err.DN/CN_Number) {
                        toastr.error(err.DN/CN_Number);
                    }
                    if (err.DN/CN_Amount) {
                        toastr.error(err.DN/CN_Amount);
                    }
                    if (err.GST_Amount) {
                        toastr.error(err.GST_Amount);
                    }
                    if (err.GST_Decimal_Adjustment) {
                        toastr.error(err.GST_Decimal_Adjustment);
                    }
                    if (err.GST_Amount_Before_Adjustment) {
                        toastr.error(err.GST_Amount_Before_Adjustment);
                    }
                    if (err.AP_Balance) {
                        toastr.error(err.AP_Balance);
                    }
                    if (err.P_settlement_Remark) {
                        toastr.error(err.P_settlement_Remark);
                    }
                    if (err.E-Transfer_In_Date) {
                        toastr.error(err.E-Transfer_In_Date);
                    }
                    if (err.Alternate_price) {
                        toastr.error(err.Alternate_price);
                    }
                    if (err.Log_card) {
                        toastr.error(err.Log_card);
                    }
                    if (err.Alternate) {
                        toastr.error(err.Alternate);
                    }
                    if (err.Buy_Code) {
                        toastr.error(err.Buy_Code);
                    }
                    if (err.Trade_In_By) {
                        toastr.error(err.Trade_In_By);
                    }
                    if (err.Broker1) {
                        toastr.error(err.Broker1);
                    }
                    if (err.Com.Rtn) {
                        toastr.error(err.Com.Rtn);
                    }
                    if (err.Return_Date) {
                        toastr.error(err.Return_Date);
                    }
                    if (err.Broker2) {
                        toastr.error(err.Broker2);
                    }
                    if (err.Com.Rtn2) {
                        toastr.error(err.Com.Rtn2);
                    }
                    if (err.Return_Date2) {
                        toastr.error(err.Return_Date2);
                    }
                }
                console.log(error)
            }
        })
    });
	
	$('#seller_details_form :input').click(function() {
        $('#id_number_error').html('')
        $('#address_error').html('')
        $('#purchase_date_error').html('')
        $('#estimate_delivery_date_error').html('')
        $('#date_of_delivery_error').html('')
        $('#purchase_price_error').html('')
        $('#gst_error').html('')
        $('#total_purchase_price_error').html('')
        $('#agreement_number_error').html('')
        $('#settlement_number_error').html('')
       
        $('#note_error').html('')
        $('#ap_payment_error').html('')
        $('#amount_error').html('')
        $('#cheque_number_error').html('')
        $('#bank_error').html('')
        $('#cheque_date_error').html('')
        $('#to_from_error').html('')
        $('#remarks_error').html('')
        $('#transaction_type_error').html('')
        $('#DN/CN_Number_error').html('')
        $('#DN/CN_Amount_error').html('')
        $('#GST_Amount_error').html('')
        $('#GST_Decimal_Adjustment_error').html('')
        $('#GST_Amount_Before_Adjustment_error').html('')
        $('#AP_Balance_number_error').html('')
        $('#P_settlement_Remark_error').html('')
        $('#E-Transfer_In_Date_error').html('')
        $('#Alternate_price_error').html('')
        $('#Log_card_error').html('')
        $('#Alternate_error').html('')
        $('#Buy_Code_error').html('')
        $('#Trade_In_By_error').html('')
        $('#Broker1_error').html('')
        $('#Com.Rtn_error').html('')
        $('#Return_Date_error').html('')
        $('#Broker2_error').html('')
        $('#Com.Rtn2_error').html('')
        $('#Return_Date2_error').html('')        
})
    // $(document).ready(function () {
    // $('.customer').hide();
    // });

    // $('.customer').click(function () {
    //     $('.employee').hide();
    //     $('.customer').show();
    // });

    // $('.employee').click(function () {
    //     $('.customer').hide();
    //     $('.employee').show();
    // });
    // $('.others').click(function () {
    //     $('.customer').hide();
    //     $('.employee').show();
    // });

    // $('#confirm_password').on('input', function (){
    //     console.log($('#confirm_password').val());
    //     var password = $('#password').val();
    //     var confirm_password = $('#confirm_password').val();
    //     if (password !== confirm_password) {
    //         $('#confirm_password').focus();
    //     }
    // });

</script>

 @endsection
 @endsection
 
 
 