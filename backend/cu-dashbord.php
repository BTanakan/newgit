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


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Tracking</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                include_once('../config.php');
                         
                $sql = "SELECT* FROM receiver WHERE sender_firstname_lastname  = :sender_firstname_lastname";
                        $query = $db->prepare($sql);
                       $query->bindParam(':sender_firstname_lastname', $sender_firstname_lastname, PDO::PARAM_STR);
                       $sender_firstname_lastname = 'ธนาคาร คงไฝ';
                        $query->execute();
                        $result = $query->fetchAll(PDO::FETCH_OBJ);
                        if($query->rowCount() >0) {
                            foreach($result as $res) 
                            {
                               // echo $res->customer_id. "<br>" ;
                                //echo $res->user_id. "<br>" ;
                        ?>
                        <tr>
                            <td class="track"><?php echo $res->tracking_number?></td>
                            <td class="status"><?php echo $res->status?></td>
                            
                            <td>
                                <i class="fa fa-pencil edit" data-toggle="modal" data-target="#modaledit"
                                    aria-hidden="true" id="<?php  echo $res->tracking_number ?>"></i>
                                <i class="fa fa-trash Del_ID" name="Del_ID" value="<?php  echo $res->tracking_number ?>
                                    " i>
                            </td>
                
                        </tr>
                                        <?php 
                                           }
                                        }
                                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- model delete  -->
        <div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="modalLogin"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Order </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" id="bookdeletemodalbody">
                        <p> Are you sure want to delete ?</p>
                        <p class="text-warning">This action cannot be undo. </p>
                    </div>
                    <div class="modal-footer" id="bookdeletemodalfooter">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="delete_re">Delete</button>
                        <!-- <input type="text" class=""  id="userdetail_id" name="id_detail" value="" > -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Books edit -->
        <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="modalLogin"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <form method="post" id="frmedit" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title edittext" id="exampleModalLabel">Edit Order </h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modalbody">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control " id="isbn" name="txt_tack"
                                        placeholder="Tracking" value="" readonly>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" id="name" name="txt_status"
                                        placeholder="Status">
                                </div>


                            </div>
                            <br>
                        </div>


                        <div class="modal-footer" id="modalupdate">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" id="Edit_re">Update</button>
                            <input type="hidden" class="" id="user_id" value='' name="user_id">
                        </div>
                    </form>
                </div>
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
    $(document).ready(function() {
        console.log("Ready Faction!!");

        $('.Del_ID').click(function(e) {
            e.preventDefault();
            console.log("DELTE");
            var Delete_ID = $(this).attr('value');
            console.log(Delete_ID);
            $('#modaldelete').modal('show');

            $('#delete_re').click(function(e) {
                console.log("dddd");

                $.ajax({
                    url: 'delete-hub.php',
                    method: 'post',
                    // การใส่ data แบบระบุตัวแปล $_POST['Del_ID']
                    data: {
                        Del_ID: Delete_ID
                    },
                    success: function(data) {
                        console.log(data);
                        $("#bookdeletemodalbody").html(data);
                        var btnClose =
                            ' <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>'
                        $("#modalupdate").html(btnClose);
                    }
                });
            });

        });


        $('.edit').click(function(e) {
            e.preventDefault();
            console.log("edit");

            $track = $(this).closest("tr").find('.track').text();
            $status = $(this).closest("tr").find('.status').text();
            $driver = $(this).closest("tr").find('.status').text();
            $('#isbn').val($track);
            $('#name').val($status);
            $('#name').val($driver);
        });

        $('#frmedit').on('submit', function(e) {
            console.log("onClick");
            e.preventDefault();
            $.ajax({
                url: "update-cu.php",
                type: "POST",
                data: $('form#frmedit').serialize(),
                success: function(data) {
                    console.log(data);
                    $("#modalbody").html(data);

                    var btnClose =
                        ' <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>'
                    $("#bookdeletemodalfooter").html(btnClose);

                }
            });
        });

        $(function() {
            $("#modaldelete, #modaledit").on("hidden.bs.modal",
                function() {
                    location.reload();
                });
        });

    });
    </script>


</body>

</html>