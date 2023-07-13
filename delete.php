<?php
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    if (!$connection) {
        die('Database connection failed.');
    }
else
{
if(isset($_GET['delete'])){
        $id= $_GET['delete'];
        $sql_delete  = "DELETE FROM user_data WHERE id=$id";
        $result= mysqli_query($connection,$sql_delete );
        
        if(!$result)
        {
        die('Query Failed'.mysqli_error($result));
        }
        else{
            echo "<script> window.location.href='dashboard.php';</script>";
        }
    }
}
?>