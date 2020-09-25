<?php
$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "todoリスト";

$conn = mysqli_connect($sName, $uName, $pass, $db_name);

if(!$conn){
	die("connection Failed:" .mysqli_connect_error());
}
	
	if(isset($_POST['delete'])){
		$numberOfCheckbox = count ($_POST['checkboxD']);
		$i = 0;
		while ($i<$numberOfCheckbox){
			
			$key = $_POST['checkboxD'][$i];
			mysqli_query($conn, "DELETE FROM todos WHERE id = '$key' ");
			$i++;
		}
	}
	header("Location: ../index.php");
	mysqli_close($conn);
	
?>
	