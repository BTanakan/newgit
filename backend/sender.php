<?php 
    session_start();

    $output ="";
    include_once('../config.php');

    if(!empty($_POST['NameSend']) && $_POST['checkbox'] == "1")
    {
        var_dump("update");
        $sql = "UPDATE sender
                    SET firstname_lastname = :firstname_lastname, phone = :phone, address = :address, district_province = :district_province, postcode = :postcode
                    WHERE user_id = :user_id";
$query = $db->prepare($sql);
$query->bindParam(':firstname_lastname', $firstname_lastname, PDO::PARAM_STR);
$query->bindParam(':phone', $phone, PDO::PARAM_STR);
$query->bindParam(':address', $address, PDO::PARAM_STR);
$query->bindParam(':district_province', $district_province, PDO::PARAM_STR);
$query->bindParam(':postcode', $postcode, PDO::PARAM_STR);
$query->bindParam(':user_id', $user_id, PDO::PARAM_STR);

$firstname_lastname = $_POST['NameSend'];
$phone = $_POST['MBSend'];
$address = $_POST['AddersSend'];
$district_province = $_POST['Adders2Send'];
$postcode = $_POST['PostcodeSend'];
$user_id = $_SESSION['user_id'];

$result = $query->execute();

var_dump($firstname_lastname);
var_dump($phone);
var_dump($address);
var_dump($district_province);
var_dump($postcode);
var_dump($user_id);


        if($sql)
        {
            var_dump("success");
            
        }
    } else if (!empty($_POST['NameSend']) && $_POST['checkbox'] == "2") {
        var_dump("insert");
               $sql = "INSERT INTO sender(firstname_lastname, phone, address, district_province, postcode, user_id)
                    VALUE(:firstname_lastname, :phone, :address, :district_province, :postcode, :user_id)";
        $query = $db->prepare($sql);
        $query->bindParam(':firstname_lastname', $firstname_lastname, PDO::PARAM_STR);
        $query->bindParam(':phone', $phone, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':district_province', $district_province, PDO::PARAM_STR);
        $query->bindParam(':postcode', $postcode, PDO::PARAM_STR);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        $firstname_lastname = $_POST['NameSend'];
        $phone = $_POST['MBSend'];
        $address = $_POST['AddersSend'];
        $district_province = $_POST['Adders2Send'];
        $postcode = $_POST['PostcodeSend'];
        $user_id = $_SESSION['user_id'];

        $result = $query->execute();

        var_dump($firstname_lastname);
        var_dump($phone);
        var_dump($address);
        var_dump($district_province);
        var_dump($postcode);
        var_dump($user_id);
    } 


?>