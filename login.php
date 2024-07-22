<?php
$link = mysqli_connect('localhost', 'root', '', 'form'); // Update with your database credentials
if (!$link) {
    die('Connection error: ' . mysqli_connect_error());
}

$table_name = 'login';
$query = "SHOW TABLES LIKE '$table_name'";
$table_result = mysqli_query($link, $query);

if (!$table_result || mysqli_num_rows($table_result) == 0) {
    die('The required table ' . $table_name . ' does not exist in the database.');
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize input to prevent SQL injection
    $email = mysqli_real_escape_string($link, $email);

    // Perform your existing login verification
    $query = "SELECT * FROM login WHERE email='$email' and password='$password'";
    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        
            // Password verification successful, redirect to next page
            header("Location: form.html");
            exit; // Ensure no further code is executed
        } else {
            // Incorrect password
            echo '<script>alert("Incorrect password. Please try again.")</script>';
            echo '<script>window.location.href = "user_login.html";</script>';
            exit; // Ensure no further code is executed
        }
    } else {
        // Email not found
        echo '<script>alert("Email not found. Please try again or register.")</script>';
        echo '<script>window.location.href = "user_login.html";</script>';
        exit; // Ensure no further code is executed
    }

mysqli_close($link);
?>