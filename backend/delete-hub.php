<?php
include_once ('../config.php');
$output = "";

    // if(!empty($_POST['txt_status']))
    // {
    //     //var_dump("Hello");
    //     $sql = "UPDATE receiver
    //                 SET status = :status
    //                 WHERE tracking_number = :tacking_number";
    //     $query = $db->prepare($sql);
    //     $query->bindParam(':tacking_number', $tacking_number, PDO::PARAM_STR);
    //     $query->bindParam(':status', $status, PDO::PARAM_STR);

    //     $tacking_number = $_POST['txt_tack'];
    //     $status = $_POST['txt_status'];

    //     $query->execute();



    //     // $output.="Text in come";
    // }else {
    //     $output.="Fail Update";

    // }
        $sql = "DELETE FROM receiver WHERE tracking_number = :tracking_number";

        $query = $db->prepare($sql);
        $query->bindParam(':tracking_number', $tracking_number, PDO::PARAM_STR);

        $tracking_number = $_POST['Del_ID'];

        $query->execute();

        if($sql)
        {
            $output.="Delete Success!";
        }

        echo $output;

    //var_dump($track);
?>