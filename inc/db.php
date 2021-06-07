<?php

$conn = new mysqli('localhost','root','','ecom');

if(!$conn)
{
    echo "Failed to Connect";
}
