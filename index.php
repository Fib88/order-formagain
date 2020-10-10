<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();
ini_set("display_errors", '1');
ini_set("display_startup_errors", '1');
error_reporting(E_ALL);


function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}


//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

$products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

$totalValue = 0;

//define variables and set to empty values
$email = $street = $streetNumber = $city = $zipCode = "";
$emailErr = $streetErr = $streetNumberErr = $cityErr = $zipCodeErr = "";




if ($_SERVER["REQUEST_METHOD"] == "POST"){
echo "pulled the data";

//if no mail input log this error
if (empty($_POST["email"])){
        $emailErr = "Email is required";
    }
    else{
        //if not mailadress format log this error
        $email = input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
        //if everything else fits go ahead and store the input
        else{
            $email = input($_POST["email"]);
        }

    }
    //if no input run this error
    if(empty($_POST["street"])){
        $streetErr = "Street is required";
    }
    //else when you have input store it
    else{
        $street = input($_POST["street"]);
    }

    //if you have not input log this error
    if(empty($_POST["streetnumber"])) {
        $streetNumberErr = "Street number is required";
    }
    //if its not a number log this error
    elseif(!filter_var($_POST["streetnumber"], FILTER_VALIDATE_INT)){
            $streetNumberErr = "Please insert a number";
        }
        //else you can store the input
        else{
            $streetNumber = input($_POST["streetnumber"]);
        }

        //if no input log this error
    if(empty($_POST["city"])){
        $cityErr = "City is required";
    }
    //else you can store this input
    else{
        $city = input($_POST["city"]);
    }

    //if no input log this error
    if(empty($_POST["zipcode"])){
        $zipCodeErr = "A zipcode is required";
    }

    //if input are not ints log this error
    elseif (!filter_var($_POST["zipcode"], FILTER_VALIDATE_INT) ){
        $zipCodeErr = "Please insert numbers";
    }
    //if you log more than 4characters log this error
    elseif(strlen(strval($_POST["zipcode"]))>4){
        $zipCodeErr = "Only a max of 4 numbers is allowed";
    }

    //else you can store the input
    else{
        $zipCode = $_POST["zipcode"];
    }

}

$succesMessage = "Succes! Your order will soon be delivered";
if(isset($email,$street,$city,$zipCode,$streetNumber)&& empty($emailErr) && empty($streetErr) &&
    empty($zipCodeErr) && empty($streetNumberErr) && empty($cityErr)){
    echo $succesMessage;
}


function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

require 'form-view.php';
whatIsHappening();

