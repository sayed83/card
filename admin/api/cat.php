<?php
include '../conf/api_init.php';

$query_class = query::g();
$response = array();
$response['success'] = 0;
if(isset($_POST['cat_id'])){
	$cat_id = input::get('cat_id');
	$query = $query_class->multi_query(array('*','category'),array("`type` = 'subcat'","`cat` = '$cat_id'"));
	$sl = 0;
	foreach($query as $data){
		$response['message'][$sl] = $data;
		$sl++;
	}
}
if(isset($_POST['sub_cat_id'])){
	$cat_id = input::get('sub_cat_id');
	$query = $query_class->multi_query(array('*','category'),array("`type` = 'subsubcat'","`subcat` = '$cat_id'"));
	$sl = 0;
	foreach($query as $data){
		$response['message'][$sl] = $data;
		$sl++;
	}
}
echo json_encode($response);
?>
