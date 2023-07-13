<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method = "POST">
        <label for="chapter_name">Enter Chapter name</label>
        <input type="text" name = "chapter_name">
        <br><br>
        <button name = "add_chapter">ADD Chapter</button>
        <br><br>
        <button name = "view_chap">List All Chapters</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['add_chapter']))
{
    $chapter = $_POST['chapter_name'];
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    $query = "INSERT INTO chapters (chapter_name) VALUES ('$chapter')";
    mysqli_query($connection,$query);

}
?>

<?php
if(isset($_POST['view_chap']))
{
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    $select_query = "SELECT * FROM chapters";
    $list_subject = mysqli_query($connection,$select_query);
    // $row = mysqli_fetch_assoc($list_subject);

?>
 <table align="center" border="1px"> 
    <tr> 
        <th colspan="4"><h2>Subjects</h2></th> 
    </tr> 
        <th> Chapter Id </th> 
        <th> Chapter Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr> 
    <?php
        while ($rows = mysqli_fetch_assoc($list_subject)) { 
    ?>
        <tr>
            <td><?php echo $rows['chapter_id']?></td>
            <td><?php echo $rows['chapter_name']?></td>
            <td><a href="chapter_edit.php?edit=<?php echo $rows['chapter_id'];?>">Edit</a></td>
            <td><a href="chapter_delete.php?delete=<?php echo $rows['chapter_id'];?>">Delete</a></td>
            
        </tr>
        
        <?php
        }
        ?>
<?php
}
?>