 <script>
 	$('body').on('click','#commission_details_button',function()
	{
	var id=$(this).attr('rel');
	//alert(id)
	//$('#edit_Commission_Modal').modal('show');
      $.ajax({
    url: "{{ route('admin.get_vehicleCommission_details') }}",
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
        $('#show_commission_details').html(data);
        $('#edit_Commission_Modal').modal('show');
       		
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