<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

if(isset($_GET['id']) AND isset($_GET['status']))
{
    $id = $_GET['id'];
    $status = $_GET['status'];
    if($status == "pending"){
        $update = $conn->prepare("UPDATE orders SET statusa= 'successfully' WHERE id='$id'");
        $update->execute();
        header("location: index.php");
    }
    else
    {
        $update = $conn->prepare("UPDATE orders SET statusa= 'pending' WHERE id='$id'");
        $update->execute();
        header("location: index.php");
    }



}