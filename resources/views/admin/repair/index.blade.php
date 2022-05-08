@extends('admin.layout.main')

@section('content') 

<div class="container-fluid py-4">
    <form method="post" enctype="multipart/form-data" id ="repair_details_form">
      @csrf
        <div class="card">
            <div class="card-body">
                <div class="ms-auto text-end">
                    <button class="btn btn-link text-dark px-3 mb-0" id="save" type="button"><i class="fas fa-save text-dark me-2"
                            aria-hidden="true"></i>Save</button>
                        <a class="btn btn-link text-dark px-3 mb-0" id="back"
                           href="{{ route('admin.dashboard.index') }}"><i class="fas fa-arrow-left text-dark me-2"
                           aria-hidden="true"></i>Back</a>
                </div>
				<div class="row mt-3">                
				    <div class="col-md-3">
                        <div class="form-group">
                            <label for="vehicle_name">Vehicle Name And Model:</label>
                            <input type="text" class="form-control" id="vehicle_name" name="vehicle_name[]" value="" placeholder="Vehicle Name">
						    <span id="vehicle_name_error" style="color: red"></span>                     
                        </div>
					</div>
			        <div class="col-md-3">
                        <div class="form-group">
                            <label for="vehicle_registration_number">Vehicle Registration Number:</label>
                            <input type="text" class="form-control" id="vehicle_registration_number" name="vehicle_registration_number[]" value="" placeholder="Vehicle Registration Number">
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
				<div class="ms-auto text-end">
                    <button class="btn btn-success" type="button"  onclick="repair_fields();">Add More Record</button>
                </div>
                <div id="repair_fields"></div>
                <div class="clear"></div>  
            </div>
		</div>	
	</form>			
</div>
	<div id="user_loder" style="display: none">
        @include('admin.loder.index')
    </div>
@section('javascript')
 <script>
    var room = 1;
function repair_fields() {
 
    room++;
    var objTo = document.getElementById('repair_fields')
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
        var form = $('#repair_details_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.repair.store') }}",
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
				
                $('#repair_details_form').trigger("reset");
                $('#user_loder').hide()
            },
            error: function(error) {
                $('#user_loder').hide()
                var err = error.responseJSON.errors;
                if (error.status == 422) {
                    toastr.error("Error");
                    $('#vehicle_name_error').html(err.vehicle_name)
                    $('#vehicle_registration_number_error').html(err.vehicle_registration_number)
                    $('#vendor_name_error').html(err.vendor_name)
                    $('#repair_cost_error').html(err.repair_cost)
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
	
	$('#repair_details_form :input').click(function() {
        $('#vehicle_name_error').html('')
        $('#vehicle_registration_number_error').html('')
        $('#vendor_name_error').html('')
        $('#repair_cost_error').html('')
    })
    
     // $(document).ready(function () {
    // $('.customer').hide();
    // });

    // $('.customer').click(function () {
    //     $('.employee').hide();
    //     $('.customer').show();
    // });

    // $('.employee').click(function () {
    //     $('.customer').hide();
    //     $('.employee').show();
    // });
    // $('.others').click(function () {
    //     $('.customer').hide();
    //     $('.employee').show();
    // });

    // $('#confirm_password').on('input', function (){
    //     console.log($('#confirm_password').val());
    //     var password = $('#password').val();
    //     var confirm_password = $('#confirm_password').val();
    //     if (password !== confirm_password) {
    //         $('#confirm_password').focus();
    //     }
    // });

</script>

 @endsection
 @endsection
 
 
 