<?php 
require "login/loginheader.php"; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
    <link href="css/simple-sidebar.css" rel="stylesheet" media="screen">
    <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" media="screen">


  </head>
  <body>
     <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <div class="form-signin">
        <div class="alert alert-success">You have been <strong>successfully logged in</strong>.</div>
        <a href="login/logout.php" class="btn btn-default btn-lg btn-block">Logout</a>
      </div>
                <li>
                    <a href="index.php">Add Customer</a>
                </li>
                <li>
                    <a href="scheduled-tasks.php">Scheduled Tasks</a>
                </li>
                <li>
                    <a href="register.php">Register Admin</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
  <div id="page-content-wrapper">

    <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
            </div>
        </nav>
    <div class="container-fluid">
      <!-- main content starts here -->