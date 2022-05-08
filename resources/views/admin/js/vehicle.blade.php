<script>
   <!-- vehicle form modal -->
   $('body').on('click','#saveVehicle_Details',function() {
	   //alert ('hello');
        var form = $('#vehicle_details_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.vehicledetails.store') }}",
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
                        $('#addVehicleModal').modal("hide");
				        window.location.href="{{ route('admin.vehicledetails.index') }}";
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
                    $('#vehicle_make_error').html(err.vehicle_make)
                    $('#vehicle_number_error').html(err.vehicle_number)
                    $('#ddlYears_error').html(err.ddlYears)
                    $('#body_type_error').html(err.body_type)
                    $('#price_list_make_error').html(err.price_list_make)
                    $('#chasis_number_error').html(err.chasis_number)
                    $('#engine_number_error').html(err.engine_number)
                    $('#original_reg_date_error').html(err.original_reg_date)
                    $('#inspection_expiry_error').html(err.inspection_expiry)
                    $('#coe_logcard_error').html(err.coe_logcard)
                    if (err.vehicle_make) {
                        toastr.error(err.vehicle_make);
                    }
					if (err.vehicle_number) {
                        toastr.error(err.vehicle_number);
                    }
					if (err.ddlYears) {
                        toastr.error(err.ddlYears);
                    }
					if (err.body_type) {
                        toastr.error(err.body_type);
                    }
					if (err.price_list_make) {
                        toastr.error(err.price_list_make);
                    }
					if (err.chasis_number) {
                        toastr.error(err.chasis_number);
                    }
					if (err.engine_number) {
                        toastr.error(err.engine_number);
                    }
					if (err.inspection_expiry) {
                        toastr.error(err.inspection_expiry);
                    }
					if (err.original_reg_date) {
                        toastr.error(err.original_reg_date);
                    }
					if (err.coe_logcard) {
                        toastr.error(err.coe_logcard);
                    }
                }
                console.log(error)
            }
        })
    });
	
	$('#vehicle_details_form :input').click(function() {
        $('#vehicle_make_error').html('')
        $('#vehicle_number_error').html('')
        $('#ddlYears_error').html('')
        $('#reg_road_tax_error').html('')
        $('#body_type_error').html('')
        $('#price_list_make_error').html('')
        $('#chasis_number_error').html('')
        $('#engine_number_error').html('')
        $('#original_reg_date_error').html('')
        $('#inspection_expiry_error').html('')
        $('#coe_logcard_error').html('')
    })
	
<!-- View Modal -->		
    $('body').on('click','.edit_vehicle_details',function(){ 
    var id = $(this).attr('rel');
	$('#Vehicle_Unique_id_Seller').val($(this).attr('rel'));
	$('#Vehicle_Unique_id_buyer').val($(this).attr('rel'));
	$('#miscellaneous_id').val($(this).attr('rel'));
	$('#repair_id').val($(this).attr('rel'));
	$('#cost_vehicle_id').val($(this).attr('rel'));
    $.ajax({
    url: "{{ route('admin.whole_vehicle_details') }}",
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
		$('#vehicle_data').hide();
        $('#showView').html(data);						
		//alert("Pass")			  
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
    })
    $('body').on('click','#vehicle_view',function()
    {			 
		var id = $(this).attr('rel');
        $.ajax({
                    url: "{{ route('admin.get_vehicle_details') }}",
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
						$('#vehicle_data').hide();
                        $('#showView').html(data);			
				    },
                    error: function() 
					{
                        $('#user_loder').hide();
                        alert("Fail")
                    }
            })
	})

	$('body').on('click','#addBuyerDetails',function()
	{    
		$('#addBuyerModal').modal('show');
		$('#saveBuyer').click(function() 
		{
			var buyerId = $('#Vehicle_Unique_id_buyer').val();
            var form = $('#buyer_details_form')[0];
            var data = new FormData(form);
		    data.append('id',buyerId)
		    var url= "{{ route('admin.save_buyer_details') }}";
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
                beforeSend: function() 
				{
                    $('#user_loder').show()
                },
                success: function(data) 
				{
                    if (data.status == 'success') 
					{
                        toastr.success(data.message);
                    }
				    else
					{
					    toastr.error();
				    }
				    $('#buyer_details_form').trigger("reset");
                    $('#user_loder').hide()
					window.location.href="{{ route('admin.vehicledetails.index') }}";
					//console.log(data);
                },
                error: function(error) 
				{
                    $('#user_loder').hide()
                    var err = error.responseJSON.errors;
                    if (error.status == 422) 
					{
                        toastr.error("Error");
                        $('#id_number_error').html(err.id_number)
                        $('#address_error').html(err.address)
                        $('#delivery_out_date_error').html(err.delivery_out_date)
                        $('#invoice_number_error').html(err.invoice_number)
                        $('#pl_date_error').html(err.pl_date)
                        $('#date_of_booking_error').html(err.date_of_booking)
                        $('#sell_code_error').html(err.sell_code)
                        $('#sale_agreement_number_error').html(err.sale_agreement_number)
                        $('#sale_agreement_price_error').html(err.sale_agreement_price)
                        $('#gst_error').html(err.gst)
                        $('#outside_sale_comm_error').html(err.outside_sale_comm)
                        $('#ets_paper_form_error').html(err.ets_paper_form)
                        $('#buy_over_date_error').html(err.buy_over_date)
                        $('#ets_purchase_price_error').html(err.ets_purchase_price)
                        $('#body_price_error').html(err.body_price)
                        $('#transfer_value_error').html(err.transfer_value)
                        $('#ets_pur_comm_error').html(err.ets_pur_comm)
                        $('#ets_out_comm_error').html(err.ets_out_comm)
                        $('#ets_paper_buyer_error').html(err.ets_paper_buyer)
                        $('#dereg_date_error').html(err.dereg_date)
                        $('#s_no_error').html(err.s_no)
                        $('#ap_receipt_error').html(err.ap_receipt)
                        $('#acc_desc_error').html(err.acc_desc)
                        $('#amount_error').html(err.amount)
                        $('#bank_error').html(err.bank)
                        $('#cheque_number_error').html(err.cheque_number)
                        $('#cheque_date_error').html(err.cheque_date)
                        $('#sell_to_error').html(err.sell_to)
                        $('#invoice_number_error').html(err.invoice_number)
                        $('#transaction_type_error').html(err.transaction_type)
                        $('#transaction_date_error').html(err.transaction_date)
                        if (err.id_number) 
						{
                            toastr.error(err.id_number);
                        }
					    if (err.address) 
						{
                            toastr.error(err.address);
                        }
					    if (err.delivery_out_date) 
						{
                            toastr.error(err.delivery_out_date);
                        }
					    if (err.invoice_number) 
						{
                            toastr.error(err.invoice_number);
                        }
					    if (err.pl_date) 
						{
                            toastr.error(err.pl_date);
                        }
					    if (err.date_of_booking) 
						{
                            toastr.error(err.date_of_booking);
                        }
					if (err.sell_code) {
                        toastr.error(err.sell_code);
                    }
					if (err.sale_agreement_number) {
                        toastr.error(err.sale_agreement_number);
                    }
					if (err.sale_agreement_price) {
                        toastr.error(err.sale_agreement_price);
                    }
					if (err.gst) {
                        toastr.error(err.gst);
                    }
					if (err.outside_sale_comm) {
                        toastr.error(err.outside_sale_comm);
                    }
					if (err.ets_paper_form) {
                        toastr.error(err.ets_paper_form);
                    }
					if (err.buy_over_date) {
                        toastr.error(err.buy_over_date);
                    }
					if (err.ets_purchase_price) {
                        toastr.error(err.ets_purchase_price);
                    }
					if (err.body_price) {
                        toastr.error(err.body_price);
                    }
					if (err.transfer_value) {
                        toastr.error(err.transfer_value);
                    }
					if (err.ets_pur_comm) {
                        toastr.error(err.ets_pur_comm);
                    }
					if (err.ets_out_comm) {
                        toastr.error(err.gender);
                    }
					if (err.ets_paper_buyer) {
                        toastr.error(err.ets_paper_buyer);
                    }
                    if (err.s_no) {
                        toastr.error(err.s_no);
                    }
                    if (err.ap_receipt) {
                        toastr.error(err.ap_receipt);
                    }
                    if (err.acc_desc) {
                        toastr.error(err.acc_desc);
                    }
                    if (err.amount) {
                        toastr.error(err.amount);
                    }
                    if (err.bank) {
                        toastr.error(err.bank);
                    }
                    if (err.cheque_number) {
                        toastr.error(err.cheque_number);
                    }
                    if (err.cheque_date) {
                        toastr.error(err.cheque_date);
                    }
                    if (err.sell_to) {
                        toastr.error(err.sell_to);
                    }
                    if (err.invoice_number) {
                        toastr.error(err.invoice_number);
                    }
					if (err.transaction_type) {
                        toastr.error(err.transaction_type);
                    }
					if (err.transaction_date) {
                        toastr.error(err.transaction_date);
                    }
                }
                console.log(error)
            }
        })
		return false;
    });
	
	$('#buyer_details_form :input').click(function() {
        $('#id_number_error').html('')
        $('#address_error').html('')
        $('#delivery_out_date_error').html('')
        $('#invoice_number_error').html('')
        $('#pl_date_error').html('')
        $('#date_of_booking_error').html('')
        $('#sell_code_error').html('')
        $('#sale_agreement_number_error').html('')
        $('#sale_agreement_price_error').html('')
        $('#gst_error').html('')
        $('#outside_sale_comm_error').html('')
        $('#ets_paper_form_error').html('')
        $('#buy_over_date_error').html('')
        $('#ets_purchase_price_error').html('')
        $('#body_price_error').html('')
        $('#transfer_value_error').html('')
        $('#ets_pur_comm_error').html('')
        $('#ets_out_comm_error').html('')
        $('#ets_paper_buyer_error').html('')
        $('#dereg_date_error').html('')
        $('#s_no_error').html('')
        $('#ap_receipt_error').html('')
        $('#acc_desc_error').html('')
        $('#amount_error').html('')
        $('#cheque_number_error').html('')
        $('#cheque_date_error').html('')
        $('#sell_to_error').html('')
        $('#invoice_number_error').html('')
        $('#transaction_type_error').html('')
        $('#transaction_date_error').html('')
    })
	});
	//$('#Vehicle_Unique_id_Seller').val($('#edit_vehicle_details').attr('rel'));
	$('body').on('click','#addSellerDetails',function()
	{
		$('#addSellerModal').modal('show');
		$('#save_Seller_details').click(function() {
        	var sellerId = $('#Vehicle_Unique_id_Seller').val();
			var form = $('#seller_details_form')[0];
            var data = new FormData(form);
		    data.append('id',sellerId)
			var url= "{{ route('admin.save_seller_details') }}";
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
                        $('#addSellerModal').modal("hide");
				        window.location.href="{{ route('admin.vehicledetails.index') }}";
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
                    $('#id_Number_error').html(err.id_number)
                    $('#address_error').html(err.address)
                    $('#purchase_date_error').html(err.purchase_date)
                    $('#estimate_delivery_date_error').html(err.estimate_delivery_date)
                    $('#date_of_delivery_error').html(err.date_of_delivery)
                    $('#seller_time_of_delivery_error').html(err.seller_time_of_delivery)
                    $('#purchase_price_error').html(err.purchase_price)
                    $('#seller_gst_error').html(err.seller_gst)
                    $('#total_purchase_price_error').html(err.total_purchase_price)
                    $('#outside_purchase_comm_error').html(err.outside_purchase_comm)
                    $('#agreement_number_error').html(err.agreement_number)
                    $('#note_error').html(err.note)
                    $('#s_no_error').html(err.s_no)
                    $('#ap_payment_error').html(err.ap_payment)
                    $('#acc_desc_error').html(err.acc_desc)
                    $('#amount_error').html(err.amount)
                    $('#bank_error').html(err.bank)
                    $('#cheque_number_error').html(err.cheque_number)
                    $('#cheque_date_error').html(err.cheque_date)
                    $('#to_from_error').html(err.to_from)
                    $('#remarks_error').html(err.remarks)
                    $('#transaction_type_error').html(err.transaction_type)
                    $('#transaction_date_error').html(err.transaction_date)
                    if (err.id_number) {
                        toastr.error(err.id_number);
                    }
					if (err.address) {
                        toastr.error(err.address);
                    }
					if (err.purchase_date) {
                        toastr.error(err.purchase_date);
                    }
					if (err.estimate_delivery_date) {
                        toastr.error(err.estimate_delivery_date);
                    }
					if (err.date_of_delivery) {
                        toastr.error(err.date_of_delivery);
                    }
					if (err.seller_time_of_delivery) {
                        toastr.error(err.seller_time_of_delivery);
                    }
					if (err.purchase_price) {
                        toastr.error(err.purchase_price);
                    }
					if (err.seller_gst) {
                        toastr.error(err.seller_gst);
                    }
					if (err.total_purchase_price) {
                        toastr.error(err.total_purchase_price);
                    }
					if (err.outside_purchase_comm) {
                        toastr.error(err.outside_purchase_comm);
                    }
					if (err.agreement_number) {
                        toastr.error(err.agreement_number);
                    }
					if (err.note) {
                        toastr.error(err.note);
                    }
					if (err.s_no) {
                        toastr.error(err.s_no);
                    }
					if (err.ap_payment) {
                        toastr.error(err.ap_payment);
                    }
					if (err.acc_desc) {
                        toastr.error(err.acc_desc);
                    }
					if (err.amount) {
                        toastr.error(err.amount);
                    }
					if (err.bank) {
                        toastr.error(err.bank);
                    }
					if (err.cheque_number) {
                        toastr.error(err.cheque_number);
                    }
					if (err.cheque_date) {
                        toastr.error(err.cheque_date);
                    }
					if (err.to_from) {
                        toastr.error(err.to_from);
                    }
                    if (err.remarks) {
                        toastr.error(err.remarks);
                    }
                    if (err.transaction_type) {
                        toastr.error(err.transaction_type);
                    }
                    if (err.transaction_date) {
                        toastr.error(err.transaction_date);
                    }
                }
                console.log(error)
            }
        })
    });
	
	$('#seller_details_form :input').click(function() {
        $('#id_number_error').html('')
        $('#address_error').html('')
        $('#purchase_date_error').html('')
        $('#estimate_delivery_date_error').html('')
        $('#date_of_delivery_error').html('')
        $('#seller_time_of_delivery_error').html('')
        $('#purchase_price_error').html('')
        $('#seller_gst_error').html('')
        $('#total_purchase_price_error').html('')
        $('#outside_purchase_comm_error').html('')
        $('#agreement_number_error').html('')
        $('#note_error').html('')
        $('#s_no_error').html('')
        $('#ap_payment_error').html('')
        $('#acc_desc_error').html('')
        $('#amount_error').html('')
        $('#cheque_number_error').html('')
        $('#bank_error').html('')
        $('#cheque_date_error').html('')
        $('#to_from_error').html('')
        $('#remarks_error').html('')
        $('#transaction_type_error').html('')
        $('#transaction_date_error').html('')
    })
	});
	
	$('body').on('click','.getVehicleDetailsRepair',function()
	{
	var id=$(this).attr('rel');
    //alert(id)
	$.ajax({
    url: "{{ route('admin.get_repair_details') }}",
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
        $('#showVehicleDetails').html(data);
        $('#addRepairModal').modal('show');		
		//alert("Pass")	
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	});
	
	//$('body').on('click','#addRepairDetails',function()
	
		//$('#addRepairModal').modal('show');
		$('body').on('click','#save_repair_details',function() 
		{
	         //alert ('hello');
        	    var repairId = $('#repair_id').val();
                var form = $('#repair_details_form')[0];
                var data = new FormData(form);
				data.append('id',repairId)
				var url= "{{ route('admin.save_repair_details') }}";
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
                        $('#addRepairModal').modal("hide");
				        window.location.href="{{ route('admin.vehicledetails.index') }}";
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
    
	$('#repair_details_form :input').click(function() {
        $('#vehicle_name_error').html('')
        $('#vehicle_registration_number_error').html('')
        $('#vendor_name_error').html('')
        $('#repair_cost_error').html('')
    })
	});
	
	
	$('body').on('click','.vehicleDetailsMiscellenous',function()
	{
	var Miscelenousid=$(this).attr('rel');
    //alert(Miscelenousid)
	$.ajax({
    url: "{{ route('admin.get_miscellenous_details') }}",
    type: "get",
    data: 
	{
        "_token": "{{ csrf_token() }}",
         id: Miscelenousid
    },
    dataType: "html",
    beforeSend: function() 
	{
        $('#user_loder').show()
    },
    success: function(data) 
	{
        $('#user_loder').hide();
        $('#Miscel').html(data);
        $('#addMiscellaneousModal').modal('show');		
		//alert("Pass")	
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	});
	
	$('body').on('click','#addMiscellaneousDetails',function()
	{
		$('#addMiscellaneousModal').modal('show');
		$('#save_miscellaneous_details').click(function() 
		{
	         //alert ('hello');
        	    var miscellaneousId = $('#miscellaneous_id').val();
                var form = $('#miscellaneous_details_form')[0];
                var data = new FormData(form);
				data.append('id',miscellaneousId)
				var url= "{{ route('admin.save_miscellaneous_details') }}";
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
				
                $('#miscellaneous_details_form').trigger("reset");
                $('#user_loder').hide()
				window.location.href="{{ route('admin.vehicledetails.index') }}";
            },
            error: function(error) 
			{
                $('#user_loder').hide()
				var err = error.responseJSON.errors;
                if (error.status == 422) {
                    toastr.error("Error");
                    $('#vehicleName_error').html(err.vehicleName)
                    $('#vehicleRegistrationNumber_error').html(err.vehicleRegistrationNumber)
                    $('#vendorName_error').html(err.vendorName)
                    $('#description_error').html(err.description)
                    $('#amount_spent_error').html(err.amount_spent)
                    $('#gst_charges_error').html(err.gst_charges)
                    $('#total_amount_error').html(err.total_amount)
                    if (err.vehicleName) {
                        toastr.error(err.vehicleName);
                    }
					if (err.vehicleRegistrationNumber) {
                        toastr.error(err.vehicleRegistrationNumber);
                    }
					if (err.vendorName) {
                        toastr.error(err.vendorName);
                    }
					if (err.description) {
                        toastr.error(err.description);
                    }
					if (err.amount_spent) {
                        toastr.error(err.amount_spent);
                    }
					if (err.gst_charges) {
                        toastr.error(err.gst_charges);
                    }
					if (err.total_amount) {
                        toastr.error(err.total_amount);
                    }
                }
                console.log(error)
            }
        })
    });
	$('#miscellaneous_details_form :input').click(function() {
        $('#vehicleName_error').html('')
        $('#vehicleRegistrationNumber_error').html('')
        $('#vendorName_error').html('')
        $('#description_error').html('')
        $('#amount_spent_error').html('')
        $('#gst_charges_error').html('')
        $('#total_amount_error').html('')
    })
	});
	
	$('body').on('click','#addCostDetails',function()
	{
		$('#addCostModal').modal('show');
		$('#save_cost_details').click(function() 
		{
	         //alert ('hello');
        	    var costId = $('#cost_vehicle_id').val();
                var form = $('#cost_details_form')[0];
                var data = new FormData(form);
				data.append('id',costId)
				var url= "{{ route('admin.save_cost_details') }}";
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
				
                $('#cost_details_form').trigger("reset");
                $('#user_loder').hide()
				window.location.href="{{ route('admin.vehicledetails.index') }}";
            },
            error: function(error) 
			{
                $('#user_loder').hide()
				var err = error.responseJSON.errors;
                if (error.status == 422) {
                    toastr.error("Error");
                    $('#vehicleNameCost_error').html(err.vehicleNameCost)
                    $('#vehicleRegistrationNumberCost_error').html(err.vehicleRegistrationNumberCost)
                    $('#vendorNameCost_error').html(err.vendorNameCost)
                    $('#cost_description_error').html(err.description)                    
                    $('#totalAmount_error').html(err.totalAmount)
                    $('#transaction_type_error').html(err.transaction_type)
                    $('#floor_interest_error').html(err.floor_interest)
                    if (err.vehicleNameCost) {
                        toastr.error(err.vehicleNameCost);
                    }
					if (err.vehicleRegistrationNumberCost) {
                        toastr.error(err.vehicleRegistrationNumberCost);
                    }
					if (err.vendorNameCost) {
                        toastr.error(err.vendorNameCost);
                    }
					if (err.cost_description) {
                        toastr.error(err.cost_description);
                    }					
					if (err.totalAmount) {
                        toastr.error(err.totalAmount);
                    }
					if (err.transaction_type) {
                        toastr.error(err.transaction_type);
                    }
					if (err.floor_interest) {
                        toastr.error(err.floor_interest);
                    }					
                }
                console.log(error)
            }
        })
    });
	$('#cost_details_form :input').click(function() {
        $('#vehicleNameCost_error').html('')
        $('#vehicleRegistrationNumberCost_error').html('')
        $('#vendorNameCost_error').html('')
        $('#cost_description_error').html('')        
        $('#transaction_type_error').html('')
        $('#totalAmount_error').html('')
        $('#floor_interest_error').html('')
    })
	});
<!-- end drop down -->

<!-- Start Seller -->
 
/*$('body').on('click','#seller_details_modal',function(){
	$('#EditSellerModal').modal('show');
	var sellerEditId=$('#SellerVehicleId').val();
})

$('body').on('click','#addSellerDetails',function(){
	$('#EditSellerModal').modal('hide');
	$('#addSellerModal').modal('show');
})
<!-- End Seller -->
<!-- Start Buyer -->
$('body').on('click','#buyer_details_modal',function(){
	$('#EditBuyerModal').modal('show');
	var  buyerEditId=$('#buyerVehicleId').val();
})
<!-- End Buyer -->
<!-- Start Repair -->
$('body').on('click','#repair_details_modal',function(){
	$('#EditRepairModal').modal('show');
	var repairEditId=$('#repairVehicleId').val();
})

$('body').on('click','#miscellaneous_Vehicle_Details',function(){
	$('#EditMiscellaneousModal').modal('show');
	var repairEditId=$('#repairVehicleId').val();
})

$('body').on('click','#addMiscellaneousDetails',function(){
	$('#EditMiscellaneousModal').modal('hide');
	$('#addMiscellaneousModal').modal('show');
	})
	
$('body').on('click','#cost_Vehicle_Details',function(){
	$('#EditCostModal').modal('show');
	var repairEditId=$('#repairVehicleId').val();
})

$('body').on('click','#insurance_Vehicle_Details',function(){
	$('#EditInsuranceModal').modal('show');
	var repairEditId=$('#repairVehicleId').val();
})


$('body').on('click','#addRepairDetails',function(){
	$('#EditRepairModal').modal('hide');
	$('#addRepairModal').modal('show');
	
})*/
<!-- End Repair -->

    //$('#edit_Vehicle_id').val($(this).attr('rel'));
	$('body').on('click','#edit_Vehicle_Details',function()
	{
		//alert("Hello")
		 editId = $('#edit_Vehicle_id').val();
		 editRepId=$('#repairEditID').val();
		     //alert(editRepId)
			 var form = $('#edit_vehicle_details_form')[0];
                var data = new FormData(form);
				data.append('id',editId)
				var url= "{{ route('admin.edit_vehicle_details') }}";
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
            success: function(data) 
			{
                if (data.status == 'success') 
				{
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
                        $('#edit_vehicle_details_form').trigger("reset");
                        $('#user_loder').hide()
			            window.location.href="{{ route('admin.vehicledetails.index') }}";
                }
				else
				{
					toastr.error();
				}					//console.log(data);
            },
            error: function(error) 
			{
                $('#user_loder').hide()
				var err = error.responseJSON.errors;
                if (error.status == 422) {
                    toastr.error("Error");
                    $('#id_Number_error').html(err.id_number)
                    $('#address_error').html(err.address)
                    $('#purchase_date_error').html(err.purchase_date)
                    $('#estimate_delivery_date_error').html(err.estimate_delivery_date)
                    $('#date_of_delivery_error').html(err.date_of_delivery)
                    $('#purchase_price_error').html(err.purchase_price)
                    $('#seller_gst_error').html(err.seller_gst)
                    $('#total_purchase_price_error').html(err.total_purchase_price)
                    $('#outside_purchase_comm_error').html(err.outside_purchase_comm)
                    $('#agreement_number_error').html(err.agreement_number)
                    $('#note_error').html(err.note)
                    $('#s_no_error').html(err.s_no)
                    $('#ap_payment_error').html(err.ap_payment)
                    $('#acc_desc_error').html(err.acc_desc)
                    $('#amount_error').html(err.amount)
                    $('#bank_error').html(err.bank)
                    $('#cheque_number_error').html(err.cheque_number)
                    $('#cheque_date_error').html(err.cheque_date)
                    $('#to_from_error').html(err.to_from)
                    $('#remarks_error').html(err.remarks)
                    $('#transaction_type_error').html(err.transaction_type)
                    $('#transaction_date_error').html(err.transaction_date)
					$('#id_number_error').html(err.id_number)
                    $('#address_error').html(err.address)
                        $('#delivery_out_date_error').html(err.delivery_out_date)
                        $('#invoice_number_error').html(err.invoice_number)
                        $('#pl_date_error').html(err.pl_date)
                        $('#date_of_booking_error').html(err.date_of_booking)
                        $('#sell_code_error').html(err.sell_code)
                        $('#sale_agreement_number_error').html(err.sale_agreement_number)
                        $('#sale_agreement_price_error').html(err.sale_agreement_price)
                        $('#gst_error').html(err.gst)
                        $('#outside_sale_comm_error').html(err.outside_sale_comm)
                        $('#ets_paper_form_error').html(err.ets_paper_form)
                        $('#buy_over_date_error').html(err.buy_over_date)
                        $('#ets_purchase_price_error').html(err.ets_purchase_price)
                        $('#body_price_error').html(err.body_price)
                        $('#transfer_value_error').html(err.transfer_value)
                        $('#ets_pur_comm_error').html(err.ets_pur_comm)
                        $('#ets_out_comm_error').html(err.ets_out_comm)
                        $('#ets_paper_buyer_error').html(err.ets_paper_buyer)
                        $('#dereg_date_error').html(err.dereg_date)
                        $('#s_no_error').html(err.s_no)
                        $('#ap_receipt_error').html(err.ap_receipt)
                        $('#acc_desc_error').html(err.acc_desc)
                        $('#amount_error').html(err.amount)
                        $('#bank_error').html(err.bank)
                        $('#cheque_number_error').html(err.cheque_number)
                        $('#cheque_date_error').html(err.cheque_date)
                        $('#sell_to_error').html(err.sell_to)
                        $('#invoice_number_error').html(err.invoice_number)
                        $('#transaction_type_error').html(err.transaction_type)
                        $('#transaction_date_error').html(err.transaction_date)
						$('#vehicle_number_error').html(err.vehicle_number)
                    $('#previous_vehicle_no_error').html(err.previous_vehicle_no)
                    $('#name_model_error').html(err.name_model)
                    $('#reg_road_tax_error').html(err.reg_road_tax)
                    $('#body_type_error').html(err.body_type)
                    $('#engine_no_error').html(err.engine_no)
                    $('#chassis_no_error').html(err.chassis_no)
                    $('#propellant_error').html(err.propellant)
                    $('#original_reg_date_error').html(err.original_reg_date)
                    $('#colour_error').html(err.colour)
                    $('#number_of_owner_error').html(err.number_of_owner)
                    $('#coe_logcard_error').html(err.coe_logcard)
                    $('#coe_pqp_error').html(err.coe_pqp)
                    $('#reg_fee_error').html(err.reg_fee)
                    $('#arf_amount_error').html(err.arf_amount)
                    $('#omv_error').html(err.omv)
                    $('#cves_rebate_error').html(err.cves_rebate)
                    $('#ets_paper_from_error').html(err.ets_paper_from)
                    $('#use_tcoe_error').html(err.use_tcoe)
					$('#vehicle_name_error').html(err.vehicle_name)
                    $('#vehicle_registration_number_error').html(err.vehicle_registration_number)
                    $('#vendor_name_error').html(err.vendor_name)
                    $('#repair_cost_error').html(err.repair_cost)
					$('#vehicleName_error').html(err.vehicleName)
                    $('#vehicleRegistrationNumber_error').html(err.vehicleRegistrationNumber)
                    $('#vendorName_error').html(err.vendorName)
                    $('#description_error').html(err.description)
                    $('#amount_spent_error').html(err.amount_spent)
                    $('#gst_charges_error').html(err.gst_charges)
                    $('#total_amount_error').html(err.total_amount)
					$('#vehicleNameCost_error').html(err.vehicleNameCost)
                    $('#vehicleRegistrationNumberCost_error').html(err.vehicleRegistrationNumberCost)
                    $('#vendorNameCost_error').html(err.vendorNameCost)
                    $('#cost_description_error').html(err.description)                    
                    $('#totalAmount_error').html(err.totalAmount)
                    $('#transaction_type_error').html(err.transaction_type)
                    if (err.vehicleName) {
                        toastr.error(err.vehicleName);
                    }
					if (err.vehicleRegistrationNumber) {
                        toastr.error(err.vehicleRegistrationNumber);
                    }
					if (err.vendorName) {
                        toastr.error(err.vendorName);
                    }
					if (err.description) {
                        toastr.error(err.description);
                    }
					if (err.amount_spent) {
                        toastr.error(err.amount_spent);
                    }
					if (err.gst_charges) {
                        toastr.error(err.gst_charges);
                    }
					if (err.total_amount) {
                        toastr.error(err.total_amount);
                    }
                    if (err.id_number) {
                        toastr.error(err.id_number);
                    }
					if (err.address) {
                        toastr.error(err.address);
                    }
					if (err.purchase_date) {
                        toastr.error(err.purchase_date);
                    }
					if (err.estimate_delivery_date) {
                        toastr.error(err.estimate_delivery_date);
                    }
					if (err.date_of_delivery) {
                        toastr.error(err.date_of_delivery);
                    }
					if (err.purchase_price) {
                        toastr.error(err.purchase_price);
                    }
					if (err.seller_gst) {
                        toastr.error(err.seller_gst);
                    }
					if (err.total_purchase_price) {
                        toastr.error(err.total_purchase_price);
                    }
					if (err.outside_purchase_comm) {
                        toastr.error(err.outside_purchase_comm);
                    }
					if (err.agreement_number) {
                        toastr.error(err.agreement_number);
                    }
					if (err.note) {
                        toastr.error(err.note);
                    }
					if (err.s_no) {
                        toastr.error(err.s_no);
                    }
					if (err.ap_payment) {
                        toastr.error(err.ap_payment);
                    }
					if (err.acc_desc) {
                        toastr.error(err.acc_desc);
                    }
					if (err.amount) {
                        toastr.error(err.amount);
                    }
					if (err.bank) {
                        toastr.error(err.bank);
                    }
					if (err.cheque_number) {
                        toastr.error(err.cheque_number);
                    }
					if (err.cheque_date) {
                        toastr.error(err.cheque_date);
                    }
					if (err.to_from) {
                        toastr.error(err.to_from);
                    }
                    if (err.remarks) {
                        toastr.error(err.remarks);
                    }
                    if (err.transaction_type) {
                        toastr.error(err.transaction_type);
                    }
                    if (err.transaction_date) {
                        toastr.error(err.transaction_date);
                    }
					if (err.id_number) 
						{
                            toastr.error(err.id_number);
                        }
					    if (err.address) 
						{
                            toastr.error(err.address);
                        }
					    if (err.delivery_out_date) 
						{
                            toastr.error(err.delivery_out_date);
                        }
					    if (err.invoice_number) 
						{
                            toastr.error(err.invoice_number);
                        }
					    if (err.pl_date) 
						{
                            toastr.error(err.pl_date);
                        }
					    if (err.date_of_booking) 
						{
                            toastr.error(err.date_of_booking);
                        }
					if (err.sell_code) {
                        toastr.error(err.sell_code);
                    }
					if (err.sale_agreement_number) {
                        toastr.error(err.sale_agreement_number);
                    }
					if (err.sale_agreement_price) {
                        toastr.error(err.sale_agreement_price);
                    }
					if (err.gst) {
                        toastr.error(err.gst);
                    }
					if (err.outside_sale_comm) {
                        toastr.error(err.outside_sale_comm);
                    }
					if (err.ets_paper_form) {
                        toastr.error(err.ets_paper_form);
                    }
					if (err.buy_over_date) {
                        toastr.error(err.buy_over_date);
                    }
					if (err.ets_purchase_price) {
                        toastr.error(err.ets_purchase_price);
                    }
					if (err.body_price) {
                        toastr.error(err.body_price);
                    }
					if (err.transfer_value) {
                        toastr.error(err.transfer_value);
                    }
					if (err.ets_pur_comm) {
                        toastr.error(err.ets_pur_comm);
                    }
					if (err.ets_out_comm) {
                        toastr.error(err.gender);
                    }
					if (err.ets_paper_buyer) {
                        toastr.error(err.ets_paper_buyer);
                    }
                    if (err.s_no) {
                        toastr.error(err.s_no);
                    }
                    if (err.ap_receipt) {
                        toastr.error(err.ap_receipt);
                    }
                    if (err.acc_desc) {
                        toastr.error(err.acc_desc);
                    }
                    if (err.amount) {
                        toastr.error(err.amount);
                    }
                    if (err.bank) {
                        toastr.error(err.bank);
                    }
                    if (err.cheque_number) {
                        toastr.error(err.cheque_number);
                    }
                    if (err.cheque_date) {
                        toastr.error(err.cheque_date);
                    }
                    if (err.sell_to) {
                        toastr.error(err.sell_to);
                    }
                    if (err.invoice_number) {
                        toastr.error(err.invoice_number);
                    }
					if (err.transaction_type) {
                        toastr.error(err.transaction_type);
                    }
					if (err.transaction_date) {
                        toastr.error(err.transaction_date);
                    }
					if (err.vehicle_number) {
                        toastr.error(err.vehicle_number);
                    }
					if (err.previous_vehicle_no) {
                        toastr.error(err.previous_vehicle_no);
                    }
					if (err.name_model) {
                        toastr.error(err.name_model);
                    }
					if (err.reg_road_tax) {
                        toastr.error(err.reg_road_tax);
                    }
					if (err.body_type) {
                        toastr.error(err.body_type);
                    }
					if (err.chassis_no) {
                        toastr.error(err.chassis_no);
                    }
					if (err.engine_no) {
                        toastr.error(err.engine_no);
                    }
					if (err.propellant) {
                        toastr.error(err.propellant);
                    }
					if (err.original_reg_date) {
                        toastr.error(err.original_reg_date);
                    }
					if (err.colour) {
                        toastr.error(err.colour);
                    }
					if (err.number_of_owner) {
                        toastr.error(err.number_of_owner);
                    }
					if (err.coe_logcard) {
                        toastr.error(err.coe_logcard);
                    }
					if (err.coe_pqp) {
                        toastr.error(err.coe_pqp);
                    }
					if (err.reg_fee) {
                        toastr.error(err.reg_fee);
                    }
					if (err.arf_amount) {
                        toastr.error(err.arf_amount);
                    }
					if (err.omv) {
                        toastr.error(err.omv);
                    }
					if (err.cves_rebate) {
                        toastr.error(err.cves_rebate);
                    }
					if (err.ets_paper_from) {
                        toastr.error(err.ets_paper_from);
                    }
					if (err.use_tcoe) {
                        toastr.error(err.use_tcoe);
                    }
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
					if (err.vehicleNameCost) {
                        toastr.error(err.vehicleNameCost);
                    }
					if (err.vehicleRegistrationNumberCost) {
                        toastr.error(err.vehicleRegistrationNumberCost);
                    }
					if (err.vendorNameCost) {
                        toastr.error(err.vendorNameCost);
                    }
					if (err.cost_description) {
                        toastr.error(err.cost_description);
                    }					
					if (err.totalAmount) {
                        toastr.error(err.totalAmount);
                    }
					if (err.transaction_type) {
                        toastr.error(err.transaction_type);
                    }
                }
                console.log(error)
            }
        })
    });
	
	$('#edit_vehicle_details_form :input').click(function() {
        $('#id_number_error').html('')
        $('#address_error').html('')
        $('#purchase_date_error').html('')
        $('#estimate_delivery_date_error').html('')
        $('#date_of_delivery_error').html('')
        $('#purchase_price_error').html('')
        $('#seller_gst_error').html('')
        $('#total_purchase_price_error').html('')
        $('#outside_purchase_comm_error').html('')
        $('#agreement_number_error').html('')
        $('#note_error').html('')
        $('#s_no_error').html('')
        $('#ap_payment_error').html('')
        $('#acc_desc_error').html('')
        $('#amount_error').html('')
        $('#cheque_number_error').html('')
        $('#bank_error').html('')
        $('#cheque_date_error').html('')
        $('#to_from_error').html('')
        $('#remarks_error').html('')
        $('#transaction_type_error').html('')
        $('#transaction_date_error').html('')
		$('#id_number_error').html('')
        $('#address_error').html('')
        $('#delivery_out_date_error').html('')
        $('#invoice_number_error').html('')
        $('#pl_date_error').html('')
        $('#date_of_booking_error').html('')
        $('#sell_code_error').html('')
        $('#sale_agreement_number_error').html('')
        $('#sale_agreement_price_error').html('')
        $('#gst_error').html('')
        $('#outside_sale_comm_error').html('')
        $('#ets_paper_form_error').html('')
        $('#buy_over_date_error').html('')
        $('#ets_purchase_price_error').html('')
        $('#body_price_error').html('')
        $('#transfer_value_error').html('')
        $('#ets_pur_comm_error').html('')
        $('#ets_out_comm_error').html('')
        $('#ets_paper_buyer_error').html('')
        $('#dereg_date_error').html('')
        $('#s_no_error').html('')
        $('#ap_receipt_error').html('')
        $('#acc_desc_error').html('')
        $('#amount_error').html('')
        $('#cheque_number_error').html('')
        $('#cheque_date_error').html('')
        $('#sell_to_error').html('')
        $('#invoice_number_error').html('')
        $('#transaction_type_error').html('')
        $('#transaction_date_error').html('')
		$('#vehicle_number_error').html('')
        $('#previous_vehicle_no_error').html('')
        $('#name_model_error').html('')
        $('#reg_road_tax_error').html('')
        $('#body_type_error').html('')
        $('#chassis_no_error').html('')
        $('#propellant_error').html('')
        $('#original_reg_date_error').html('')
        $('#colour_error').html('')
        $('#number_of_owner_error').html('')
        $('#coe_logcard_error').html('')
        $('#coe_pqp_error').html('')
        $('#reg_fee_error').html('')
        $('#arf_amount_error').html('')
        $('#omv_error').html('')
        $('#cves_rebate_error').html('')
        $('#ets_paper_from_error').html('')
        $('#use_tcoe_error').html('')
		 $('#vehicle_name_error').html('')
        $('#vehicle_registration_number_error').html('')
        $('#vendor_name_error').html('')
        $('#repair_cost_error').html('')
		$('#vehicleName_error').html('')
        $('#vehicleRegistrationNumber_error').html('')
        $('#vendorName_error').html('')
        $('#description_error').html('')
        $('#amount_spent_error').html('')
        $('#gst_charges_error').html('')
        $('#total_amount_error').html('')
		$('#vehicleNameCost_error').html('')
        $('#vehicleRegistrationNumberCost_error').html('')
        $('#vendorNameCost_error').html('')
        $('#cost_description_error').html('')        
        $('#transaction_type_error').html('')
        $('#totalAmount_error').html('')
    })
	
	$('body').on('click','#insuranceDetails',function(){
		var InsuranceName=$('#insuranceVehicleId').val();
		//alert(InsuranceName);
		$.ajax({
    url: "{{ route('admin.get_vehicleinsurance_details') }}",
    type: "get",
    data: 
	{
        "_token": "{{ csrf_token() }}",
         id: InsuranceName
    },
    dataType: "html",
    beforeSend: function() 
	{
        $('#user_loder').show()
    },
    success: function(data) 
	{
        $('#user_loder').hide();
        $('#showInsuranceDetails').html(data);
        $('#insurance').show();		
		//alert("Pass")			  
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	})
	
	$('body').on('click','#insurance_view_details',function(){
	var insuranceVehicleName=$('#insurance_details_view').val();
	//alert(insuranceVehicleName)
	$.ajax({
    url: "{{ route('admin.view_vehicleinsurance_details') }}",
    type: "get",
    data: 
	{
        "_token": "{{ csrf_token() }}",
         id: insuranceVehicleName
    },
    dataType: "html",
    beforeSend: function() 
	{
        $('#user_loder').show()
    },
    success: function(data) 
	{
        $('#user_loder').hide();
        $('#viewInsurance_details').html(data);
        $('#insuranceView').show();		
		//alert("Pass")			  
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	})

	// add multiple rows in Repair Form
    var room = 1;
    function repair_fields() { 
    room++;
    var objTo = document.getElementById('repair_fields')
	var VehicleDetails = $('.vehicle_nameRepair').val();
	var VehicleReg = $('.vehicleReg_repair').val();
	//alert(VehicleReg)
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="newRow"><div class="row"> <div class="col-md-3"><div class="form-group"><label for="vehicle_name">Vehicle Name And Model:</label><input type="text" class="form-control vehicle_nameRepair" id="vehicle_name" name="vehicle_name[]" value="'+VehicleDetails+'"  placeholder="Vehicle Name"><span id="vehicle_name_error" style="color: red"></span></div></div> <div class="col-md-3"><div class="form-group"><label for="vehicle_registration_number">Registration Number:</label><input type="text" class="form-control" id="vehicle_registration_number" name="vehicle_registration_number[]" value="'+VehicleReg+'" placeholder="Vehicle Registration Number"></div></div><div class="col-md-3"><div class="form-group"><label for="vendor_name">Vendor Name:</label><input type="text" class="form-control" id="vendor_name" name="vendor_name[]" value="" placeholder="Enter Vendor Name"><span id="vendor_name_error" style="color: red"></span></div></div><div class="col-md-3"><div class="form-group"><label for="repair_cost">Cost Of Repair:</label><input type="text" class="form-control" id="repair_cost" name="repair_cost[]" value="" placeholder="Enter Repair Cost"><span id="repair_cost_error" style="color: red"></span></div></div></div><div class="col-sm-3 nopadding><div class="form-group"><button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> Remove Record </button></div></div><div class="clear"></div>';
    objTo.appendChild(divtest)
    }
    function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
    }

    var room = 1;
    function miscellaneous_fields() { 
    room++;
    var objTo = document.getElementById('miscellaneous_fields')
	var MisName = $('.vehicleNameMis').val();
	var MisReg = $('.registrationVehilceMis').val();
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="newDiv"><div class="row mt-3"><div class="col-md-4"><div class="form-group"><label for="vehicleName">Vehicle Name And Model:</label><input type="text" class="form-control" id="vehicleName" name="vehicleName[]" value="'+MisName+'" placeholder="Vehicle Name"><span id="vehicle_name_error" style="color: red"></span></div></div> <div class="col-md-4"><div class="form-group"><label for="vehicleRegistrationNumber">Registration Number:</label><input type="text" class="form-control" id="vehicleRegistrationNumber" name="vehicleRegistrationNumber[]" value="'+MisReg+'" placeholder="Vehicle Registration Number"></div></div><div class="col-md-4"><div class="form-group"><label for="vendorName">Vendor Name:</label><input type="text" class="form-control" id="vendorName" name="vendorName[]" value="" placeholder="Enter Vendor Name"><span id="vendorName_error" style="color: red"></span></div></div></div><div class="row mt-3"><div class="col-md-4"><div class="form-group"><label for="miscellaneous_description">Description:</label><textarea class="form-control" id="miscellaneous_description" name="miscellaneous_description[]" value="" placeholder="Enter Description"></textarea><span id="description_error" style="color: red"></span></div></div><div class="col-md-4"><div class="form-group"><label for="amount_spent">Amount Spent:</label><input type="text" class="form-control amount_spent1" id="amount_spent" name="amount_spent[]" value="" placeholder="Enter Amount Spent"><span id="amount_spent_error" style="color: red"></span></div></div><div class="col-md-4"><div class="form-group"><label for="gst_charges">GST Charges:</label><input type="text" class="form-control gst_charges1" id="gst_charges" name="gst_charges[]" value="" placeholder="Enter GST Charges"><span id="gst_charges_error" style="color: red"></span></div></div></div><div class="row mt-4"><div class="col-md-4"><div class="form-group"><label for="total_amount">Total Spent Amount:</label><input type="text" class="form-control total_amount1" id="total_amount" name="total_amount[]" value="" placeholder="Enter Total Amount"><span id="total_amount_error" style="color: red"></span></div></div></div><div class="col-sm-3 nopadding><div class="form-group"><button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> Remove Record </button></div></div><div class="clear"></div></div>';
    objTo.appendChild(divtest)
    }
    function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
    }

    $('body').on('keyup','.gst_charges1',function(){
    var info1 = $(this).val();
    var info2 = $(this).closest('.newDiv').find('.amount_spent1').val();
	//alert(info1);
	if(info1 != '' && info2 != '')
	{
	 	var res = parseInt(info1) + parseInt(info2);
		//alert("Hello");
	}
	else{
		//alert("Fail");
    var res = 0;
	}
	//alert(res);
    var info3 = $(this).closest('.newDiv').find('.total_amount1').val(res);
    });

    var room = 1;
    function cost_fields() { 
    room++;
    var objTo = document.getElementById('cost_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="newDiv"><div class="row mt-3"><div class="col-md-4"><div class="form-group"><label for="costType">Cost Type:</label><select name="costType[]" class="form-control" id="costType"><option value="">-- select --</option><?php	foreach($costtype as $data){?><option value="<?php echo $data->costType;?>"><?php echo $data->costType;?></option><?php } ?> </select><span id="costType_M_error" style="color: red"></span></div></div><div class="col-md-4"><div class="form-group"><label for="vehicleNameCost">Vehicle Name And Model:</label><input type="text" class="form-control" id="vehicleNameCost" name="vehicleNameCost[]" value="" placeholder="Vehicle Name"><span id="vehicleNameCost_error" style="color: red"></span></div></div> <div class="col-md-4"><div class="form-group"><label for="vendorNameCost">Vendor Name:</label><input type="text" class="form-control" id="vendorNameCost" name="vendorNameCost[]" value="" placeholder="Enter Vendor Name"><span id="vendorNameCost_error" style="color: red"></span></div></div></div><div class="row mt-3"><div class="col-md-4"><div class="form-group"><label for="cost_description">Description:</label><textarea class="form-control" id="cost_description" name="cost_description[]" value="" placeholder="Enter Description"></textarea><span id="descriptioncost_error" style="color: red"></span></div></div><div class="col-md-4"><div class="form-group"><label for="totalAmount">Total Spent Amount:</label><input type="text" class="form-control" id="totalAmount" name="totalAmount[]" value="" placeholder="Enter Total Amount"><span id="totalAmount_error" style="color: red"></span></div></div><div class="col-md-4"><div class="form-group"><label for="transaction_type">Transaction Type:</label><select name="transaction_type[]" class="form-control" id="transaction_type"><option value="">--Select--</option><option value="1">Credit</option><option value="2">Debit</option></select><span id="transaction_type_error" style="color: red"></span></div></div></div><div class="col-sm-3 nopadding><div class="form-group"><button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> Remove Record </button></div></div><div class="clear"></div></div>';
    objTo.appendChild(divtest)
    }
    function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
    } 	
		
</script>
<script type="text/javascript">
    window.onload = function () {
        //Reference the DropDownList.
        var ddlYears = document.getElementById("ddlYears");
 
        //Determine the Current Year.
        var currentYear = (new Date()).getFullYear();
 
        //Loop and add the Year values to DropDownList.
        for (var i = 1950; i <= currentYear; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            ddlYears.appendChild(option);
        }
    };
</script>