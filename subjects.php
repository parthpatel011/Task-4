<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method = "POST">
        <label for="subject_name">Enter Subject name</label>
        <input type="text" name = "subject_name">
        <br><br>
        <button name = "add_subject">ADD Subjects</button>
        <br><br>
        <button name = "view_sub">View Subject</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['add_subject']))
{
    $subject = $_POST['subject_name'];
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    $query = "INSERT INTO subjects (subject_name) VALUES ('$subject')";
    mysqli_query($connection,$query);

}
?>

<?php
if(isset($_POST['view_sub']))
{
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    $select_query = "SELECT * FROM subjects";
    $list_subject = mysqli_query($connection,$select_query);
    // $row = mysqli_fetch_assoc($list_subject);

?>
 <table align="center" border="1px"> 
    <tr> 
        <th colspan="4"><h2>Subjects</h2></th> 
    </tr> 
        <th> Subject Id </th> 
        <th> Subject Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr> 
    <?php
        while ($rows = mysqli_fetch_assoc($list_subject)) { 
    ?>
        <tr>
            <td><?php echo $rows['subject_id']?></td>
            <td><?php echo $rows['subject_name']?></td>
            <td><a href="subject_edit.php?edit=<?php echo $rows['subject_id'];?>">Edit</a></td>
            <td><a href="subject_delete.php?delete=<?php echo $rows['subject_id'];?>">Delete</a></td>
            
        </tr>
        
        <?php
        }
        ?>
<?php
}
?>