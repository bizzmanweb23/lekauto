 <script>
 $('#saveManufactureButton').click(function() {
	   //alert ('hello');
        var form = $('#manufacture_details_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.vehiclemanufacture.store') }}",
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
                        $('#addVehicleManufactureModal').modal("hide");
				        window.location.href="{{ route('admin.vehiclemanufacture.index') }}";
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
                    $('#vehicleManufactureName_error').html(err.vehicleManufactureName)                   
                    if (err.vehicleManufactureName) {
                        toastr.error(vehicleManufactureName);
                    }		
                }
                console.log(error)
            }
        })
    });
	
	$('#manufacture_details_form :input').click(function() {
        $('#vehicleManufactureName_error').html('')        
    })
	
	$('body').on('click','#edit_manufacture_details',function()
	{
	var id=$(this).attr('rel');
    $.ajax({
    url: "{{ route('admin.get_manufacture_details') }}",
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
        $('#show_manufacture_details').html(data);
        $('#edit_manufacture_Modal').modal('show');			
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	});
	
		$('body').on('click','#EditManufactureButton',function() 
		{
	            //alert ('hello');
        	    var providerId = $('#manufacture_edit_id').val();
                var form = $('#manufacture_edit_form')[0];
                var data = new FormData(form);
				data.append('id',providerId)
				var url= "{{ route('admin.edit_manufacture_details') }}";
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
                        $('#edit_manufacture_Modal').modal("hide");
				        window.location.href="{{ route('admin.vehiclemanufacture.index') }}";
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
                    $('#vehicleManufactureName_error').html(err.vehicleManufactureName)                   
                    if (err.vehicleManufactureName) {
                        toastr.error(vehicleManufactureName);
                    }						
                }
                console.log(error)
            }
        })
    });
	
	$('#manufacture_edit_form :input').click(function() {
        $('#vehicleManufactureName_error').html('')
    })
	
	$('body').on('click','#delete_manufacture_details',function()
	{
	$(this).attr('rel');
	$('#deletemanufactureId').val($(this).attr('rel'));
	$('#deleteManufactureModal').modal('show');	
	});
	
	 $('body').on('click','#delete_manufacture_button',function() {
             var delManufactureID= $('#deletemanufactureId').val();
            $.ajax({
                url: "{{ route('admin.delete_manufacture_details') }}",
                type: "post",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: delManufactureID,
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
                        $('#deleteManufactureModal').modal('hide');
                        window.location.href="{{ route('admin.vehiclemanufacture.index') }}";
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            })
        });
</script>