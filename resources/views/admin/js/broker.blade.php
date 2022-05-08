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
				window.location.href="{{ route('admin.broker.index') }}";
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
                    $('#brokerType_error').html(err.brokerType)
                    $('#brokerCommision_error').html(err.brokerCommision)
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
					if (err.brokerType) {
                        toastr.error(err.brokerType);
                    }
					if (err.brokerCommision) {
                        toastr.error(err.brokerCommision);
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
        $('#brokerType_error').html('')
        $('#brokerCommision_error').html('')
    })
	
	$('body').on('click','#broker_view',function()
	{
	var id=$(this).attr('rel');
    $.ajax({
    url: "{{ route('admin.get_broker_details') }}",
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
        $('#show_details').html(data);
        $('#viewBrokerModal').modal('show');		
		//alert("Pass")	
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	});
	
	$('body').on('click','#edit_broker_details',function()
	{
		//$('#viewBrokerModal').modal('show');
	var id=$(this).attr('rel');
    $.ajax({
    url: "{{ route('admin.edit_broker_details') }}",
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
        $('#show_edit_details').html(data);
        $('#edit_Broker_Modal').modal('show');		
		//alert("Pass")	
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	});
	
		$('body').on('click','#brokeredit_button',function() 
		{
	            //alert ('hello');
        	    var brokerId = $('#broker_edit_id').val();
                var form = $('#broker_edit_form')[0];
                var data = new FormData(form);
				data.append('id',brokerId)
				var url= "{{ route('admin.update_broker_details') }}";
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
				
                $('#broker_edit_form').trigger("reset");
                $('#user_loder').hide()
				window.location.href="{{ route('admin.broker.index') }}";
            },
            error: function(error) 
			{
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
                    $('#brokerType_error').html(err.brokerType)
                    $('#brokerCommision_error').html(err.brokerCommision)
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
					if (err.brokerType) {
                        toastr.error(err.brokerType);
                    }
					if (err.brokerCommision) {
                        toastr.error(err.brokerCommision);
                    }
                }
                console.log(error)
            }
        })
    });
	
	$('#broker_edit_form :input').click(function() {
        $('#first_name_error').html('')
        $('#last_name_error').html('')
        $('#address_error').html('')
        $('#city_error').html('')
        $('#country_error').html('')
        $('#landline_number_error').html('')
        $('#mobile_number_error').html('')
        $('#email_address_error').html('')
        $('#brokerType_error').html('')
        $('#brokerCommision_error').html('')
    })
	
	$('body').on('click','#delete_broker_details',function()
	{
	$(this).attr('rel');
	$('#deleteID').val($(this).attr('rel'));
	$('#deleteBrokerModal').modal('show');	
	});
	
	 $('body').on('click','#deleteBrokerButton',function() {
             var delID= $('#deleteID').val();
			 //alert(delID)
            $.ajax({
                url: "{{ route('admin.delete_broker_details') }}",
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
                        $('#deleteBrokerModal').modal('hide');
                        window.location.href="{{ route('admin.broker.index') }}";
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            })
        });
</script>