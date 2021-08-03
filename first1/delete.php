<?php
		include'conn.php';
		
		$id = $_GET['id'];

	    $sql = "DELETE FROM `student1` WHERE `student1`.`sNo` = $id";
	    
	    $result = mysqli_query($conn, $sql);
	    if($result){
	    header('location:table.php');        	
		}
?>
