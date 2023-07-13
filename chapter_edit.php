
<?php

$connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
if (isset($_GET['edit']))
$id = $_GET['edit'];
$query1 = "SELECT * FROM chapters WHERE chapter_id= '$id'";
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

<label>Chapter Id :</label>
<input type="number" value="<?php echo $row['chapter_id'] ?>" name="chap_id" readonly> <br> <br>

<label>Subject Name :</label>
<input type="text" value="<?php echo $row['chapter_name'] ?>" name="chap_name"> <br> <br>

<input type="submit" value="Save changes" name="submit">
</form>


<?php

echo "<button><a href='chapters.php'>Back</a></button>";

?>
</body>
</html>


<?php
$connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');

if (isset($_POST['submit'])) {

    $id = $_POST['chap_id'];
    $sub_name = $_POST['chap_name'];

    $query3 = "UPDATE chapters SET chapter_name='$sub_name' WHERE chapter_id = $id";
    $result = mysqli_query($connection, $query3);

    if ($result) {
        echo "Data has been Updated";
    } else {
        echo "Something went wrong" . mysqli_error($connection);
    }
}

?>
