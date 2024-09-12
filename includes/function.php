<?php

// connect to database
function connectToDB(){
    // 1. collect database info
    $host = "localhost";
    $database_name = "CMS";// connecting to which database
    $database_user = "root";
    $database_password = "password";

    // 2. connect to database (PDO - PHP database object)
    $database = new PDO(
    "mysql:host=$host;dbname=$database_name",
    $database_user,//username
    $database_password//password
    );

    return $database;
}

// set error message
function setError( $message , $redirect){
    $_SESSION['error'] = $message;
    // redirect user 
    header("Location:" . $redirect);
}

// check if user is logged in or not
function checkIfuserIsNotLoggedIn() {
    if ( !isset( $_SESSION['user'] ) ) {
      header("Location: /login");
      exit;
    }
  }
  
  // check if current user is an admin or not
  function checkIfIsNotAdmin() {
      if ( isset( $_SESSION['user'] ) && $_SESSION['user']['role'] != 'admin' ) {
          header("Location: /dashboard");
          exit;
      }
  }

