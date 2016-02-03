<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../bootstrap.css" />
</head>
<body>

<div class="title_box">Controls</div>
	<ul class="nav nav-pills nav-stacked">
		<li role="presentation"><a href="adminCategories.php">Categories</a></li>
		<li role="presentation"><a href="adminSubcategories.php">Subcategories</a></li>
		<li role="presentation" class='dropdown'>
			<a class="dropdown-toggle" data-toggle="dropdown" href="adminProducts.php" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
			<span class="caret"></span>	
		<ul class="dropdown-menu">
			<li ><a href="adminProducts.php">Add New</a></li>
			<li ><a href="adminEditProduct.php">Edit</a></li>
			<li ><a href="adminDeleteProduct.php">Delete</a></li>
		</ul>
		</li>
		<li role="presentation"><a href="#">Customer's Profile</a></li>
		<li role="presentation"><a href="#">Customer's Order History</a></li>
	</ul>
</body>
</html>




	