<nav>
    <form action="." method="GET" id="make_selection">
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
                        <option value="<?= $type['ID'] ?>" selected>
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
                        <option value="<?= $class['ID'] ?>" selected>
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
    </form>
</nav>