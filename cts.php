<?php
if(isset($_POST['assign'])){
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    $subject_id = $_POST['subject_id']; // Updated name attribute
    $chapter_id = $_POST['chapter_id']; // Updated name attribute
    $query ="INSERT INTO chapTosub (sub_id, chap_id) VALUES ($subject_id, $chapter_id)";
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
        <label for="accesstype">Select Subject</label>
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
        <select name="chapter_id" id="chapter_id"> <!-- Updated name attribute -->
            <?php 
            $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
            $query ="SELECT * FROM chapters";
            $result2 = mysqli_query($connection, $query);
            foreach ($result2 as $chapters):?>
                <option value="<?php echo $chapters['chapter_id']; ?>"><?php echo $chapters['chapter_name']; ?></option>
            <?php endforeach; ?>
        </select><br><br>   
        <input type="submit" name="assign" value="Assign">
    </form>
</body>
</html>
