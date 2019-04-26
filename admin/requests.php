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

function acceptedORCanceled($id, $value){
	$query = mysqli_query(DB::g()->connect(),"SELECT * FROM `fund_request` WHERE `id` = '$id'");
	$fetch = mysqli_fetch_assoc($query);
	$amount = $fetch['amount'];
	//echo $amount;
	$requester = $fetch['uid'];
	//query2 = mysqli_query(DB::g()->connect(),$query_class->query('rows',array('*', 'registration', 'id', '=', $requester));
	//$query2 = mysqli_query(DB::g()->connect(),query::g()->query('rows',array('*', 'registration', 'id', '=', $requester)));
	$query2 = mysqli_query(DB::g()->connect(), "SELECT * FROM `registration` WHERE `id` = '$requester'");
	$fetch2 = mysqli_fetch_assoc($query2);
	
	$old_balance = $fetch2['balance'];
	$new_balance = $old_balance + $amount;
	$update = mysqli_query(DB::g()->connect(), query::g()->update('registration',['balance'=>$new_balance],['id', '=', $requester]));
	$update = mysqli_query(DB::g()->connect(), query::g()->update('fund_request',['status'=> $value],['id','=',$id]));
	header("LOCATON:requests.php");
}

if(isset($_GET['accept'])){
	$id = sanetize($_GET['accept']);
	acceptedORCanceled($id, '1');
}else if(isset($_GET['cancel'])){
	$id = sanetize($_GET['cancel']);
	acceptedORCanceled($id, '2');
}

//error_reporting(0);

?>
	<div class="container col-lg-10 col-md-10 col-sm-9 col-xs-12">
	 	<?php
		if(isset($_GET['activate'])){
			?>
			<div class="panel panel-default  "  >
				<form  class="panel-body form-inline" action="#" method="post"  >
					<input type="hidden" name="userid" value="<?php echo sanetize($_GET['activate']);?>"   class="form-control" />
					<input type="text" name="card"  class="form-control" />
					<input type="text" name="secrate"  class="form-control" />
					<input type="submit" value="Activate User" class="btn btn-primary"  />
				</form>
			</div>
			<?php
		}
		?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Users List</h4>
			</div>
			<div class="panel-body table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<th>#</th>
						<th>Amount</th>
						<th>Sender</th>
						<th>Trxid</th>
						<th>Status</th>
						
						
					</thead>
					<tbody >
						<?php 
						if(!isset($_GET['list'])){
						$requests = page::g()->get_ten_data_all('fund_request');
						//print_r($requests);
						foreach($requests as $request){
							
							?>
							<tr>
								<td class="" >
									<?php echo $request['id'];?>
								</td>
								
								<td><?php echo $request['amount'];?></td>
								<td><?php echo $request['sender'];?></td>
								<td><?php echo $request['trxid'];?></td>
								
								
								<td><?php  if($request['status'] == '0'){
									?>
									<a href="?accept=<?php echo $request['id'];?>" class="btn btn-success">Accept</a>
									<a href="?cancel=<?php echo $request['id'];?>" class="btn btn-warning">Cancel</a>
									<?php
								}else if($request['status'] == '1'){
									echo 'Accepted';
								}else if($request['status'] =='2'){
									echo 'Canceled';
								};?></td>
							</tr>
							
						<?php }}else if(isset($_GET['list'])){
							 $requestes = page::g()->paginationed_all(sanetize($_GET['list']),'fund_request');
							 foreach($requestes as $request){
							?>
							<tr>
								<td class="" >
									<?php echo $request['name'];?>
								</td>
								
								<td><?php echo $request['mobile'];?></td>
								<td><?php echo $request['nid'];?></td>
								<td><?php echo $request['rf_card'];?></td>
								
								<td><?php echo $request['gender'];?></td>
								<td><?php  if($request['status'] == '0'){
									?>
									<a href="?activate=<?php echo  $request['id'];?>" class="btn btn-success">Activate</a>
									<?php
								}else if($request['status'] == '1'){
									echo 'Active';
								};?></td>
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
				  
				  $rows = page::g()->pagination_list_all('fund_request');
				  if($rows > 1){
					for($count = 0; $count < $rows; $count++ ){?>
					<li><a class="table_pagination_links <?php if($_GET['list'] == $count){echo 'active';}?>" <?php if($count  > ($_GET['list'] + 4)){echo 'style="display:none;"';}else if($count  < ($_GET['list'] - 4)){echo 'style="display:none;"';}?>  href="requests?list=<?php echo $count;?>"><?php echo $count+1;?></a></li>
				  <?php }}?>
				</ul>
			</div>
		</div>
	</div>
<?php
  include 'include/footer.php';
?>