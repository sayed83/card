<nav class="navbar navbar-info">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="admin-main-menu navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#admin-main-menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style="width:200px; padding-top:4px;" ><img width="100%" src="images/easycard.png" alt="" /></a>
    </div>
  </div><!-- /.container-fluid -->
</nav>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="container-fluid">
  <div class="row">
<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 dashboard_side_panel">
  <div class="collapse navbar-collapse row" id="admin-main-menu">
  	<div class="list-group row" style="margin-bottom:0px;">
  		<a href="index" class="list-group-item " ><i class="fa fa-window-restore"></i> Dashboard</a>
  		<a href="users" class="list-group-item <?php if($_SERVER['SCRIPT_NAME'] == '/product/products.php'){echo 'active';}?>" ><i class="fa fa-window-restore"></i> Users</a>
  		<a href="dynamics" class="list-group-item <?php if($_SERVER['SCRIPT_NAME'] == '/product/products.php'){echo 'active';}?>" ><i class="fa fa-window-restore"></i> Dynamic Values</a>
  		<a href="card" class="list-group-item <?php if($_SERVER['SCRIPT_NAME'] == '/product/products.php'){echo 'active';}?>" ><i class="fa fa-window-restore"></i> Cardes</a>
  		<a href="requests" class="list-group-item <?php if($_SERVER['SCRIPT_NAME'] == '/product/products.php'){echo 'active';}?>" ><i class="fa fa-window-restore"></i> Requests</a>
  		<a href="logout" class="list-group-item <?php if($_SERVER['SCRIPT_NAME'] == '/freelance/logout.php'){echo 'active';}?>"><i class="fa fa-power-off"></i> Logout</a>
  	</div>
  	
  </div>
  
</div>

<!-- /.navbar-collapse -->