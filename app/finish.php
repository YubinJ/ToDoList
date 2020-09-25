<?php
	
	if(isset($_POST['id'])){
		require '../db_conn.php';
		$id = $_POST['id'];
		
		if(empty($id)){
			echo error;
		}else {
			$todos = $conn->prepare("SELECT id, finished FROM todos WHERE id=?");
			$todos->execute([$id]);
			
			$todo= $todos->fetch();

			$uId= $todo['id'];
			$finished = $todo['finished'];
			
			$ufinished = $finished ? 0 : 1;
			
			$res = $conn->query("UPDATE todos SET finished=$ufinished WHERE id=$uId");
			
			if($res){
				
				echo $finished;
			}else{
				echo "error";
			}
			
			$conn = null;
			exit();
		}
	}else {
		header("Location: ../index.php?mess=error");
	}

?>
	