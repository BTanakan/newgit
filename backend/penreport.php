<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Bolt</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="backend.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

</head>

<body>
    <section>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="../photo/logo.png" width="150px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " href="backend.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="parcels.php">Track Parcels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" aria-current="page" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Report
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="report.php">Shipment Report</a></li>
                                <li><a class="dropdown-item" href="reportcod.php">COD Report</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Pending Shipment Report</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </section>
    <br><br>
    <section>
        <div class="container" style="background-color:white; width:1080px; height:640px; ">
            <div class="container-fluid">
                <form action="post" class="row" id="PostalForm">
                    <div class="row g-4">
                        <div class="header">
                            <h3><i class="fas fa-exclamation-circle" style="color:#F03F45;"></i>Pending Shipment Report </h3>
                        </div>
                        <div class="col-md-12" style="display: flex;">
                            <input type="text" class="form-control">
                            <button type="submit" class="btn btn-secondary"><i class="fab fa-searchengin"
                                    style="color:#F03F45;"></i></button>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Track Number</th>
                                        <th>Pickup Date</th>
                                        <th>Deliver Date</th>
                                        <th>Receiver Info</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php
                            
                            ?>
                                <tbody>
                                    <?php           
                        
                        ?>
                                </tbody>
                            </table>
                            <?php
                
            
            ?>
                        </div>
                    </div>
                </form>
            </div>
    </section>
    <section>
        <div class="modal" tabindex="-1" id="ModalFade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
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
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
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
        $('#myTable').DataTable();
    });
    </script>
</body>

</html>