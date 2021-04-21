<?php 
    session_start();

    $output ="";
    include_once('../config.php');

    if(!empty($_POST['NameSend']) && empty($_POST['check']))
    {
        var_dump("update");
        $sql = "UPDATE sender(firstname_lastname, phone, address, district_province, postcode)
        VALUE(:firstname_lastname, :phone, :address, :district_province, :postcode)";
$query = $db->prepare($sql);
$query->bindParam(':firstname_lastname', $firstname_lastname, PDO::PARAM_STR);
$query->bindParam(':phone', $phone, PDO::PARAM_STR);
$query->bindParam(':address', $address, PDO::PARAM_STR);
$query->bindParam(':district_province', $district_province, PDO::PARAM_STR);
$query->bindParam(':postcode', $postcode, PDO::PARAM_STR);

$firstname_lastname = $_POST['NameSend'];
$phone = $_POST['MBSend'];
$address = $_POST['AddersSend'];
$district_province = $_POST['Adders2Send'];
$postcode = $_POST['PostcodeSend'];

$result = $query->execute();

var_dump($firstname_lastname);
var_dump($phone);
var_dump($address);
var_dump($district_province);
var_dump($postcode);


        if($sql)
        {
            var_dump("success");
            
        }
    } else if (!empty($_POST['NameSend']) && !empty($_POST['check'])) {
        var_dump("insert");
               $sql = "INSERT INTO sender(firstname_lastname, phone, address, district_province, postcode)
                    VALUE(:firstname_lastname, :phone, :address, :district_province, :postcode)";
        $query = $db->prepare($sql);
        $query->bindParam(':firstname_lastname', $firstname_lastname, PDO::PARAM_STR);
        $query->bindParam(':phone', $phone, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':district_province', $district_province, PDO::PARAM_STR);
        $query->bindParam(':postcode', $postcode, PDO::PARAM_STR);

        $firstname_lastname = $_POST['NameSend'];
        $phone = $_POST['MBSend'];
        $address = $_POST['AddersSend'];
        $district_province = $_POST['Adders2Send'];
        $postcode = $_POST['PostcodeSend'];

        $result = $query->execute();

        var_dump($firstname_lastname);
        var_dump($phone);
        var_dump($address);
        var_dump($district_province);
        var_dump($postcode);
    }


?>