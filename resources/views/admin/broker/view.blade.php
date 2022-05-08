 <form method="get" id="broker_details_form">
			    <div class="card">
                <div class="card-body">
			    <input type="hidden" id="broker_id">
				@csrf
                <div class="row">
                    <div class="col-md-4">
					    <label>First Name*:</label>
                        <input type="text" class="form-control form-control-user" id="first_name"
                               placeholder="First Name" value="<?php echo $data[0]->first_name;?>" name="first_name" readonly>
						<span id="first_name_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Last Name*:</label>
                        <input type="text" class="form-control form-control-user" id="last_name"
                               placeholder="Last Name" value="<?php echo $data[0]->last_name;?>" name="last_name" readonly>
						<span id="first_name_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
						<label>Address*:</label>
                        <input type="text" class="form-control form-control-user" id="address"
                               placeholder="Enter Your Address" value="<?php echo $data[0]->address;?>" name="address" readonly>
						<span id="address_error" style="color: red"></span>
                    </div>					
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>City*:</label>
                        <input type="text" class="form-control form-control-user" id="city"
                               placeholder="Enter Your City" value="<?php echo $data[0]->city;?>" name="city" readonly>
						<span id="city_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Country*:</label>
                        <input type="text" class="form-control form-control-user" id="country"
                               placeholder="Enter Your Country" value="<?php echo $data[0]->country;?>" name="country" readonly>
					    <span id="country_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
					    <label>Mobile Number*:</label>
                        <input type="text" class="form-control form-control-user" id="mobile_number"
                               placeholder="Enter your Mobile Number" value="<?php echo $data[0]->mobile_number;?>" name="mobile_number" readonly>
						<span id="mobile_number_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Email Address*:</label>
                        <input type="text" class="form-control form-control-user" id="email_address"
                               placeholder="Enter your Email Address" value="<?php echo $data[0]->email_address;?>"  name="email_address" readonly>
					    <span id="email_address_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Select Broker Type*:</label>
                        <select name="broker_type" id="broker_type" class="form-control form-control-user" readonly>
						    <option value="0">--Select--</option>
                            <option <?php if($data[0]->broker_type == 'Senior Broker'){ echo 'selected';}?> value="Senior Broker" readonly>Senior Broker</option>
                            <option <?php if($data[0]->broker_type == 'Broker'){ echo 'selected';}?> value="Broker" readonly>Broker</option>
                            <option <?php if($data[0]->broker_type == 'Junior Broker'){ echo 'selected';}?> value="Junior Broker" readonly>Junior Broker</option>                                          
                        </select>
						<span id="brokerType_error" style="color: red"></span>
                    </div>
					<div class="col-md-3">
					    <label>Select Broker Percentage*:</label>
                        <input type="text" class="form-control form-control-user" id="brokerCommision"
                               placeholder="Enter Broker Commission" value="<?php echo $data[0]->broker_commision;?>" name="broker_commision" readonly>
						<span id="brokerCommision_error" style="color: red"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				        <a class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important;" href="{{ route('admin.broker.index') }}">Back</a>
					</div>
				</div>                             
            </form>