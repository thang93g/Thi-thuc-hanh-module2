<form method="post">
    Edit product <?php echo $product['name'] ?>
    <table class="table">
        <tr>
            <th>Name</th>
            <td><input name="name" type="text" value="<?php echo $product['name'] ?>"></td>
        </tr>
        <tr>
            <th>Category</th>
            <td><select name="category">
                    <option selected><?php echo $product['category'] ?></option>
                    <?php foreach ($categories as $category): ?>
                        <option><?php echo $category->getName() ?></option>
                    <?php endforeach; ?>
                </select></td>
        </tr>
        <tr>
            <th>Price</th>
            <td><input type="number" name="price" value="<?php echo $product['price'] ?>"></td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td><input type="number" name="quantity" value="<?php echo $product['quantity'] ?>"></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><textarea name="description" ><?php echo $product['description'] ?></textarea></td>
        </tr>
        <tr>
            <th><a class="btn btn-secondary" href="index.php">Cancel</a> </th>
            <td><input class="btn btn-success" type="submit" value="Edit"></td>
        </tr>
    </table>
</form>