<?php
session_start();

// Handle the login form submission
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $username = $_POST['uname'];
//     $password = $_POST['password'];

//     // Validate the user credentials against the database
//     $sql = "SELECT * FROM employee WHERE username = '$username'";
//     $result = mysqli_query($conn, $sql);

//     if (mysqli_num_rows($result) === 1) {
//         $row = mysqli_fetch_assoc($result);
//         if ($password === $row['password']) {
//             $_SESSION['loggedin'] = true;
//             $_SESSION['role_id'] = $row['role_id'];
//             header('Location: dashboard.php');
//             exit;
//         } else {
//             $error = 'Invalid password';
//         }
//     } else {
//         $error = 'Invalid username';
//     }
// }
?>
<html>

<head>
    <title>Login</title>

    <style>
    * {
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        background: url(Image/login1.jpg) no-repeat;
        background-position: center;
        background-size: cover;
    }

    form {
        width: 450px;
        height: auto;
        margin-left: auto;
        margin-right: auto;
        margin-top: 15%;
        border-radius: 10px;
        box-shadow: 0 10px 20px silver;
        background-color: rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }

    h2 {
        text-align: center;
        text-transform: uppercase;
        color: #fff;
        padding-bottom: 20px;
        border-bottom: 1px solid silver;
    }

    .container {
        padding: 20px;
    }

    label {
        color: white;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        margin: 8px 0;
        padding: 12px 20px;
        box-sizing: border-box;
        background-color: #f1f1f1;
        background-origin: 1px solid #ccc;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        outline: none;
        background-color: #d3d3d3;
    }

    #login-btn {
        font-size: 15px;
        font-weight: bold;
        width: 100%;
        margin: 8px 0;
        padding: 12px 20px;
        text-transform: uppercase;
        background-image: linear-gradient(to right, #eb3349, #f45c43);
        border: none;
        cursor: pointer;
        transition: 0.3s;
        color: #fff;
    }

    #login-btn:hover {
        background-image: linear-gradient(to right, #f45c45, #eb3349);
    }
    </style>
    <script>
    </script>
</head>

<body>

    <form action="login.php" method="POST" autocomplete="off">
        <h2>Login Form</h2>
        <div class="container">
            <label for="name">Username:</label>
            <input type="text" id="username" placeholder="Enter Username" name="uname" aria-label="Username"
                aria-describedby="basic-addon1" required autocomplete="off" data-parsley-trigger="keyup"
                data-parsley-required-message="Username is required" required>
            <label for="pwd">Password:</label>
            <input type="password" id="password" placeholder="Enter Password" name="password" required="true"
                aria-label="password" aria-describedby="basic-addon1" name="lpwd" required data-parsley-trigger="keyup"
                data-parsley-required-message="Password is required" required>
            <button type="submit" name="submit" id="login-btn">Log In</button>
        </div>
    </form>

</body>

</html>
<?php
include "db_connect.php";
if (isset($_POST['submit'])) {
    // $role_id=$_POST['role'];
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM employee WHERE username='$username' && password='$password' ";
    $result = mysqli_query($conn, $sql);
    $total = mysqli_num_rows($result);
    //echo $total;

    if ($total == 1) {
        $_SESSION['user_name'] = $username;
        header("location:dashboard.php");
    } else {
        echo '<script>alert("Login Failed")</script>';
    }
}

?>