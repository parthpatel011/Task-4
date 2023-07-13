<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method = "POST">
        <label for="chapter_name">Enter Standard Name</label>
        <input type="text" name = "standard">
        <br><br>
        <button name = "add_standard">ADD Standard</button>
        <br><br>
        <button name = "view_standard">List All Standard</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['add_standard']))
{
    $standard = $_POST['standard'];
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    $query = "INSERT INTO standard (standard) VALUES ('$standard')";
    mysqli_query($connection,$query);

}
?>

<?php
if(isset($_POST['view_standard']))
{
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    $select_query = "SELECT * FROM standard";
    $list_standard = mysqli_query($connection,$select_query);
    // $row = mysqli_fetch_assoc($list_subject);

?>
 <table align="center" border="1px"> 
    <tr> 
        <th colspan="4"><h2>Standards</h2></th> 
    </tr> 
        <th> Standard Id </th> 
        <th> Standard</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr> 
    <?php
        while ($rows = mysqli_fetch_assoc($list_standard)) { 
    ?>
        <tr>
            <td><?php echo $rows['standard_id']?></td>
            <td><?php echo $rows['standard']?></td>
            <td><a href="standard_edit.php?edit=<?php echo $rows['standard_id'];?>">Edit</a></td>
            <td><a href="standard_delete.php?delete=<?php echo $rows['standard_id'];?>">Delete</a></td>
            
        </tr>
        
        <?php
        }
        ?>
<?php
}
?>