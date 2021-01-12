<?php
session_start();

$emailErr = $streetErr = $numberErr = $cityErr = $zipcodeErr = $productErr = "";
$email = $street = $streetnumber = $city = $zipcode = $product = "";
$result="";
$text="Your Input : ";
$order_text="Your order is :";

if (isset($_POST["order"])) {

    //email
    if (empty($_POST["email"])) {
        $emailErr = "Email is Required";
    }
    else {
        $email = $_POST["email"];
        $_SESSION["email"] = $_POST["email"];
        
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }


    //street

    if (empty($_POST["street"])) {
        $streetErr = " Street is Required";
    }
    else {
        $street = $_POST["street"];
        $_SESSION["street"] = $_POST["street"];
        
    }

    //street Number

    if (empty($_POST["streetnumber"]))  {
        $numberErr = "Street number is Required";

    }
    
    else {
        $streetnumber = $_POST["streetnumber"];
        $_SESSION["streetnumber"] = $_POST["streetnumber"];
        
    
    } 

    //city
    if (empty($_POST["city"])) {
        $cityErr = "city is Required";

    }
    else {
        $city = $_POST["city"];
        $_SESSION["city"] = $_POST["city"];
        

    }

    //Zipcode
    if (empty($_POST["zipcode"])){
        $zipcodeErr = "Only number Required";
        } else {
          if (!preg_match("/^[1-9][0-9]*$/",$_POST["zipcode"])) {
              $zipcodeErr = "Only number Required";
          } else {
             $zipcode = $_POST["zipcode"];
             $_SESSION["zipcode"] = $_POST["zipcode"];
        
        }
       
    }

    //product

    if (empty($_POST["products"])) {
        $productErr = "Please Choose your Product ";
    }
    else {
        $products = $_POST["products"];
        $_SESSION["products"] = $_POST["products"];
         
    }

    //showing error and approved Message 

    if (!empty($_POST["email"]) && !empty($_POST["street"]) && !empty($_POST["streetnumber"]) && !empty($_POST["city"]) && !empty($_POST["zipcode"]) && !empty($_POST["products"])){
        $result = '<div class="alert alert-success" role="alert">Thank you! Your order is submitted !  at </div>';
    } else {
        $result = '<div class="alert alert-danger" role="alert">Please fill in Form Order</div>';
    }
    

}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  //TODO :is still not working if we click the nav option our input in gone 
  // option for product
  
 
    $products = [
        
            ['name' => 'Tiesto', 'price' => 1500,'image' =>'https://www.freepik.com/premium-photo/close-up-dj-hands-controlling-music-table-night-club_4585847.htm#query=dj&position=4'],
            ['name' => 'David Guetta', 'price' => 1455,'image' =>'https://www.freepik.com/free-photo/closeup-male-dj-working-lights-against-dark-background-studio_10499884.htm#query=dj&position=30'],
            ['name' => 'Dj Snake', 'price' => 1500,'image' =>'https://www.freepik.com/premium-photo/close-up-dj-hands-controlling-music-table-night-club_4585847.htm#query=dj&position=4'],
            ['name' => 'Charlotte Dewitte', 'price' => 1000,'image' =>'https://www.freepik.com/free-photo/cute-dj-woman-having-fun-playing-music-club-party_6526776.htm#query=dj&position=27'],
            ['name' => 'Daft Punk', 'price' => 2500,'image' =>'https://www.freepik.com/premium-photo/close-up-dj-hands-controlling-music-table-night-club_4585847.htm#query=dj&position=4'],
            ['name' => 'Martin Garrix', 'price' => 3500,'image' =>'https://www.freepik.com/premium-photo/close-up-dj-hands-controlling-music-table-night-club_4585847.htm#query=dj&position=4'],
  
    ];
   
 



 
$totalValue = 0;
foreach ($_POST['products'] as $i => $value) {
    $totalValue += ($products[$i]['price']);
}

require 'form-view.php';

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

whatIsHappening();