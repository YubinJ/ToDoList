<?php
require 'db_conn.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>タスク変更、閲覧</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="main-section">
		<div class="add-section">
			<h2>未完了タスク一覧<h2>
		</div>
		
		<?php
			$todos = $conn->query("SELECT * FROM todos ORDER BY date_requested ASC");
		
		$count = 0;
		
		while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { 
			if($todo['finished']){
				$count++;
			}
		} ?>	
		<form action="app/deleteAll.php" method= "POST" >	
		<div class="show-todo-section">
			<?php if ( $count >= $todos->rowCount()) { ?>
			<div class="todo-item">
				<h2>未完了タスクがありません</h2>
				<br>
			</div>
			<?php } 
				$todos = $conn->query("SELECT * FROM todos ORDER BY date_requested ASC");
				while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { 
					if($todo['finished']){
						//do nothing
					
					}else {  ?>
					<div class="todo-item">
					
						<!--<button type="submit" name="update" id="<?php echo $todo['id']; ?>"
						class="remove-to-do">変更</button>-->
						<a href="app/update.php?edit=<?php echo $todo['id']; ?>" class="remove-to-do">変更</a>
						
						<!--
						<input type="checkbox"
								class="check-box"
								data-todo-id ="<?php echo $todo['id']; ?>"
								/>-->
						<h2 ><?php echo $todo['title'] ?></h2>
						<small><?php echo $todo['content'] ?></small>
						<small>予定日: <?php echo $todo['date_requested'] ?></small>
						<small>優先順位: <?php echo $todo['priority'] ?></small>
					</div>
					<?php }  ?>
			<?php } ?>
		</div>
		
		<div class="add-section">
			<h2>完了タスク一覧<h2>
		</div>
		<?php
			$todos = $conn->query("SELECT * FROM todos ORDER BY date_finished DESC");
		?>
		
		
			<div class="show-todo-section">
			<?php if($count === 0){ ?>
				<div class="todo-item">
					<h2>完了タスクがありません</h2>
					<br>
				</div>
			<?php } ?>
			
			<?php	while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { 
						if($todo['finished']){ ?>
							<div class="todo-item">
							
							<!--<button type="submit" name="update" id="<?php echo $todo['id']; ?>"
							class="remove-to-do">変更</button> -->
							
							<a href="app/update.php?edit=<?php echo $todo['id']; ?>" class="remove-to-do">変更</a>
							
							<!--
							<input type="checkbox"
									class="check-box"
									data-todo-id ="<?php echo $todo['id']; ?>"
									checked />-->
									
							<h2 class="checked"><?php echo $todo['title'] ?></h2>
							<small><?php echo $todo['content'] ?></small>
							<small>予定日：<?php echo $todo['date_requested'] ?></small>
							<small>完了日：<?php echo $todo['date_finished'] ?></small>
							<small>優先順位: <?php echo $todo['priority'] ?></small></div>
						<?php }else {}  ?>
						
				
					
				<?php } ?>
			</div>
			
			
			
		</form>
		<?php
			$todos = $conn->query("SELECT * FROM todos ORDER BY date_requested DESC");
		?>
		
		
		<div class="add-section">
			<form action="index.php">
			<button> 戻る &nbsp; </button>
			</form>
		</div>
		
		<script src="js/jquery-3.2.1.min.js"></script>
		<script>
		$(document).ready(function(){
			$(".check-box").click(function(){
				const id = $(this).attr('data-todo-id');
				
				$.post('app/finish.php',
					{
						id:id
					},
					(data) => {
						if(data != 'error'){
							const h2 = $(this).next();
							if(data === '1'){
								h2.removeClass('checked');
							}else{
								h2.addClass('checked');
							}
						}
					}
				);
			});
		});
		
		</script>
		
		
	</div>
	
</body>	
</html>