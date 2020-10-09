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

if (empty($_POST["email"])){
        $emailErr = "Email is required";
    }
    else{
        $email = input($_POST["email"]);
    }

    if(empty($_POST["street"])){
        $streetErr = "Street is required";
    }
    else{
        $street = input($_POST["street"]);
    }

    if(empty($_POST["streetnumber"])) {
        $streetNumberErr = "Street number is required";
    }
    else{
        $streetNumber = input($_POST["streetnumber"]);
        }

    if(empty($_POST["city"])){
        $cityErr = "City is required";
    }
    else{
        $city = input($_POST["city"]);
    }

    if(empty($_POST["zipcode"])){
        $zipCodeErr = "A zipcode ranging up to 4numbers is required";
    }
    else{
        $zipCode = $_POST["zipcode"];
    }

}

function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

require 'form-view.php';
whatIsHappening();