<?php
    //Start session
    session_start();
    
    //Include database connection details
    require_once('connection.php');
     
    //Array to store validation errors
    $errmsg_arr = array();
     
    //Validation error flag
    $errflag = false;
     

    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
		include 'connection.php';
    $str = @trim($str);
    if(get_magic_quotes_gpc()) {
    $str = stripslashes($str);
    }
    return mysqli_real_escape_string($link, $str );
    }
    //Sanitize the POST values
    $username = clean($_POST['username']);
    $password = clean($_POST['password']);
     
    //Input Validations
    if($username == '') {
    $errmsg_arr[] = 'Username missing';
    $errflag = true;
    }
    if($password == '') {
    $errmsg_arr[] = 'Password missing';
    $errflag = true;
    }
     
    //If there are input validations, redirect back to the login form
    if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: index.php");
    exit();
    }
     
    //Create query
    $qry="SELECT * FROM cc_lgn WHERE username='$username' AND password='$password'";
    $result=mysqli_query($link, $qry);
     
    //Check whether the query was successful or not
    if($result) {
    if(mysqli_num_rows($result) > 0) {
    //Login Successful
    session_regenerate_id();
    $member = mysqli_fetch_array($result,MYSQLI_BOTH);
	$_SESSION['LAST_ACTIVITY_step1'] = time(); // the start of the session.
    $_SESSION['SESS_MEMBER_ID'] = $member['user_id'];
    session_write_close();
    header("location: websites.php");
    exit();
    }else {
    //Login failed
    $errmsg_arr[] = 'Incorrect Username or Password';
    $errflag = true;
    if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: index.php");
    exit();
    }
    }
    }else {
    die("Query failed");
    }
?>
