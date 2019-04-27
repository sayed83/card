<?php
  include 'include/head.php';
  include 'include/header.php';
  include 'include/nav.php';
  $query_class = query::g();

  if(admin::checkaccess($_SESSION[config::get('session/session_name')], 'index.php') == false){
	echo '<div class="col-md-9 col-sm-9 alert alert-danger text-center" >
	You don\'t have access to this page
	</div>';
	die();
}

if(isset($_POST['code_count'])){
	$count = input::get('code_count');
	for($i=1;$i<=$count;$i++){
		$code = rand(11111,99999);
		$code2 = rand(11111,99999);
		$code = $code.time().$code;
		$code2 = $code2.time().$code2;
		$insert = $query_class->insert('card',array('card_no'=>$code,'secrate_no'=>$code2));	
	}
	head::to('card');
}
//error_reporting(0);

?>


	<div class="container col-lg-10 col-md-10 col-sm-9 col-xs-12">
	 	<?php 
		if(isset($_GET['a'])){
			?>
			<div class="panel panel-default  "  >
				<form  class="panel-body form-inline" action="#" method="post"  >
					<input type="text" name="code_count"  class="form-control" />
					<input type="submit" value="Create Code" class="btn btn-primary"  />
				</form>
			</div>
		<?php 
		}	
		?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Card List</h4>
				<a href="?a" class="btn btn-success pull-right">Create Code</a>
				
				
			</div>
			<div class="panel-body table-responsive">
				
				<table class="table table-bordered table-striped">
					<thead>
						<th>Carde NO</th>
						<th>Secret NO</th>
						<th>User ID</th>						
					</thead>
					<tbody >
						<?php 
						if(!isset($_GET['list'])){
						$requests = page::g()->get_ten_data_all('card');
						//print_r($requests);
						foreach($requests as $request){							
							?>
							<tr>
								<td class="" >
									<?php echo $request['card_no'];?>
								</td>								
								<td><?php echo $request['secrate_no'];?></td>
								<td><?php echo $request['user_id'];?></td>
								
							</tr>
							
						<?php }}else if(isset($_GET['list'])){
							$requestes = page::g()->paginationed_all(sanetize($_GET['list']),'card');
							foreach($requestes as $request){
							?>
							<tr>
								<td class="" >
									<?php echo $request['card_no'];?>
								</td>
								
								<td><?php echo $request['secrate_no'];?></td>
								<td><?php echo $request['user_id'];?></td>
								
							</tr>
							<?php }} ?>
					</tbody>
				</table>
			</div>
			<div class="pull-right" aria-label="pagination">
				<ul class="pager">
				<?php
					error_reporting(0);
				  $count = 0;
				  
				  $rows = page::g()->pagination_list_all('card');
				  if($rows > 1){
					for($count = 0; $count < $rows; $count++ ){?>
					<li><a class="table_pagination_links <?php if($_GET['list'] == $count){echo 'active';}?>" <?php if($count  > ($_GET['list'] + 4)){echo 'style="display:none;"';}else if($count  < ($_GET['list'] - 4)){echo 'style="display:none;"';}?>  href="card?list=<?php echo $count;?>"><?php echo $count+1;?></a></li>
				  <?php }}?>
				</ul>
			</div>
		</div>
	</div>
<?php
  include 'include/footer.php';
?>