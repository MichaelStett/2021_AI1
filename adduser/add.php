<html>
<head>
	<title>Dodaj uzytkownika</title>
</head>
<body>
<?php
include_once("config.php");
if(isset($_POST['Submit'])) {	
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$firstName = mysqli_real_escape_string($mysqli, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($mysqli, $_POST['lastName']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $role = mysqli_real_escape_string($mysqli, $_POST['role']);
		
	// czy sa puste
	if(empty($username) || empty($firstName) || empty($lastName)|| empty($password) ||empty($role)) {
				
		if(empty($username)) {
			echo "<font color='red'>Wypelnij pole username</font><br/>";
		}
		
		if(empty($firstName)) {
			echo "<font color='red'>Wypelnij pole Imie</font><br/>";
		}
		
		if(empty($lastName)) {
			echo "<font color='red'>Wypelnij pole Nazwisko</font><br/>";
		}
		if(empty($password)) {
			echo "<font color='red'>wpisz hasło</font><br/>";
		}
        if(empty($role)) {
			echo "<font color='red'>wpisz role</font><br/>";
		}
//do ostatniej strony 
		echo "<br/><button onclick=\"location.href='javascript:self.history.back();'\">Wypełnij jeszcze raz</button>";
	} else { 	
		$result = mysqli_query($mysqli, "INSERT INTO users(username,firstName,lastName,password,role ) VALUES('$username','$firstName','$lastName','$password','$role')");
		
		//display success message
		echo "<font color='green'>Dodano nowego użytkownika";
		echo "<br/><button onclick=\"location.href='index.php'\">Wyświetl uzytkowników</button>";
	}
}
?>
</body>
</html>
