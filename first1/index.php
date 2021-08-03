<?php
	
	include'conn.php';
	
	$existsql = $rollNo = $username = $email = $mobile = $gender = $course = $desc = " "; 

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$rollNo = $_POST['rollno'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$gender = $_POST['gender'];
		$course = $_POST['course'];
		$desc = $_POST['desc'];
	}

if(isset($_POST['submit']))
	{
		$existsql = "Select * from student1 where sNo ='$rollNo'";
    	$result1 = mysqli_query($conn, $existsql);
            $existrows = mysqli_num_rows($result1);
            if ($existrows > 0)
            {
            	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  					<strong>Error!</strong> Student already exists, try another Institute ID.
					</div>';
            }
			else
			{		
				$sql = "INSERT INTO `student1` (`sNo`, `Name`, `email`, `Mobile`, `Gender`, `Course`, `Description`) VALUES ('$rollNo' ,'$username', '$email', '$mobile', '$gender', '$course', '$desc')";
				$result = mysqli_query($conn,$sql);
				if($result)
					{
						echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  							<strong>Success!</strong> Student Details added successfully.
							</div>';
				}
			}
	}



?> 
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<title>StudentAddmissionForm</title>
	</head>
	<body class="text-center border">
		
		<div><h1  style="background-color:green;"  class="text-center my-3 border">Student Addmission form <button type="submit" name="view" class="btn btn-warning mb-1" class="float-right"  onclick="window.location.href = './table.php';"> Show Details</button></h1></div>
		<fieldset>
		<form class="container-fluid my-2 px-5" action="index.php" method="post">
		  <div class="mb-3">
		    <label for="rollno" class="form-label"><h4>Institute ID :</h4></label>
		    <input type="text"  name="rollno">
		  </div>
		  <div class="mb-3">
		    <label for="username" class="form-label"><h4>Name :</h4></label>
		    <input type="text"  name="username">
		  </div>
		  <div class="mb-3">
		    <label for="email" class="form-label"><h4>email :</h4></label>
		    <input type="email"  name="email">
		  </div>
		  <div class="mb-3">
		    <label for="mobile" class="form-label"><h4>Mobile :</h4></label>
		    <input type="text"  name="mobile">
		  </div>
		  <div class="mb-3">
		    <label for="gender" class="form-label"><h4>Gender </h4></label>
		    <input type="radio"  value="Male" name="gender">Male
		    <input type="radio"  value="female" name="gender">Female
		  </div>
		  <div class="mb-3">
				<label for="course" class="form-label"><h4>Course</h4></label>
					<select name="course" id="course">
				  	<option value="BCA">BCA</option>
				  	<option value="BBA">BBA</option>
				  	<option value="B.Com">B.Com</option>
				  	<option value="B.Tech">B.Tech</option>
				  	<option value="B.Sc">B.Sc</option>
				</select>
		  </div>
		    <div class="mb-3">
		    <label for="desc" class="form-label"><h4>Description</h4></label>
		    <textarea id="desc" name="desc" rows="4" cols="50">
			</textarea>
		  </div>
		  <button type="submit" name="submit" class="btn btn-success">Submit</button>
		  
		</form>
	</fieldset>
	</body>
</html>