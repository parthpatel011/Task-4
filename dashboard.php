<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
session_start();
$email_id = $_SESSION['email'];

$connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');

$query1 = "SELECT accessType.Designation, user_data.fname FROM user_data INNER JOIN 
user_type ON user_data.id = user_type.user_id INNER JOIN accessType ON user_type.access_type_id
 = accessType.id WHERE user_data.email = '$email_id'"; 

$result1 = mysqli_query($connection, $query1);
$row = mysqli_fetch_assoc($result1);
?>
<h1>User Dashboard</h1>
<h3><?php echo "Welcome $row[fname]" ?></h3>
<h3><?php echo "You Role is $row[Designation]" ?></h3>

    <form action="" method="post">
    <label for="new_user">Add New User := </label>
    <input type="submit" name="new_user" value="Add New User">
    <br>
    <br>
    <label for="list">List All User := </label>
    <input type="submit" name="list" value="List All Data">
    <br><br>
    
    <?php
        if(($row[Designation] == "Admin") || ($row[Designation] == "Teacher")){
            ?>
            <button>
                <a href="education.php">Education Portal</a>
            </button>

            <?php
        }
    ?>
    <button><a href="logout.php">logout</a></button>
    
    </form>
  


<?php
// session_start();
if (!(isset($_SESSION['login'])) || $_SESSION['login'] != true) {
    header("Location: login.php");
    exit;
}

if(isset($_POST['new_user'])){
    header('location:newuser.php');
}
if(isset($_POST['list'])){
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    if (!$connection) {
        die('Database connection failed.');
    }

    $query = "SELECT * FROM user_data";
    $result = mysqli_query($connection, $query);

?>

    <table align="center" border="1px"> 
    <tr> 
        <th colspan="9"><h2>User Detail</h2></th> 
    </tr> 
    <tr> <th>ID</th>
        <th> First Name </th> 
        <th> Last Name</th> 
        <th> Email</th> 
        <th> State </th>
        <th> City </th>
        <th> Edit </th> 
        <th> Delete </th> 
        <th> View </th> 
    </tr> 
    <?php

?>

    <?php 
        while ($rows = mysqli_fetch_assoc($result)) { 
    ?> 
        <tr> 
            <td><?php echo $rows['id']; ?></td> 
            <td><?php echo $rows['fname']; ?></td> 
            <td><?php echo $rows['lname']; ?></td> 
            <td><?php echo $rows['email']; ?></td> 
            <td><?php echo $rows['state']; ?></td> 
            <td><?php echo $rows['city']; ?></td> 
            <td><a href="update.php?edit=<?php echo $rows['id']; ?>">Edit</a></td>
            <td><a href="delete.php?delete=<?php echo $rows['id']; ?>">Delete</a></td>
            <td><a href="singleview.php?view=<?php echo $rows['id']; ?>">View</a></td>
        </tr>
    <?php
        }
    } 
    ?>
</table>
</body>
</html>


