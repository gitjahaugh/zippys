<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css" />
    <title>Zippys</title>
</head>
<body>
    <main>
    <header>
        <?php if($action != 'register' && !isset($_SESSION['userid']) && $action != 'logout') { ?>
            <a class="register_link" href=".?action=register">Register</a>
        <?php } else if($action != 'register' && isset($_SESSION['userid']) && $action != 'logout') { ?>
            <p class="register_link">Welcome, <?= $_SESSION['userid']; ?>! (<a href=".?action=logout">Sign Out</a>)</p>
        <?php } else { ?>
            <div class="register_link">&nbsp;</div>
        <?php } ?>
        <h1>Zippy's Used Auto Sales</h1>
        <hr>
    </header>
