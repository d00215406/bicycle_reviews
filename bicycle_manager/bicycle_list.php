<?php include '../view/header.php'; ?>
<main>

    <h1>Bicycle List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Types</h2>
        <?php include '../view/category_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $type_name; ?></h2>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th class="right">Price</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($bicycles as $bicycle) : ?>
            <tr>
                <td><?php echo $bicycle['bicycleCode']; ?></td>
                <td><?php echo $bicycle['bicycleName']; ?></td>
                <td class="right"><?php echo $bicycle['listPrice']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="product_id"
                           value="<?php echo $bicycle['bicycleID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $bicycle['typeID']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_product">
                    <input type="hidden" name="product_id"
                           value="<?php echo $bicycle['bicycleID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $bicycle['typeID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Bicycle</a></p>
        <p><a href="?action=list_categories">List Types</a></p>
        <p><a href="../manufacturer_manager/">List Manufacturer</a></p>
        
    </section>

</main>
<?php include '../view/footer.php'; ?>