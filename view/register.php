<?php include('header.php'); ?>

<?php if (!$first_name) { ?>

<form action="." method="GET" class="register_form">
    <input type="hidden" name="action" value="register">
    <label for="first_name">Please enter your first name:</label>
    <input type="text" id="first_name" name="first_name" maxlength="50" required>
    <input type="submit" value="Register" class="button blue">
</form>

<?php } else { ?>
    <br>
    <h1 class="thank_you">Thank you for registering, <?= $first_name ?>!</h1>
    <br>
    <p><a href=".">Click here</a> to view our vehicle list.</p>
    <br>
<?php } ?>
<?php include('footer.php'); ?>