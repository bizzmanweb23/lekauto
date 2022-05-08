<form method="post" id="insurance_edit_form">
			    <div class="card">
                <div class="card-body">
				@csrf
				<input type="hidden" id="insuranceEditId" value="<?php echo $result[0]->id;?>">
                <div class="row">
                    <div class="col-md-4">
					    <label>Vehicle Name*:</label>
                        <input type="text" class="form-control form-control-user" id="insuranceVehicleName"
                               placeholder="Vehicle Name" value="<?php echo $result[0]->insuranceVehicleName;?>" name="insuranceVehicleName">
						<span id="insuranceVehicleName_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Vehicle Number*:</label>
                        <input type="text" class="form-control form-control-user" id="insuranceRegistrationNumber"
                               placeholder="Registration Number" value="<?php echo $result[0]->insuranceRegistrationNumber;?>" name="insuranceRegistrationNumber">
						<span id="insuranceRegistrationNumber_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
						<label>Select Insurance Type*:</label>
                        <select name="insuranceType" id="insuranceType" class="form-control form-control-user">
						    <option value="0">--Select--</option>
                            <option <?php if($result[0]->insuranceType == 'Third Party'){ echo 'selected';}?> value="Third Party">Third Party</option>
                            <option <?php if($result[0]->insuranceType == 'Full Insurance'){ echo 'selected';}?> value="Full Insurance">Full Insurance</option>                                                                     
                        </select>                        
						<span id="insuranceType_error" style="color: red"></span>
                    </div>										
                </div>
				<div class="row mt-2">
                    <div class="col-md-4">
						<label>Insurance Start Date*:</label>
                        <input type="date" class="form-control form-control-user" id="insuranceStartDate"
                               value="<?php echo $result[0]->insuranceStartDate;?>" name="insuranceStartDate">
						<span id="insuranceStartDate_error" style="color: red"></span>
                    </div>				
                    <div class="col-md-4">
						<label>Insurance End Date*:</label>
                        <input type="date" class="form-control form-control-user" id="insuranceEndDate"
                               value="<?php echo $result[0]->insuranceEndDate;?>" name="insuranceEndDate">
					    <span id="insuranceEndDate_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
						<label>Insurance Provider*:</label>                        
                        <select name="insuranceProvider" id="insuranceProvider" class="form-control form-control-user">
						    <option value="0">--Select--</option>
							<?php 
							foreach($provider as $data)
							{
						    ?>
                            <option <?php if($result[0]->insuranceProvider == $data->insuranceProviderName){ echo 'selected';}?> value="<?php echo $data->insuranceProviderName;?>"><?php echo $data->insuranceProviderName;?></option>
                            <?php
							}
							?>                                                                    
                        </select>
						<span id="insuranceProvider_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Insurance Validity*:</label>
                        <select name="insuranceValidity" id="insuranceValidity" class="form-control form-control-user">
						    <option value="0">--Select--</option>							                                                                   
						    <option <?php if($result[0]->insuranceValidity == 3){ echo 'selected'; }?> value="3">Three Months</option>							                                                                   
						    <option <?php if($result[0]->insuranceValidity == 6){ echo 'selected'; }?> value="6">Six Months</option>							                                                                   
						    <option <?php if($result[0]->insuranceValidity == 9){ echo 'selected'; }?> value="9">Nine Months</option>							                                                                   
						    <option <?php if($result[0]->insuranceValidity == 1){ echo 'selected'; }?> value="1">One Year</option>							                                                                   
						    <option <?php if($result[0]->insuranceValidity == 2){ echo 'selected'; }?> value="2">Two Years</option>							                                                                   
                        </select>
						<span id="insuranceValidity_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
						<label>SKU Code*:</label>
                        <input type="text" class="form-control form-control-user" id="SKU_Code"
                               value="<?php echo $result[0]->SKU_Code;?>" name="SKU_Code" readonly>
						<span id="SKU_Code_error" style="color: red"></span>
                    </div>
				</div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				        <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important;" id="insuranceedit_button" type="button">Save</button>
					</div>
				</div>
                </div>
                </div>				
            </form>