<?php
if(isset($_POST['banner_id'])){
    $id = sanetize($_POST['banner_id']);
	$filename = $_FILES['banner_file']['name'];
	$filetype = $_FILES['banner_file']['type'];
	$filetmp = $_FILES['banner_file']['tmp_name'];
	if($filetype == 'image/jpeg' || $filetype == 'image/png'){
		$new_name = rand(10000,99999).$filename;
		$update = $query_class->update('offers',array('image' => $new_name),array('id','=',$id));
		if($update == true){
			move_uploaded_file($filetmp, '../images/offers/'.$new_name);
			header('Location:offers.php');
		}
	}else{
		echo '<script type="text/javascript">alert("Image File Only")</script>';
	}
}

?>