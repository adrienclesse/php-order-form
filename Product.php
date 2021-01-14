<?php
class Product {
    function  __construct($name, $price){
        $this->name=$name;
        $this->price=$price;
    } 
}
$products = [
    $dj1 = new Product("Tiesto",1500),
    $dj2 = new Product('David Guetta',1455),
    $dj3 = new Product('DJ Snake',1500),
    $dj4 = new Product('Charlotte Dewitte',1000),
    $dj5 = new Product('Daft Punk',2500),
    $dj6 = new Product('Martin Garrix',3500),
    ];


// echo "<pre>";
//  var_dump($products);
// echo "</pre>";

// var_dump($dj4->price);
