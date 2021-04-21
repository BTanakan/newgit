<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Bolt</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,">
    <link rel="shortcut icon" href="../photo/ico.ico" type="image/x-icon">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="backend.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />


</head>

<body style="background-color:#E5E5E5;">
    <section>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php"><img src="../photo/logo.png" width="150px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="Create.php">Create Shipment</a>
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
                                <li><a class="dropdown-item active" href="">Pending Shipment Report</a></li>
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
                                    <li><a class="dropdown-item" href="#">Edit your Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Change Password</a></li>
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
                <form action="post" class="row" id="PendingForm">
                    <div class="row g-4">
                        <div class="header">
                            <h3><i class="fas fa-exclamation-circle" style="color:#F03F45;"></i>Pending Shipment Report
                            </h3>
                        </div>
                        <div class="col-md-10">
                            <input type="search" class="form-control" placeholder="Search">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success" style="width:50%"><i class="fas fa-search"
                                    style="color:white;"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <br><hr>
                <div class="col-md-12">
                        <table class="table table-striped table-hover" id="myTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>Consignment No.</th>
                                    <th>Pickup Date</th>
                                    <th>Recipient Info</th>
                                    <th>COD Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            // $sql = "select * from book";
                            // if($result = $conn->query($sql)){
                            //     if($result -> num_rows > 0){
                            //         while($row=$result->fetch_array()){
                            //             echo "<tr>";
                            //             echo "<td>".$row["Tacking"]."</td>";
                            //             echo "<td>".$row["Name"]."</td>";
                            //             echo "<td>".$row["Author"]."</td>";
                            //             echo "<td>".$row["Stock"]."</td>";
                            //             echo "<td>".$row["Price"]."</td>";
                            //             echo "<td>";
                            //             echo "<span title='View' data-toggle='tooltip' class='view_data'  id='" . $row["ISBN"] . "' style='padding-right:5px'><i class='fas fa-eye'></i></span>";
                            //             echo "<span title='Edit' data-toggle='tooltip' class='edit_data' id='" . $row["ISBN"] . "' style='padding-right:5px'><i class='fas fa-pen'></i></span>";
                            //             echo "<span title='Delete' data-toggle='tooltip' class='delete_data' id='" . $row["ISBN"] . "' fname='" . $row["Image"] . "' style='padding-right:5px'><i class='fas fa-trash'></i></span>";
                            //             echo"</td>";
                            //             echo"</tr>";
                            //         }
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
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/bootstrap.bundle.js"></script>
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
    $(function() {
        $("#PostalForm").submit(function() {
            event.preventDefault();
            $.ajax({
                url: "Postal.php",
                type: "post",
                data: $("form#PostalForm").serialize(),
                success: function(data) {
                    $("#ModalFade").modal({
                        fadeDuration: 100
                    });
                },
                error: function(data) {
                    console.log("An error occurred." + data);
                }
            });
        });

    });
    </script>
</body>

</html>