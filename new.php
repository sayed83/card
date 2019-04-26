<?php 

include 'include/head.php';
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.nums').click(function(){
			var num  = $(this).html();
			var old_num = $('.result').val();
			var new_num = old_num + num;
			$('.result').val(new_num);
		});
		$('.plus').click(function(){
			var old_num = $('.result').val();
			var method  =  '+';
			
			$.post('api/calculate.php',{old_num_val : old_num,methods : method},function(){
				$('.result').val('');
			});
		});
		$('.minus').click(function(){
			var old_num = $('.result').val();
			var method  =  '-';
			
			$.post('api/calculate.php',{old_num_val : old_num,methods : method},function(){
				$('.result').val('');
			});
		});
		$('.multiply').click(function(){
			var old_num = $('.result').val();
			var method  =  '*';
			
			$.post('api/calculate.php',{old_num_val : old_num,methods : method},function(){
				$('.result').val('');
			});
		});
		$('.devide').click(function(){
			var old_num = $('.result').val();
			var method  =  '/';
			
			$.post('api/calculate.php',{old_num_val : old_num,methods : method},function(){
				$('.result').val('');
			});
		});
		$('.equal').click(function(){
			var old_num = $('.result').val();
			var method  =  '=';
			$.post('api/calculate.php',{new_num_val : old_num,methods : method},function(data){
				var response = JSON.parse(data)
				$('.result').val(response.message);
			});
		});
	});
</script>
<div class="col-md-3">
	<div class="form-group">
		<input type="text" class="form-control result" />
	</div>
	<div class="btn btn-primary nums one">1</div>
	<div class="btn btn-primary nums two">2</div>
	<div class="btn btn-primary nums three">3</div>
	
	<div class="btn btn-primary nums four">4</div>
	<div class="clearfix"></div>
	<div class="btn btn-primary nums five">5</div>
	<div class="btn btn-primary nums six">6</div>
	
	<div class="btn btn-primary nums seven">7</div>
	<div class="btn btn-primary nums eight">8</div>
	<div class="clearfix"></div>
	<div class="btn btn-primary nums nine">9</div>
	
	<div class="btn btn-primary nums zero">0</div>
	<div class="btn btn-danger method  equal">=</div>
	<br />
	<div class="btn btn-success method plus">+</div>
	<div class="btn btn-success method minus">-</div>
	<div class="btn btn-success method multiply">*</div>
	<div class="btn btn-success devide">/</div>
	
	<br />
	
	<br />
	<br />

</div>
<?php 

include 'include/footer.php';
?>
