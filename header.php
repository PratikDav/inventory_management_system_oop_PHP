<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="icon" href="image/admin.png">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f7227e2c22.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="adminPanel.css">
    <link rel="stylesheet" href="addStuff.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="addCustomers.css">
    <link rel="stylesheet" href="addSupplier.css">
    <link rel="stylesheet" href="sidenav.css">
    <link rel="stylesheet" href="stock.css">
</head>

<body style="overflow-x: hidden; background-color:#F2F7F8; height:100vh">
<?php include "database.php"?>
<?php 
    $filepath = realpath(dirname(__FILE__));
   
    include_once $filepath.'./session.php';
    Session::init();
    
?>
<?php 
include './registration.php';
$registration = new Registration();
?>


