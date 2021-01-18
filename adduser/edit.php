<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	//$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$username=mysqli_real_escape_string($mysqli, $_POST['username']);
	$firstName = mysqli_real_escape_string($mysqli, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($mysqli, $_POST['lastName']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);	
	$role = mysqli_real_escape_string($mysqli, $_POST['role']);
	// checking empty fields
	if(empty($username) || empty($firstName) || empty($lastName) ||empty($role)) {	
			
		if(empty($username)) {
			echo "<font color='red'>Wypełnij pole username</font><br/>";
		}
		
		if(empty($firstName)) {
			echo "<font color='red'>Wypełnij pole Imie</font><br/>";
		}
		
		if(empty($lastName)) {
			echo "<font color='red'>Wypełnij pole Nazwisko</font><br/>";
		}	
        if(empty($password)) {
			echo "<font color='red'>Wypełnij pole Haslo</font><br/>";
		}
         if(empty($role)) {
			echo "<font color='red'>Wypełnij pole role</font><br/>";
		}
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET username='$username',firstName='$firstName',lastName='$lastName',password='$password',role='$role' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php

//$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM `users` where 1");

while($res = mysqli_fetch_array($result))
{
	$username = $res['username'];
	$firstName = $res['firstName'];
	$lastName = $res['lastName'];
    $password = $res['password'];
    $role = $res['role'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>user name</td>
				<td><input type="text" name="username" value="<?php echo $username;?>"></td>
			</tr>
			<tr> 
				<td>Imię</td>
				<td><input type="text" name="firstName" value="<?php echo $firstName;?>"></td>
			</tr>
			<tr> 
				<td>Nazwisko</td>
				<td><input type="text" name="lastName" value="<?php echo $lastName;?>"></td>
			</tr>
            <tr> 
				<td>Haslo</td>
				<td><input type="text" name="password" value="<?php echo $password;?>"></td>
			</tr>
             <tr> 
				<td>Rola</td>
				<td><input type="text" name="role" value="<?php echo $role;?>"></td>
			</tr>
			<tr>
				
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
