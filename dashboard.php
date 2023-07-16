<?php
session_start();
$_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <title>Admin Dashboard</title>
    <style>
    body {
        background: url(Image/login1.jpg) no-repeat;
        background-position: center;
        background-size: 3000px 1500px;
    }

    button#add-btn {
        margin-top: 50px;
        margin-right: 250px;
        height: 60px;
        width: 100px;
        font-size: 20px;
    }

    col-sm-4 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    #user {
        margin-top: 50px;
        text-align: center;
    }

    button#logout-btn {
        margin-top: 50px;
        margin-left: 250px;
        height: 60px;
        width: 100px;
        font-size: 20px;
    }

    table,
    td,
    th {
        border: 1px solid black;
        margin-top: 2%;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    td {
        height: 50px;
        vertical-align: bottom;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row" style="text-align:center;">
            <div class="col-sm-4">
                <a href="form.php"><button type="button" class="btn btn-primary" id="add-btn">Add</button></a>
            </div>
            <div class="col-sm-4">
                <h2 id="user">Name : <?php echo $_SESSION['user_name'] ?></h2>
            </div>
            <div class="col-sm-4">
                <a href="logout.php"><button type="button" class="btn btn-primary" id="logout-btn">Logout</button></a>
            </div>
        </div><br><br>
        <div class="wrap">
            <center>
                <table style="text-align: center;">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Role Id</th>
                        <th>Department Id</th>
                        <th>Country Id</th>
                        <th>State Id</th>
                        <th>City Id</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action </th>
                    </tr>
                </table>
            </center>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>

</html>