<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
	Deshboard 
	<br />
	Balance : <?php 
	$query_class = query::g();
	$uid = $_SESSION[config::get('session/session_name')];
	$info  = mysqli_query(DB::g()->connect(),"SELECT * FROM `registration` WHERE `id` = '$uid'");
	$fetch = mysqli_fetch_assoc($info);
	echo $fetch['balance'];
	
	?>
  </a>
  <a href="myprofile" class="list-group-item list-group-item-action">My Profile</a>
  <a href="transection" class="list-group-item list-group-item-action">Transections</a>
  <a href="fundmanagement" class="list-group-item list-group-item-action">Fund Management</a>
  <a href="fundmanaghistory" class="list-group-item list-group-item-action">Fund Management Hestory</a>
  <a href="earning" class="list-group-item list-group-item-action">Earnings</a>
</div>