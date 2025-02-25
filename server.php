<?php

// Starting the session, necessary
// for using session variables
session_start();

// Declaring and hoisting the variables
$username = "";
$email    = "";
$errors = array();
$_SESSION['success'] = "";

// DBMS connection code -> hostname,
// username, password, database name
$db = mysqli_connect('localhost', 'root', '', 'cloud');

// Registration code
if (isset($_POST['reg_user'])) {

    // Receiving the values entered and storing
    // in the variables
    // Data sanitization is done to prevent
    // SQL injections
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // Ensuring that the user has not left any input field blank
    // error messages will be displayed for every blank input
    if (empty($username)) { array_push($errors, "ID is required"); }
   
    if (empty($password_1)) { array_push($errors, "Password is required"); }
  

    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
        // Checking if the passwords match
    }

    $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // If user exists
        array_push($errors, "ID already exists");
    }
    
    // If the form is error free, then register the user
    if (count($errors) == 0) {

        // Password encryption to increase data security
        $password = md5($password_1);

        // Inserting data into table
        $query = "INSERT INTO users (username,  password, Status, FileName) 
        VALUES('$username', '$password', 'Active','wait.php')";

        mysqli_query($db, $query);

        // Storing username of the logged in user,
        // in the session variable
        $_SESSION['username'] = $username;

        // Welcome message
        $_SESSION['success'] = "Need Admin Permission To Active Account";

        // Page on which the user will be
        // redirected after logging in
        header('location:index.php?logout="1"');
    }
   
    
}

// User login
if (isset($_POST['login_user'])) {

    // Data sanitization to prevent SQL injection
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Error message if the input field is left blank
    if (empty($username)) {
        array_push($errors, "ID is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // Checking for the errors
    if (count($errors) == 0) {

        // Password matching
        $password = md5($password);

        $query = "SELECT * FROM users WHERE username=
                '$username' AND password='$password' AND Status='Active'";
        $results = mysqli_query($db, $query);

        // $results = 1 means that one user with the
        // entered username exists
        if (mysqli_num_rows($results) == 1) {

            // Storing username in session variable
            $_SESSION['username'] = $username;

            // Welcome message
            $_SESSION['success'] = "You have logged in!";

            // Page on which the user is sent
            // to after logging in
            header('location: index.php');
        }
        else {

            // If the username and password doesn't match
            array_push($errors, "Wrong Input");
        }
    }
}

?>
