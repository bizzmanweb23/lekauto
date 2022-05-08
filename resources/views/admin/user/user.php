@extends('admin.layout.main')

@section('content') 

<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
               <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_content">
						<form id="employee_add_form" method="post" action="{!! url('employee/store') !!}" enctype="multipart/form-data"  class="form-horizontal upperform employeeAddForm">
							<div class="col-md-12 col-xs-12 col-sm-12 space">
								<h4><b>{{ trans('Personal Information')}}</b></h4>
								<p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
							</div>
						
							 @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									   <label>First Name*:</label>
                                        <input type="text" class="form-control form-control-user" id="first_name"
                                            placeholder="First Name" name="first_name">
											<span id="first_name_error" style="color: red"></span>
                                    </div>
                                    <div class="col-sm-6">
									    <label>Last Name*:</label>
                                        <input type="text" class="form-control form-control-user" id="last_name"
                                            placeholder="Last Name" name="last_name">
											<span id="last_name_error" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									   <label>Address*:</label>
                                        <input type="text" class="form-control form-control-user" id="address"
                                            placeholder="Enter Your Address" name="address">
											<span id="address_error" style="color: red"></span>
                                    </div>
                                    <div class="col-sm-6">
									    <label>City*:</label>
                                        <input type="text" class="form-control form-control-user" id="city"
                                            placeholder="Enter Your City" name="city">
											<span id="city_error" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									   <label>Country*:</label>
                                        <input type="text" class="form-control form-control-user" id="country"
                                            placeholder="Enter Your Country" name="country">
											<span id="country_error" style="color: red"></span>
                                    </div>
                                    <div class="col-sm-6">
									    <label>Landline Number*:</label>
                                        <input type="text" class="form-control form-control-user" id="landline_number"
                                            placeholder="Enter Your Landline Number" name="landline_number">
											<span id="landline_number_error" style="color: red"></span>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									   <label>Mobile Number*:</label>
                                        <input type="text" class="form-control form-control-user" id="mobile_number"
                                            placeholder="Enter your Mobile Number" name="mobile_number">
											<span id="mobile_number_error" style="color: red"></span>
                                    </div>
                                    <div class="col-sm-6">
									    <label>Email Address*:</label>
                                        <input type="text" class="form-control form-control-user" id="email"
                                            placeholder="Enter your Email Address" name="email_address">
											<span id="email_address_error" style="color: red"></span>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                         <div class="col-sm-6 mb-3 mb-sm-0">
								            <button class="btn" style="background-color:#cb0c9f;color:black" type="button" id="brokerdetails_button">submit</button>
										</div>
									</div> 
						</form>
					</div>
                </div>
            </div>
        </div>
            </div>
        </div>

    </div>
	<div id="user_loder" style="display: none">
        @include('admin.loder.index')
    </div>
@section('javascript')
 <script>
   $('#brokerdetails_button').click(function() {
	   //alert ('hello');
        var form = $('#broker_details_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.broker.store') }}",
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
				
                $('#broker_details_form').trigger("reset");
                $('#user_loder').hide()
            },
            error: function(error) {
                $('#user_loder').hide()
                var err = error.responseJSON.errors;
                if (error.status == 422) {
                    toastr.error("Error");
                    $('#first_name_error').html(err.first_name)
                    $('#last_name_error').html(err.last_name)
                    $('#address_error').html(err.address)
                    $('#city_error').html(err.city)
                    $('#country_error').html(err.country)
                    $('#landline_number_error').html(err.landline_number)
                    $('#mobile_number_error').html(err.mobile_number)
                    $('#email_address_error').html(err.email_address)
                    if (err.first_name) {
                        toastr.error(err.first_name);
                    }
					if (err.last_name) {
                        toastr.error(err.last_name);
                    }
					if (err.address) {
                        toastr.error(err.address);
                    }
					if (err.city) {
                        toastr.error(err.city);
                    }
					if (err.country) {
                        toastr.error(err.country);
                    }
					if (err.landline_number) {
                        toastr.error(err.landline_number);
                    }
					if (err.mobile_number) {
                        toastr.error(err.mobile_number);
                    }
					if (err.email_address) {
                        toastr.error(err.email_address);
                    }
                }
                console.log(error)
            }
        })
    });
	
	$('#broker_details_form :input').click(function() {
        $('#first_name_error').html('')
        $('#last_name_error').html('')
        $('#address_error').html('')
        $('#city_error').html('')
        $('#country_error').html('')
        $('#landline_number_error').html('')
        $('#mobile_number_error').html('')
        $('#email_address_error').html('')
    })
</script>
	
 @endsection
 @endsection
 
 
 