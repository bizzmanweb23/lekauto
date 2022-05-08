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
<form method="post" enctype="multipart/form-data" id ="buyer_details_form">
    @csrf
    <input type="hidden" id="Vehicle_Unique_id_buyer">
    <div class="card">
        <div class="card-body">
            <div class="branch-name bg-light px-3 py-3" style="color:#fff;background: #a36626 !important;">
                <h5 style="color:#fff;">Buyer Details</h5>
            </div>

            <input type="hidden" class="form-control mt-2 form-control-user" name="vehicle_id"  id="vehicle_id" value= "<?php echo $vehicleId; ?>" >              
            <div class="row">
                <div class="col-md-6">

                <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label for="id_number" class="mt-4">ID Number</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" name="id_number" id="id_number">
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
                             <input type="date" class="form-control mt-3 form-control-user" name="delivery_out_date" id="delivery_out_date">
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
                             <input type="time" class="form-control mt-3 form-control-user" name="delivery_time" id="delivery_time">
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
                             <input type="text" class="form-control mt-3 from-control-user" name="invoice_number" id="invoice_number">
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
                             <input type="date" class="form-control mt-3 from-control-user" name="invoice_date" id="invoice_date">
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
                                <input type="date" class="form-control mt-3 form-control-user" id="pl_date" name="pl_date">
                                </div>
                            </div>
                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label for="booking_date" class="mt-4">Booking Date</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="date" class="form-control mt-3 form-control-user" id="booking_date" name="booking_date">
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label for="sell_code" class="mt-4">Sell Code</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" id="sell_code" name="sell_code">
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label for="sales_agreement_number" class="mt-4">Sales Agreement Number</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" id="sales_agreement_number" name="sales_agreement_number">
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label for="sale_agreement_price" class="mt-4">Sale Aggreement Price($)</label>
                            </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" id="sale_agreement_price" name="sale_agreement_price">
                                </div>
                            </div>
                               
                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label for="selling_price" class="mt-4">Selling Price($)</label>
                            </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" name="selling_price" id="selling_price">                        
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
                                <option value="<?php echo $data->gst_name;?>"><?php echo $data->gst_name;?></option>
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
                             <input type="text" class="form-control mt-3 from-control-user" name="gst_amount_buyer" id="gst_amount_buyer">
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
                                     <label for="gst_decimal_adjustment_buyer" class="mt-3">GST Decimal Adjustment</label>                              
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="gst_decimal_adjustment_buyer" id="gst_decimal_adjustment_buyer">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="gst_amountbefore_adjustment_buyer" id="gst_amountbefore_adjustment_buyer">   
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
                                <input type="text" class="form-control mt-3 form-control-user" id="total_selling_price" name="total_selling_price">
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
                                <input type="date" class="form-control mt-3 form-control-user" name="buy_over_date" id="buy_over_date">
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
                                <input type="text" class="form-control mt-3 form-control-user" name="ets_paper_to" id="ets_paper_to">
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label class="mt-4" for="body_price">Body Price</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" name="body_price" id="body_price">                      
                                </div>
                            </div>    

                        <label class="mt-3" style="color:red;">(Body Price Is GST Inclusive)</label>
                        <br>

                        <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label class="mt-4" for="dereg_date">Dereg Date</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="date" class="form-control mt-3 form-control-user" name="dereg_date" id="dereg_date">
                                </div>
                            </div>


                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label class="mt-4" for="coe_encashment">COE Encashment</label>
                                </div>
                               <div class="col-md-4">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" name="coe_encashment" id="coe_encashment">
                                </div>
                                <div class="col-md-4">
                                <input type="text" class="form-control mt-3 form-control-user" style="margin-top: 20px;" name="coe_encashment1" id="coe_encashment1">
                                </div>
                            </div>


                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label class="mt-4" for="parf_encashment">Parf Encashment</label>
                                </div>
                               <div class="col-md-4">
                                <!-- this is box -->
                                <input type="text" class="form-control mt-3 form-control-user" name="parf_encashment" id="parf_encashment">
                                </div>
                                <div class="col-md-4">
                                <input type="text" class="form-control mt-3 form-control-user" style="margin-top: 20px;" name="parf_encashment1" id="parf_encashment1">
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label class="mt-4" for="ets_transfer_value">ETS Transfer Value</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="date" class="form-control mt-3 form-control-user" name="ets_transfer_value" id="ets_transfer_value">
                                </div>
                            </div>


                            <div class="row">
                               <div class="col-md-4">
                                <!-- this is the label -->
                                <label class="mt-4" for="ets_paper">ETS Paper(External)</label>
                                </div>
                               <div class="col-md-8">
                                <!-- this is box -->
                                <input type="date" class="form-control mt-3 form-control-user" name="ets_paper" id="ets_paper">                  
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
                             <input type="text" class="form-control mt-3 form-control-user" name="invoice_number2" id="invoice_number2">                 
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
                             <input type="date" class="form-control mt-3 form-control-user" name="invoice_date2" id="invoice_date2">          
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
                                <input type="text" class="form-control mt-3 form-control-user" name="ets_paper_buyer" id="ets_paper_buyer">            
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
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
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
                             <input type="text" class="form-control form-control-user" name="amount_buyer" id="amount_buyer">
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
                            <select name="bank_buyer" class="form-control mt-3 form-control-user" id="bank_buyer">
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

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="cheque_number_buyer" class="mt-3">Cheque Number</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="cheque_number_buyer" id="cheque_number_buyer">
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
                             <input type="date" class="form-control mt-3 form-control-user" name="cheque_date_buyer" id="cheque_date_buyer">
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
                            <option value="">--select--</option>
                            <option value="Seller1">Seller1</option>
                            <option value="Seller2">Seller2</option>
                            <option value="Seller3">Seller3</option>
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
                             <input type="text" class="form-control mt-3 form-control-user" name="invoice_number3" id="invoice_number3">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="to_from_who" id="to_from_who">
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
                             <textarea type="text" class="form-control mt-3 form-control-user" name="buyer_remarks" id="buyer_remarks"></textarea>
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
                            <option value="Credit">Credit</option>
                            <option value="Debit">Debit</option>
                            <option value="Cheque">Cheque</option>
                            </select>
                            </div>
                            </div>
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
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            </select>
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
                             <input type="text" class="form-control mt-3 form-control-user" name="amount_buyer1" id="amount_buyer1">
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

                            <div class="col-md-6">
                                      <!-- this is the time-->
                             <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label for="cheque_number_buyer1" class="mt-4">Cheque Number</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="cheque_number_buyer1" id="cheque_number_buyer1">       
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
                             <input type="date" class="form-control mt-3 form-control-user" name="cheque_date_buyer1" id="cheque_date_buyer1">
                             
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
                            <option value="Seller1">Seller1</option>
                            <option value="Seller2">Seller2</option>
                            <option value="Seller3">Seller3</option>
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
                             <input type="text" class="form-control mt-3 form-control-user" name="invoice_number4" id="invoice_number4">          
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
                             <input type="text" class="form-control mt-3 form-control-user" name="to_from_who1" id="to_from_who1">
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
                            <option value="Credit">Credit</option>
                            <option value="Debit">Debit</option>
                            <option value="Cheque">Cheque</option>
                            </select>
                             </div>
                            </div>
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
                           <div class="row">
                                <div class="col-md-3">
                                     <!-- this is the label -->
                                     <label class="mt-3" for="total_receivable">Total Receivable</label>
                                    </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="total_receivable" id="total_receivable">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="total_received" id="total_received">
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
                             <input type="text" class="form-control mt-3 form-control-user" name="ar_balance_buyer" id="ar_balance_buyer">
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
                             <select class="form-control mt-3 form-control-user" name="transaction_type_buyer" id="transaction_type_buyer">
                                <option value="">--select--</option>
                                <option value="Debit">Debit</option>
                                <option value="Credit">Credit</option>                             
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
                             <input type="date" class="form-control mt-3 form-control-user" name="Etransfer_out_date" id="Etransfer_out_date">
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
                                <option value="Broker1">Broker1</option>
                                <option value="Broker2">Broker2</option>
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
                             <input type="text" class="form-control mt-3 form-control-user" name="log_card" id="log_card">
                             </div>
                            </div>
                            </div>
                            </div>

                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-block w-100 mt-4" style="color:#fff;background: #a36626 !important;" id="saveVehicle_Details1" type="button">SUBMIT</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-block w-100 mt-4" style="color:#fff;background: #a36626 !important;" id="back"
                                href="{{ route('admin.vehicledetails.index') }}">Back</button>
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
    //alert('kjkjkjkj');
     $('#saveVehicle_Details1').click(function() {   
         // alert('sfsdf');
		    var buyerId = $('#Vehicle_Unique_id_buyer').val();
            var form = $('#buyer_details_form')[0];
            var data = new FormData(form);
		    data.append('id',buyerId)
		    var url= "{{ route('admin.buyer.store') }}";
            toastr.options = 
			{
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right"
            };
            $.ajax
			({
                url: url,
			    headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                type: 'post',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'json',
                beforeSend: function() 
				{
                    $('#user_loder').show()
                },
                success: function(data) 
				{
                    if (data.status == 'success') 
					{
                        toastr.success(data.message);
                    }
				    else
					{
					    toastr.error();
				    }
				    $('#buyer_details_form').trigger("reset");
                    $('#user_loder').hide()
					window.location.href="{{ route('admin.vehicledetails.index') }}";
					//console.log(data);
                },
               		
            });
  
});
</script>
@endsection
@endsection
 
 