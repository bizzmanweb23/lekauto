<form method="post" id="commission_edit_form">
			    <div class="card">
                <div class="card-body">
				@csrf
                <div class="row">
                    <div class="col-md-4">
					    <label>Vehicle Name:</label>
                        <input type="text" class="form-control form-control-user" id="vehicle_name"
                               placeholder="Vehicle Name" value="<?php echo $vehicle[0]->vehicle_make. $vehicle[0]->vehicle_year;?>" name="vehicle_name">
						<span id="vehicle_name_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Registration Number:</label>
                        <input type="text" class="form-control form-control-user" id="registration_number"
                               placeholder="Registration Number" value="<?php echo $vehicle[0]->vehicle_number;?>" name="registration_number">
						<span id="registration_number_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
						<label>Purchase Amount:</label>
                        <input type="text" class="form-control form-control-user" id="purchase_amount"
                               placeholder="Purchase Amount" value="<?php echo $seller;?>" name="purchase_amount">
					    <span id="purchase_amount_error" style="color: red"></span>
                    </div>				
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Repair Cost:</label>
                        <input type="text" class="form-control form-control-user" id="repair_cost"
                               placeholder="Repair Cost" value="<?php echo $repair;?>" name="repair_cost">
						<span id="repair_cost_error" style="color: red"></span>
                    </div>	
				    <div class="col-md-4">
						<label>Miscellenous Cost:</label>
                        <input type="text" class="form-control form-control-user" id="miscellenous_cost"
                               placeholder="Miscellenous Cost" value="<?php echo $miscellaneous;?>" name="miscellenous_cost">
						<span id="city_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Cost Center Amount:</label>
                        <input type="text" class="form-control form-control-user" id="cost_center_amount"
                               placeholder="Cost Center Amount" value="<?php if(isset($cost)){echo $cost;}else{echo 0;}?>" name="cost_center_amount">
					    <span id="cost_center_amount_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
					    <label>Total Cost*:</label>
                        <input type="text" class="form-control form-control-user" id="total_cost"
                               placeholder="Total Cost" value="<?php echo $repair+$miscellaneous+$cost+$seller;?>" name="total_cost">
						<span id="total_cost_error" style="color: red"></span>
                    </div>
				    <div class="col-md-4">
						<label>Broker Name:</label>
						 <select class="form-control form-control-user" name="broker_type" id="broker_type">
						    <option value="0">--Select--</option>
						<?php
						foreach($broker as $data)
						{
						?>
                            <option value="<?php echo $data->first_name. $data->last_name;?>"><?php echo $data->first_name. $data->last_name;?></option> 
                        <?php
						}
						?>							
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
                </div>
				<div class="row mt-2">
					<div class="col-md-4">
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