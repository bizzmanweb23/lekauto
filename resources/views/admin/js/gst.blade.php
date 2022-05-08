 <script>
 $('#gstdetails_button').click(function() {
	   //alert ('hello');
        var form = $('#gst_details_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.gst.store') }}",
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
				
                $('#gst_details_form').trigger("reset");
				window.location.href="{{ route('admin.gst.index') }}";
                $('#user_loder').hide()
            },
            error: function(error) {
                $('#user_loder').hide()
                var err = error.responseJSON.errors;
                if (error.status == 422) {
                    toastr.error("Error");
                    $('#gst_name_error').html(err.gst_name)
                    $('#gst_charges_error').html(err.gst_charges)                    
                    if (err.gst_name) {
                        toastr.error(gst_name);
                    }
					if (err.gst_charges) {
                        toastr.error(err.gst_charges);
                    }				
                }
                console.log(error)
            }
        })
    });
	
	$('#gst_details_form :input').click(function() {
        $('#gst_name_error').html('')
        $('#gst_charges_error').html('')        
    })
	
	$('body').on('click','#edit_gst_details',function()
	{
		//alert('hello');
		//$('#viewBrokerModal').modal('show');
	var id=$(this).attr('rel');
	//alert(id);
    $.ajax({
    url: "{{ route('admin.get_gst_details') }}",
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
		//alert("pass")
        $('#show_gst_details').html(data);
        $('#edit_gst_Modal').modal('show');		
		//alert("Pass")	
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	});
	
		$('body').on('click','#gstedit_button',function() 
		{
	            //alert ('hello');
        	    var gstId = $('#gst_edit_id').val();
                var form = $('#gst_edit_form')[0];
                var data = new FormData(form);
				data.append('id',gstId)
				var url= "{{ route('admin.edit_gst_details') }}";
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
                    toastr.success(data.message);
                }
				else{
					toastr.error();
				}
				
                $('#gst_edit_form').trigger("reset");
                $('#user_loder').hide()
				window.location.href="{{ route('admin.gst.index') }}";
            },
            error: function(error) 
			{
                $('#user_loder').hide()
				var err = error.responseJSON.errors;
				if (error.status == 422) {
                    toastr.error("Error");
                    $('#gst_name_error').html(err.gst_name)
                    $('#gst_charges_error').html(err.gst_charges)                   
                    if (err.gst_name) {
                        toastr.error(err.gst_name);
                    }
					if (err.gst_charges) {
                        toastr.error(err.gst_charges);
                    }					
                }
                console.log(error)
            }
        })
    });
	
	$('#gst_edit_form :input').click(function() {
        $('#gst_name_error').html('')
        $('#gst_charges_error').html('')
    })
	
		$('#gst_details_form :input').click(function() {
        $('#gst_name_error').html('')
        $('#gst_charges_error').html('')        
    })
	
	$('body').on('click','#delete_gst_details',function()
	{
	$(this).attr('rel');
	$('#deleteId').val($(this).attr('rel'));
	$('#deletegstModal').modal('show');	
	});
	
	 $('body').on('click','#delete_gst_button',function() {
             var delID= $('#deleteId').val();
            $.ajax({
                url: "{{ route('admin.delete_gst_details') }}",
                type: "post",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: delID,
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
                        $('#deletegstModal').modal('hide');
                        window.location.href="{{ route('admin.gst.index') }}";
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            })
        });
</script>