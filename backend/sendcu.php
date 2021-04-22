<?php
    //var_dump("hello world");
    include_once('../config.php');
    $output="";

    if (!empty($_POST['NameSend'])) {
       // var_dump("insert");
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

        // var_dump($firstname_lastname);
        // var_dump($phone);
        // var_dump($address);
        // var_dump($district_province);
        // var_dump($postcode);

        $sql = "INSERT INTO receiver(receiver_name, phone, address, province, postcode, tracking_number, sender_firstname_lastname,price, region)
        VALUE(:receiver_name, :phone, :address, :province, :postcode, :tracking_number, :sender_firstname_lastname, :price, :region)";
$query = $db->prepare($sql);
$query->bindParam(':receiver_name', $name, PDO::PARAM_STR);
$query->bindParam(':phone', $phone, PDO::PARAM_STR);
$query->bindParam(':address', $address, PDO::PARAM_STR);
$query->bindParam(':province', $province, PDO::PARAM_STR);
$query->bindParam(':postcode', $postcode, PDO::PARAM_STR);
$query->bindParam(':tracking_number', $tracking, PDO::PARAM_STR);
$query->bindParam(':sender_firstname_lastname', $sender_firstname_lastname, PDO::PARAM_STR);
$query->bindParam(':price', $price, PDO::PARAM_STR);
$query->bindParam(':region', $region, PDO::PARAM_STR);

$name = $_POST['NameReceive'];
$phone = $_POST['MBNameReceive'];
$address = $_POST['AddersReceive'];
$province = $_POST['Adders2Receive'];
$postcode = $_POST['PostcodeReceive'];
$tracking = $_POST['tracking_number'];
$sender_firstname_lastname = $_POST['NameSend'];
$price = $_POST['Price'];
$region = $_POST['region'];


$result = $query->execute();

// var_dump($name);
// var_dump($phone);
// var_dump($address);
// var_dump($province);
// var_dump($postcode);
// var_dump($tracking);
// var_dump($sender_firstname_lastname);
// var_dump($price);
        $output.="Add order Success";
        $output.="Track ID: ".$tracking;
    } 
    echo $output;
?>