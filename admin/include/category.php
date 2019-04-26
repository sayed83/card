<?php
if(isset($_POST['add_cat'])){
	$cat = input::get('add_cat');
	$insert = $query_class->insert('category',array(
		'name' => $cat,
		'type' => 'cat'
	));
	if($insert == true){
		head::to('category.php');
	}
}
if(isset($_POST['edit_cat'])){
	$cat = input::get('edit_cat');
	$catid = sanetize($_GET['edit_cat']);
	$insert = $query_class->update('category',
		array(
			'name' => $cat,
			'type' => 'cat'
		),
		array(
			'id',
			'=',
			$catid
		)
	);
	if($insert == true){
		head::to('category.php');
	}
}
if(isset($_POST['add_subcat'])){
	$cat = input::get('cat');
	$subcat = input::get('add_subcat');
	$insert = $query_class->insert('category',array(
		'name' => $subcat,
		'cat' => $cat,
		'type' => 'subcat'
	));
	if($insert == true){
		head::to('category.php');
	}
}
if(isset($_POST['edit_subcat'])){
	$cat = input::get('cat');
	$subcat = input::get('edit_subcat');
	$subcatid = sanetize($_GET['edit_subcat']);
	$insert = $query_class->update('category',
		array(
			'name' => $subcat,
			'cat' => $cat,
			'type' => 'subcat'
		),
		array(
			'id',
			'=',
			$subcatid
		)
	);
	if($insert == true){
		head::to('category.php');
	}
}
if(isset($_POST['add_subsubcat'])){
	$cat = input::get('cat');
	$subcat = input::get('subcat');
	$subsubcat = input::get('add_subsubcat');
	$insert = $query_class->insert('category',array(
		'name' => $subsubcat,
		'cat' => $cat,
		'subcat' => $subcat,
		'type' => 'subsubcat'
	));
	if($insert == true){
		head::to('category.php');
	}
}
if(isset($_POST['edit_subsubcat'])){
	$cat = input::get('cat');
	$subcat = input::get('subcat');
	$subsubcat = input::get('edit_subsubcat');
	$subsubcatid = sanetize($_GET['edit_subsubcat']);
	$insert = $query_class->update('category',
	array(
		'name' => $subsubcat,
		'cat' => $cat,
		'subcat' => $subcat,
		'type' => 'subsubcat'
	),
	array(
		'id',
		'=',
		$subsubcatid
		
	)
	);
	if($insert == true){
		head::to('category.php');
	}
}

?>