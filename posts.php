<?php
session_start();
require_once('postsorm.php');

$path_components = explode('/', $_SERVER['PATH_INFO']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $title = trim($_REQUEST['title']);
    $description = trim($_REQUEST['description']);
    $price = intval($_REQUEST['price']);
    $phonenumber = trim($_REQUEST['phonenumber']);
    $username =  $_SESSION['username'];
    $category = trim($_REQUEST['category']);
    $imagelink = trim($_REQUEST['imagelink']);
 $new_post = postsorm::create($title, $description, $price, $phonenumber, $username, $category, $imagelink);
    
    
    // Report if failed
    if ($new_post == null) {
      header("HTTP/1.0 500 Server Error");
      print("Server couldn't create new todo.");
      exit();
    }
    
    //Generate JSON encoding of new Todo
    header("Content-type: application/json");
    echo($new_post);
    
    exit();
}

