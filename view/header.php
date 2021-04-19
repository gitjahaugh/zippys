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
        <h1>Zippy's Used Auto Sales</h1>
        <div class="register">
            <?php if (!isset($_SESSION['userid']) && $action !== 'register') { ?>
                <a href=".?action=register">Register</a>
            <?php } else if (isset($_SESSION['userid']) && $action !== 'register' && $action !== 'logout') { 
                $userid = $_SESSION['userid']; ?>
                <p>
                    Welcome <?= $userid ?>! (<a href=".?action=logout">Sign Out</a>)
                </p>
            <?php } ?>
        </div>
    </header>
