<link rel="stylesheet" type="text/css" href="myStyle.css">
<?php
require('connect.php');

if (isset($_GET['id'])) {
  $id = $_GET['id']; 
  
  $sql = "SELECT * FROM users WHERE id =$id";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {

  	while($row = $result->fetch_assoc()){
  	 	?>
  	 	
	  	<form class="update-form" method="POST">
	  		  <h2>Update user</h2>
		      <label >ID</label>
		      <input class="inputStyle" name="id" value="<?php echo $row['id'] ?>">
		      <label >Name</label>
		      <input class="inputStyle" type="text" name="name" value="<?php echo $row['Name'] ?>">
		      <label >Surname</label>
		      <input class="inputStyle" type="text" name="surname" value="<?php echo $row['Surname'] ?>">
		      <label >Email</label>
		      <input class="inputStyle" type="text" name="email" value="<?php echo $row['Email'] ?>">
		      <input class="update-btn" type="submit" name="submit" value="Update">
		</form>
		<?php
	}
  }
} else {
    echo "Something went wrong!";
    exit;
}

    if (isset($_POST['submit'])) {
		$id = $_POST['id'];
		$name =$_POST['name'];
		$surname =$_POST['surname'];
		$email =$_POST['email'];

		$sql = "UPDATE users SET Name = '$name', Surname = '$surname', Email = '$email' WHERE id = $id";
var_dump($sql);
		if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			header('Location: index.php'); 
			exit;
		} else {
			echo "Error updating record".$conn->error;;
		}
	}
?>