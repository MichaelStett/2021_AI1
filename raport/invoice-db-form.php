<?php

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'invoicedb');
?>
<html>
	<head>
		<title>Invoice Generator</title>
	</head>
	<body>
		Select invoice:
		<form method='get' action='invoice-db.php'>
			<select name='id'>
				<?php
					$query=mysqli_query($con,'SELECT * FROM `invoicesale` WHERE 1 ');
					while($invoice=mysqli_fetch_array($query)){
						echo "<option value='".$invoice['id']."'>".$invoice['id']."</option>";
					}
				?>
			</select>
			<input type='submit' value='Generate'>
            <html>
		</form>
            <button onclick="history.go(-1);">Back </button>
	</body>
</html>
    
    

    