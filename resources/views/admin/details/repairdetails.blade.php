 				<div class="row mt-3 newRow">                
				    <div class="col-md-3">
                        <div class="form-group">
                            <label for="vehicle_name">Vehicle Name And Model:</label>
                            <input type="text" class="form-control vehicle_nameRepair" id="vehicle_name" name="vehicle_name[]" value="<?php echo $result[0]->vehicle_make.$result[0]->vehicle_year ?>" placeholder="Vehicle Name">
						    <span id="vehicle_name_error" style="color: red"></span>                     
                        </div>
					</div>
			        <div class="col-md-3">
                        <div class="form-group">
                            <label for="vehicle_registration_number">Registration Number:</label>
                            <input type="text" class="form-control vehicleReg_repair" id="vehicle_registration_number" name="vehicle_registration_number[]" value="<?php echo $result[0]->vehicle_number;?>" placeholder="Vehicle Registration Number">
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
				
        