<?php
if(isset($_POST['assign'])){
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    $id = $_POST['id']; // Updated name attribute
    $standard_id = $_POST['standard_id']; // Updated name attribute
    $query ="INSERT INTO stuTostd (stu_id, std_id) VALUES ($id, $standard_id)";
    $result3 = mysqli_query($connection, $query);
    if(!$result3){
        die('Query Failed' . mysqli_error($connection));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="student">Select Student</label>
        <select name="id" id="student"> <!-- Updated name attribute -->
            <?php
            $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
            $query1 = "SELECT user_data.fname, user_data.id FROM user_data INNER JOIN user_type ON 
            user_data.id = user_type.user_id INNER JOIN accessType ON 
            user_type.access_type_id = accessType.id WHERE 
            accessType.Designation = 'Student'";

            $result1 = mysqli_query($connection, $query1);

            foreach ($result1 as $user_data):?>
                <option value="<?php echo $user_data['id']; ?>"><?php echo $user_data['fname']; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="accesstype">Select standard</label>
        <select name="standard_id" id="standard_id"> <!-- Updated name attribute -->
            <?php
            $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
            $query = "SELECT * FROM standard";
            $result2 = mysqli_query($connection, $query);
            foreach ($result2 as $standard):?>
                <option value="<?php echo $standard['standard_id']; ?>"><?php echo $standard['standard']; ?></option>
            <?php endforeach; ?>
        </select><br><br>
        <input type="submit" name="assign" value="Assign">
    </form>
</body>
</html>
