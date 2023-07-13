
<?php

$connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
if (isset($_GET['edit']))
$id = $_GET['edit'];
$query1 = "SELECT * FROM standard WHERE standard_id= '$id'";
$result = mysqli_query($connection, $query1);
$row = mysqli_fetch_assoc($result);
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

<label>Standard Id :</label>
<input type="number" value="<?php echo $row['standard_id'] ?>" name="std_id" readonly> <br> <br>

<label>Standard :</label>
<input type="text" value="<?php echo $row['standard'] ?>" name="std"> <br> <br>

<input type="submit" value="Save changes" name="submit">
</form>


<?php

echo "<button><a href='standard.php'>Back</a></button>";

?>
</body>
</html>


<?php
$connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');

if (isset($_POST['submit'])) {

    $id = $_POST['std_id'];
    $std = $_POST['std'];

    $query3 = "UPDATE standard SET standard='$std' WHERE standard_id = $id";
    $result = mysqli_query($connection, $query3);

    if ($result) {
        echo "Data has been Updated";
    } else {
        echo "Something went wrong" . mysqli_error($connection);
    }
}

?>
