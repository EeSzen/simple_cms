<?php

session_start();

    //figure out the url the user is visiting
    $path = $_SERVER["REQUEST_URI"];


    // import all the required files
    require "includes/function.php";

    // once you figure out the path the user is visiting, load relevant content
    switch( $path ) {

    // actions
    case '/auth/do_login':
      require 'includes/auth/do_login.php';
      break;
    case '/auth/do_signup':
      require 'includes/auth/do_signup.php';
      break;
    case '/user/add':
      require 'includes/user/add.php';
      break;
    case '/user/delete':
    require 'includes/user/delete.php';
    break;

    // pages
    case '/login':
      require 'pages/login.php';
      break;
    case '/signup':
      require 'pages/signup.php';
      break;
    case '/logout':
      require 'pages/logout.php';
      break;
    case '/post':
      require 'pages/post.php';
      break;
    case '/dashboard':
      require 'pages/dashboard.php';
      break;
    case '/manage_post':
      require 'pages/manage_post.php';
      break;
    case '/manage_user':
      require 'pages/manage_user.php';
      break;
    case '/post_add':
      require 'pages/post_add.php';
      break;
    case '/post_edit':
      require 'pages/post_edit.php';
      break;
    case '/user_add':
      require 'pages/user_add.php';
      break;
    case '/user_change_psw':
      require 'pages/user_change_psw.php';
      break;
    case '/user_edit':
      require 'pages/user_edit.php';
      break;
      
    default:
      require 'pages/home.php';
      break;
  }