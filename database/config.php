<?php

$conn = mysqli_connect("localhost","root","","capeda");

if(!$conn){
    echo "Connection error".mysqli_connect_error()or die;

}