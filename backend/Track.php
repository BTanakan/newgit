<?php session_start(); 
    include_once('../config.php')
?>
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
                <a class="navbar-brand" href=""><img src="../photo/logo.png" width="150px"></a>
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
                            <a class="nav-link active" href="">Track & Trace</a>
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
                            <a class='nav-link' href='#'>Delivery</a>
                        </li>" ;
                        }
                        ?>
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

    <section>
        <div class="container shadow p-3 mb-5 bg-body rounded">
            <div class="container-fluid">
                <form action="" method="post" class="row" id="TrackForm">
                    <div class="row g-4">
                        <div class="header">
                            <h3><i class="fas fa-box-open" style="color:#F03F45;"></i> Track & Trace</h3>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" name="methoddb" id="">
                                <option value="ReceiverName" id="ReceiverName" selected>Receiver Name</option>
                                <option value="TrackNum" id="TrackNum">Track Number</option>
                            </select>
                        </div>
                        <div class=" col-md-7">
                            <input type="text" class="form-control" name="get_tack"
                                placeholder="Please fill in the information" value="<?php if(isset($_POST['get_tack'])) {echo $_POST['get_tack']; } ?>">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success" style="width:60%"><i class="fas fa-search"
                                    style="color:white;"></i></button>
                        </div>
                    </div>
                </form>
                <br>
                <hr>
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
                    if(isset($_POST['get_tack']))
                    {
                        // echo "<input type='text' class='form-control col-3' id='$_POST['get_tack']' value=' '>";
                    }

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
    </script>
</body>

</html>