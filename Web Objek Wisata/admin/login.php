<?php
session_start();

  $koneksi = new  mysqli("localhost","root","","wisata");
 ?>

﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN</title>
    <link rel="icon" href="icon.png">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="login.css"> 
</head>
<body class="bg">
    <div class="container" >
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> LOGIN ADMIN </h2>
                 <br /><br>
            </div>
        </div>
         <div class="row ">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading"></div>
                    <div class="panel-body">
                      <form role="form" method="post"><br />
                        <div class="form-group input-group">
                           <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                          <input type="text" class="form-control" name="user" placeholder="nama"/>
                        </div>
                        <div class="form-group input-group">
                          <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                          <input type="password" class="form-control"  name="pass" placeholder="Password"/>
                        </div>
                        <button class="btn btn-primary" name="login">Login</button><hr />
                        <h5><a href="../index.php" class="becak" >Home</a></h5>
                      </form>
                      <?php
                        if (isset($_POST['login']))
                        {
                          $password = $_POST['pass'];
                          $username = $_POST['user'];
                          $query = mysqli_query($koneksi,"SELECT id FROM admin WHERE username = '$username' and password='$password'");
                          $row    = mysqli_fetch_assoc($query);
                          $count  = mysqli_num_rows($query);

                            if($count == 1)
                            {
                                session_start();
                                $_SESSION['admin'] = $username;
                                header("location:./index.php");
                            }
                            else
                            {
                              echo "<div class='alert alert-danger'>Login gagal</div>";
                              echo "<meta http.equiv= 'refresh' content='1;url=login.php'>";
                            }
                          }
                          ?>
                    </div>
                  </div>
                </div>
        </div>
    </div>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
