<?php
// core configuration
include_once "config/Core.php";

// set the title 
$page_title = "Index";

// include login checker
$require_login = true;
include_once "login_checker.php";

// include page header
include_once "layout_head.php";

?>

<div class="col-md-12">
    <?php
        // to prevent undefined index notice
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        // if login was successful
        if($action == 'login_success'){
            ?>
                <div class="alert alert-info">
                    <strong> Hi <?php echo  $_SESSION['firstname'] ?>, welcome back.</strong>
                </div>
            <?php
        }
        else if($action == 'already_logged_in'){
            ?>
                <div class="alert alert-info">
                    <strong>You are already logged in. </strong>
                </div>
            <?php
        }
    ?>
    <!-- content once logged in -->
    <div class="alert alert-info">
        Content when logged in will be here. For example, your premium products or services
    </div>
</div>

<?php
include_once 'layout_foot.php';