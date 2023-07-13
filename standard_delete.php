<?php
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    $delete_query = "DELETE FROM standard WHERE standard_id = $id";
    $result = mysqli_query($connection,$delete_query);
    
    if(!$result)
        {
        die('Query Failed'.mysqli_error($result));
        }
        else{
            echo "<script> window.location.href='standard.php';</script>";
        }
    
}
?>