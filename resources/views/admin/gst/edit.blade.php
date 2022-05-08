 <form method="post" id="gst_edit_form">
			    <div class="card">
                <div class="card-body">
			    <input type="hidden" id="gst_edit_id" value="<?php echo $result[0]->id;?>">
				@csrf
                <div class="row">
                    <div class="col-md-4">
					    <label>GST Name*:</label>
                        <input type="text" class="form-control form-control-user" id="gst_name"
                               placeholder="GST Name" value="<?php echo $result[0]->gst_name;?>" name="gst_name">
						<span id="gst_name_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>GST Charges*:</label>
                        <input type="text" class="form-control form-control-user" id="gst_charges"
                               placeholder="GST Charges" value="<?php echo $result[0]->gst_charges;?>" name="gst_charges">
						<span id="gst_charges_error" style="color: red"></span>
                    </div>					
                </div>				
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				       <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important;" id="gstedit_button" type="button">Save</button>
					</div>
				</div>                             
            </form>