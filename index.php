<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "task1";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn)   // testing the connection  
{
    die("Cannot connect to the database");
}

$id = $username = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['name'];
    $id = $_POST['id'];
}

$sql = "INSERT INTO `TOAPP` (`Name`) VALUES ('$username')";

$result = mysqli_query($conn,$sql);


$sql2 = "DELETE FROM `TOAPP` WHERE `TOAPP`.`sNo` = $id";

$result=mysqli_query($conn,$sql2);

// echo $sql2;

?>



<!DOCTYPE HTML>
<html lang="ja">

<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
</head>

<body class="container">
    <h1>Todo List</h1>
    <form method="post" action="">
        <input type="text" name="name" value="">
        <input type="submit" name="submit" value="Add">
    </form>
    <h2>Current Todos</h2>
    <table class="table table-striped">
        <therad>
            <th>Task</th>
            <th></th>
        </therad>
        <tbody>
            <?php
            $sql1 = "SELECT * FROM `TOAPP`";
            $result = mysqli_query($conn, $sql1);
            while($row=mysqli_fetch_array($result))
            {
          
            ?>
                <tr>
                    <td><h3><b><?php echo $row['Name']; ?></b></h3></td>
                    <td>
                        <form method="POST">
                            <button type="submit" name="delete">DELETE</button>
                            <input type="hidden" name="id" value="<?php echo $row['sNo'] ?>">
                            <input type="hidden" name="delete" value="true">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>