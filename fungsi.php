<?php

$conn=mysqli_connect("localhost","root","","user");

function show_user(){
    global $conn;
    $final=[];
    $hasil= mysqli_query($conn, "SELECT * FROM user_detail");
    while($data= mysqli_fetch_assoc($hasil)){
        $final[]= $data;
    
    }
    return $final;
}
?>