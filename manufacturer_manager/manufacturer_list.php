<?php include '../view/header.php'; ?>
<main>

    <h1>Manufacturer List</h1>

    <section>
        <!-- display a table of products -->
        <table>
            <tr>
                <th>Name</th>
                <th>Site</th>
                <th>&nbsp;</th>

            </tr>
            <?php foreach ($manufacturers as $manufacturer) : ?>
            <tr>
                <td><?php echo $manufacturer['manufacturerName']; ?></td>
                <td><?php echo $manufacturer['manufacturerSite']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="product_id"
                           value="<?php echo $manufacturer['manufacturerID']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
         <p><a href="?action=add_manufacturer">Add Manufacturer</a></p>

    </section>

</main>
<?php include '../view/footer.php'; ?>