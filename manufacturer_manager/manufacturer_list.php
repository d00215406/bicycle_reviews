<?php include '../view/header.php'; ?>
<main>

    <h1>Manufacturer List</h1>

    <section>
        <!-- display a table of products -->
        <table>
            <tr>
                <th>Name</th>
                <th>Site</th>

            </tr>
            <?php foreach ($manufacturers as $manufacturer) : ?>
            <tr>
                <td><?php echo $manufacturer['manufacturerName']; ?></td>
                <td><?php echo $manufacturer['manufacturerSite']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
         <p><a href="?action=show_add_manufacturer">Add Manufacturer</a></p>

    </section>

</main>
<?php include '../view/footer.php'; ?>