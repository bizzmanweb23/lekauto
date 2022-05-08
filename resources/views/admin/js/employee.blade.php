 <script>
 $('#saveEmployee').click(function() {
	   //alert ('hello');
        var form = $('#user_details_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.user.store') }}",
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
                        $('#addEmployeeModal').modal('hide');
                        window.location.href="{{ route('admin.user.index') }}";
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
                    $('#emp_name_error').html(err.emp_name)
                    $('#job_position_error').html(err.job_position)
                    $('#emp_image_error').html(err.emp_image)
                    $('#country_code_m_error').html(err.country_code_m)
                    $('#work_mobile_error').html(err.work_mobile)
                    $('#department_error').html(err.department)
                    $('#country_code_p_error').html(err.country_code_p)
                    $('#work_phone_error').html(err.work_phone)
                    $('#work_email_error').html(err.work_email)
                    $('#contact_address_error').html(err.contact_address)
                    $('#country_error').html(err.country)
                    $('#contact_email_error').html(err.contact_email)
                    $('#identification_no_error').html(err.identification_no)
                    $('#country_code_cp_error').html(err.country_code_cp)
                    $('#contact_phone_error').html(err.contact_phone)
                    $('#passport_no_error').html(err.passport_no)
                    $('#bank_accnt_no_error').html(err.bank_accnt_no)
                    $('#gender_error').html(err.gender)
                    $('#home_work_distance_error').html(err.home_work_distance)
                    $('#dob_error').html(err.dob)
                    $('#place_of_birth_error').html(err.place_of_birth)
                    $('#country_of_birth_error').html(err.country_of_birth)
                    $('#marital_status_error').html(err.marital_status)
                    $('#other_id_name_error').html(err.other_id_name)
                    $('#other_id_no_error').html(err.other_id_no)
                    $('#edu_certificate_level_error').html(err.edu_certificate_level)
                    $('#field_of_study_error').html(err.field_of_study)
                    $('#school_error').html(err.school)
                    $('#website_error').html(err.website)
                    if (err.emp_name) {
                        toastr.error(err.emp_name);
                    }
					if (err.job_position) {
                        toastr.error(err.job_position);
                    }
					if (err.emp_image) {
                        toastr.error(err.emp_image);
                    }
					if (err.country_code_m) {
                        toastr.error(err.country_code_m);
                    }
					if (err.work_mobile) {
                        toastr.error(err.work_mobile);
                    }
					if (err.department) {
                        toastr.error(err.department);
                    }
					if (err.country_code_p) {
                        toastr.error(err.country_code_p);
                    }
					if (err.work_phone) {
                        toastr.error(err.work_phone);
                    }
					if (err.work_email) {
                        toastr.error(err.work_email);
                    }
					if (err.contact_address) {
                        toastr.error(err.contact_address);
                    }
					if (err.country) {
                        toastr.error(err.country);
                    }
					if (err.contact_email) {
                        toastr.error(err.contact_email);
                    }
					if (err.identification_no) {
                        toastr.error(err.identification_no);
                    }
					if (err.country_code_cp) {
                        toastr.error(err.country_code_cp);
                    }
					if (err.contact_phone) {
                        toastr.error(err.contact_phone);
                    }
					if (err.passport_no) {
                        toastr.error(err.passport_no);
                    }
					if (err.bank_accnt_no) {
                        toastr.error(err.bank_accnt_no);
                    }
					if (err.gender) {
                        toastr.error(err.gender);
                    }
					if (err.home_work_distance) {
                        toastr.error(err.home_work_distance);
                    }
                    if (err.dob) {
                        toastr.error(err.dob);
                    }
                    if (err.place_of_birth) {
                        toastr.error(err.place_of_birth);
                    }
                    if (err.country_of_birth) {
                        toastr.error(err.country_of_birth);
                    }
                    if (err.marital_status) {
                        toastr.error(err.marital_status);
                    }
                    if (err.other_id_name) {
                        toastr.error(err.other_id_name);
                    }
                    if (err.other_id_no) {
                        toastr.error(err.other_id_no);
                    }
                    if (err.edu_certificate_level) {
                        toastr.error(err.edu_certificate_level);
                    }
                    if (err.field_of_study) {
                        toastr.error(err.field_of_study);
                    }
                    if (err.school) {
                        toastr.error(err.school);
                    }
					if (err.website) {
                        toastr.error(err.website);
                    }

                }
                console.log(error)
            }
        })
    });
	
	$('#user_details_form :input').click(function() {
        $('#emp_name_error').html('')
        $('#job_position_error').html('')
        $('#emp_image_error').html('')
        $('#country_code_m_error').html('')
        $('#work_mobile_error').html('')
        $('#department_error').html('')
        $('#country_code_p_error').html('')
        $('#work_phone_error').html('')
        $('#work_email_error').html('')
        $('#contact_address_error').html('')
        $('#country_error').html('')
        $('#contact_email_error').html('')
        $('#identification_no_error').html('')
        $('#bank_accnt_no_error').html('')
        $('#gender_error').html('')
        $('#home_work_distance_error').html('')
        $('#dob_error').html('')
        $('#place_of_birth_error').html('')
        $('#country_of_birth_error').html('')
        $('#marital_status_error').html('')
        $('#other_id_name_error').html('')
        $('#other_id_no_error').html('')
        $('#edu_certificate_level_error').html('')
        $('#field_of_study_error').html('')
        $('#school_error').html('')
        $('#website_error').html('')
    })
	
	$('body').on('click','#employee_view',function()
	{
	var id=$(this).attr('rel');
    $.ajax({
    url: "{{ route('admin.get_employee_details') }}",
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
        $('#viewEmployeeModal').modal('show');		
		//alert("Pass")	
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	});
	
	$('body').on('click','#edit_Employee_details',function()
	{
		//$('#viewBrokerModal').modal('show');
	var id=$(this).attr('rel');
    $.ajax({
    url: "{{ route('admin.edit_employee_details') }}",
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
        $('#edit_Employee_Modal').modal('show');		
		//alert("Pass")	
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	});
	
		
</script>