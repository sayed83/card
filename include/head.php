<?php
include 'conf/init.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" size="48x48" href="img/favicon.png" />
	<link rel="icon" type="image/png" size="32x32" href="img/favicon.png" />
	
	<title>Easy Card</title>
	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/reg.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/catagory.css">
    <link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script type="text/javascript">
		$('#exampleModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('whatever') // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.modal-title').text('New message to ' + recipient)
		  modal.find('.modal-body input').val(recipient)
		})	
	</script>
	
    
  </head>
  <body>
  <script src="js/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity></script>
    <script src="font/js/fontawesome.min.js" integrity></script>
	<script src="js/owl.carousel.min.js"></script>
    <script src="js/owl.js"></script>
    
	<script src="js/ez.min.js"></script>
    <script src="js/style.js"></script>