<?php
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');

if(isset($_GET['view'])){
    $id = $_GET['view'];
    // echo $id;
    $query_view = "SELECT * FROM user_data WHERE id=$id";
    $result = mysqli_query($connection, $query_view);
}
?>

<!DOCTYPE html> 
<html> 
<head>  
    <title> Fetch Data From Database </title> 
</head> 
<body> 
<table align="center" border="1px"> 
    <tr> 
        <th colspan="8"><h2>User Detail</h2></th> 
    </tr> 
    <tr> <th>ID</th>
        <th> First Name </th> 
        <th> Last Name</th> 
        <th> Email</th> 
        <th> State </th>
        <th> City </th>
        <th> Edit </th> 
        <th> Delete </th> 
    </tr> 
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
        </tr>
    <?php
        } 
    ?>
</table>
</body> 
</html>
