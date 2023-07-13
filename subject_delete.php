<?php
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    echo $id;
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    $delete_query = "DELETE FROM subjects WHERE subject_id = $id";
    $result = mysqli_query($connection,$delete_query);
    
    if(!$result)
        {
        die('Query Failed'.mysqli_error($result));
        }
        else{
            echo "<script> window.location.href='subjects.php';</script>";
        }
    
}
?>