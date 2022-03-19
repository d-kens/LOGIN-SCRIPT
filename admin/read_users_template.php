<?php 

// Display table if the number of users was greater than zero
if($num>0){
    ?>
        <table class="table table-hover table-responsive table-bordered">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Access Level</th>
            </tr>
            <!--Loop through the user records-->
            <?php
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    // Display user details
                    ?>
                        <tr>
                            <td><?php echo $firstname; ?></td>
                            <td><?php echo $lastname; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $contact_number; ?></td>
                            <td><?php echo $access_level; ?></td>
                        </tr>
                    <?php
                }
            ?>
        </table>
    <?php
    $page_url = "read_users.php?";
    $total_rows = $user->countAll();

    // actual paging buttons
    include_once 'paging.php';
}
else {
    ?>
        <div class="alert alert-danger">
            <strong>No users found</strong>
        </div>
    <?php
}