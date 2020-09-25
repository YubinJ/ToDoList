<?php
$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "todoリスト";

$conn = mysqli_connect($sName, $uName, $pass, $db_name);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title >タスク変更</title>
	<link rel="stylesheet" href="../css/style.css">
	
	<style>
		div{
			font-size: 8px;
		}
	</style>
	
</head>

<body>
	<div>
		<?php
		if(isset($_POST['edit'])){
			$id = $_POST['edit'];
			$title = $_POST['title'];
			$content = $_POST['content'];
			$date_requested = $_POST['date_requested'];
			$date_finished = $_POST['date_finished'];
			$priority = $_POST['priority'];
			
			echo $id;
			$query = "UPDATE todos SET title= '$_POST[title]' WHERE 'id' = $id ";
			
			$result = mysqli_query($conn, $query);
			
			if($result){
				echo 'Successful!';
			}else {
				echo 'Errors!';
			}
		}
		?>
	</div>
	
	<div class="main-section">
		<form action="update.php" method="post">
			<div class="add-section">
				<h1>タスク変更<h1>
				<p>タスクの名前、内容、予定日、優先順位を入力してください<p>
				<hr class="mb-3">
				<label for="title"><b>タスク名</b></label>
				<input type="text" 
						 name="title" 
						 placeholder="タスク名" >
						 
				<label for="content"><b>タスク内容</b></label>
				<input type="text" 
						 name="content" 
						 placeholder="内容" >
						 
				<label for="date_requested"><b>予定日</b></label>
				<input  type="date" 
						 name="date_requested"  
						 required >
						 
				<label for="date_finished"><b> 完了日</b></label>
				<input  type="date" 
						 name="date_finished"  
						 required >
						 
				<label for="priority"><b>優先順位</b></label>
				<select name="priority">
				<option>--優先順位--</option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				</select>
		 
				<input type="submit" name="edit" value="タスク変更">	
			</div>
		</form>
		<br>
		<div class="add-section">		 
			<form action="../change.php">
				<button> 戻る &nbsp; </button>
			</form>
		</div>
	</div>
	
<script src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(){
			alert('Succeed.');
		});
	});
</script>
</body>	
</html>