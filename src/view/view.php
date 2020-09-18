<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Product List</h1>
<form method="post" action="index.php?page=search-product" style="display: inline">
Enter product name:<input type="text" name="search">
<input class="btn btn-success" type="submit" value="Search">
</form>
<a class="btn btn-success" style="display: inline;left: 50%; position: relative" href="index.php?page=add-product">Add product</a>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Category</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php if (empty($products)): ?>
        <tr>
            <td colspan="4">No product</td>
        </tr>
    <?php else: ?>
        <?php foreach ($products as $key=>$product): ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $product->getName() ?></td>
                <td><?php echo $product->getCategory() ?></td>
                <td><a class="btn btn-success" href="index.php?page=edit&id=<?php echo $product->getId() ?>">Edit</a> </td>
                <td><a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="index.php?page=delete&id=<?php echo $product->getId() ?>">Delete</a> </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>

</body>
</html>