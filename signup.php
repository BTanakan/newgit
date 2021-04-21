<?php 
    include_once('config.php');
    $output ="";
    if(!empty($_POST['txtuse']) && !empty($_POST['txtmail']) && !empty($_POST['txtps']))
    {
        //$output.= "Have item";
        $sql = "INSERT INTO users(username, email, password, role) 
                    VALUE(:username, :email, :password, :role)";
        $query = $db->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);

        $query->bindParam(':role', $role, PDO::PARAM_STR);
        
        $username = $_POST['txtuse'];
        $email = $_POST['txtmail'];
        $password= $_POST['txtps'];
        $role = $_POST['txtrole'];

        $result = $query->execute();
        
    } else {
        $output.="Fail";
    }

    echo $output;

?>