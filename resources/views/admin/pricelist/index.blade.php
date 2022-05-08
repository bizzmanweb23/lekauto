@extends('admin.layout.main')

@section('content') 
<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                           <form method="post" enctype="multipart/form-data" id ="pricelist_form">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="branch-name bg-light px-3 py-3" style="color:#fff;background: #a36626 !important;">
                            <h4 style="color:#fff;">Price List</h4>
                        </div>
                        <input type="hidden" class="form-control mt-2 form-control-user" name="vehicle_id"  id="vehicle_id" value= "<?php echo $vehicleId; ?>" >              
         
                     
                       <div class="row"> 
                         <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="broker" class="mt-3">Broker:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
							<input type="text" class="form-control mt-3 form-control-user" name="broker" id="broker">
							</div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-4" for="veh_no.no" class="mt-3">Vehicle.No:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
							<input type="text" class="form-control mt-3 form-control-user" name="veh_no" id="veh_no">
							</div>
                            </div>
                            </div>                                            
                            </div>


							<div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="gst" class="mt-3">GST:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
							 <!-- this is box -->
							 <select name="gst" class="form-control mt-3" id="gst">
                                            <option value="">--Select GST--</option>
											 <option value="central">Central</option>
                                             <option value="state">State</option>
											 
                             </select>                                                                                   
						    </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-4" for="reg_date" class="mt-3">Reg.Date:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
							<input type="date" class="form-control mt-3 form-control-user" name="reg_date" id="reg_date">
							</div>
                            </div>
                            </div>                                            
                            </div>

							<div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="make" class="mt-3">Make:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
							<input type="text" class="form-control mt-2 form-control-user" name="make" id="make"> 
						    </div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-4" for="model" >Model:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
							<input type="text" class="form-control mt-2 form-control-user" name="model" id="model"> 
							  </div>
                            </div>
                            </div>                                            
                            </div>


							<div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="col" class="mt-3">Color:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
							<input type="text" class="form-control mt-3 form-control-user" name="col" id="col">
							</div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label class="mt-4" for="omv_e_tsf" class="mt-3">OMV/E-TSF:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
							<input type="date" class="form-control mt-3 form-control-user" name="omv_e_tsf" id="omv_e_tsf">
							</div>
                            </div>
                            </div>                                            
                            </div>

							<div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="ul_parf" class="mt-3">UL/PARF:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
							<input type="text" class="form-control mt-3 form-control-user" name="ul_parf" id="ul_parf">
							</div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="proplant" class="mt-3">Propellant</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
							<select class="form-control mt-2 form-control-user" name="propellant" id="propellant">
                            <option value="">-- select --</option>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Natural Gas">Natural Gas</option>
                           </select>
                            <span id="propellant_error" style="color:red;"></span>
							</div>
                            </div>
                            </div>                                            
                            </div>


							<div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="o" class="mt-3">O:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
							<input type="text" class="form-control mt-3 form-control-user" name="o" id="o">
							</div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="coe" class="mt-3">COE:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
							<input type="text" class="form-control mt-3 form-control-user" name="coe" id="coe">
							<span id="coe_error" style="color:red;"></span>
							</div>
                            </div>
                            </div>                                            
                            </div>


							<div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="coe_exp" class="mt-3">COE_EXP:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
							<input type="text" class="form-control mt-3 form-control-user" name="coe_exp" id="coe_exp">
							</div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="r_tax_exp" class="mt-3">R/TAX_EXP</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
							<input type="text" class="form-control mt-3 form-control-user" name="r_tax_exp" id="r_tax_exp">
                            <span id="r_tax_exp_error" style="color:red;"></span>
						    </div>
                            </div>
                            </div>                                            
                            </div>

							<div class="row">
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="price" class="mt-3">Price:</label>
                            </div>
                            <div class="col-md-9">
                            <!-- this is box -->
							<input type="text" class="form-control mt-3 form-control-user" name="price" id="price">
							</div>
                            </div>
                            </div>    
                            <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3">
                            <!-- this is the label -->
                            <label for="loc" class="mt-3">Loc</label>
                                </div>
                                <div class="col-md-9">
                             <!-- this is box -->
                             <input type="text" class="form-control mt-3 form-control-user" name="loc" id="loc">
							</div>
                            </div>
                            </div>                                            
                            </div>

							
							<button class="btn btn-primary btn-block w-100 mt-4" style="color:#fff;background: #a36626 !important;" id="save" type="button">SAVE</button>
                            <button class="btn btn-primary btn-block w-100 mt-4" style="color:#fff;background: #a36626 !important;" id="back"
                            href="{{ route('admin.dashboard.index') }}">Back</button>

							
       	            </div>
	            </div>
            </form>               
        </div>
    </div>
	<div id="user_loder" style="display: none">
        @include('admin.loder.index')
    </div>
@section('javascript')


 <script>
    var room = 1;
function pricelist_fields() {
 
    room++;
    var objTo = document.getElementById('pricelist_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="row"> <div class="col-md-3"><div class="form-group"><label for="vehicle_name">Vehicle Name And Model:</label><input type="text" class="form-control" id="vehicle_name" name="vehicle_name[]" value="" placeholder="Vehicle Name"><span id="vehicle_name_error" style="color: red"></span></div></div> <div class="col-md-3"><div class="form-group"><label for="vehicle_registration_number">Vehicle Registration Number:</label><input type="text" class="form-control" id="vehicle_registration_number" name="vehicle_registration_number[]" value="" placeholder="Vehicle Registration Number"></div></div><div class="col-md-3"><div class="form-group"><label for="vendor_name">Vendor Name:</label><input type="text" class="form-control" id="vendor_name" name="vendor_name[]" value="" placeholder="Enter Vendor Name"><span id="vendor_name_error" style="color: red"></span></div></div><div class="col-md-3"><div class="form-group"><label for="repair_cost">Cost Of Repair:</label><input type="text" class="form-control" id="repair_cost" name="repair_cost[]" value="" placeholder="Enter Repair Cost"><span id="repair_cost_error" style="color: red"></span></div></div><div class="col-sm-3 nopadding><div class="form-group"><button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> Remove Record </button></div></div><div class="clear"></div>';
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
	
	$('#save').click(function() {
	   //alert ('hello');
        var form = $('#pricelist_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.pricelist.store') }}",
			headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json',
            beforeSend: function() {
                $('#user_loder').show()
            },
            success: function(data) {
                if (data.status == 'success') {
                    toastr.success(data.message);
                }
				else{
					toastr.error();
				}
				
                $('#pricelist_form').trigger("reset");
                $('#user_loder').hide()
            },
            error: function(error) {
                $('#user_loder').hide()
                var err = error.responseJSON.errors;
                if (error.status == 422) {
                    toastr.error("Error");
                    $('#broker_error').html(err.broker)
					$('#veh_no_error').html(err.veh_no)
					$('#gst_error').html(err.gst)
					$('#reg_date_error').html(err.reg_date)
					$('#make_error').html(err.make)
					$('#model_error').html(err.model)
					$('#col_error').html(err.col)
					$('#omv_e_tsf_error').html(err.omv_e_tsf)
					$('#ul_parf_error').html(err.ul_parf)
					$('#propellant_error').html(err.propellant)
					$('#o_error').html(err.o)
					$('#coe_error').html(err.coe)
					$('#coe_exp_error').html(err.coe_exp)
					$('#r_tax_exp_error').html(err.r_tax_exp)
					$('#price_error').html(err.price)
					$('#loc_error').html(err.loc)

                      if (err.vehicle_name) {
                        toastr.error(err.vehicle_name);
                    }
					if (err.vehicle_registration_number) {
                        toastr.error(err.vehicle_registration_number);
                    }
					if (err.vendor_name) {
                        toastr.error(err.vendor_name);
                    }
					if (err.repair_cost) {
                        toastr.error(err.repair_cost);
                    }
                }
                console.log(error)
            }
        })
    });
	
	$('#pricelist_form :input').click(function() {

        $('#broker_error').html(err.broker)
					$('#veh_no_error').html()
					$('#gst_error').html()
					$('#reg_date_error').html()
					$('#make_error').html()
					$('#model_error').html()
					$('#col_error').html()
					$('#omv_e_tsf_error').html()
					$('#ul_parf_error').html()
					$('#propellant_error').html()
					$('#o_error').html()
					$('#coe_error').html()
					$('#coe_exp_error').html()
					$('#r_tax_exp_error').html()
					$('#price_error').html()
					$('#loc_error').html()

         })
    
     
</script>

 @endsection
 @endsection
 