<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zippys Admin</title>
        <link rel="stylesheet" href="../css/main.css" >
    </head>

    <body>
        <main>

            <h1>Zippy Admin</h1>
            <hr>

            <?php if($login_message) { ?>
                <h2><?= $login_message ?></h2>
             <?php } else { ?>
                <h2 >Please fill in your credentials to login</h2>
            <?php } ?>

            <form action="." method="POST" class="add_form">
                <div class="container">
                    <input type="hidden" name="action" value="login">
                    <div>
                        <label for="username">Username: </label>
                        <input type="text" name="username" id="username" maxlength="255" autocomplete="off" aria-required="true" autofocus required>
                    </div>
                    <div>
                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password" maxlength="255" autocomplete="off" aria-required="true" required>
                    </div>
                    <div>
                        <button>Sign In</button>
                    </div>
                </div>
            </form>
<br>
<p>New User <a href=".?action=register">Register Here</a></p>