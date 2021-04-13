<?php include('view/header.php'); ?>


        <h2>Add Vehicle</h2>
        <form action="." method="POST" id="add_vehicle_form" class="add_vehicle_form">
            <input type="hidden" name="action" value="add_vehicle">
            <div>
                <label>Make:</label>
                <select name="make_id" required>
                    <option value="">Please Select</option>
                    <?php foreach ($makes as $make) : ?>
                    <option value="<?= $make['ID']; ?>">
                        <?= $make['Make']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <label>Type:</label>
                <select name="type_id" requried>
                    <option value="">Please Select</option>
                    <?php foreach ($types as $type) : ?>
                    <option value="<?= $type['ID']; ?>">
                        <?= $type['Type']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <label>Class:</label>
                <select name="class_id" required>
                    <option value="">Please Select</option>
                    <?php foreach ($classes as $class) : ?>
                    <option value="<?= $class['ID']; ?>">
                        <?= $class['Class']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <label>Year:</label>
                <input type="number" name="year" id="year" min="1900" max="2099" maxlength="4" step="1" value="year"  required>
                <br>
                <label>Model:</label>
                <input type="text" name="model" id="model" maxlength="20" required>
                <br>
                <label>Price:</label>
                <input type="number" name="price" id="price" maxLength="999999" required>
                <br>
                <input type="submit" value="Add Vehicle" class="button blue">
                <br>
            </div>
        </form>

<?php include('view/footer.php'); ?>