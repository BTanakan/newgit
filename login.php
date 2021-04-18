<?php
session_start();
include("inc/config.php");
$output="";
if($_POST["txtus"]){
        $sql="select fullname from hw where username=? and password=?";
        if($stmt=$conn->prepare($sql)){
            $stmt->bind_param("ss",$us,$ps);
            $us=$_POST["txtus"];
            $ps=sha1($_POST["txtps"]);
            if(mysqli_stmt_execute($stmt)){
                $result=$stmt->get_result();
                if($result->num_rows>0){
                    $row=$result->fetch_assoc();
                    $_SESSION["name"]=$row["fullname"];
                    $output.=$row["fullname"]."login successfully. ";
                }
                else{
                    $output.="Error in Object Oriented: username or password incorrect.";
                }
            }
            else{
                $output.="Error in Object Oriented: could not execute query: $sql".$conn->error;
            }

        }
        else{
            $output.="Error in Object Oriented: could not prepare query: $sql".$conn->error;
        }
}
else $output.="Error: not found.";
include("inc/close.php");
echo $output;
?>