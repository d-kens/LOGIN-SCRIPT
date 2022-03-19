<?php
// core configuration
include_once "../config/Core.php";

// check if logged in as admin
include_once "login_checker.php";

// set page title 
$page_title = "Admin Index";

// include page header HTML
include "layout_head.php";

?>
<div class="col-md-12">
    <?php
        // get parameter values, to prevent undefined index notice
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        // tell the user they are laready logged in
        if($action == 'already_logged_in'){
            ?>
                <div class="alert alert-info">
                    <strong> You</strong> are already logged in.
                </div>
            <?php
        }
        else if($action == 'logged_in_as_admin'){
            ?>
                <div class="alert alert-info">
                    <strong>You</strong> are logged in as admin.
                </div>
            <?php
        }

        ?>
            <div class="alert alert-info">
                Contents of your admin section will be here.
            </div>
        <?php
    ?>
</div>

<?php
include_once 'layout_foot.php';