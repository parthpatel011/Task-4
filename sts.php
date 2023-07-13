<?php
if(isset($_POST['assign'])){
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    $subject_id = $_POST['subject_id']; // Updated name attribute
    $standard_id = $_POST['standard_id']; // Updated name attribute
    $query ="INSERT INTO subTostd (sub_id, std_id) VALUES ($subject_id, $standard_id)";
    $result3 = mysqli_query($connection,$query);
    if(!$result3){
        die('Query Failed'.mysqli_error($connection));
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
        <label for="subject_id">Select Subject</label>
        <select name="subject_id" id="subject_id"> <!-- Updated name attribute -->
            <?php 
            $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
            $query ="SELECT * FROM subjects";
            $result1 = mysqli_query($connection, $query);
            foreach ($result1 as $subjects):?>
                <option value="<?php echo $subjects['subject_id']; ?>"><?php echo $subjects['subject_name']; ?></option>
            <?php endforeach; ?>
        </select><br><br>
        
        <label for="accesstype">Select standard</label>
        <select name="standard_id" id="standard_id"> <!-- Updated name attribute -->
            <?php 
            $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
            $query ="SELECT * FROM standard";
            $result2 = mysqli_query($connection, $query);
            foreach ($result2 as $standard):?>
                <option value="<?php echo $standard['standard_id']; ?>"><?php echo $standard['standard']; ?></option>
            <?php endforeach; ?>
        </select><br><br>   
        <input type="submit" name="assign" value="Assign">
    </form>
</body>
</html>
