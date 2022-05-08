 <script>
 $('#insurancedetails_button').click(function() {
	   //alert ('hello');
        var form = $('#insurance_details_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.insurance.store') }}",
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
                    const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        })
						$('#user_loder').hide()
                        $('#addInsuranceModal').modal('hide');
                        window.location.href="{{ route('admin.insurance.index') }}";
                }
				else{
					toastr.error();
				}
            },
            error: function(error) {
                $('#user_loder').hide()
                var err = error.responseJSON.errors;
                if (error.status == 422) {
                    toastr.error("Error");
                    $('#insuranceVehicleName_error').html(err.insuranceVehicleName)
                    $('#insuranceRegistrationNumber_error').html(err.insuranceRegistrationNumber)
                    $('#insuranceStartDate_error').html(err.insuranceStartDate)
                    $('#insuranceEndDate_error').html(err.insuranceEndDate)
                    $('#insuranceType_error').html(err.insuranceType)
                    if (err.insuranceVehicleName) {
                        toastr.error(err.insuranceVehicleName);
                    }
					if (err.insuranceRegistrationNumber) {
                        toastr.error(err.insuranceRegistrationNumber);
                    }
					if (err.insuranceStartDate) {
                        toastr.error(err.insuranceStartDate);
                    }
					if (err.insuranceEndDate) {
                        toastr.error(err.insuranceEndDate);
                    }
					if (err.insuranceType) {
                        toastr.error(err.insuranceType);
                    }
                }
                console.log(error)
            }
        })
    });
	
	$('#insurance_details_form :input').click(function() {
        $('#insuranceVehicleName_error').html('')
        $('#insuranceRegistrationNumber_error').html('')
        $('#insuranceStartDate_error').html('')
        $('#insuranceEndDate_error').html('')
        $('#insuranceType_error').html('')
    })
	
	$('body').on('click','#edit_insurance_details',function()
	{
	var id=$(this).attr('rel');
    $.ajax({
    url: "{{ route('admin.get_insurance_details') }}",
    type: "get",
    data: 
	{
        "_token": "{{ csrf_token() }}",
         id: id
    },
    dataType: "html",
    beforeSend: function() 
	{
        $('#user_loder').show()
    },
    success: function(data) 
	{
        $('#user_loder').hide();
        $('#show_insurance_details').html(data);
        $('#edit_insurance_Modal').modal('show');			
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	});
	
	$('body').on('click','#insuranceedit_button',function() 
		{
	            //alert ('hello');
        	    var insuranceId = $('#insuranceEditId').val();
                var form = $('#insurance_edit_form')[0];
                var data = new FormData(form);
				data.append('id',insuranceId)
				var url= "{{ route('admin.edit_insurance_details') }}";
                toastr.options = 
				{
                    "closeButton": true,
                    "newestOnTop": true,
                    "positionClass": "toast-top-right"
                };
            $.ajax
			({
                url: url,
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
                    const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        })
						$('#user_loder').hide()
                        $('#edit_insurance_Modal').modal('hide');
                        window.location.href="{{ route('admin.insurance.index') }}";
                }
				else{
					toastr.error();
				}
            },
            error: function(error) 
			{
                $('#user_loder').hide()
				var err = error.responseJSON.errors;
				if (error.status == 422) {
                    toastr.error("Error");
                    $('#insuranceVehicleName_error').html(err.insuranceVehicleName)
                    $('#insuranceRegistrationNumber_error').html(err.insuranceRegistrationNumber)
                    $('#insuranceStartDate_error').html(err.insuranceStartDate)
                    $('#insuranceEndDate_error').html(err.insuranceEndDate)
                    $('#insuranceType_error').html(err.insuranceType)
                    if (err.insuranceVehicleName) {
                        toastr.error(err.insuranceVehicleName);
                    }
					if (err.insuranceRegistrationNumber) {
                        toastr.error(err.insuranceRegistrationNumber);
                    }
					if (err.insuranceStartDate) {
                        toastr.error(err.insuranceStartDate);
                    }
					if (err.insuranceEndDate) {
                        toastr.error(err.insuranceEndDate);
                    }
					if (err.insuranceType) {
                        toastr.error(err.insuranceType);
                    }
                }
                console.log(error)
            }
        })
    });
	
	$('#insurance_edit_form :input').click(function() {
        $('#insuranceVehicleName_error').html('')
        $('#insuranceRegistrationNumber_error').html('')
        $('#insuranceStartDate_error').html('')
        $('#insuranceEndDate_error').html('')
        $('#insuranceType_error').html('')
    })
	
	$('body').on('click','#delete_gst_details',function()
	{
	$(this).attr('rel');
	$('#deleteInsuranceID').val($(this).attr('rel'));
	$('#deleteInsuranceModal').modal('show');	
	});
	
	$('body').on('click','#deleteInsuranceRecord',function() {
            var delInsuranceID= $('#deleteInsuranceID').val();
            $.ajax({
                url: "{{ route('admin.delete_insurance_details') }}",
                type: "post",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: delInsuranceID,
                },
                beforeSend: function() {
                    $('#user_loder').show()
                },
                success: function(data) {
                    $('#user_loder').hide()
                    if (data.status == 'success') {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        })
                        $('#deleteInsuranceModal').modal('hide');
                        window.location.href="{{ route('admin.insurance.index') }}";
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            })
        });
</script>