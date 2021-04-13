<?php 
    // Make sure user is logged in as a valid administrator
    if(!isset($_SESSION['is_valid_admin'])) {
        header("Location: .?action=show_login");
    }
?>