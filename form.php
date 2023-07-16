<?php
session_start();
// $_SESSION[ 'user_name' ];
include 'db_connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css'
        integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js'
        integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'>
        </script>
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'
        integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'>
        </script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js'
        integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'>
        </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Populate states dropdown based on selected country
            $('#country').on('change', function () {
                var countryID = $(this).val();
                if (countryID) {
                    $.ajax({
                        type: 'POST',
                        url: 'get_states.php',
                        data: {
                            country_id: countryID
                        },
                        success: function (response) {
                            $('#state').html(response);
                            $('#city').html('<option value="">Select City</option>');
                        }
                    });
                } else {
                    $('#state').html('<option value="">Select State</option>');
                    $('#city').html('<option value="">Select City</option>');
                }
            });

            // Populate cities dropdown based on selected state
            $('#state').on('change', function () {
                var stateID = $(this).val();
                if (stateID) {
                    $.ajax({
                        type: 'POST',
                        url: 'get_cities.php',
                        data: {
                            state_id: stateID
                        },
                        success: function (response) {
                            $('#city').html(response);
                        }
                    });
                } else {
                    $('#city').html('<option value="">Select City</option>');
                }
            });
        });
        $(document).ready(function () {
            $('#confirmpassword').on('keyup', function () {
                var password = $('#password').val();
                var confirmPassword = $(this).val();

                if (password === confirmPassword) {
                    $('#password_match').text('Password matched.').css('color', 'green');
                } else {
                    $('#password_match').text('Password does not match.').css('color', 'red');
                }
            });
        });
    </script>

</head>
<style>
    * {
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        background: url(Image/login1.jpg ) no-repeat;
        background-position: center;
        background-size: 3000px 1500px;
    }

    form {
        width: 600px;
        height: auto;
        margin-left: auto;
        margin-right: auto;
        margin-top: 5%;
        border-radius: 10px;
        box-shadow: 0 10px 20px silver;
        background-color: rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }

    .container {
        padding: 15px;
    }

    label {
        color: white;
    }

    input[ type=text],
    input[ type=password],
    input[ type=tel],
    input[ type=email] {
        width: 100%;
        margin: 5px 0;
        padding: 4px 10px;
        box-sizing: border-box;
        background-color: #f1f1f1;
    }

    input[ type=text]:focus,
    input[ type=password]:focus {
        outline: none;
        background-color: #d3d3d3;
    }

    input[ name='name'],
    input[ name='email'],
    input[ name='contact'],
    input[ name='uname'],
    input[ name='password'],
    input[ name='confirmpassword'] {
        font-size: 15px;
    }

    .wrap {
        font-size: 15px;
        font-weight: bold;
        width: 100%;
        margin: 5px 0;
        padding: 12px 20px;
    }

    #submit-btn {
        font-size: 15px;
        font-weight: bold;
        width: 100%;
        margin: 5px 0;
        padding: 12px 20px;
        text-transform: uppercase;
        background-image: linear-gradient(to right, #eb3349, #f45c43);
        border: none;
        cursor: pointer;
        transition: 0.3s;
        color: #fff;
    }

    #submit-btn:hover {
        background-image: linear-gradient(to right, #f45c45, #eb3349);
    }
</style>

<body>
    <?php
    //if(){
    ?>
    <form method='POST'>
        <div class='container'>
            <div class='wrap'>
                <label for='name'>Name:</label>
                <input type='text' id='name' placeholder='Enter Name' name='name' autocomplete='off' required><br>
                <label for='name'>Email:</label>
                <input type='email' id='email' placeholder='Enter Email' name='email' autocomplete='off' required><br>
                <label for='name'>Contact No:</label>
                <input type='tel' id='tel' placeholder='Enter Contact No' name='contact' autocomplete='off'
                    required><br>
                <label for='name'>Username:</label>
                <input type='text' id='username' placeholder='Enter Username' name='uname' autocomplete='off'
                    required><br>
                <label for='name'>Password:</label>
                <input type='password' id='password' placeholder='Enter Password' name='password' autocomplete='off'
                    required><br>
                <label for='name'>Confirm Password:</label>
                <input type='password' id='confirmpassword' placeholder='Enter Confirm Password' name='confirmpassword'
                    autocomplete='off' required><br>
                <span id="password_match"></span>
                <br>
                <!-- Country dropdown -->
                <label for='country'>Country:</label>
                <select id='country' name="country">
                    <option value=''>Select Country</option>
                    <option value='1'>USA</option>
                    <option value='2'>India</option>
                </select>

                <!-- State dropdown -->
                <label for='state'>State:</label>
                <select id='state' name="state">
                    <option value=''>Select State</option>
                </select>

                <!-- City dropdown -->
                <label for='city'>City:</label>
                <select id='city' name="city">
                    <option value=''>Select City</option>
                </select>

                <!--Rple dropdown -->
                <label for='role'>Role Id:</label>
                <select id='role' name="role">
                    <option value=''>Select Role Id</option>
                    <option value='1'>Admin</option>
                    <option value='2'>Department Head</option>
                    <option value='3'>Employee</option>
                </select>

                <!-- City dropdown -->
                <label for='dep'>Department Head:</label>
                <select id='dep' name="dep">
                    <option value=''>Select Department</option>
                    <option value='1'>PHP developer</option>
                    <option value='2'>Dotnet developer</option>
                    <option value='3'>UI/UX developer</option>
                    <option value='4'>Full Stack developer</option>
                    <option value='5'>SEO</option>
                </select>
                <button type='submit' name='submit' id='submit-btn'>Submit</button>
            </div>
    </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
        $sql = "INSERT INTO `employee`(`emp_name`, `email`, `mob`, `username`,
     `password`, `role_id`, `dep_id`, `country_id`, `state_id`, `city_id`)
     VALUES ('$_POST[name]','$_POST[email]','$_POST[contact]','$_POST[uname]','$_POST[password]',
     '$_POST[role]','$_POST[dep]','$_POST[country]','$_POST[state]','$_POST[city]')";

        //echo $total;
        if ($conn->query($sql) === true) {
            echo '<script>alert("Record Added")</script>';
        }
    }
// }
?>