<?php

include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<?php include('partials/header.php'); ?>

<div class="container" style="padding-top:50px;">
	<div class="col-md-8 col-md-offset-2">
		<a class="btn btn-primary" href="add.php">Add New Data</a><br/><br/>

		<table class="table table-bordered table-hover">

			<tr class="success">
				<th>Name</th>
				<th>Age</th>
				<th>Email</th>
				<th>Update</th>
			</tr>
			<?php
			//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
			while($res = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>".$res['name']."</td>";
				echo "<td>".$res['age']."</td>";
				echo "<td>".$res['email']."</td>";
				echo "<td><a class='btn btn-success' href=\"edit.php?id=$res[id]\">Edit</a>  <a class='btn btn-danger'  href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
			}
			?>
		</table>
	</div>
</div>
<?php include('partials/footer.php'); ?>