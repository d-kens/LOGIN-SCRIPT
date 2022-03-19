
<?php

/* This file is a central place where you can set common variables
   such as your home ulr, pagination setting and more */

// show error reporting
error_reporting(E_ALL);
 
// start php session
session_start();
 
// set your default time-zone
date_default_timezone_set('Africa/Nairobi');
 
// home page url
$home_url="http://localhost/Authentication/";
 
// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// set number of records per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
?>

