<?php

function con(){
    return mysqli_connect("localhost","root","","blog");
};

$url = "http://{$_SERVER['HTTP_HOST']}/basic_crud/contact_project";

