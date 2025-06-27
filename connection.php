<?php

$con = new mysqli("localhost", "root", "", "library") or die("unable to connect");
if($con)
{
    echo "Connected";
}
?>