<?php include('view/header.php') ?>

    <h2>Search Inventory</h2>
    <?php include('view/vehicle_selector_form.php') ?>

    <h2>Vehicle Inventory</h2>
    <section id="inventory_list">
        <?php if($vehicles) { ?>
        <div id="table-overflow-customer" class="table-overflow-customer">
            <table>
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Class</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vehicles as $vehicle) : ?>
                <tr>
                    <td><?= $vehicle['year']; ?></td>
                    <?php if ($vehicle['Make']) { ?>
                    <td><?= $vehicle['Make']; ?></td>
                    <?php } else { ?>
                    <td>No vehicle inventory associated with the make selected.</td>
                    <?php } ?>
                    <td><?= $vehicle['model']; ?></td>
                    <?php if ($vehicle['Type']) { ?>
                    <td><?= $vehicle['Type']; ?></td>
                    <?php } else { ?>
                    <td>No vehicle inventory associated with the type selected.</td>
                    <?php } ?>
                    <?php if ($vehicle['Class']) { ?>
                    <td><?= $vehicle['Class']; ?></td>
                    <?php } else { ?>
                    <td>No vehicle inventory associated with the class selected.</td>
                    <?php } ?>
                    <td><?= "$".number_format($vehicle['price'], 2); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        <?php } else { ?>
        <p>
            There are no matching vehicles in Zippy&apos;s inventory.
        </p>
        <?php } ?>
    </section>
<?php include('view/footer.php') ?>