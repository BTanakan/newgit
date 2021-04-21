<?php
include_once ('../config.php');
$output = "";

//var_dump($_POST['driver_name']);

    if(!empty($_POST['txt_status']) && !empty($_POST['driver_name']))
    {
        //var_dump("Hello");
        $sql = "UPDATE receiver
                    SET status = :status , driver_id = :driver_id
                    WHERE tracking_number = :tacking_number";
        $query = $db->prepare($sql);
        $query->bindParam(':tacking_number', $tacking_number, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':driver_id', $driver_id, PDO::PARAM_STR);

        $tacking_number = $_POST['txt_tack'];
        $status = $_POST['txt_status'];
        $driver_id = $_POST['driver_name'];

        $query->execute();



        if($sql)
        {
            $output.="Update Success";
        }
    } else if(!empty($_POST['txt_status']) && empty($_POST['driver_name']))
    {
        //var_dump("Hello");
        $sql = "UPDATE receiver
                    SET status = :status 
                    WHERE tracking_number = :tacking_number";
        $query = $db->prepare($sql);
        $query->bindParam(':tacking_number', $tacking_number, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);

        $tacking_number = $_POST['txt_tack'];
        $status = $_POST['txt_status'];

        $query->execute();



        if($sql)
        {
            $output.="Update Success";
        }
    }else {
        $output.="Fail Update";
    }
    echo $output;
?>