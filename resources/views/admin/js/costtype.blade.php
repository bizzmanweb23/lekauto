 <script>
 $('#saveCostTypeButton').click(function() {
	   //alert ('hello');
        var form = $('#costtype_details_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.costtype.store') }}",
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
                        $('#addCostTypeModal').modal("hide");
				        window.location.href="{{ route('admin.costtype.index') }}";
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
                    $('#costType_error').html(err.costType)                   
                    if (err.costType) {
                        toastr.error(costType);
                    }		
                }
                console.log(error)
            }
        })
    });
	
	$('#costtype_details_form :input').click(function() {
        $('#costType_error').html('')        
    })
	
	$('body').on('click','#edit_costtype_details',function()
	{
	var id=$(this).attr('rel');
    $.ajax({
    url: "{{ route('admin.get_costtype_details') }}",
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
        $('#costtype_edit_form').html(data);
        $('#edit_costtype_Modal').modal('show');			
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	});
	
		$('body').on('click','#EditCostTypeButton',function() 
		{
	            //alert ('hello');
        	    var costtypeId = $('#costtype_edit_id').val();
                var form = $('#costtype_edit_form')[0];
                var data = new FormData(form);
				data.append('id',costtypeId)
				var url= "{{ route('admin.edit_costtype_details') }}";
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
                        $('#edit_costtype_Modal').modal("hide");
				        window.location.href="{{ route('admin.costtype.index') }}";
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
                    $('#costType_error').html(err.costType)                   
                    if (err.costType) {
                        toastr.error(costType);
                    }						
                }
                console.log(error)
            }
        })
    });
	
	$('#costtype_edit_form :input').click(function() {
        $('#costType_error').html('')
    })
	
	$('body').on('click','#delete_costtype_details',function()
	{
	$(this).attr('rel');
	$('#deleteCosttypeId').val($(this).attr('rel'));
	$('#deleteCostTypeModal').modal('show');	
	});
	
	 $('body').on('click','#delete_costtype_button',function() {
             var delCostTypeID= $('#deleteCosttypeId').val();
            $.ajax({
                url: "{{ route('admin.delete_costtype_details') }}",
                type: "post",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: delCostTypeID,
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
                        $('#deleteCostTypeModal').modal('hide');
                        window.location.href="{{ route('admin.costtype.index') }}";
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            })
        });
</script>