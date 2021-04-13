<?php include('view/header.php'); ?>
    <nav>
    <h2>Search Inventory</h2>
    <form action="." method="GET" id="filter_vehicles" class="filter_vehicles">
    <section id="dropmenus" class="dropmenus">    
        <select name="make_id">
                <option value="0">View All Makes</option>
                <?php foreach ($makes as $make) : ?>
                <?php if ($make_id == $make['ID']) { ?>
                    <option value="<?= $make['ID'] ?>" selected>
                <?php } else { ?>
                    <option value="<?= $make['ID'] ?>">
                <?php } ?>
                    <?= $make['Make'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <br>
        <select name="type_id">
        <option value="0">View All Types</option>
        <?php foreach ($types as $type) : ?>
        <?php if ($type_id == $type['ID']) { ?>
            <option value="<?= $type['ID'] ?>"selected>
        <?php } else { ?>
            <option value="<?= $type['ID'] ?>">
        <?php } ?>
            <?= $type['Type'] ?>
        </option>
        <?php endforeach; ?>
        </select>
        <br>
        <select name="class_id">
        <option value="0">View All Classes</option>
        <?php foreach ($classes as $class) : ?>
        <?php if ($class_id == $class['ID']) { ?>
            <option value="<?= $class['ID'] ?>"selected>
        <?php } else { ?>
            <option value="<?= $class['ID'] ?>">
        <?php } ?>
            <?= $class['Class'] ?>
        </option>
        <?php endforeach; ?>
        </select>
        <br>
        </section>
        <section id="sortBy" class="sortBy">
            <div>
                <span>Sort by: </span>
                <input type="radio" id="sortByPrice" name="sort" value="price" 
                    <?php if ($sort === 'price') echo 'checked' ?>>
                <label for="sortByPrice">Price</label>
                <input type="radio" id="sortByYear" name="sort" value="year" 
                    <?php if ($sort === 'year') echo 'checked' ?>>
                <label for="sortByYear">Year</label>
                <input type="submit" value="Submit" class="button blue button-slim">
            </div>
        </section>
        </section>
    </form>
    </nav>

    <h2>Vehicle Inventory</h2>
    <section>
        <?php if($vehicles) { ?>     
        <div id="table-overflow" class="table-overflow">       
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Class</th>
                        <th>Price</th>
                        <th>&nbsp;</th>
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
                    <td>
                        <form action="." method="POST">
                            <input type="hidden" name="action" value="delete_vehicle">
                            <input type="hidden" name="vehicle_id" value="<?= $vehicle['vehicle_id']; ?>">
                            <input type="submit" value="Remove" class="button red button-slim">                        </form>
                    </td>
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


<?php include('view/footer.php'); ?>