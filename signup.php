<?php
session_start();
include("inc/config.php");
$output="";
if(isset($_POST["txtuse"])){
    $sql="insert into  (fullname,username,password) values(?,?,?)";
            if($stmt=$conn->prepare($sql)){
                $stmt->bind_param("sss",$name,$us,$ps);
                $name=$_POST["txtname"];
                $us=$_POST["txtus"];
                $ps=sha1($_POST["txtps"]);
                if($stmt->execute()){
                    $last_id=$conn->insert_id;
                    $output.="Records ID: $last_id inserted successfully with object oriented method.";
                    

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