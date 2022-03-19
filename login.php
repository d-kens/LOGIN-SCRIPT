<?php
// core configuration
include_once "config/Core.php";

// set the page title
$page_title = "Login";

// include login checker
$require_login = false;
include_once "login_checker.php";

// default to false
$access_denied = false;

// post code will be here
// if the login form was submitted
if($_POST){
    // email check will be here
    // include classes
    include_once "config/Database.php";
    include_once "objects/User.php";

    // get databse connection
    $database = new Database();
    $db = $database->getConnection();

    // initialize objects
    $user = new User($db);

    //check if email and passowrd are in the database
    $user->email = $_POST['email'];

    // check if email exist, and also get user deatils using emailExists method
    $email_exists = $user->emailExists();

    // login validation will be here
    // password_verify() verifies that given hash matches the given password
    if($email_exists && password_verify($_POST['password'], $user->password) && $user->status == 1){
        // if it is, set the session value to true
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user->id;
        $_SESSION['access_level'] = $user->access_level;
        $_SESSION['firstname'] = $user->firstname;
        $_SESSION['lastname'] = $user->lastname;

        // if access level is admin, redirect to admin section
        if($user->access_level == 'Admin'){
            header("Location: {$home_url}admin/index.php?action=login_success");
        }
        // else, redirect to the customer section
        else{
            header("Location: {$home_url}index.php?action=login_success");
        }
        
    }
    else{
        //if username does not exist or password is wrong
        $access_denied = true;
    }
}

//login form will be here
// include page header HTML
include_once "layout_head.php";
?>
<div class="col-sm-6 col-md-4 col-md-offset-4">
    <!--Alert message will be here -->
    <?php

        //get the action value in the url parameter to display corresponding prompt message
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        // tell the user they are not yet logged in
        if($action == 'not_yet_logged_in'){
            ?>
            <div class="alert alert-danger margin-top-40" role="alert">
                Please login
            </div>
            <?php
        }
        // tell the user to login
        else if($action == 'please_login'){
            ?>
            <div class="alert alert-info" role="alert">
                <strong> Please login to access this page </strong>
            </div>
            <?php
        }
        else if($action=='email_verified'){
            ?>
            <div class="alert alert-succes" role="alert">
                <strong> Your email has been validated. </strong>
            </div>
            <?php
        }
        // tell the user access denied
        if($access_denied){
            ?>
            <div class="alert alert-danger margin-top-40" role="alert">
               Access Denied. <br><br>
               Your username or password maybe incorrect.
            </div>
            <?php
        }

    ?>
    <div class="account-wall">
        <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="login">
                <!--<span align="center">LOGIN</span>-->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-signin">
                    <input type="text" name="email" class="form-control" placeholder="Email" required autofocus>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <input type="submit" class="btn btn-lg btn-primary btn-block" value="LOGIN">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// include footer HTML and javascript codes
include_once "layout_foot.php";