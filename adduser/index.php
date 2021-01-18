<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id ASC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Strona glowna</title>

</head>

<body>

<form action="add.html">
    <input type="submit" value="Dodaj" />
</form>
    <form action="views/Layout.php">
   
</form>
    
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
        <td>id</td>
		<td>username</td>
		<td>Imie</td>
		<td>Nazwisko</td>
		<td>Hasło</td>
        <td>Rola</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
        echo "<td>".$res['id']."</td>";
		echo "<td>".$res['username']."</td>";
		echo "<td>".$res['firstName']."</td>";
		echo "<td>".$res['lastName']."</td>";
        echo "<td>".$res['password']."</td>";
        echo "<td>".$res['role']."</td>";
		echo "<td><a href=\"edit.php?id=$res[id]\">Edytuj</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Usuń</a></td>";		
	}
        
       
	?>
	</table>
    <button onclick="history.go(-1);">Go back </button>
</body>
</html>
