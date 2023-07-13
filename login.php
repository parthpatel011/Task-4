<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .wrapper {
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        a {
            text-decoration: none;
            color: #4caf50;
            font-weight: bold;
        }
        
        .alert {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <div class="wrapper">
            <label for="email">Enter Email</label>
            <input type="email" name="email" required> <br>
        </div>
        <div class="wrapper">
            <label for="password">Enter Password</label>
            <input type="password" name="password" required> <br>
        </div>
        <div class="wrapper">
            <input type="submit" name="login" value="Login"> <br>
        </div>
    
        <div class="wrapper">
            <label for="register">New User Registration</label>
            <a href="register.php">Register Here</a>
        </div>
    </form>
</body>
</html>

<?php
if(isset($_POST['login']))
{
        
        $connection = mysqli_connect('localhost','root','root','user_registration');
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $query = " SELECT * FROM user_data WHERE email = '$email' && password = '$password'";
        $result = mysqli_query($connection,$query);
                if(mysqli_num_rows($result) > 0){
                    session_start();
                    $_SESSION['login'] = true;
                    $_SESSION['email'] = $email;
                    header('Location: dashboard.php'); 
                }
                else
                {
                echo "<script>alert('Check Email id or Password');</script>";
                }
}

?>
