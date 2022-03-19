<?php

// core configuration
include_once 'config/Core.php';

// set the page title
$page_title = "Register";

// include login checker file
include_once "login_checker.php";

// include classes
include_once "config/Database.php";
include_once "objects/User.php";
include_once "libs/php/utils.php";


// include page header html
include_once "layout_head.php";

// if form was poster
if($_POST){
    // get the database connection
    $database = new Database();
    $db = $database->getConnection();

    // initialize objects
    $user = new User($db);
    $utils = new Utils();

    // set user email to detect if it already exists
    $user->email = $_POST['email'];

    // check email to detect if already exist
    if($user->emailExists()){
        ?>
        <div class="alert alert-danger">
            The email you specified is already registered. Please try again or <a href="<?php echo $home_url ?>login.php"> Login here</a>
        </div>
        <?php
    }
    else{
        // create the user here
        // The code below assigns the submitted data to the user object and then calls the create() method
        $user->firstname = $_POST['firstname'];
        $user->lastname = $_POST['lastname'];
        $user->contact_number = $_POST['contact_number'];
        $user->address = $_POST['address'];
        $user->password = $_POST['password'];
        $user->access_level = "Customer";
        $user->status = 1;

        // create the user
        if($user->create()){
            ?>
                <div class="alert alert-info">
                    Successfully registered. <a href="<?php echo $home_url ?>login.php"> PLease Login</a>
                </div>
            <?php
            // empty the posted values
            $_POST = array();
        }
        else {
            ?>
            <div class="alert alert-danger" role="alert">
                Unable to registere. Please try again.
            </div>
            <?php
        }
    }
}

?>
<div class="col-md-12">
    <!-- Registration form will be here -->
    <form action="register.php" method="post" id="register">
        <table class="table table-responsive">
            <tr>
                <td class="width-30-percent"> Firstname </td>
                <td><input type="text" class="form-control" name="firstname" required value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'], ENT_QUOTES) : ""; ?>"></td>
            </tr>

            <tr>
                <td> Lastname </td>
                <td><input type="text" class="form-control" name="lastname" required value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname'], ENT_QUOTES) : ""; ?>"></td>
            </tr>

            <tr>
                <td> Contact Number </td>
                <td><input type="text" class="form-control" name="contact_number" required value="<?php echo isset($_POST['contact_number']) ? htmlspecialchars($_POST['contact_number'], ENT_QUOTES) : ""; ?>"></td>
            </tr>

            <tr>
                <td> Address </td>
                <td><input type="text" class="form-control" name="address" required value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address'], ENT_QUOTES) : ""; ?>"></td>
            </tr>

            <tr>
                <td> Email </td>
                <td><input type="email" class="form-control" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : ""; ?>"></td>
            </tr>

            <tr>
                <td> Password </td>
                <td><input type="passowrd" class="form-control" name="password" required value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password'], ENT_QUOTES) : ""; ?>"></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> REGISTER
                    </button>
                </td>
            </tr>
            
        </table>
    </form>
</div>

<?php
// include page footer HTMl
include_once "layout_foot.php";