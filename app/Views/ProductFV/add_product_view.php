<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Product</title>
</head>

<body>
    <?= isset($validation) ? $validation->listErrors() : ''; ?>
    <form action="/productFV/save" method="post">
        <input type="text" name="product_name" placeholder="product name">
        <input type="text" name="product_price" placeholder="product price">
        <button type="submit">Save</button>
    </form>
</body>

</html>