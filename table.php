<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>tables</title>
</head>
<body>
 
  

</body>
</html>


 
<?php
	
  include'conn.php';
  // if(!$conn){
  //   die("error".mysql_error());
  // }
  // else
  // {
  //   echo "Success";
  // }
	$sql = "SELECT * FROM `student2`";
  $result= mysqli_query($conn,$sql);
	// $sql = "SELECT * FROM `student1`";


  echo '<table class="table border ">
    <tr>
      <th scope="col">Institute ID</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Gender</th>
      <th scope="col">Course</th>
      <th scope="col">Description</th>
      <th scope="col">Action-1</th>
      <th scope="col">Action-2</th>

    </tr>';
      // echo "<td>"'<img class="coupons" src="'.$row['Image'].'"/>'"/td";

while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>".$row['sNo']."</td>";
      // echo "<td>".$row['Image']."</td>";
      echo "<td>";
      echo "<img src='img/".$row['Image']."' style='width:60px;height:60px;'/>";
      echo "</td>";
      echo "<td>".$row['Name']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "<td>".$row['Mobile']."</td>";
      echo "<td>".$row['Gender']."</td>";
      echo "<td>".$row['Course']."</td>";
      echo "<td>".$row['Description']."</td>";
      echo "<td><a href='delete.php?id=".$row['sNo']."'>Delete</a></td>";
      echo "<td><a href='edit.php?id=".$row['sNo']."'>Edit</a></td>";
      echo "</tr>";

    }
    echo '</table>';
?>

