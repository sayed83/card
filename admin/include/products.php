<?php 
if(isset($_GET['new_product'])){
	?>
	
	<div class="panel panel-default">
		<div class="panel-heading">New Product</div>
		<div class="panel-body">
			<form action="#"  alert="yes" redirect="products" id="product_add_form"    >
				<div class="form-group col-md-6">
					<label for="">Product Name</label>
					<input type="text" name="name"  class="form-control" />
				</div>
				<div class="form-group col-md-6">
					<label for="">Category</label>
					<select name="cat" id="" class="form-control">
						<option value="0">Select Category</option>
					<?php 
					$categories = $query_class->query('all_data',array('category'));
					foreach($categories as $cats){?>
						<option value="<?php echo $cats['id'];?>"><?php echo $cats['name'];?></option>
					<?php } ?>
					</select>
				</div>
				<div class="form-group  col-md-6">
					<label for=""> Stock</label>
					<input type="text" name="stock"  class="form-control" />
				</div>
				<div class="form-group col-md-6">
					<label for=""> Price</label>
					<input type="text" name="price"  class="form-control" />
				</div>
				<div class="form-group col-md-6">
					<label for=""> pv</label>
					<input type="text" name="pv"  class="form-control" />
				</div>
				<div class="form-group col-md-6">
					<label for=""> mrp</label>
					<input type="text" name="mrp"  class="form-control" />
				</div>
				<div class="form-group col-md-6">
					<label for=""> code</label>
					<input type="text" name="code"  class="form-control" />
				</div>
				<div class="form-group col-md-6">
					<label for=""> Short Details</label>
					<input type="text" name="short_descp"  class="form-control" />
				</div>
				<div class="form-group col-md-12">
					<input type="file" name="image_one"  />
					<input type="file" name="image_two"  />
					<input type="file" name="image_three"  />
					<input type="file" name="image_four"  />
				</div>
				<div class="form-group col-md-12 product_add_form"></div>
				<div class="form-group col-md-12">
					<input type="submit"  class="btn btn-success form-control"  value="Add Product"  />
				</div>
			</form>
		</div>
	</div>
	<?php
}else if(isset($_GET['edit_product'])){
	$pid = sanetize($_GET['edit_product']);
	$product_info = $query_class->multi_query(array('*','products'),array("`id` = '$pid' ORDER BY `id` DESC LIMIT 1"));
	$product_info = mysqli_fetch_assoc($product_info);
	
	?>
	<div class="panel panel-default">
		<div class="panel-heading">Edit Product</div>
		<div class="panel-body">
			<form action="api/product.php"  alert="yes" redirect="products" id="product_edit_form" class="ez_form"     >
				<div class="form-group col-md-6">
					<label for="">Product Name</label>
					<input type="hidden" name="edit_pid" value="<?php echo $product_info['id'];?>"   class="form-control" />
					<input type="text" name="edit_name" value="<?php echo $product_info['name'];?>"   class="form-control" />
				</div>
				<div class="form-group col-md-6">
					<label for="">Category</label>
					<select name="edit_cat" id="" class="form-control">
						<option value="<?php echo $product_info['cat'];?>">Select Category</option>
					<?php 
					$categories = $query_class->query('all_data',array('category'));
					foreach($categories as $cats){?>
						<option value="<?php echo $cats['id'];?>"><?php echo $cats['name'];?></option>
					<?php } ?>
					</select>
				</div>
				<div class="form-group  col-md-6">
					<label for="">Stock</label>
					<input type="text" name="edit_stock"  value="<?php echo $product_info['stock'];?>"   class="form-control" />
				</div>
				<div class="form-group col-md-6">
					<label for="">Price</label>
					<input type="text" name="edit_price"  value="<?php echo $product_info['price'];?>"   class="form-control" />
				</div>
				<div class="form-group col-md-6">
					<label for="">pv</label>
					<input type="text" name="edit_pv"  value="<?php echo $product_info['pv'];?>"   class="form-control" />
				</div>
				<div class="form-group col-md-6">
					<label for="">mrp</label>
					<input type="text" name="edit_mrp"  value="<?php echo $product_info['mrp'];?>"   class="form-control" />
				</div>
				<div class="form-group col-md-6">
					<label for="">code</label>
					<input type="text" name="edit_code"  value="<?php echo $product_info['code'];?>"   class="form-control" />
				</div>
				<div class="form-group col-md-6">
					<label for="">Short Details</label>
					<input type="text" name="edit_short_descp"  value="<?php echo $product_info['short_details'];?>"   class="form-control" />
				</div>
				<div class="form-group col-md-12 product_add_form"></div>
				<div class="form-group col-md-12">
					<input type="submit"  class="btn btn-success form-control"  value="Add Product"  />
				</div>
			</form>
		</div>
	</div>
<?php }else if(isset($_GET['stock_update'])){
	$pid = sanetize($_GET['stock_update']);
	$product_name = $query_class->query('single_data',array('`name`','products','id','=',$pid,'name'));
	
	?>
	<div class="panel panel-default">
		<div class="panel-heading">Edit Product</div>
		<div class="panel-body">
			<form action="api/product.php"  alert="no" redirect="products" id="stock_update_form" class="ez_form form-inline"     >
				<div class="form-group">
					<label for="">Edit product : <?php echo $product_name;?></label>
					<input type="text" name="update_stock" class="form-control"  placeholder="Update Stock"   />
					<input type="hidden" name="update_stock_pid" value="<?php echo $pid;?>"  class="form-control"  placeholder="Update Stock"   />
				</div>
				<div class="form-group col-md-12 stock_update_form"></div>
				<div class="form-group col-md-12">
					<input type="submit"  class="btn btn-success form-control"  value="Add Product"  />
				</div>
			</form>
		</div>
	</div>
<?php }else if(isset($_GET['features'])){
	$pid = sanetize($_GET['features']);
	$product_name = $query_class->query('single_data',array('`name`','products','id','=',$pid,'name'));
	
	?>
	<div class="panel panel-default">
		<div class="panel-heading">Product Features <span class="pull-right add_features">Add Feature</span></div>
		<div class="panel-body">
			<form action="api/product.php" alert="no" redirect="products" id="features_add_form" class="ez_form"     >
				<div class="form-group">
					<label for="">Add features for product : <?php echo $product_name;?></label>
					
				</div>
				<input type="hidden" value="1"  class="features_sl" />
				<input type="hidden" value="<?php echo $pid;?>" name="details_pid"   class="features_sl" />
				<div class="form-group col-md-6">
					<input type="text" name="title_1" class="form-control" placeholder="Title" />
				</div>
				<div class="form-group col-md-6">
					<input type="text" name="text_1"  class="form-control" placeholder="Text"  />
				</div>
				<span class="load_features">
				</span>
				<div class="form-group col-md-12 features_add_form"></div>
				<div class="form-group col-md-12">
					<input type="submit"  class="btn btn-success form-control"  value="Add Product"  />
				</div>
			</form>
		</div>
	</div>
	
<?php }else if(isset($_GET['edit_features'])){
	$pid = sanetize($_GET['edit_features']);
	$product_name = $query_class->query('single_data',array('`name`','products','id','=',$pid,'name'));
	
	?>
	<div class="panel panel-default">
		<div class="panel-heading">Product Features edit </div>
		<div class="panel-body">
			<form action="api/product.php" alert="yes" redirect="products" id="features_edit_form" class="ez_form"     >
				<div class="form-group">
					<label for="">Update features for product : <?php echo $product_name;?></label>
					
				</div>
					<input type="hidden" name="edit_feature"  />
				<?php
					$features = $query_class->query('rows',array('*','product_details','pid','=',$pid));
					foreach($features as $feature){?>
						<div class="form-group col-md-6">
							<input type="text" name="title_<?php echo $feature['id'];?>"  value="<?php echo $feature['details_title'];?>"  class="form-control" />
						</div>
						<div class="form-group col-md-6">
							<input type="text" name="text_<?php echo $feature['id'];?>" value="<?php echo $feature['details'];?>"  class="form-control" />
						</div>
					<?php } ?>
				<div class="form-group col-md-12 features_edit_form"></div>
				<div class="form-group col-md-12">
					<input type="submit"  class="btn btn-success form-control"  value="Add Product"  />
				</div>
			</form>
		</div>
	</div>
	
<?php }else if(isset($_GET['edit_images'])){
	$pid = sanetize($_GET['edit_images']);
	$product_name = $query_class->query('single_data',array('`name`','products','id','=',$pid,'name'));
	
	?>
	<div class="panel panel-default">
		<div class="panel-heading">Product Features edit </div>
		<div class="panel-body">
			<form action="#"  id="image_edit_form" class=""     >
				<div class="form-group">
					<label for="">Update images for product : <?php echo $product_name;?></label>
				</div>
				<div class="form-group col-md-6">
					<input type="hidden" name="pid_image_edit" value="<?php echo $pid;?>"   class="form-control" />
					<input type="file" name="image_one_edit"  class="form-control" />
				</div>		
				<div class="form-group col-md-6">
					<input type="file" name="image_two_edit"  class="form-control" />
				</div>		
				<div class="form-group col-md-6">
					<input type="file" name="image_three_edit"  class="form-control" />
				</div>		
				<div class="form-group col-md-6">
					<input type="file" name="image_four_edit"  class="form-control" />
				</div>		
				<div class="form-group col-md-12 image_edit_form"></div>
				<div class="form-group col-md-12">
					<input type="submit"  class="btn btn-success form-control"  value="Add Product"  />
				</div>
			</form>
		</div>
	</div>
	
<?php }

?>