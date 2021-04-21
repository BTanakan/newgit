<?php 
    session_start();
    include_once('../config.php');
    

    $output = "";

    //var_dump($_SESSION['sender_firstname']);

    if(!empty($_POST['NameReceive']))
    {
        $sql = "INSERT INTO receiver(receiver_name, phone, address, province, postcode, tracking_number, sender_firstname_lastname,price)
        VALUE(:receiver_name, :phone, :address, :province, :postcode, :tracking_number, :sender_firstname_lastname, :price)";
$query = $db->prepare($sql);
$query->bindParam(':receiver_name', $name, PDO::PARAM_STR);
$query->bindParam(':phone', $phone, PDO::PARAM_STR);
$query->bindParam(':address', $address, PDO::PARAM_STR);
$query->bindParam(':province', $province, PDO::PARAM_STR);
$query->bindParam(':postcode', $postcode, PDO::PARAM_STR);
$query->bindParam(':tracking_number', $tracking, PDO::PARAM_STR);
$query->bindParam(':sender_firstname_lastname', $sender_firstname_lastname, PDO::PARAM_STR);
$query->bindParam(':price', $price, PDO::PARAM_STR);

$name = $_POST['NameReceive'];
$phone = $_POST['MBNameReceive'];
$address = $_POST['AddersReceive'];
$province = $_POST['Adders2Receive'];
$postcode = $_POST['PostcodeReceive'];
$tracking = $_POST['tracking_number'];
$sender_firstname_lastname = $_SESSION['sender_firstname'];
$price = $_POST['Price'];


$result = $query->execute();

// var_dump($name);
// var_dump($phone);
// var_dump($address);
// var_dump($province);
// var_dump($postcode);
// var_dump($tracking);
// var_dump($sender_firstname_lastname);
// var_dump($price);

if($sql)
{
//var_dump("success");
$output.="Send Success! <br>";
$output.= "Tracking ID: ".$tracking;
}
} else {
$output.="Fail";
}
echo $output;


?>