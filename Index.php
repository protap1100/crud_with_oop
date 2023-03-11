
<?php 
 // including the class file
    include 'class.php';

    // spl_autoload_register(function($classname){
    // 	include 'class/'.$classname.'.php';
    // });
 //object for class   
    $obj = new Model();

//inserting Record
if (isset($_POST['submit'])) {
	 $obj->InsertingRecord($_POST);
}

//Updating Record

if (isset($_POST['update'])) {
	 $obj->UpdatingRecord($_POST);
}

//Deleting Record 

if (isset($_GET['deleteid'])) {
	$delid=$_GET['deleteid'];
	    $obj->DeleteRecord($delid);
}


  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Crud With OOP PHP </title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
	<h1 class="text-center text-info" >CRUD Operation with OOP PHP</h1>
	   <div class="container">
	   	<div class="text-center"><button class="btn btn-primary "> <a class="text-light" href="index.php">Index</a> </button></div>
	   	<!-- Message -->
	   	<?php   
	   	if (isset($_GET['msg']) AND $_GET['msg']=='ins') {
	   			echo '<div class="alert alert-primary" role="alert">
					  Inserted Successfully..!
					</div>';
	   	}


	   	if (isset($_GET['msg']) AND $_GET['msg']=='ups') {
	   			echo '<div class="alert alert-primary" role="alert">
					  Updated Successfully..!
					</div>';
	   	}
	   	if (isset($_GET['msg']) AND $_GET['msg']=='del') {
	   			echo '<div class="alert alert-primary" role="alert">
					  Deleted Successfully..!
					</div>';
	   	}


	   	 ?>

	   	 <?php  
			// Updating the data
			if (isset($_GET['editid'])) {
				$editid = $_GET['editid'];
				$myrecord = $obj->DisplayRecordById($editid);
				
				?>
				<!-- Updating form  -->
					<form method="post" action="">
					  <div class="form-group">
					    <label >Name:</label>
					    <input type="text" class="form-control" name="name" value="<?php echo $myrecord['name'];  ?>" placeholder="Enter Your Name:">
					  </div>
					  <div class="form-group">
					    <label >Email:</label>
					    <input type="email" class="form-control" name="email" value="<?php echo $myrecord['email'];  ?>"  placeholder="Enter Your Email:">
					  </div>
					   <div class="form-group">
					    <label >Phone:</label>
					    <input type="number" class="form-control" name="phone" value="<?php echo $myrecord['phone'];  ?>" placeholder="Enter Your Phone:">
					  </div>
					  <input type="hidden" name="hid" value="<?php  echo $myrecord['id'];  ?>">
					  <button type="submit" name="update" class="btn btn-primary">Update</button>
					</form>	
				<?php
            }else{
	   	  ?>
			<form method="post" action="">
			  <div class="form-group">
			    <label >Name:</label>
			    <input type="text" class="form-control" name="name" placeholder="Enter Your Name:">
			  </div>
			  <div class="form-group">
			    <label >Email:</label>
			    <input type="email" class="form-control" name="email"  placeholder="Enter Your Email:">
			  </div>
			   <div class="form-group">
			    <label >Phone:</label>
			    <input type="number" class="form-control" name="phone"  placeholder="Enter Your Phone:">
			  </div>
			  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>	
		<?php } //else closed  ?>
			<h4 class="text-center text-danger">Display</h4>
			<table class="table table-bordered">
				<tr class="bg-primary text text-center">
					<th>S.No:</th>
					<th>Name:</th>
					<th>Email:</th>
					<th>Phone:</th>
					<th>Action:</th>
				</tr>
				<?php 
				//Displaying The Data
				$data= $obj->DisplayRecord();
				$sno = 1;
				foreach($data as $value){
					?>

					<tr class="text-center">
					<td><?php echo $sno++; ?></td>
					<td><?php echo $value['name']; ?></td>
					<td><?php echo $value['email']; ?></td>
					<td><?php echo $value['phone']; ?></td>
					<td>
						<button class="btn btn-primary" name="update"  autofocus> <a href="index.php?editid=<?php echo $value['id']; ?>" class="text-light">Update</a> </button>
						<button class="btn btn-danger" name="delete"><a href="index.php?deleteid=<?php echo $value['id']; ?>" class="text-light">Delete</a></button>
					</td>
				</tr>

				<?php
				}
				 ?>

			</table>
	    </div>
</body>
</html>