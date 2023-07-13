<?php
if(isset($_POST['submit1']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $accesstype = $_POST['accesstype'];
    echo $accesstype;
    $password=$_POST['password'];
    $confirm_pass=$_POST['confirm_pass'];
if($password == $confirm_pass)
{
    $enc_pass = md5($password);
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    if (!$connection) {
        die("Database connection failed");
    }
    else{
        $sql_insert = "INSERT INTO user_data(fname,lname,email,state,city,password) VALUES ('$fname'
        ,'$lname','$email','$state','$city','$enc_pass')";

        
        $result = mysqli_query($connection,$sql_insert);
        
        $user_id = mysqli_insert_id($connection);
        // echo $user_id;
        
        $insert2 = "INSERT INTO user_type(user_id,access_type_id) VALUES ('$user_id','$accesstype')";
        mysqli_query($connection,$insert2);
        if(!$result){
            die('Query Failed'.mysqli_error($connection));
        }
    }
    
}

else
{
    echo "<script>alert('Password and Confirm Password must be same')</script>";
}
}

?>

<?php
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    $select = "SELECT * FROM accessType";
    $types = mysqli_query($connection,$select);
    // print_r($accesstypes);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .wrapper {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 200px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        select {
            width: 206px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        h4 {
            margin: 0;
            font-weight: normal;
        }

        a {
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <div class="wrapper">
                <label for="fname">Enter First Name:</label>
                <input type="text" name="fname" required>
            </div>

            <div class="wrapper">
                <label for="lname">Enter Last Name:</label>
                <input type="text" name="lname" required>
            </div>

            <div class="wrapper">
                <label for="email">Email:</label>
                <input type="text" name="email" required>
            </div>

            <div class="wrapper">
                <label for="state">State:</label>
                <input type="text" name="state" required>
            </div>

            <div class="wrapper">
                <label for="city">City:</label>
                <input type="text" name="city" required>
            </div>

            <div class="wrapper">
                <label for="accesstype">Select User Type:</label><br>
                <select name="accesstype" id="accesstype">
                    <?php foreach ($types as $accesstype):?>
                        <option value="<?php echo $accesstype['id']; ?>"><?php echo $accesstype['Designation']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="wrapper">
                <label for="password">Enter Password:</label>
                <input type="password" name="password" required>
            </div>

            <div class="wrapper">
                <label for="confirm_pass">Confirm Password:</label>
                <input type="password" name="confirm_pass" required>
            </div>

            <button type="submit" name="submit1">Register</button>

            <div class="wrapper">
                <h4>Already registered?</h4>
                <a href="login.php" name="sign_in">Sign in</a>
            </div>
        </form>
    </div>
</body>
</html>
