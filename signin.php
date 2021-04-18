<?php session_start();
include("include/config.php");?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="signin.css" rel="stylesheet">
        <link rel="shortcut icon" href="photo/ico.ico" type="image/x-icon">
         <!-- LINK bootstrap -->
         <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <body>
        <nav>
            <div class="container-web">
                <div class="nav-bar-top">
                    <ul class="menu-top">
                        <li>
                            <a href="#">Login/Sign in</a>
                            <a href="">English</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- nav -->
    
        <nav1>
            <span class="nav-toggle" id="js-nav-toggle">
                <i class="fas fa-bars"></i>
            </span>
  
            <div class="logo">
              <img src="photo/logo.png" width="200px" height="70px">
            </div>
            <ul1 id="js-menu">
                <li><a href="aboutme.html">About me</a></li>
                <li><a href="tracking.html" ">Tracking</a></li>
                <li><a href="calculator.html">Price</a></li>
                <li><a href="FAQ.html" >FAQ</a></li>
                <li><a href="contact.html" >Contact</a></li>
            </ul1>
        </nav1>
            
    <div class="background-sign-in ">
        <div class="container-sign-in">
                <div class="content-sign-in text-center">
                    
                    <h2>How many parcels can be handled</h2>
                    <p>A parcel management system that will make your package delivery easy, convenient, fast, and accessible anywhere. Sign up for free today. No cost</p>
                </div>
        </div>   

            <div class=" card" style="border-radius: 20px;  ">
                <div class="card-content text-success">
                    <div class="button-card">
                        <div id="btn"></div>
                        <button type="button" class="toggle-btn" id="log" onclick="login()">Log in</button>
                        <button type="button" class="toggle-btn"  id="sign" onclick="signup()">Sign up</button>
                    </div>
                    <div class="card-icon">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-google"></i>
                        <i class="fab fa-apple"></i>
                    </div>
                    <form id="login" class="input-card">
                        <input type="text" class="text-card" placeholder="Username">
                        <input type="text" class="text-card" placeholder="Password">
                        <button type="submit" class="submit-btn">Log in</button>
                    </form>
                    <form id="signup" class="input-card">
                        <input type="text" class="text-card" placeholder="Username">
                        <input type="text" class="text-card" placeholder="Email">
                        <input type="text" class="text-card" placeholder="Password"><br>
                        <input type="checkbox" class="chech-box"><span>Agree </span>
                        <button type="submit" class="submit-btn">Sign up</button>
                    </form>
                </div>
        </div> 
    </div>
            
        
        <!-- BOOTSTARP JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="navbar.js"></script>
        <script>
            var x = document.getElementById("login");
            var y = document.getElementById("signup");
            var z = document.getElementById("btn");

            function signup(){
                x.style.left ="-400px";
                y.style.left ="50px";
                z.style.left ="125px";
            }
            function login(){
                x.style.left ="50px";
                y.style.left ="450px";
                z.style.left ="0";
            }
        </script>

        <!-- <script>
        $(function() {
            $("#sign").submit(function() {
                event.preventDefault();
                $.ajax({
                    url: "signup.php",
                    type: "post",
                    data: $("form#frmsignup").serialize(),
                    success: function(data) {
                        $("#signupModalBody").html(data);
                        var btnClose =
                            "<button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>";
                        $("#signupModalFooter").html(btnClose);
                    },
                    error: function(data) {
                        console.log("An error accured." + data);
                    }
                });
            });

            $("#log").submit(function() {
                event.preventDefault();
                $.ajax({
                    url: "login.php",
                    type: "post",
                    data: $("form#login").serialize(),
                    success: function(data) {
                        $("#loginModalBody").html(data);
                        var btnClose =
                            "<button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>";
                        $("#loginModalFooter").html(btnClose);
                    },
                    error: function(data) {
                        console.log("An error accured." + data);
                    }
                });
            });


    });
    </script> -->
    </body>
</html>
<?php include("include/close.php");?>