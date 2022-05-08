 <script>
 $('#saveTypeButton').click(function() {
	   //alert ('hello');
        var form = $('#type_details_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.insurancetype.store') }}",
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
                        $('#addInsuranceTypeModal').modal("hide");
				        window.location.href="{{ route('admin.insurancetype.index') }}";
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
                    $('#insuranceType_error').html(err.insuranceType)                   
                    if (err.insuranceType) {
                        toastr.error(insuranceType);
                    }		
                }
                console.log(error)
            }
        })
    });
	
	$('#type_details_form :input').click(function() {
        $('#insuranceType_error').html('')        
    })
	
	$('body').on('click','#edit_type_details',function()
	{
	var id=$(this).attr('rel');
    $.ajax({
    url: "{{ route('admin.get_type_details') }}",
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
        $('#type_edit_form').html(data);
        $('#edit_type_Modal').modal('show');			
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	});
	
		$('body').on('click','#EditTypeButton',function() 
		{
	            //alert ('hello');
        	    var typeId = $('#type_edit_id').val();
                var form = $('#type_edit_form')[0];
                var data = new FormData(form);
				data.append('id',typeId)
				var url= "{{ route('admin.edit_type_details') }}";
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
                        $('#edit_type_Modal').modal("hide");
				        window.location.href="{{ route('admin.insurancetype.index') }}";
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
                    $('#insuranceType_error').html(err.insuranceType)                   
                    if (err.insuranceType) {
                        toastr.error(insuranceType);
                    }						
                }
                console.log(error)
            }
        })
    });
	
	$('#type_edit_form :input').click(function() {
        $('#insuranceType_error').html('')
    })
	
	$('body').on('click','#delete_type_details',function()
	{
	$(this).attr('rel');
	$('#deletetypeId').val($(this).attr('rel'));
	$('#deleteTypeModal').modal('show');	
	});
	
	 $('body').on('click','#delete_type_button',function() {
             var delTypeID= $('#deletetypeId').val();
            $.ajax({
                url: "{{ route('admin.delete_type_details') }}",
                type: "post",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: delTypeID,
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
                        $('#deleteTypeModal').modal('hide');
                        window.location.href="{{ route('admin.insurancetype.index') }}";
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            })
        });
</script>