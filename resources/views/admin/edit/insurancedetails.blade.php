                 <?php 
				if(count($result)>0)
				{
				?>
				<div class="row">
                    <div class="col-md-4">
					    <label>Vehicle Name*:</label>
                        <input type="text" class="form-control form-control-user" id="insuranceVehicleName"
                            value="<?php echo $result[0]->insuranceVehicleName;?>"   placeholder="Vehicle Name" name="insuranceVehicleName" readonly>
						<span id="insuranceVehicleName_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Vehicle Number*:</label>
                        <input type="text" class="form-control form-control-user" id="insuranceRegistrationNumber"
                            value="<?php echo $result[0]->insuranceRegistrationNumber;?>"   placeholder="Vehicle Number" name="insuranceRegistrationNumber" readonly>
						<span id="insuranceRegistrationNumber_error" style="color: red"></span>
                    </div>
					 <div class="col-md-4">
						<label>Select Insurance Type*:</label>
                        <select name="insuranceType" id="insuranceType" class="form-control form-control-user" readonly>
						    <option value="0">--Select--</option>
							<?php
							foreach($type as $data)
							{
							?>
                            <option <?php if($result[0]->insuranceType == $data->insuranceType){ echo 'selected';}?> value="<?php echo $data->insuranceType;?>"><?php echo $data->insuranceType;?></option>
                            <?php
							}
							?>                                                                     
                        </select>                        
						<span id="insuranceType_error" style="color: red"></span>
                    </div>
						
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Insurance Provider*:</label>                        
                        <select name="insuranceProvider" id="insuranceProvider" class="form-control form-control-user" readonly>
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
					<div class="col-md-4">
						<label>Insurance Validity*:</label>
                        <select name="insuranceValidity" id="insuranceValidity" class="form-control form-control-user" readonly>
						    <option value="0">--Select--</option>							                                                                   
						    <option <?php if($result[0]->insuranceValidity == 3){ echo 'selected';} ?> value="3">Three Months</option>							                                                                   
						    <option <?php if($result[0]->insuranceValidity == 6){ echo 'selected';} ?> value="6">Six Months</option>							                                                                   
						    <option <?php if($result[0]->insuranceValidity == 9){ echo 'selected';} ?> value="9">Nine Months</option>							                                                                   
						    <option <?php if($result[0]->insuranceValidity == 1){ echo 'selected';} ?> value="1">One Year</option>							                                                                   
						    <option <?php if($result[0]->insuranceValidity == 2){ echo 'selected';} ?> value="2">Two Years</option>							                                                                   
                        </select>
						<span id="insuranceValidity_error" style="color: red"></span>
                    </div>
				    <div class="col-md-4">
						<label>Insurance Start Date*:</label>
                        <input type="date" class="form-control form-control-user" id="insuranceStartDate"
                            value="<?php echo $result[0]->insuranceStartDate;?>"   name="insuranceStartDate" readonly>
						<span id="insuranceStartDate_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Insurance End Date*:</label>
                        <input type="date" class="form-control form-control-user" id="insuranceEndDate"
                            value="<?php echo $result[0]->insuranceEndDate;?>"   name="insuranceEndDate" readonly>
					    <span id="insuranceEndDate_error" style="color: red"></span>
                    </div>
                     <div class="col-md-4">
						<label>SKU Code*:</label>
                        <input type="text" class="form-control form-control-user" id="SKU_Code"
                            value="<?php echo $result[0]->SKU_Code;?>"   placeholder="Vehicle Number" name="SKU_Code" readonly>
						<span id="SKU_Code_error" style="color: red"></span>
                    </div>					
				</div>
				<?php
				}
				else
				{
				?>
				<div class="row">
                    <div class="col-md-4">
					    <label>Vehicle Name*:</label>
                        <input type="text" class="form-control form-control-user" id="insuranceVehicleName"
                               placeholder="Vehicle Name" name="insuranceVehicleName" readonly>
						<span id="insuranceVehicleName_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Vehicle Number*:</label>
                        <input type="text" class="form-control form-control-user" id="insuranceRegistrationNumber"
                               placeholder="Vehicle Number" name="insuranceRegistrationNumber" readonly>
						<span id="insuranceRegistrationNumber_error" style="color: red"></span>
                    </div>
					 <div class="col-md-4">
						<label>Select Insurance Type*:</label>
                        <select name="insuranceType" id="insuranceType" class="form-control form-control-user" readonly>
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
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Insurance Provider*:</label>                        
                        <select name="insuranceProvider" id="insuranceProvider" class="form-control form-control-user" readonly>
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
					<div class="col-md-4">
						<label>Insurance Validity*:</label>
                        <select name="insuranceValidity" id="insuranceValidity" class="form-control form-control-user" readonly>
						    <option value="0">--Select--</option>							                                                                   
						    <option value="3">Three Months</option>							                                                                   
						    <option value="6">Six Months</option>							                                                                   
						    <option value="9">Nine Months</option>							                                                                   
						    <option value="1">One Year</option>							                                                                   
						    <option value="2">Two Years</option>							                                                                   
                        </select>
						<span id="insuranceValidity_error" style="color: red"></span>
                    </div>
				    <div class="col-md-4">
						<label>Insurance Start Date*:</label>
                        <input type="date" class="form-control form-control-user" id="insuranceStartDate"
                               name="insuranceStartDate" readonly>
						<span id="insuranceStartDate_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Insurance End Date*:</label>
                        <input type="date" class="form-control form-control-user" id="insuranceEndDate"
                               name="insuranceEndDate" readonly>
					    <span id="insuranceEndDate_error" style="color: red"></span>
                    </div>                   
				</div>
				<?php
				}
				?>