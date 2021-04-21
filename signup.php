<?php
session_start();
include("inc/config.php");
$output="";
if(isset($_POST["txtuse"])){
    $sql="insert into users (username,password) values(?,?)";
            if($stmt=$conn->prepare($sql)){
                $stmt->bind_param("ss",$us,$ps);
                $us=$_POST["txtuse"];
                $ps=sha1($_POST["txtps"]);
                if($stmt->query()){
                    $last_id=$conn->insert_id;
                    
                }
                else{
                    $output.="Error in Object Oriented: could not execute query: $sql".$conn->error;
                }
                $stmt->close();
            }
            else{
                $output.="Error in Object Oriented: could not execute query: $sql".$conn->error;
            }  
}
else{
    $output .= "Error: not found.";
}
include("inc/close.php");
echo $output;
?>