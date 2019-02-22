<?php include '../view/header.php'; ?>
<main>
    <h1>Add Manufacturer</h1>
    <form action="index.php" method="post" id="add_manufacturer_form">
        <input type="hidden" name="action" value="add_product">

        <label>Code:</label>
        <input type="input" name="name">
        <br>

        <label>Name:</label>
        <input type="input" name="site">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add manufacturer">
        <br>
    </form>
    

</main>
<?php include '../view/footer.php'; ?>