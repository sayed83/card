<?php
include '../conf/api_init.php';

$query_class = query::g();
$response = array();
$response['success'] = 0;
if(isset($_POST['cat'])){
	$name = input::get('name'); 
	$price = input::get('price'); 
	$stock = input::get('stock'); 
	$pv = input::get('pv'); 
	$mrp = input::get('mrp'); 
	$code = input::get('code'); 
	$short_descp = input::get('short_descp'); 
	$cat = input::get('cat'); 
	$file_one_name = sanetize($_FILES['image_one']['name']);
	$file_one_type = sanetize($_FILES['image_one']['type']);
	$file_one_tmp =  $_FILES['image_one']['tmp_name'];
	$file_two_name = sanetize($_FILES['image_two']['name']);
	$file_two_type = sanetize($_FILES['image_two']['type']);
	$file_two_tmp =  $_FILES['image_two']['tmp_name'];
	$file_three_name = sanetize($_FILES['image_three']['name']);
	$file_three_type = sanetize($_FILES['image_three']['type']);
	$file_three_tmp  = $_FILES['image_three']['tmp_name'];
	$file_four_name  = sanetize($_FILES['image_four']['name']);
	$file_four_type  = sanetize($_FILES['image_four']['type']);
	$file_four_tmp   = $_FILES['image_four']['tmp_name'];
	if(
		!empty($name) &&
		!empty($price) &&
		!empty($stock) &&
		!empty($short_descp) &&
		!empty($cat) &&
		!empty($file_one_name) &&
		!empty($file_two_name) &&
		!empty($file_four_name) &&
		!empty($file_three_name)
	){
	if(other::g()->is_image($file_one_type) == true){
		if(other::g()->is_image($file_two_type) == true){
			if(other::g()->is_image($file_three_type) == true){
				if(other::g()->is_image($file_four_type) == true){
					$new_one = rand(111111,999999).$file_one_name;
					$new_two = rand(111111,999999).$file_two_name;
					$new_three = rand(111111,999999).$file_three_name;
					$new_four = rand(111111,999999).$file_four_name;
					
					move_uploaded_file($file_one_tmp,'../../images/products/'.$new_one);
					move_uploaded_file($file_two_tmp,'../../images/products/'.$new_two);
					move_uploaded_file($file_three_tmp,'../../images/products/'.$new_three);
					move_uploaded_file($file_four_tmp,'../../images/products/'.$new_four);
					$query = $query_class->insert('products',array(
						'name' => $name,
						'price' => $price,
						'stock' => $stock,
						'pv' => $pv,
						'mrp' => $mrp,
						'code' => $code,
						'short_details' => $short_descp,
						'cat' => $cat,
						'image_one' => $new_one,
						'image_two' => $new_two,
						'image_three' => $new_three,
						'image_four' => $new_four
					));
						if($query == true){
							$response['success'] = 1;
						}
					
					}else{
						$response['message'] = 'Fourth File must be image';
					}	
				}else{
					$response['message'] = 'Third File must be image';
				}		
			}else{
				$response['message'] = 'Second File must be image';
			}
		}else {
			$response['message'] = 'First File must be image';
		}
	}else{
		$response['message'] = 'All Fields Required';
	}
}
if(isset($_POST['update_stock'])){
	$stock = input::get('update_stock');
	$pid = input::get('update_stock_pid');
	if(!empty($pid) && !empty($stock)){
		$get_old_stock = $query_class->query('single_data',array('`stock`','products','id','=',$pid,'stock'));
		$new_stock = $get_old_stock + $stock;
		$update = $query_class->update('products',array('stock'=>$new_stock),array('id','=',$pid));
		if($update == true){
			$response['success']  = 1;
			$response['message'] = 'Updated successfully.';
		}
	}else{
		$response['message'] = 'Stock field required';
	}
}
if(isset($_POST['pid_image_edit'])){
	
	$pid = input::get('pid_image_edit');
	$file_one_name = sanetize($_FILES['image_one_edit']['name']);
	$file_one_type = sanetize($_FILES['image_one_edit']['type']);
	$file_one_tmp = $_FILES['image_one_edit']['tmp_name'];
	$file_two_name = sanetize($_FILES['image_two_edit']['name']);
	$file_two_type = sanetize($_FILES['image_two_edit']['type']);
	$file_two_tmp = $_FILES['image_two_edit']['tmp_name'];
	$file_three_name = sanetize($_FILES['image_three_edit']['name']);
	$file_three_type = sanetize($_FILES['image_three_edit']['type']);
	$file_three_tmp = $_FILES['image_three_edit']['tmp_name'];
	$file_four_name = sanetize($_FILES['image_four_edit']['name']);
	$file_four_type = sanetize($_FILES['image_four_edit']['type']);
	$file_four_tmp = $_FILES['image_four_edit']['tmp_name'];
	if(
		!empty($file_one_name) &&
		!empty($file_two_name) &&
		!empty($file_four_name) &&
		!empty($file_three_name)
	){
		if(other::g()->is_image($file_one_type) == true){
			if(other::g()->is_image($file_two_type) == true){
				if(other::g()->is_image($file_three_type) == true){
					if(other::g()->is_image($file_four_type) == true){
						$new_one = rand(111111,999999).$file_one_name;
						$new_two = rand(111111,999999).$file_two_name;
						$new_three = rand(111111,999999).$file_three_name;
						$new_four = rand(111111,999999).$file_four_name;
						
						move_uploaded_file($file_one_tmp,'../../images/products/'.$new_one);
						move_uploaded_file($file_two_tmp,'../../images/products/'.$new_two);
						move_uploaded_file($file_three_tmp,'../../images/products/'.$new_three);
						move_uploaded_file($file_four_tmp,'../../images/products/'.$new_four);
						$query = $query_class->update('products',array(
							'image_one' => $new_one,
							'image_two' => $new_two,
							'image_three' => $new_three,
							'image_four' => $new_four
							),
							array(
								'id',
								'=',
								$pid
							)
						);
						if($query == true){
							$response['success'] = 1;
							$response['message'] = 'Updated Successfully';
						}
					}else{
						$response['message'] = 'Forth File must be image';
					}	
				}else{
					$response['message'] = 'Third File must be image';
				}		
			}else{
				$response['message'] = 'Second File must be image';
			}
		}else {
			$response['message'] = 'First File must be image';
		}
	}else{
		$response['message'] = 'All Fields Required';
	}
}
if(isset($_POST['edit_cat'])){
	$edit_name = input::get('edit_name'); 
	$edit_cat = input::get('edit_cat'); 
	$edit_stock = input::get('edit_stock'); 
	$edit_price = input::get('edit_price'); 
	$edit_pv = input::get('edit_pv'); 
	$edit_mrp = input::get('edit_mrp'); 
	$edit_code = input::get('edit_code'); 
	$edit_short_descp = input::get('edit_short_descp'); 
	$edit_pid = input::get('edit_pid'); 
	if(
		!empty($edit_name) &&
		!empty($edit_cat) &&
		!empty($edit_stock) &&
		!empty($edit_price) &&
		!empty($edit_pv) &&
		!empty($edit_mrp) &&
		!empty($edit_code)&&
		!empty($edit_short_descp)
	){
			
					
				$query = $query_class->update('products',array(
						'name' => $edit_name,
						'cat' => $edit_cat,
						'stock' => $edit_stock,
						'price' => $edit_price,
						'pv' => $edit_pv,
						'mrp' => $edit_mrp,
						'code' => $edit_code,
						'short_details' => $edit_short_descp
						),
						array(
							'id',
							'=',
							$edit_pid
						)
					);
					if($query == true){
						$response['success'] = 1;
					}
				
	}else{
		$response['message'] = 'All Fields Required';
	}
}

if(isset($_POST['title_1'])){
	$pid = input::get('details_pid');
	foreach($_POST as $key => $value){
		if($key !== 'details_pid'){
			$keys = explode('_',$key);
			if($keys[0] == 'title'){
				$title = $_POST['title_'.$keys[1]];
				$text = $_POST['text_'.$keys[1]];
				
				$insert = $query_class->insert('product_details',array(
					'pid'=> $pid,
					'details_title'=> $title,
					'details'=> $text
				));
				$response['success']  = 1;
				$response['message'] = 'Features Added.';
			}
		}
	}
}
if(isset($_POST['edit_feature'])){
	foreach($_POST as $key => $value){
		if($key !== 'edit_feature'){
			$split = explode('_',$key);
			
			if($split[0] == 'title'){
				$update = $query_class->update('product_details',array('details_title'=>$value),array('id','=',$split[1]));
				
			}else if($split[0] == 'text'){
				$update = $query_class->update('product_details',array('details'=>$value),array('id','=',$split[1]));
				
			}
			
		}
		
	}
	$response['success'] = 1;
	$response['message'] = 'Updated Successfully.';
	
}




echo json_encode($response);
?>
