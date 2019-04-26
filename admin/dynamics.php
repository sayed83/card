<?php
  include 'include/head.php';
  include 'include/header.php';
  include 'include/nav.php';
  $query_class = query::g();

  if(admin::checkaccess($_SESSION[config::get('session/session_name')], 'dynamics.php') == false){
	echo '<div class="col-md-9 col-sm-9 alert alert-danger text-center" >
	You don\'t have access to this page
	</div>';
	die();
}
//error_reporting(0);
if(isset($_GET['delete'])){
    $id = sanetize($_GET['delete']);
    $sql = mysqli_query($db, "DELETE FROM `adds` WHERE `id` = '$id'");
    if($sql == true){
        header('Location:adds.php');
    }
}

if(isset($_POST['edit_value'])){
	$value 	= sanetize($_POST['edit_value']);
	$id 	= sanetize($_GET['edit']);
    $query = $query_class->update('dynamics',array('value'=>$value),array('id','=',$id));
    if($query == true){
        header("Location:dynamics.php");
    }
}
?>
	
	<div class="container col-md-10 col-sm-10"  >
		 
		 <div href="#" class="" style="text-decoration:none;">
			<?php if(isset($_GET['edit'])){
				$id = sanetize($_GET['edit']);
				?>
				<div class="panel panel-default">
					<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
						<div class="panel-body form-inline">
							<?php echo $query_class->query('single_data',array('`description`','dynamics','id','=',$id,'description'));?>
							
							<input type="text" name="edit_value"  class="form-control" value="<?php echo $query_class->query('single_data',array('`value`','dynamics','id','=',$id,'value'));?>"  />
							<input type="submit" value="UPDATE" class="btn btn-info"   />
						</div>
					</form>
				</div>
			<?php }?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Dynamic Values</h4>
				</div>
				
				<div class="panel-body table-responsive">
					<table class="table table-bordered table-striped">
						<tr class="text-nowrap" >
							<th>Action</th>
							<th>Description</th>
							<th>Value</th>
							
						</tr>
						<?php 
						$data = $query_class->query('all_data_inv',array('dynamics','id'));
						foreach($data as $users){?>
							<tr>
								
								<td>
									<a href="dynamics.php?edit=<?php echo $users['id'];?>" class="btn btn-success btn-xs" >Edit</a>
								</td>
							
								<td><?php echo $users['description']?></td>
								<td><?php echo $users['value']?></td>
								
							</tr>
						<?php }?>
					</table>
				</div>
				
			</div>
		
			</div>
		</div>
	</div>
<?php
  include 'include/footer.php';
?>