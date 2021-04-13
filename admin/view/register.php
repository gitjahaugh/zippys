<?php require('view/header.php'); ?>

    <h2>Register a new admin user</h2>

    <?php if(isset($errors)) { ?>
        <ul>
        <?php foreach ($errors as $error) : ?>
            <li class="register_error_message"><?= $error ?></li>
            <?php endforeach; ?>
        </ul> 
    <?php } ?>
    
    <form action="." method="POST" class="edit_vehicle__form">
        <input type="hidden" name="action" value="register">
        <div>
            <label for="username">Username:</label>
            <input id="username" type="text" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>
        </div>
        <div>
            <label for="confirm_password">Confirm password:</label>
            <input id="confirm_password" type="password" name="confirm_password" required>
        </div>
        <button type="submit">Register</button>
    </form>

<?php require('view/footer.php'); ?>