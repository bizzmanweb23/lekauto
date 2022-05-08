 <form method="post" id="type_edit_form">
			    <div class="card">
                <div class="card-body">
			    <input type="hidden" id="type_edit_id" value="<?php echo $result[0]->id;?>">
				@csrf
               <div class="row">
                    <div class="col-md-4">
					    <label>Insurance Type Name*:</label>
                        <input type="text" class="form-control form-control-user" id="insuranceType"
                               placeholder="Insurance Type Name" value="<?php echo $result[0]->insuranceType; ?>" name="insuranceType">
						<span id="insuranceType_error" style="color: red"></span>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				        <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important; margin-top: 7px;" id="EditTypeButton" type="button">Save</button>
					</div>									
                </div>					                             
            </form>