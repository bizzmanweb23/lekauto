                <div class="row mt-3">                
				    <div class="col-md-4">
                        <div class="form-group">
                            <label for="vehicleName">Vehicle Name And Model:</label>
                            <input type="text" class="form-control vehicleNameMis" id="vehicleName" name="vehicleName[]" value="<?php echo $result[0]->vehicle_make.$result[0]->vehicle_year;?>" placeholder="Vehicle Name">
						    <span id="vehicleName_error" style="color: red"></span>                     
                        </div>
					</div>
			        <div class="col-md-4">
                        <div class="form-group">
                            <label for="vehicle_registration_number">Registration Number:</label>
                            <input type="text" class="form-control registrationVehilceMis" id="vehicleRegistrationNumber" name="vehicleRegistrationNumber[]" value="<?php echo $result[0]->vehicle_number;?>" placeholder="Vehicle Registration Number">
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