    <div class="zippylinks">
        <?php if ($action !== 'list_vehicles') { ?>
            <p><a href=".">View Full Vehicle List</a></p>
        <?php } ?>
        <?php if ($action !== 'show_add_vehicle_form') { ?>
            <p><a href=".?action=show_add_vehicle_form">Click here</a> to add a vehicle</p>
        <?php } ?>
        <?php if ($action !== 'list_makes') { ?>
            <p><a href=".?action=list_makes">View/Edit Vehicle Makes</a></p>
        <?php } ?>
        <?php if ($action !== 'list_types') { ?>
            <p><a href=".?action=list_types">View/Edit Vehicle Types</a></p>
        <?php } ?>
        <?php if ($action !== 'list_classes') { ?>
            <p><a href=".?action=list_classes">View/Edit Vehicle Classes</a></p>
        <?php } ?>
        <?php if ($action !== 'show_register') { ?>
            <p><a href=".?action=show_register">Register New Admin User</a></p>
        <?php } ?>
        <p><a href=".?action=logout">Logout</a></p>

    </div>

    <footer>
        <p>$&copy <?= date('Y'); ?> Zippy Used Autos INC.</p>
    </footer>
</main>

</body>
</html>