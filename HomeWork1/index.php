<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="myStyle.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php
require('connect.php');

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query) or die("Invalid query");

$result2 = $conn->query($query);

if ($result2->num_rows > 0) {
?>
    <h2>Users from my database</h2>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Surname</th>
			<th>Email</th>
			<th><img class="img-delete" src="https://img.icons8.com/wired/64/000000/delete-forever.png"></th>
			<th><img class="img-update" src="https://img.icons8.com/carbon-copy/100/000000/edit--v1.png"></th>
		</tr>
		<?php
		while($row = $result->fetch_assoc()){
		    ?>
		    <tr>
			    <td><?php echo $row['id']; ?></td>
			    <td><?php echo $row['Name']; ?></td>
			    <td><?php echo $row['Surname']; ?></td>
			    <td><?php echo $row['Email']; ?></td>
			    <td class="delete"><a href='delete.php?id="<?php echo $row['id']; ?>"'>Delete</a></td>  
			    <td class="update"><a href='update.php?id="<?php echo $row['id']; ?>"'>Update</a></td>  
		    </tr>
		    <?php
		}
		?>
	</table>
<?php
} else {
    echo "0 results";
}
mysqli_close($conn);
?>

<?php
require('connect.php');

if (isset($_POST['name']) && isset($_POST['email'])) {
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];

	$sql = "INSERT INTO users (Name, Surname, email) VALUES ('$name', '$surname', '$email')";
	$result = mysqli_query($conn, $sql);
    
	if ($result) {
        header('Location: index.php'); 
        exit;
	} else {
        echo "Error!!!";
	}
}
?>	
   <div class="container">
   	   <form class="insert" method="POST">
   	   	 <h5>If you fill out this form, your data will appear on the list as at the top</h5>
   	   	 <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
   	   	 <input type="text" class="form-control" name="surname" placeholder="Enter your surname" required>
   	   	 <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
   	   	 <button class="btn btn-lg btn-primary btn-block" type="submit">INSERT</button>
   	   </form>
   </div>
</body>
</html>