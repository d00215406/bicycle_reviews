<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Product</h1>
    <form action="index.php" method="post" id="add_product_form">

        <input type="hidden" name="action" value="update_product">

        <input type="hidden" name="product_id"
               value="<?php echo $bicycle['bicycleID']; ?>">

        <label>Category ID:</label>
        <input type="category_id" name="category_id"
               value="<?php echo $bicycle['typeID']; ?>">
        <br>

        <label>Code:</label>
        <input type="input" name="code"
               value="<?php echo $bicycle['bicycleCode']; ?>">
        <br>

        <label>Name:</label>
        <input type="input" name="name"
               value="<?php echo $bicycle['bicycleName']; ?>">
        <br>

        <label>List Price:</label>
        <input type="input" name="price"
               value="<?php echo $bicycle['listPrice']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_products">View Product List</a></p>

</main>
<?php include '../view/footer.php'; ?>