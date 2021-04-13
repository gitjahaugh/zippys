<?php include('view/header.php');

if (isset($_SESSION['userid'])) { ?>
    <h2>Thank you for registering, <?= $_SESSION['userid'] ?>!</h2>
    <p><a href=".?action=list_vehicles">Click here</a> to view the vehicle list.</p>
    <?php } 
else { ?>
<form action="." method="GET" class="register_new_user">
    <input type="hidden" name="action" value="register">
    <div class="register_user_input">
        <label class="register_label" for="register_fName">Please enter your first name:</label>
        <br>
        <input type="text" id="register_fName" name="first_name" required>
    </div>
    <input type="submit" value="Register" class="button blue button-slim">
</form>
<?php } ?>

<?php include('view/footer.php'); ?>