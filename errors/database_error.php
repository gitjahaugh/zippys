<?php include('header.php'); ?>

    <h2>Database Error</h2>
    <p>Something went wrong! </p>
    <p>There was an error connecting to the database.</p>
    <p>Please configure your database settings and try again.</p>
        <?= $Error ?>
    </p>
    <br>
    <p><a href=".">Back to Vehicle Inventory</a></p>
<?php include('footer.php'); ?>