<?php
// login checker for admin access level

// if the session value is empty, not logged in yet. Redirect to logi page
if(empty($_SESSION['logged_in'])){
    header("Location: {$home_url}login.php?action=not_yet_logged_in");
}
//if level was not "Admin", redirect him to login page
else if($_SESSION['access_level'] != "Admin"){
    header("Location: {$home_url}login.php?action=not_admin");
}
else {
    // no prpblem, stay on the current page
}