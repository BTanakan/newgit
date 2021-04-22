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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


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
                            <a class="nav-link " href="Create.php">Create Shipment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Price Estimation</a>
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
                            <a class='nav-link' href='#'>Delivery</a>
                        </li>" ;
                        }
                        ?>
                        
                    </ul>
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
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
            <h1>Delivery [<?php echo $_SESSION['name'] ?>] Get Order :</h1>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Receiver Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Province</th>
                            <th scope="col">Postcode</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                include_once('../config.php');
                         
                $sql = "SELECT r.*
                FROM receiver r INNER JOIN driver d 
                ON r.driver_id = d.driver_id
                INNER join users u
                ON d.user_id = u.user_id
                WHERE u.user_id = :user_id";
                $query = $db->prepare($sql);
                $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                $user_id = $_SESSION['user_id'];
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_OBJ);
                        if($query->rowCount() >0) {
                            foreach($result as $res) 
                            {
                               // echo $res->customer_id. "<br>" ;
                                //echo $res->user_id. "<br>" ;
                        ?>
                        <tr>
                            <td class=""><?php echo $res->receiver_name?></td>
                            <td class=""><?php echo $res->phone?></td>
                            <td class=""><?php echo $res->address?></td>
                            <td class=""><?php echo $res->province?></td>
                            <td class=""><?php echo $res->postcode?></td>
                            <!-- <td>
                                <i class="fa fa-pencil edit" data-toggle="modal" data-target="#modaledit"
                                    aria-hidden="true" id="<?php  echo $res->tracking_number ?>"></i>
                                <i class="fa fa-trash Del_ID" name="Del_ID" value="<?php  echo $res->tracking_number ?>
                                    " i>
                            </td> -->
                        </tr>
                        <?php 
                                           }
                                        }
                                        ?>
                    </tbody>
                </table>
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



</body>

</html>