<form method="get" enctype="multipart/form-data" id ="viewInsurance_details_form">
                        @csrf
                        <div class="card">
                            <div class="card-body">
							    <?php
								if(count($result)>0)
								{
								?>
				                <div class="row mt-3">                
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vehicleName"><h6>Vehicle Name:</h6> <br>
											   <?php echo $result[0]->insuranceVehicleName;?> 
											</label>                                                                
                                        </div>
					                </div>
			                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vehicleNumber"><h6>Vehicle Number:</h6> <br>
											    <?php echo $result[0]->insuranceRegistrationNumber;?> 
											</label>                                            
                                        </div>
                                    </div>
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insuranceType"><h6>Select Insurance Type:</h6> <br>
											    <?php echo $result[0]->insuranceType;?> 
											</label>                                            
                                        </div>
                                    </div>
                                </div>
								<hr>
								<div class="row mt-3">
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insuranceProvider"><h6>Insurance Provider:</h6> <br>
											   <?php echo $result[0]->insuranceProvider;?>  
											</label>                                            
                                        </div>
                                    </div>
					                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insuranceValidity"><h6>Insurance Validity:</h6> <br>
											   <?php echo $result[0]->insuranceValidity;?>
											</label>                                            
                                        </div>
                                    </div>
					                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurance_startDate"><h6>Insurance Start Date:</h6> <br>
											    <?php echo $result[0]->insuranceStartDate;?>
											</label>                                            
                                        </div>
                                    </div>
				                </div>
								<hr>
								<div class="row mt-3">
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurance_endDate"><h6>Insurance End Date:</h6> <br>
											   <?php echo $result[0]->insuranceEndDate;?> 
											</label>                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="SKU_code"><h6>SKU Code</h6> <br>
											   <?php echo $result[0]->SKU_Code;?> 
											</label>                                            
                                        </div>
                                    </div>					                
				                </div>
								<hr>
                                <?php
								}
								else
								{
								?>
                                <div class="row mt-3">                
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vehicleName"><h6>Vehicle Name:</h6> <br>
											    
											</label>                                                                
                                        </div>
					                </div>
			                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="vehicleNumber"><h6>Vehicle Number:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insuranceType"><h6>Select Insurance Type:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
                                </div>
								<hr>
								<div class="row mt-3">
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insuranceProvider"><h6>Insurance Provider:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
					                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insuranceValidity"><h6>Insurance Validity:</h6> <br>
											   
											</label>                                            
                                        </div>
                                    </div>
					                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurance_startDate"><h6>Insurance Start Date:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>
				                </div>
								<hr>
								<div class="row mt-3">
				                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurance_endDate"><h6>Insurance End Date:</h6> <br>
											    
											</label>                                            
                                        </div>
                                    </div>					                
				                </div>
								<hr>
                                <?php
								}
								?>				                
		                    </div>
                        </div>							
	                </form>