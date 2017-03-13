

<?php include('partials/header.php'); ?>
<div class="container" style="padding-top:50px;">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<a class="btn btn-primary" href="index.php">Home</a>
			<br/><br/>
			<?php
			//including the database connection file
			include_once("config.php");

			if(isset($_POST['Submit'])) {
				$name = $_POST['name'];
				$age = $_POST['age'];
				$email = $_POST['email'];

				// checking empty fields
				if(!empty($name) && !empty($age) && !empty($email)) {

					$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");
					header("Location:index.php");
				}else{
					echo '<div class="alert alert-danger">Data should be filled properly</div>';
				}
			}
			?>

			<form action="add.php" method="post" name="form1">

				<div class="form-group">
					<label for="name">Name</label>
					<input type="name" name="name" class="form-control" id="name" placeholder="Name">
				</div>
				<div class="form-group">
					<label for="age">Age</label>
					<input type="age" name ="age" class="form-control" id="age" placeholder="Age">
				</div>
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
				</div>
				<button type="submit"   name="Submit" class="btn btn-default">Add</button>
			</form>
		</div>
	</div>
</div>
<?php include('partials/footer.php'); ?>