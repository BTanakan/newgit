<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="tracking.css" rel="stylesheet">
    <!-- LINK bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="photo/ico.ico" type="image/x-icon">
</head>

<body>
    <nav>
        <div class="container-web">
            <div class="nav-bar-top">
                <ul class="menu-top">
                    <li>
                        <a href="signin.php">Login/Sign in</a>
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
            <a href="index.php"><img src="photo/logo.png" width="200px" height="70px"></a>
        </div>
        <ul1 id="js-menu">
            <li><a href="aboutme.html">About me</a></li>
            <li><a href="#" style="color: black;">Tracking</a></li>
            <li><a href="calculator.php">Price</a></li>
            <li><a href="FAQ.html">FAQ</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul1>
    </nav1>

    <div class="big-body"></div>
    <!-- <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="photo/Header.jpg" width="100%" aria-hidden="true" focusable="false" style="height: 250px;">
        
                <div class="container">
                  <div class="carousel-caption text-start">
                    <h1>promotion</h1>
                    <p>Some representative placeholder content for the first slide of the carousel.</p>
                    <p><a class="btn btn-lg btn-primary" href="#">See more</a></p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <img src="photo/Header.jpg" width="100%"  height="500px" aria-hidden="true" focusable="false" style="height: 250px;">
        
                <div class="container">
                  <div class="carousel-caption">
                    <h1>promotion</h1>
                    <p>Some representative placeholder content for the second slide of the carousel.</p>
                    <p><a class="btn btn-lg btn-primary" height="500px" href="#">See more</a></p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <img src="photo/Header.jpg" width="100%" height="500px"aria-hidden="true" focusable="false" style="height: 250px;">
        
                <div class="container">
                  <div class="carousel-caption text-end">
                    <h1>promotion</h1>
                    <p>Some representative placeholder content for the third slide of this carousel.</p>
                    <p><a class="btn btn-lg btn-primary" href="#">See more</a></p>
                  </div>
                </div>
              </div>
            </div>
        </div> -->

    <div class="header" style="background-color:#f03f45;">
        <div class="container-web">
            <div class="pic-header">
                <img src="photo/Header.jpg" alt="" width="100%" height="100%">
            </div>
        </div>
    </div>
    <!-- End header -->
    <div class="container-web ">
        <div>
            <a href="index.php" style="text-decoration: none; color: #818191;">Home</a>
            > Tracking
            <hr>
        </div>
    </div>
    <br>
    <div class="content">
        <div class="container-web">

            <div class="body text-center">
                <h1 class="title">Enter your parcel number to find your parcel.</h1><br>
                <p> Enter your parcel number To track the latest status and estimated time of delivery of your parcel.
                </p><br>
            </div>
            <div class="row g-4">
            <form action="" method="post" class="row" id="TrackForm">
                <div class="col-md-6" style="margin: auto; padding: 1rem 1rem; display: flex">
                    <input class="form-control" type="text" name="get_tack" id="" placeholder="Trick number" value="<?php if(isset($_POST['get_tack'])) {echo $_POST['get_tack']; } ?>">
                    <button class="btn" type="submit" id="button-addon2">Enter</button>
                </div>
            </form>

            </div>
            <div class="col-md-12">
                        <table class="table table-striped table-hover" id="myTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>Pickup Date</th>
                                    <th>Sender Name</th>
                                    <th>Recipient Name</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                     if(isset($_POST['get_tack']))
                                     {
                                         include_once('config.php');
                                        //  var_dump("Hello");
                                        $sql = "SELECT* FROM receiver WHERE tracking_number  = :tracking_number
                                                    or receiver_name = :tracking_number";
                                        $query = $db->prepare($sql);
                                        $query->bindParam(':tracking_number', $tracking_number, PDO::PARAM_STR);
                                        $tracking_number = $_POST['get_tack'];
                                        $query->execute();
                                        $result = $query->fetchAll(PDO::FETCH_OBJ);
                                
                                        if($query->rowCount() > 0) {
                                            foreach($result as $res) {
                                                if($res->tracking_number == $tracking_number || $res->receiver_name == $tracking_number)
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$res->Pickup_Date. "</td>";
                                                    echo "<td>".$res->sender_firstname_lastname. "</td>";
                                                    echo "<td>".$res->receiver_name. "</td>";
                                                    echo "<td>".$res->address. "</td>";
                                                    echo "<td>".$res->status. "</td>";
                                                    echo "<td>".$res->price. "</td>";
                                                    echo "</tr>";
                                                    
                                                    $_SESSION['tracking'] = $res->tracking_number;
                                                    echo "<br>";
                                                    // echo "ชื่อผู้รับ: " .$res->receiver_name ."<br>";
                                                    // echo "หมายเลขพัสดุ: " .$res->tracking_number ."<br>";
                                                    // echo "ที่อยู่: " .$res->address ."<br>";
                                                    // echo "สถานะ: " .$res->status ."<br>";
                                                }
                                                else{
                                                    $output.="login fail something wrong";
                                                }
                                            }
                                        }
                                     }
                                
                                ?>
                            </tbody>
                        </table>
                        <?php
                            //         $result->free();
                            //     } else {
                            //         echo "<p class='lead' style='color:#fbeeac'><em>No records were found.</em></p>";
                            //     }
                            // } else {
                            //     echo "Error: could not able to execute $sql." .$conn->error;
                            // }
                    ?>
                    </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <!-- BOOTSTARP JS -->
    <script src="js/bootstrap.min.js"></script>
    <script src="navbar.js"></script>
    <br><br><br>
    <footer class="container-fluid py-5 bg-dark">
        <div class="row">
            <div class="col-12 col-md">
                <!--logo-->
                <img src="photo/logo.png" width="100%">
                <small class="d-block mb-3 text-muted"><i class="far fa-copyright"></i> copyright</small>
            </div>
            <div class="col-6 col-md" style="color:#fff;">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Cool stuff</a></li>
                </ul>
            </div>
            <div class="col-6 col-md " style="color:#fff;">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Resource name</a></li>
                </ul>
            </div>
            <div class="col-6 col-md" style="color:#fff;">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Business</a></li>
                </ul>
            </div>
            <div class="col-6 col-md" style="color:#fff;">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Team</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i
            class="fas fa-chevron-up"></i></a>
    <script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 400);
            return false;
        });
    });
    </script>


</body>

</html>