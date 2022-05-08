 <script>
 $('#saveProviderButton').click(function() {
	   //alert ('hello');
        var form = $('#provider_details_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.insuranceprovider.store') }}",
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
                        $('#addInsuranceProviderModal').modal("hide");
				        window.location.href="{{ route('admin.insuranceprovider.index') }}";
                        $('#user_loder').hide()
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
                    $('#insuranceProviderName_error').html(err.insuranceProviderName)                   
                    if (err.insuranceProviderName) {
                        toastr.error(insuranceProviderName);
                    }		
                }
                console.log(error)
            }
        })
    });
	
	$('#provider_details_form :input').click(function() {
        $('#insuranceProviderName_error').html('')        
    })
	
	$('body').on('click','#edit_provider_details',function()
	{
	var id=$(this).attr('rel');
    $.ajax({
    url: "{{ route('admin.get_provider_details') }}",
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
        $('#show_provider_details').html(data);
        $('#edit_provider_Modal').modal('show');			
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	});
	
		$('body').on('click','#EditProviderButton',function() 
		{
	            //alert ('hello');
        	    var providerId = $('#provider_edit_id').val();
                var form = $('#provider_edit_form')[0];
                var data = new FormData(form);
				data.append('id',providerId)
				var url= "{{ route('admin.edit_provider_details') }}";
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
                        $('#edit_provider_Modal').modal("hide");
				        window.location.href="{{ route('admin.insuranceprovider.index') }}";
                        $('#user_loder').hide()
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
                    $('#insuranceProviderName_error').html(err.insuranceProviderName)                   
                    if (err.insuranceProviderName) {
                        toastr.error(insuranceProviderName);
                    }						
                }
                console.log(error)
            }
        })
    });
	
	$('#provider_edit_form :input').click(function() {
        $('#insuranceProviderName_error').html('')
    })
	
	$('body').on('click','#delete_provider_details',function()
	{
	$(this).attr('rel');
	$('#deleteproviderId').val($(this).attr('rel'));
	$('#deleteProviderModal').modal('show');	
	});
	
	 $('body').on('click','#delete_provider_button',function() {
             var delProviderID= $('#deleteproviderId').val();
            $.ajax({
                url: "{{ route('admin.delete_provider_details') }}",
                type: "post",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: delProviderID,
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
                        $('#deleteProviderModal').modal('hide');
                        window.location.href="{{ route('admin.insuranceprovider.index') }}";
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            })
        });
</script>