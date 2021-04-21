<?php 

session_start();
$output = "";
include_once ('config.php');

    if(!empty ($_POST['txtuse']) && !empty($_POST['txtps']))
    {
        

        $sql = "SELECT* FROM users WHERE username  = :username";
        $query = $db->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $username = $_POST['txtuse'];
        $password = $_POST['txtps'];
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        if($query->rowCount() > 0) {
            foreach($result as $res) {
                if($res->username == $username && $res->password == $password)
                {
                    $output.="login success";
                    $_SESSION['name'] = $res->username;
                    $_SESSION['user_id'] = $res->user_id;
                    $_SESSION['role'] = $res->role;
                }
                else{
                    $output.="login fail something wrong";
                }
            }
        }

        $output.="Text in come";
    }else {
        $output.="Fail to Login";
    }

    echo $output;
?>