<?php
include_once ('../config.php');
$output = "";

    if(!empty($_POST['txt_status']))
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