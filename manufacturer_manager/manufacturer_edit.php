<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Product</h1>
    <form action="index.php" method="post" id="edit_manufacturer_form">

        <input type="hidden" name="action" value="edit_manufacturer">

        <input type="hidden" name="product_id"
               value="<?php echo $manufacturer['ManufacturerID']; ?>">

     
        <label>Code:</label>
        <input type="input" name="code"
               value="<?php echo $manufacturer['manufacturerName']; ?>">
        <br>

        <label>Name:</label>
        <input type="input" name="name"
               value="<?php echo $manufacturer['manufacturerSite']; ?>">
        <br>


        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>


</main>
<?php include '../view/footer.php'; ?>

