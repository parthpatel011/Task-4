
<?php

$connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
if (isset($_GET['edit']))
$id = $_GET['edit'];
$query1 = "SELECT * FROM subjects WHERE subject_id= '$id'";
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

<label>Subject Id :</label>
<input type="number" value="<?php echo $row['subject_id'] ?>" name="sub_id" readonly> <br> <br>

<label>Subject Name :</label>
<input type="text" value="<?php echo $row['subject_name'] ?>" name="sub_name"> <br> <br>

<input type="submit" value="Save changes" name="submit">
</form>


<?php

echo "<button><a href='subjects.php'>Back</a></button>";

?>
</body>
</html>


<?php
$connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');

if (isset($_POST['submit'])) {

    $id = $_POST['sub_id'];
    $sub_name = $_POST['sub_name'];

    $query3 = "UPDATE subjects SET subject_name='$sub_name' WHERE subject_id = $id";
    $result = mysqli_query($connection, $query3);

    if ($result) {
        echo "Data has been Updated";
    } else {
        echo "Something went wrong" . mysqli_error($connection);
    }
}

?>
