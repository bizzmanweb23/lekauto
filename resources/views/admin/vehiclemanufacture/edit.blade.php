 <form method="post" id="manufacture_edit_form">
			    <div class="card">
                <div class="card-body">
			    <input type="hidden" id="manufacture_edit_id" value="<?php echo $result[0]->id;?>">
				@csrf
               <div class="row">
                    <div class="col-md-4">
					    <label>Vehicle Manufacture Name*:</label>
                        <input type="text" class="form-control form-control-user" id="vehicleManufactureName"
                               placeholder="Insurance Provider Name" value="<?php echo $result[0]->vehicleManufactureName;?>" name="vehicleManufactureName">
						<span id="vehicleManufactureName_error" style="color: red"></span>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				        <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important; margin-top: 7px;" id="EditManufactureButton" type="button">Save</button>
					</div>									
                </div>					                             
            </form>