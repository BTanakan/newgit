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
                        <li class="nav-item">
                            <a class="nav-link " href="Create.php">Create Shipment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Price.php">Price Estimation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Track.php">Track & Trace</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Report
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="Shipment.php">Shipment Report</a></li>
                                <li><a class="dropdown-item" href="COD.php">COD Shipment Report</a></li>
                                <li><a class="dropdown-item" href="Pending.php">Pending Shipment Report</a></li>
                            </ul>
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
                                    <li><a class="dropdown-item" href="info.php">Information</a></li>
                                    <li><a class="dropdown-item" href="Profile.php">Edit your Profile</a></li>
                                    <li><a class="dropdown-item active" href="">Change Password</a></li>
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
                            <h3>Change Password</h3>
                        </div>
                        <div class="form-floating col-md-5">
                            <input class="form-control" type="password" name="PassWord" id="PassWord">
                            <label for="FirstName">Password (6 digit)</label>
                        </div>
                        <div class="form-floating col-md-5">
                            <input class="form-control" type="password" name="confirm" id="confirm">
                            <label for="FirstName">Confirm new password</label>
                        </div>
                        <div class="col-md-2">
                            <input class="btn btn-success btnSave" type="button" name="btnSave" id="btnSave"
                                value="Save" style="width:60%">
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <hr>
            <div class="container-fluid">
                <img class="logo" src="../photo/logo.png" alt="">
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