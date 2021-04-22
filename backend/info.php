<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../photo/ico.ico" type="image/x-icon">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="backend.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous">
</head>

<body style="background-color:#E5E5E5;">
    <section>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href=""><img src="../photo/logo.png" width="150px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php 
                        if($_SESSION['role'] == "customer")
                        {
                            echo " <li class='nav-item'>
                            <a class='nav-link '' href='Create.php'>Create Shipment</a>
                        </li>";
                        }
                       ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Price Estimation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Track.php">Track & Trace</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <?php
                            //if(isset($_SESSION["name"])){
                        ?>
                        <li class="nav-item" style="float:right; right:125px;">
                            <div class="dropdown dropstart">
                                <button class="btn dropdown-toggle" type="button" id="navbarDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Welcome, <?php //echo $_SESSION["name"];?>
                                </button>


                                <ul class="dropdown-menu dropdown-menu-dark " aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item active" href="">Information</a></li>
                                    <li><a class="dropdown-item " href="Profile.php">Edit your Profile</a></li>
                                    <li><a class="dropdown-item " href="Password.php">Change Password</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Logout</a></li>
                                </ul>
                            </div>
                            <?php
                         //}
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <br><br>
    <section>
        <div class="container shadow p-3 mb-5 bg-body rounded">
            <div class="container-fluid">
                <form action="post" class="row ">
                    <div class="row g-4">
                        <div class="header">
                            <h3>Information</h3>
                        </div>
                        <div class="form-floating col-md-6">
                            <input class="form-control" type="text" name="FirstName" id="FirstName">
                            <label for="FirstName">Firstname</label>
                        </div>
                        <div class="form-floating col-md-6">
                            <input class="form-control" type="text" name="LastName" id="LastName">
                            <label for="LastName">Lastname</label>
                        </div>
                        <div class="form-floating col-md-6">
                            <input class="form-control" type="text" name="MobileNum" id="MobileNum">
                            <label for="MobileNum">Mobile Number</label>
                        </div>
                        <div class="form-floating col-md-6">
                            <input class="form-control" type="text" name="IDCard" id="IDCard">
                            <label for="IDCard">ID Card</label>
                        </div>
                        <div class="form-floating col-md-6">
                            <input class="form-control" type="date" name="Birthday" id="Birthday">
                            <label for="Birthday">Birthday</label>
                        </div>
                        <div class="form-floating col-md-6">
                            <input class="form-control" type="email" name="EmailAddress" id="EmailAddress">
                            <label for="EmailAddress">Email Address</label>
                        </div>
                        <hr>
                        <div class="form-check col-md-1">
                            <input class="form-check-input" type="radio" name="Male" id="Male" checked>
                            <label class="form-check-label" for="Male">Male</label>
                        </div>
                        <div class="form-check col-md-10">
                            <input class="form-check-input" type="radio" name="Female" id="Female">
                            <label class="form-check-label" for="flexRadioDefault2">Female</label>
                        </div>
                        <div class="form-floating col-md-6">
                            <input class="form-control" type="text" name="Adders" id="Adders">
                            <label for="Adders">Adders</label>
                        </div>
                        <div class="form-floating col-md-6">
                            <input class="form-control" type="email" name="Adders2" id="Adders2">
                            <label for="Adders2">Sub-district / District / Province</label>
                        </div>
                        <div class="col-md-3">
                            <input class="btn btn-success" type="button" name="btnSave" id="btnSave" value="Save"
                                style="width:60%">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>

</html>