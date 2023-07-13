
<?php

$connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
if (isset($_GET['edit']))
$id = $_GET['edit'];
$query1 = "SELECT * FROM user_data WHERE id= '$id'";
$result = mysqli_query($connection, $query1);
$row = mysqli_fetch_assoc($result);
// print_r($row);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
</head>
<style>

</style>
<body>

<form action="" method="post" enctype="multipart/form-data">

<h1>Update Information</h1>

<label>ID :</label>
<input type="number" value="<?php echo $row['id'] ?>" name="id" readonly> <br> <br>

<label>First Name :</label>
<input type="text" value="<?php echo $row['fname'] ?>" name="fname"> <br> <br>

<label>Last Name :</label>
<input type="text" value="<?php echo $row['lname'] ?>" name="lname"> <br> <br>

<label>Email :</label>
<input type="email" value="<?php echo $row['email'] ?>" name="email"> <br> <br>


<label>State :</label>
<input type="text" value="<?php echo $row['state'] ?>" name="state"> <br> <br>

<label>City :</label>
<input type="text" value="<?php echo $row['city'] ?>" name="city"> <br> <br>

<input type="submit" value="Save changes" name="submit">

<?php

echo "<div class='back_btn'>";
echo "<a href='dashboard.php'>Back</a>";
echo "</div>";

?>

</form>

</body>
</html>

<?php
$connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $city = $_POST['city'];


    $query3 = "UPDATE user_data SET id='$id',fname='$fname',lname='$lname',email='$email',state='$state',city='$city' WHERE id =$id";
    // print_r($query3);
    $result = mysqli_query($connection, $query3);

    if ($result) {
        echo "Data has been Updated";
    } else {
        echo "Something went wrong" . mysqli_error($connection);
    }
}

?>