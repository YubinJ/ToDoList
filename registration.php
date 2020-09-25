<?php
require 'db_conn.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title >タスク登録</title>
	<link rel="stylesheet" href="css/style.css">
	
	<style>
		div{
			font-size: 8px;
		}
	</style>
	
</head>

<body>
	<div>
		<?php
		if(isset($_POST['create'])){
			$title = $_POST['title'];
			$content = $_POST['content'];
			$date_requested = $_POST['date_requested'];
			$date_finished = $_POST['date_finished'];
			$priority = $_POST['priority'];
			
			$sql = "INSERT INTO todos (title, content, date_requested, date_finished, priority) VALUES(?,?,?,?,?)";
			$stmtinsert = $conn->prepare($sql);
			$result = $stmtinsert->execute([$title, $content, $date_requested,$date_finished, $priority]);
			if($result){
				echo 'Successful!';
				header("Location: index.php");
			}else {
				echo 'Errors!';
			}
		}
		?>
	</div>
	
	<div class="main-section">
		<form action="registration.php" method="post">
			<div class="add-section">
				<h1>タスク登録<h1>
				<p>タスクの名前、内容、予定日、優先順位を入力してください<p>
				<hr class="mb-3">
				<label for="title"><b>タスク名</b></label>
				<input type="text" 
						 name="title" 
						 placeholder="タスク名" 
						 required >
						 
				<label for="content"><b>タスク内容</b></label>
				<input type="text" 
						 name="content" 
						 placeholder="内容" 
						 required >
						 
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
		 
				<input type="submit" id="register" name="create" value="タスク追加">	
			</div>
		</form>
		<br>
		<div class="add-section">		 
			<form action="index.php">
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