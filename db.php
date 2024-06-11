<?php

if (isset($name) || isset($mob) || isset($addr)  )

{
    $name = $_POST['name'];
    $mob = $_POST['mob'];
    $addr = $_POST['addr'];

    $conn = new mysqli('localhost','root','','db');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into inp(name, mob, addr)values(?, ?, ?)");
        $stmt->bind_param("sis",$name,$mob,$addr);
        $stmt->execute();
        echo"Your appoinment book succesfully";
        $stmt->close();
        $conn->close();
    }
}

?>