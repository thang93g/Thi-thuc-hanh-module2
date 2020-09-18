<form method="post">
    <h1>Add product</h1>
    <table class="table">
        <tr>
            <th>Name</th>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <th>Category</th>
            <td><select name="category">
                    <?php foreach ($categories as $category): ?>
                    <option><?php echo $category->getName() ?></option>
                    <?php endforeach; ?>
                </select></td>
        </tr>
        <tr>
            <th>Price</th>
            <td><input type="number" name="price"></td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td><input type="number" name="quantity"></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><input type="text" name="description"></td>
        </tr>
        <tr>
            <th><a  class="btn btn-secondary" href="index.php">Cancel</a></th>
            <td><input class="btn btn-success" type="submit" value="Add"></td>
        </tr>
    </table>
</form>