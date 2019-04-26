$(document).ready(function(){
	$('#datepicker').datepicker({dateFormat:"yy-mm-dd",});
	$('#datepicker2').datepicker({dateFormat:"yy-mm-dd",});
	$('#datepicker3').datepicker({dateFormat:"yy-mm-dd",});
	$('#datepicker4').datepicker({dateFormat:"yy-mm-dd",});
	$('#datepicker5').datepicker({dateFormat:"yy-mm-dd",});
	$('#datepicker7').datepicker({dateFormat:"yy-mm-dd",});
	$('#datepicker8').datepicker({dateFormat:"yy-mm-dd",});
	$('#datepicker9').datepicker({dateFormat:"yy-mm-dd",});
	
	$("#login_form").submit(function(e) {

		var url = "api/login.php"; // the script where you handle the form input.

		$.ajax({
			   type: "POST",
			   url: url,
			   data: $("#login_form").serialize(), // serializes the form's elements.
			   success: function(data)
			   {
				//alert(data);  
				var response = JSON.parse(data);
				
				if(response.success == 1){
					$('#login_form_error').html('<div class="alert alert-success animated fadeIn">Redirecting Please Wait...</div>');
					window.setTimeout(function(){
						// Move to a new location or you can do something else
						window.location.href = "index";
					}, 3000);
				}else{
					$('#login_form_error').html('<div class="alert alert-danger animated fadeIn">'+response.message+'</div>');
				}
			   }
			 });
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});
	$("#otp_form").submit(function(e) {

		var url = "include/login.php"; // the script where you handle the form input.

		$.ajax({
			   type: "POST",
			   url: url,
			   data: $("#otp_form").serialize(), // serializes the form's elements.
			   success: function(data)
			   {
				  
				var response = JSON.parse(data);
				
				if(response.success == 1){
					$('#otp_form_error').html('<div class="alert alert-success animated fadeIn">Redirecting to Dashboard</div>');
					window.setTimeout(function(){
						// Move to a new location or you can do something else
						window.location.href = "index.php";
					}, 3000);
				}else{
					$('#otp_form_error').html('<div class="alert alert-danger animated fadeIn">'+response.message+'</div>');
				}
			   }
			 });
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});
	
	$("#details_add_form").submit(function(e) {

		var url = "api/product.php"; // the script where you handle the form input.

		$.ajax({
			   type: "POST",
			   url: url,
			   data: $("#details_add_form").serialize(), // serializes the form's elements.
			   success: function(data)
			   {
				//alert(data); 
				var response = JSON.parse(data);
				
				if(response.success == 1){
					$('#details_add_form_error').html('<div class="alert alert-success animated fadeIn">Successfully Added</div>');
					window.setTimeout(function(){
						// Move to a new location or you can do something else
						window.location.href = "products.php?list=0";
					}, 3000);
				}else{
					$('#details_add_form_error').html('<div class="alert alert-danger animated fadeIn">'+response.message+'</div>');
				}
			   }
			 });
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});
	
	
	

	
	
	$("#product_add_form").submit(function(){
		var formData = new FormData($(this)[0]);
		$.ajax({
			url: 'api/product.php',
			type: 'POST',
			data: formData,
			async: false,
			success: function (returns) {
				//alert(returns);
				var response = JSON.parse(returns);
				if(response.success == 1){
					window.location.href = 'products.php?list=0';
				}else{
					$('.product_add_form').html('<div class="alert alert-danger">'+response.message+'</div>');
				}
			},
			cache: false,
			contentType: false,
			processData: false
		});
		return false;
	});
	$("#image_edit_form").submit(function(e){
		var formData = new FormData($(this)[0]);
		$.ajax({
			url: 'api/product.php',
			type: 'POST',
			data: formData,
			async: false,
			success: function (returns) {
				alert(returns);
				/*var response = JSON.parse(returns);
				if(response.success == 1){
					window.location.href = 'products.php?list=0';
				}else{
					$('.image_edit_form').html('<div class="alert alert-danger">'+response.message+'</div>');
				}
				*/
			},
			cache: false,
			contentType: false,
			processData: false
		});
		return false;
		e.preventDefault();
	});
	$(document).on('click','.add_features',function(){
		var old_sl = $('.features_sl').val();
		var next_sl = +old_sl + +1;
		$('.load_features').append(
			'<div class="form-group col-md-6"><input type="text" name="title_'+next_sl+'" class="form-control" placeholder="Title" /></div><div class="form-group col-md-6"><input type="text" name="text_'+next_sl+'"  class="form-control" placeholder="Text"  /></div>'
		);
		$('.features_sl').val(next_sl);
	});
	
	$('.display_code_create_form').click(function(){
		$('.cod_create_box').show();
	});
	
});
