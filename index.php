<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();


// Use this function when you need to need an overview of these variables
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
$products = [
    ['name' => 'Tiesto', 'price' => 1500],
    ['name' => 'David Guetta', 'price' => 1455],
    ['name' => 'DJ Snake', 'price' => 1500],
    ['name' => 'Charlotte Dewitte', 'price' => 1000],
    ['name' => 'Daft Punk', 'price' => 2500],
    ['name' => 'Martin Garrix', 'price' => 3500],
];

$email="";
$errorEmail="";
$zipcode="";
$errorZip="";
$streetNumber="";
$errorStreet="";
$street="";
$errorStreet="";
$errorCity="";
$errorStreetNumber="";
$productsWarning ="";
$city="";
$productsSelected=[];

//whatIsHappening();
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if(isset($_POST['submit'])){
  if (!empty($_POST['products'])) {
    $productsSelected = array_keys($_POST['products']);
  }
        
    // if(!empty($_POST['products']))
    // {
    // $chosenProducts = array_keys($_POST['products']);

    //     foreach ($chosenProducts as $item) {
    //         array_push($chosentProductArray, $products[$item]->name);
    //         array_push($chosenPriceArray, $products[$item]->price);
    //     }
    // }
   if (empty($_POST['email'])){
       
    $errorEmail=' <div class="alert alert-danger" role="alert">Please enter your email adress!</div>';
   } 
   else{
   
   $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errorEmail = '<div class="alert alert-danger" role="alert">"Invalid email format</div>';
}
}   
    
if (empty($_POST['zipcode'])){
         
        $errorZip=' <div class="alert alert-danger" role="alert">Please enter your zip code!</div>';
       } 
       else{
        
        
         $zipcode = test_input($_POST["zipcode"]);
        if (!filter_var($zipcode, FILTER_VALIDATE_INT)) {
      $errorZip = '<div class="alert alert-danger" role="alert">"Invalid zip code format</div>';
    }
   
}
if (empty($_POST['street'])){
         
    $errorStreet=' <div class="alert alert-danger" role="alert">Please enter your street!</div>';
   } 
   else{
  
        $street = test_input($_POST["street"]);
  
}
if (empty($_POST['streetnumber'])){
         
    $errorStreetNumber=' <div class="alert alert-danger" role="alert">Please enter your street number!</div>';
   } 
   else{
  
        $streetNumber= test_input($_POST["streetnumber"]);
}
if (empty($_POST['city'])){
         
  $errorCity=' <div class="alert alert-danger" role="alert">Please enter your city!</div>';
 } 
 else{

      $city = test_input($_POST["city"]);

}
}


// TODO: provide some products (you may overwrite the example)




$totalValue = 0;

require 'form-view.php';