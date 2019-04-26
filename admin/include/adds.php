<?php
if(isset($_GET['delete'])){
    $id = sanetize($_GET['delete']);
    $sql = mysqli_query($db, "DELETE FROM `adds` WHERE `id` = '$id'");
    if($sql == true){
        header('Location:adds.php');
    }
}
if(isset($_POST['type'])){
	$type 	= sanetize($_POST['type']);
	$script = urlencode($_POST['script']);
	//echo $script;
	$link 	= sanetize($_POST['link']);
	$date 	= sanetize($_POST['date']);
	if($type == '1'){
		if(!empty($script)){
			$sql = mysqli_query($db, "INSERT INTO `adds` 
			(`type`,`script`,`date`)
			VALUES
			('$type','$script','$date')
			");
			if($sql == true){
				header('Location:adds.php');
			}
		}else{
			$error[] = 'all fields required';
		}
	}else if($type == '2'){
		$image = $_FILES['file']['name'];
		$tmp_name = $_FILES['file']['tmp_name'];
		$rand = rand(1000000,9000000);
		$image_name = $rand.$image;
		move_uploaded_file($tmp_name, '../images/banners/'.$image_name);
		if(!empty($link)){
			$sql = mysqli_query($db, "INSERT INTO `adds` 
				(`type`,`link`,`image`,`date`)
				VALUES
				('$type','$link','$image_name','$date')
				");	
			if($sql == true){
				header('Location:adds.php');
			}
		}else{
			$error[] = 'all fields required';
		}
	}
}
if(isset($_POST['edit_type'])){
	$type 	= sanetize($_POST['edit_type']);
	$script = urlencode($_POST['edit_script']);
	$link 	= sanetize($_POST['edit_link']);
	$date 	= sanetize($_POST['edit_date']);
	if($type == '1'){
		if(!empty($script)){
			$sql = mysqli_query($db, "UPDATE `adds` 
			SET 
			`type` = '$type',
			`script` = '$script',
			`date` = '$date'
			WHERE `id` = '".$_GET['edit']."'");
			if($sql == true){
				header('Location:adds.php');
			}else{
				$error[] = mysqli_error($db);
			}
		}else{
			$error[] = 'all fields required';
		}
	}else if($type == '2'){
		$image = $_FILES['edit_file']['name'];
		$tmp_name = $_FILES['edit_file']['tmp_name'];
		$rand = rand(1000000,9000000);
		$image_name = $rand.$image;
		move_uploaded_file($tmp_name, '../images/banners/'.$image_name);
		if(!empty($link)){
			$sql = mysqli_query($db, "UPDATE `adds` 
				SET `type` = '$type',
				`link` = '$link',
				`image` = '$image_name',
				`date` = '$date'
				WHERE `id` = '".$_GET['edit']."'");	
			if($sql == true){
				header('Location:adds.php');
			}
		}else{
			$error[] = 'all fields required';
		}
	}
}
if(isset($_POST['banner_edit_type'])){
	$type 	= input::get('banner_edit_type');
	$script = urlencode($_POST['banner_edit_script']);
	$link 	= input::get('banner_edit_link');
	$date 	= input::get('banner_edit_date');
	$id = sanetize($_GET['banner_edit']);
	$query_class = query::g();
	if($type == '1'){
		if(!empty($script)){
			$sql = $query_class->update('banners',array(
				'type' => $type,
				'script' => $script,
				'date' => $date,
				),
				array(
					'id',
					'=',
					$id
				)
			);
			if($sql == true){
				header('Location:adds.php');
			}else{
				$error[] = $sql;
			}
		}else{
			$error[] = 'all fields required';
		}
	}else if($type == '2'){
		$image = $_FILES['banner_edit_file']['name'];
		$tmp_name = $_FILES['banner_edit_file']['tmp_name'];
		$rand = rand(1000000,9000000);
		$image_name = $rand.$image;
		move_uploaded_file($tmp_name, '../images/banners/'.$image_name);
		if(!empty($link)){
			
			$sql = $query_class->update('banners',array(
				'type' => $type,
				'link' => $link,
				'image' => $image_name,
				'date' => $date
				),
				array(
					'id',
					'=',
					$id
				)
			);
			if($sql == true){
				header('Location:adds.php');
			}
		}else{
			$error[] = 'all fields required';
		}
	}
}

?>