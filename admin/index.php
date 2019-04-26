<?php
  include 'include/head.php';
  include 'include/header.php';
  include 'include/nav.php';
 

  if(admin::checkaccess($_SESSION[config::get('session/session_name')], 'index.php') == false){
	echo '<div class="col-md-9 col-sm-9 alert alert-danger text-center" >
	You don\'t have access to this page
	</div>';
	die();
}
  //print_r($_SESSION);
?>
	
	
<?php

  include 'include/footer.php';
?>