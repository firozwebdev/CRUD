<?php

include_once("config.php");

if(isset($_POST['update']))
{
	$id = $_POST['id'];
	$name=$_POST['name'];
	$age=$_POST['age'];
	$email=$_POST['email'];

	// checking empty fields
	if(!empty($name) && !empty($age) && !empty($email)) {

		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
		header("Location: index.php");

	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
}
?>
<?php include('partials/header.php'); ?>
	<div class="container" style="padding-top:50px;">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<a class="btn btn-primary" href="index.php">Home</a>
				<br/><br/>


				<form action="edit.php" method="post" name="form1">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="name" name="name" class="form-control" id="name" value="<?php echo $name; ?>">
					</div>
					<div class="form-group">
						<label for="age">Age</label>
						<input type="age" name ="age" class="form-control" id="age"  value="<?php echo $age; ?>">
					</div>
					<div class="form-group">
						<label for="email">Email address</label>
						<input type="email" name="email" class="form-control" id="exampleInputEmail1"  value="<?php echo $email; ?>">
					</div>
					<input type="hidden" name="id" value="<?php echo $id;?>">
					<button type="submit"   name="update" class="btn btn-default">Update</button>
				</form>
			</div>
		</div>
	</div>
<?php include('partials/header.php'); ?>