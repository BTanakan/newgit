<?php session_start(); 

        include_once('../config.php')
?>
<!doctype html>
<html lang="en">

<head>
    <title>Bolt</title>
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
                <a class="navbar-brand" href="#"><img src="../photo/logo.png" width="150px"></a>
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
                            <a class="nav-link" href="Price.php">Price Estimation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Track.php">Track & Trace</a>
                        </li>
                        <?php 
                        
                        if($_SESSION['role'] == "hub")
                        {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='hub.php'>Hub</a>
                        </li>" ;
                        } else if($_SESSION['role'] == "delivery")
                        {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='delivery.php'>Delivery</a>
                        </li>" ;
                        }  else if($_SESSION['role'] == "employee")
                        {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='employee.php'>Employee</a>
                        </li>" ;
                        }
                        ?>
                    </ul>
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <?php
                            //if(isset($_SESSION["name"])){
                        ?>
                        <li class="nav-item" style="float:right; right:125px;">
                            <div class="dropdown dropstart">
                                <button class="btn dropdown-toggle" type="button" id="navbarDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Welcome, <?php echo $_SESSION["name"];?> ||
                                    Role : <?php echo $_SESSION['role']; ?>
                                </button>


                                <ul class="dropdown-menu dropdown-menu-dark " aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="info.php">Information</a></li>
                                    <li><a class="dropdown-item" href="Profile.php">Edit your Profile</a></li>
                                    <li><a class="dropdown-item" href="Password.php">Change Password</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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

    <!-- Sender -->
    <section>
        <div class="container-fluid">
            <form action="" method="post" class="row" id="SendcuForm">
                <div class="row g-4">
                    <div class="header">
                        <h3><i class="fas fa-box" style="color:#F03F45;"></i> Sender Information</h3>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control bg-light text-dark" type="text" name="NameSend" id="NameSend"
                            placeholder="Name Last-Name" value="" required>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control bg-light text-dark" type="tel" name="MBSend" id="MBSend"
                            placeholder="Mobile Number" value="" required>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control bg-light text-dark" type="text" name="AddersSend" id="AddersSend"
                            value="" placeholder="Adders" required>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control bg-light text-dark" type="text" name="Adders2Send" id="Adders2Send"
                            value="" placeholder="Sub-district / District / Province" required>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control bg-light text-dark" type="text" name="PostcodeSend" id="PostcodeSend"
                            value="" placeholder="Postal code" required>

                    </div>

                    </div>






                       <div class="row g-3">
                                <div class="col-md-6 form-floating">
                                    <input class="form-control" type="text" name="NameReceive" id="NameReceive"
                                        placeholder="Name Last-Name" required>
                                    <label for="NameReceive">Name Last-Name</label>
                                </div>

                                <div class="col-md-6 form-floating">
                                    <input class="form-control" type="tel" name="MBNameReceive" id="MBNameReceive"
                                        placeholder="Mobile Number" required>
                                    <label for="MBNameReceive">Mobile Number</label>
                                </div>

                                <div class="col-md-12 form-floating">
                                    <input class="form-control" type="text" name="AddersReceive" id="AddersReceive"
                                        placeholder="Adders" required>
                                    <label for="AddersReceive">Adders</label>
                                </div>

                                <div class="col-md-12 form-floating">
                                    <input class="form-control" type="text" name="Adders2Receive" id="Adders2Receive"
                                        placeholder="Sub-district / District / Province" required>
                                    <label for="Adders2Receive">Sub-district / District / Province</label>
                                </div>

                                <div class="col-md-12 form-floating">
                                    <input class="form-control" type="text" name="PostcodeReceive" id="PostcodeReceive"
                                        placeholder="Postal code" required>
                                    <label for="PostcodeReceive">Postal code</label>
                                </div>

                                <div class="col-md-12 form-floating">
                                    <input class="form-control" type="text" name="tracking_number"
                                        placeholder="tracking_number #" required>
                                    <label for="PostcodeReceive">Tracking_number #</label>
                                </div>

                                <div class="col-md-12 form-floating">
                                    <input class="form-control" type="text" name="Price" placeholder="Price" required>
                                    <label for="PostcodeReceive">Price </label>

                    
                                </div>
                                <div class="col-md-12 form-floating">
                                        <select name="region" class="form-control">
                                            <option value="" selected>--------- region ---------</option>
                                            <option value="north">North</option>
                                            <option value="South">south </option>
                                            <option value="east">East </option>
                                            <option value="west">West </option>
                                        </select>
                                    </div>

                                    <div class="col">
                            <input class="btn btn-success" type="submit" name="btnSave" value="Save"
                                style="float:right; width: 25% ">
                        </div>

                            </div>
                </div>
            </form>

        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script>
    $(document).ready(function() {
        console.log("Function Ready!.");

        $("#SendcuForm").submit(function(e) {
            console.log("save");
            event.preventDefault();
            $.ajax({
                url: "sendcu.php",
                type: "POST",
                data: $('form#SendcuForm').serialize(),
                success: function(data) {
                    console.log("Success", data);
                    location.reload();
                    alert(data);
                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                },
            });
        });

        // $("#ReceiveForm").submit(function(e) {
        //     console.log("receiver");
        //     event.preventDefault();
        //     $.ajax({
        //         url: "send.php",
        //         type: "POST",
        //         data: $('form#ReceiveForm').serialize(),
        //         success: function(data) {
        //             console.log("Success", data);
        //             $("#modalbody").html(data);
        //             var btnClose =
        //                 ' <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>'
        //             $("#footermodal").html(btnClose);
        //         },
        //         error: function(data) {
        //             console.log('An error occurred.');
        //             console.log(data);
        //         },
        //     });
        // });



        $(function() {
            $("#ReceiveModal").on("hidden.bs.modal",
                function() {
                    location.reload();
                });
        });

    });
    </script>

</body>

</html>
<?php  ?>