<?php
		include'conn.php';
		
		$id = $_GET['id'];

		$sql = "SELECT * FROM `student1` WHERE sNo=$id";

		echo $sql;

		$result = mysqli_query($conn, $sql);

		

if(isset($_POST['Update']))
{
		
		$rollNo = $uname = $email = $mobile = $gender = $course = $desc = " ";


		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$rollNo = $_POST['rollNo'];
			$uname = $_POST['username'];
			$email = $_POST['email'];
			$mobile = $_POST['mobile'];
			$gender = $_POST['gender'];
			$course = $_POST['course'];
			$desc = $_POST['desc'];
		}

		$sql2 = "UPDATE `student1` SET `Name` = $uname, `email` = $email, `Mobile` = $mobile, `Gender` = $gender, `Course` = $course, `Description` = $desc WHERE `student1`.`sNo` = $id";
		$result2 = mysqli_query($conn,$sql2);
		if($result2)
		{
			echo "Data updated";
		}
}
?>

<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<title>UpdateForm</title>
	</head>
	<body class="text-center border">


<?php 
	while($row = mysqli_fetch_array($result))
	{
		print_r($row);
	
?>
		
	<div><h1  style="background-color:green;"  class="text-center my-3 border">Update Info <button type="submit" name="view" class="btn 	btn-warning mb-1" class="float-right"  onclick="window.location.href = './table.php';">Show Details</button></h1></div>
	<form class="container-fluid my-2 px-5" action="edit.php" method="post">
		   <div class="mb-3">
		    <label for="rollno" class="form-label"><h4>Institute ID :</h4></label>
		    <input type="text"  name="rollno" value="<?php echo $row['sNo'];?>">
		  </div> 
		  <div class="mb-3">
		    <label for="username" class="form-label"><h4>Name :</h4></label>
		    <input type="text" name="username" value="<?php echo $row['Name'];?>">
		  </div>
		  <div class="mb-3">
		    <label for="email" class="form-label"><h4>email :</h4></label>
		    <input type="email"  name="email" value="<?php echo $row['email'];?>">
		  </div>
		  <div class="mb-3">
		    <label for="mobile" class="form-label"><h4>Mobile :</h4></label>
		    <input type="text"  name="mobile" value="<?php echo $row['Mobile'];?>">
		  </div>
		  <div class="mb-3">
		    <label for="gender" class="form-label"><h4>Gender </h4></label>
		   <?php
		  	if($row['Gender'] == 'Male')
			{
			    echo '<input type="radio" name="gender" value="male" checked="checked"> Male';
			    echo '<input type="radio" name="gender" value="female"> Female'; 
			}
			else {
			    echo '<input type="radio" name="gender" value="male"> Male';
			    echo '<input type="radio" name="gender" value="female" checked="checked"> Female';
			}
			?>
		  </div>
		
		 <?php 

		 $courses = array('BCA'=>'BCA','BBA'=>'BBA','B.Com'=>'B.Com','B.Tech'=>'B.Tech','B.Sc'=>'B.Sc');
		 $db_val = $row['Course'];

		 ?>

		  <div class="mb-3">
			<label for="course" class="form-label"><h4>Course</h4></label>
			<select>
			    <?php 
			    foreach ($courses as $key => $value) { ?>
			    <option value="<?php echo $key; ?>" <?php if($key==$db_val){echo 'selected';}?>><?php echo $value;?></option>
			    <?php }?>
			</select>
		  </div>
		    <div class="mb-3">
		    <label for="desc" class="form-label"><h4>Description</h4></label>
		    <textarea id="desc" name="desc" rows="4" cols="50"><?php echo $row['Description'];?>
			</textarea>
		  </div>
		 
		  <button type="submit" name="update" class="btn btn-info">Update</button>
	</form>
 
<?php 
}
?>
	</body>
</html>

